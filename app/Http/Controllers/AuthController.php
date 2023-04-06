<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:2|max:60',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:60',
        ]);

        User::create([
            'username' => ucwords(strtolower($request->username)),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->to('/login')->with('registered', 'Account registered successfully');
    }

    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        // if (!$user) {
        //     return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        // }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->to('/');
        } 
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->to('/');
    }
}
