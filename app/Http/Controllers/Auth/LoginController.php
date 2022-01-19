<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('backend.login');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // memvalidasi data
        $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required',
        ]);

        // menentukan login sebagain email atau username
        $usernameOrEmail = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? $this->username() : 'username';
        $credential = [
             $usernameOrEmail => $request->username,
            'password'  => $request->password,
        ];

        // mencocokan data dengan yg ada di DB
        if (Auth::guard('web')->attempt($credential, $request->remember)){
            // jika berhasil redirect ke halaman backend.index
            return redirect()->intended(route('backend.index'));
        }

        // kalau gagal
        toast('Gagal Login Silahkan Login Kembali','error','top-right');
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
