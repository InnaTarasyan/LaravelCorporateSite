<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Repositories\RolesRepository;
use Corp\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Gate;
use Corp\Http\Requests\UserRequest;
use Corp\User;

class UsersController extends AdminController
{
    protected  $u_rep;
    protected  $rol_rep;

    public function __construct(UsersRepository $u_rep, RolesRepository $rol_rep)
    {
        parent::__construct();

        $this->u_rep = $u_rep;
        $this->rol_rep = $rol_rep;

        $this->template = env('THEME').'.admin.users';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Редактирование Пользователей!';

        $users = $this->getUsers();

        $this->content = view(env('THEME').'.admin.users_content')
            ->with([
                'users' => $users
            ])->render();
        $this->vars = array_add($this->vars, 'content', $this->content);

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('save', new \Corp\User)){
            abort(403);
        }

        $this->title = 'Добавить пользователя!';

        $roles = $this->getRoles();

        $roles = $roles->reduce(function ($returnRoles, $role){
            $returnRoles[$role->id] = $role->name;
            return $returnRoles;
        }, []);


        $this->content = view(env('THEME').'.admin.users_create_content')
            ->with(['roles' => $roles])
            ->render();

        $this->vars = array_add($this->vars, 'content', $this->content);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $result = $this->u_rep->addUser($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit', new User())){
            abort(403);
        };

        $this->title = 'Редактирование пользователя - '.$user->name;
        $roles = $this->getRoles();

        $roles = $roles->reduce(function ($returnRoles, $role){
            $returnRoles[$role->id] = $role->name;
            return $returnRoles;
        }, []);

        $this->content = view(env('THEME').'.admin.users_create_content')
            ->with(['user' => $user, 'roles' => $roles])
            ->render();
        $this->vars = array_add($this->vars, 'content', $this->content);

        return $this->renderOutput();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $result = $this->u_rep->updateUser($request, $user);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $this->u_rep->deleteUser($user);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }

    public function getUsers(){
        return $this->u_rep->get('*');
    }

    public function getRoles(){
        return $this->rol_rep->get('*');
    }
}
