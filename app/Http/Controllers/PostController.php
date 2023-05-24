<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validasi;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_admin');
     }
    public function index()
    {

        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }

        $posts = Post::status(true)->get();
        $total_active = $posts->count();
        $total_nonActive = Post::status(false)->count();
        $total_dihapus = Post::onlyTrashed()->count();

        // dd($total_dihapus);


        $data = [
            'posts' => $posts,
            'total_active' => $total_active,
            'total_nonActive' => $total_nonActive,
            'total_dihapus' => $total_dihapus
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
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Validasi $request)
    {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }


        Post::create([
            'title' =>$request->input('title'),
            'content' => $request->input('konten'),

        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }
        $selected_post = Post::where('slug', $slug)->first();
        $comments = $selected_post->comments()->get();
        $total_comments = $comments->count();




        // "SELECT * FROM posts WHERE id = $id"
        // $selected_post = Post::selectById($id)->first();
        // $comments = $selected_post->comments()->get();
        // $total_comments = $comments->count();


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
    public function edit($slug)
    {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }
        $selected_post = Post::where('slug', $slug)->first();

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
    public function update(Request $request, $slug)
    {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }
        $input = $request->all();

        // dd($slug, $title, $content);

        // ? "UPDATE .... Where id = $id"
        Post::where('slug', $slug)->update([
            'title' => $input['title'],
            'content' => $input['content'],
            'slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', $input['title'])
        ]);

        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $input['title']);

        return redirect("posts/$slug");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }
        Post::selectById($id)->delete();

        return redirect('posts');
    }

    public function trash() {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }
        $trash_item = Post::onlyTrashed()->get();

        // dd($trash_item);

        $data = [
            'posts' => $trash_item
        ];

        return view('posts.recyclebin', $data);
    }

    public function permanent_delete($id) {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }

        Post::selectById($id)->forceDelete();

        return redirect('posts/trash');
    }

    public function restore($id) {
        // if(!Auth::check()) {
        //     return redirect('login')->with('login_forbidden', 'PERINGATAN !!!');
        // }
        Post::selectById($id)->withTrashed()->restore();
        return redirect('posts');
    }
}
