<?php

namespace App\Repos;

use App\Models\AdminUser;

class AdminRepo {

    /**
     * @return Object
     */
    public function model()
    {
        return new AdminUser();
    }

    /**
     * @param int $id
     *
     * @return administrator
     */
    public function getAdministrator($id)
    {
        return $this->model()->findOrFail($id);
    }

    /**
     * @param CreateAdminRequest $request
     */
    public function createAdministrator($request)
    {
        $this->model()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'ip' => $request->ip(),
            'user_agent' => $request->server('HTTP_USER_AGENT'),
        ]);
    }

    /**
     * @param UpdateAdminRequest $request, $id, $mail
     */
    public function updateAdministrator($request, $id, $mail)
    {
        $administrator = $this->model()->findOrFail($id);

        $administrator->update([
            'name' => $request->name,
            'email' => $mail,
            'phone' => $request->phone,
            'password' => empty($request->password) ? $request->hpassword : bcrypt($request->password) ,
            'ip' => $request->ip(),
            'user_agent' => $request->server('HTTP_USER_AGENT'),
        ]);
    }

    /**
     * @param $id
     */
    public function deleteAdministrator($id)
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