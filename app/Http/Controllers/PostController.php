<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::active()->get();
        $total_active = $posts->count();
        $total_nonActive = 

        $data = [
            'posts' => $posts
        ];

        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Post::insert([
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // "SELECT * FROM posts WHERE id = $id"
        $selected_post = Post::selectById($id)->first();
        $comments = $selected_post->comments()->get();
        $total_comments = $comments->count();


        $data = [
            'post'               => $selected_post,
            'comments'           => $comments,
            'total_comments'     => $total_comments
        ];



        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selected_post = Post::selectById($id)->first();

        $data = [
            'post' => $selected_post
        ];

        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        // ? "UPDATE .... Where id = $id"
        Post::selectById($id)
                ->update([
                    'title' => $title,
                    'content' => $content,
                    'updated_at' => date("Y-m-d H:i:s")
                ]);

                return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::selectById($id)->delete();

        return redirect('posts');
    }

    public function trash() {
        $trash_item = Post::onlyTrashed()->get();

        // dd($trash_item);

        $data = [
            'posts' => $trash_item
        ];

        return view('posts.recyclebin', $data);
    }

    public function permanent_delete($id) {

        Post::selectById($id)->forceDelete();

        return redirect('posts/trash');
    }

    public function restore($id) {
        Post::selectById($id)->withTrashed()->restore();
        return redirect('posts');
    }
}
