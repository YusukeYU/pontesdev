<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginRequest;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email_user', 'password_user');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashboard/main');
        } 
       return view('admin.pages.startPages.login', ['login_failed' => '1']);
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/login');
    }
}
