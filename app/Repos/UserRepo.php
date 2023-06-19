<?php

namespace App\Repos;

use App\Models\User;

class UserRepo {

    /**
     * @return Object
     */
    public function model()
    {
        return new User();
    }

    /**
     * @param int $id
     *
     * @return User
     */
    public function getUser($id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * @param CreateUserRequest $request
     */
    public function createUser($request)
    {
        $this->model()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    /**
     * @param UpdateUserRequest $request, $id, $mail
     */
    public function updateUser($request, $id, $mail)
    {
        $user = $this->model()->findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $mail,
            'password' => empty($request->password) ? $request->hpassword : bcrypt($request->password),
        ]);
    }

    /**
     * @param $id
     */
    public function deleteUser($id)
    {
        return $this->model()->findOrFail($id)->delete();
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model()->query();
    }
}