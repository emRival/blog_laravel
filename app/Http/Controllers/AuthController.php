<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{

    public function login()
    {
        if(Auth::check()) {
            return redirect('posts')->with('failed_open_login','');
        }
        return view('auth.login');

    }

    public function authenticate(Request $request)
    {

        $credential = $request->only('email', 'password');
        
        if(Auth::attempt($credential)){
            $user = Auth::user()->name;
                return redirect('posts')->with('login-success', "login berhasil, Selamat datang {$user}");
        } else {
                return redirect('login')->with('error_message', 'wrong email or password');
        }
        
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('login')->with('logout', 'BERHASIL !!!');
    }

    public function register_form() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $request->validate([
            'name'      => 'required|min:3|max:10',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:4|max:6|confirmed'
        ]);


        User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ]);

        return redirect('login');

    }

}
