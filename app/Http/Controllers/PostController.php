<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\Validasi;
use App\Models\comments;
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

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('is_admin')->except(['show']);
        $this->middleware('is_owner')->only(['edit', 'update', 'destroy']);
    }
    public function index()
    {

        $user = Auth::user()->id;
        $posts = Post::status(true)->where('user_id', $user)->latest()->get();
        $total_active = $posts->count();
        $total_nonActive = Post::status(false)->count();
        $total_dihapus = Post::onlyTrashed()->count();

        // dd($total_dihapus);


        $data = [
            'posts' => $posts,
            'total_active' => $total_active,
            'total_nonActive' => $total_nonActive,
            'total_dihapus' => $total_dihapus,

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
    public function store(CreateRequest $request)
    {

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id,
            'image' => $request->file('image')->store('berita')
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
        $post = Post::where('slug', $slug)->first();
        $comments = $post->comments()->get();
        $total_comments = $comments->count();

        return view('posts.show', compact('post', 'comments', 'total_comments'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $selected_post = Post::where('slug', $slug)->first();

        return view('posts.edit', compact('selected_post'));
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
    $post = Post::where('slug', $slug)->firstOrFail();
    $post->slug = null;

    $data = [
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ];

    if ($request->hasFile('image')) {
        Storage::delete($post->image);
        $data['image'] = $request->file('image')->store('berita');
    }

    $post->update($data);

    return redirect("posts/$post->slug");
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
        comments::where('post_id', $id)->delete();

        return redirect('posts');
    }

    public function trash()
    {

        $trash_item = Post::onlyTrashed()->get();

        // dd($trash_item);

        $data = [
            'posts' => $trash_item
        ];

        return view('posts.recyclebin', $data);
    }

    public function permanent_delete($id)
    {


        Post::selectById($id)->forceDelete();
        comments::where('post_id', $id)->forceDelete();

        return redirect('posts/trash');
    }

    public function restore($id)
    {

        Post::selectById($id)->withTrashed()->restore();
        comments::where('post_id', $id)->delete();
        return redirect('posts');
    }
}
