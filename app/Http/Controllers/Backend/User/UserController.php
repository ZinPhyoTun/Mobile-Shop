<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    /**
     * Show the application's User Page.
     *
     * @return \Illuminate\View\View
     */
    public function getUserPage()
    {
        return view('backend.admin.users.index');
    }

    /**
     * Show the application's User Create Page.
     *
     * @return \Illuminate\View\View
     */
    public function createUserPage()
    {
        return view('backend.admin.users.create');
    }

    /**
     * Show the application's Update Page.
     *
     * @return \Illuminate\View\View
     */
    public function createUserUpdatePage($id)
    {
        $user = User::findOrFail($id);

        return view('backend.admin.users.edit', compact('user'));
    }

    /**
     * Create User.
     *
     * @return \Illuminate\View\View
     */
    public function storeUser(CreateUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Update User.
     *
     * @return \Illuminate\View\View
     */
    public function updateUserData(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $mails = User::all()->pluck('email');

        if ($request->email != $user->email) {
            if (in_array($request->email, json_decode($mails))) {

                return redirect()->back()->withInput()->withErrors(['email' => 'Email has already been taken.']);
            } else {
                $mail = $request->email;
            }
        } elseif ($request->email == $user->email) {
            $mail = $request->email;
        }

        $user->update([
            'name' => $request->name,
            'email' => $mail,
            'password' => empty($request->password) ? $request->hpassword : bcrypt($request->password) ,
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete User.
     *
     * @return \Illuminate\View\View
     */
    public function deleteUser($id)
    {
        return User::findOrFail($id)->delete();
    }

    /**
     * Show User.
     *
     * @return \Illuminate\View\View
     */
    public function showUser($id)
    {
        $user = User::findOrFail($id);

        return view('backend.admin.users.show', compact('user'));
    }

    /**
     * Show the application's Users.
     *
     * @return databable_data
     */
    public function getUsers()
    {
        $users = User::query();

        return DataTables::of($users)
        ->editColumn('created_at', function ($user) {
            return date_format($user->created_at, "Y-m-d H:i:s");
        })
        ->editColumn('updated_at', function ($user) {
            return date_format($user->updated_at, "Y-m-d H:i:s");
        })
        ->addColumn('action', function ($user) {
            return '<a href="/admin/users/show/'. $user->id .'"><i class="fa fa-eye"></i></a>'.'&nbsp;&nbsp;<a href="/admin/users/'. $user->id .'"><i class="fa fa-edit"></i></a>' . '&nbsp;&nbsp;<a href="#" class="delete" data-id='. $user->id .'><i class="fa fa-trash text-danger"></i></a>';
        })
        ->make(true);
    }
}
