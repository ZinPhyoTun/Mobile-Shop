<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Repos\AdminRepo;
use DataTables;

class AdminController extends Controller
{
    /**
     * @var AdminRepo
     */
    protected $admin_repo;

    /**
     * @param AdminRepo $admin_repo
     */
    public function __construct(AdminRepo $admin_repo)
    {
        $this->admin_repo = $admin_repo;
    }

    /**
     * Show the application's Admin Panel.
     *
     * @return \Illuminate\View\View
     */
    public function adminPanel()
    {
        return view('backend.admin.home');
    }

    /**
     * Show the application's Administrator Page.
     *
     * @return \Illuminate\View\View
     */
    public function getAdministratorPage()
    {
        return view('backend.admin.administrators.index');
    }

    /**
     * Show the application's Admin Create Page.
     *
     * @return \Illuminate\View\View
     */
    public function createAdminPage()
    {
        return view('backend.admin.administrators.create');
    }

    /**
     * Show the application's Update Page.
     *
     * @return \Illuminate\View\View
     */
    public function createAdminUpdatePage($id)
    {
        $administrator = $this->admin_repo->getAdministrator($id);

        return view('backend.admin.administrators.edit', compact('administrator'));
    }

    /**
     * Create Admin.
     *
     * @return \Illuminate\View\View
     */
    public function storeAdmin(CreateAdminRequest $request)
    {
        $this->admin_repo->createAdministrator($request);

        return redirect()->route('admin.administrators.index');
    }

    /**
     * Update Administrator.
     *
     * @return \Illuminate\View\View
     */
    public function updateAdminData(UpdateAdminRequest $request, $id)
    {
        $administrator = $this->admin_repo->model()->findOrFail($id);

        $mails = $this->admin_repo->model()->get()->pluck('email');

        if ($request->email != $administrator->email) {
            if (in_array($request->email, json_decode($mails))) {

                return redirect()->back()->withInput()->withErrors(['email' => 'Email has already been taken.']);
            } else {
                $mail = $request->email;
            }
        } elseif ($request->email == $administrator->email) {
            $mail = $request->email;
        }

        $this->admin_repo->updateAdministrator($request, $id, $mail);

        return redirect()->route('admin.administrators.index');
    }

    /**
     * Delete Administrator.
     *
     * @return \Illuminate\View\View
     */
    public function deleteAdmin($id)
    {
        return $this->admin_repo->deleteAdministrator($id);
    }

    /**
     * Show Administrator.
     *
     * @return \Illuminate\View\View
     */
    public function showAdmin($id)
    {
        $administrator = $this->admin_repo->getAdministrator($id);

        return view('backend.admin.administrators.show', compact('administrator'));
    }

    /**
     * Show the application's Administrators.
     *
     * @return databable_data
     */
    public function getAdministrators()
    {
        $admin_users = $this->admin_repo->getForDataTable();

        return DataTables::of($admin_users)
        ->editColumn('created_at', function ($admin_user) {
            return date_format($admin_user->created_at, "Y-m-d H:i:s");
        })
        ->editColumn('updated_at', function ($admin_user) {
            return date_format($admin_user->updated_at, "Y-m-d H:i:s");
        })
        ->addColumn('action', function ($admin_user) {
            return '<a href="/admin/administrators/show/'. $admin_user->id .'"><i class="fa fa-eye"></i></a>'.'&nbsp;&nbsp;<a href="/admin/administrators/'. $admin_user->id .'"><i class="fa fa-edit"></i></a>' . '&nbsp;&nbsp;<a href="#" class="delete" data-id='. $admin_user->id .'><i class="fa fa-trash text-danger"></i></a>';
        })
        ->make(true);
    }
}
