<?php
namespace Corp\Repositories;
use Corp\User;
use Gate;


class UsersRepository extends Repository{
    public function __construct(User $user) {
        $this->model = $user;
    }

    public function addUser($request){
        if(Gate::denies('edit', $this->model)){
            abort(403);
        }

        $data = $request->except('_token');
        if(empty($data)){
            return array(['error' => 'Нет данных!']);
        }

        $data['password'] = bcrypt($data['password']);

        $user = $this->model->create($data);
        if($user){
            $user->roles()->attach($data['role_id']);
        }

        return ['status' => 'Пользователь Доваблен!'];

    }

    public function updateUser($request, $user){
        if(Gate::denies('edit', $this->model)){
            abort(403);
        }

        $data = $request->except('_token');
        if(empty($data)){
            return array(['error' => 'Нет данных!']);
        }

        $data['password'] = bcrypt($data['password']);
        $user->fill($data)->update();
        $user->roles()->sync([$data['role_id']]);

        return ['status' => 'Пользователь обновлен!'];

    }

    public function deleteUser($user){
        if(Gate::denies('destroy', $user )){
            abort(403);
        };

       $user->roles()->detach();

        if($user->delete()){
            return ['status' => 'Пользователь Удален!'];
        }
    }
}