<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index()
    {
        echo "Hello World";
    }

    public function welcome()
    {
        return view('welcome');
    }
    public function cek()
    {
        $role=Auth::user()->role;

        if($role->role == 'admin'){
            return view('admin');
        }else{
            return view('user');
        }
    }
}