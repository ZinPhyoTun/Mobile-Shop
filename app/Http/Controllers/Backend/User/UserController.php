<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repos\UserRepo;
use DataTables;

class UserController extends Controller
{
    /**
     * @var UserRepo
     */
    protected $user_repo;

    /**
     * @param UserRepo $user_repo
     */
    public function __construct(UserRepo $user_repo)
    {
        $this->user_repo = $user_repo;
    }

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
        $user = $this->user_repo->getUser($id);

        return view('backend.admin.users.edit', compact('user'));
    }

    /**
     * Create User.
     *
     * @return \Illuminate\View\View
     */
    public function storeUser(CreateUserRequest $request)
    {
        $this->user_repo->createUser($request);

        return redirect()->route('admin.users.index')->with('create_message', 'Created Successfully!');
    }

    /**
     * Update User.
     *
     * @return \Illuminate\View\View
     */
    public function updateUserData(UpdateUserRequest $request, $id)
    {
        $user = $this->user_repo->model()->findOrFail($id);

        $mails = $this->user_repo->model()->get()->pluck('email');

        if ($request->email != $user->email) {
            if (in_array($request->email, json_decode($mails))) {

                return redirect()->back()->withInput()->withErrors(['email' => 'Email has already been taken.']);
            } else {
                $mail = $request->email;
            }
        } elseif ($request->email == $user->email) {
            $mail = $request->email;
        }

        $this->user_repo->updateUser($request, $id, $mail);

        return redirect()->route('admin.users.index')->with('update_message', 'Updated Successfully!');
    }

    /**
     * Delete User.
     *
     * @return \Illuminate\View\View
     */
    public function deleteUser($id)
    {
        return $this->user_repo->deleteUser($id);
    }

    /**
     * Show User.
     *
     * @return \Illuminate\View\View
     */
    public function showUser($id)
    {
        $user = $this->user_repo->getUser($id);

        return view('backend.admin.users.show', compact('user'));
    }

    /**
     * Show the application's Users.
     *
     * @return databable_data
     */
    public function getUsers()
    {
        $users = $this->user_repo->getForDataTable();

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
