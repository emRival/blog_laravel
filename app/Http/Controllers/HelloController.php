<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}