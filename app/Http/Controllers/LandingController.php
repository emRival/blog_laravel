<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $post = Post::latest()->get();
        return view('index', compact('post'));
    }
}
