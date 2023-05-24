<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentControler extends Controller
{
    public function comment(Request $request )
    {
        $request->validate([
            'comment' => 'required',
        ]);


       $comment = comments::create([
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
        ]);

        return redirect()->back()->with('success', 'Comment berhasil ditambahkan');
    }
}
