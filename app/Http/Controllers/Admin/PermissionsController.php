<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Repositories\PermissionsRepository;
use Corp\Repositories\RolesRepository;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Gate;


class PermissionsController extends AdminController
{

    private $rol_rep;
    private $per_rep;

    public function __construct(PermissionsRepository $per_rep, RolesRepository $rol_rep){
        parent::__construct();


        $this->rol_rep = $rol_rep;
        $this->per_rep = $per_rep;

        $this->template = env('THEME').'.admin.permissions';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Редактирование Привелегий!';

        $permissions = $this->getPermissions();
        $roles = $this->getRoles();
        $this->content = view(env('THEME').'.admin.permissions_content')
            ->with(['permissions' => $permissions,
            'roles' => $roles])->render();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPermissions(){
        return $this->per_rep->get('*');
    }

    public function getRoles(){
        return $this->rol_rep->get('*');
    }
}
