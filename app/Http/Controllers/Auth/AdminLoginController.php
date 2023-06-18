<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMINPANEL;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request){

        if (Auth::guard('admin_user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            
            return redirect($this->redirectTo);
        }else{
            return redirect()->back()->withInput()->withErrors(['err_message' => 'Invalid Email or Password']);
        }
    }

    /**
     * Logout the application.
     *
     * @return \Illuminate\View\View
     */
    public function logout()
    {
        Auth::guard('admin_user')->logout();
        return redirect()->route('admin.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin_user');
    }
}
