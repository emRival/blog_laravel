@extends('layouts.app')
@section('title', $post->title)
@section('content')

    <article class="blog-post mt-5">
        <img src="{{ url('storage/' . $post->image) }}" class="card-img-top object-fit-cover"
        width="100%" height="350" alt="photo">
        <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
        <p class="blog-post-meta"><small class="text-muted">Created By {{ $post->postwriter->name }} At
                {{ date('d M Y H:i', strtotime($post->created_at)) }}
            </small></p>
        <p> {!! $post->content !!}</p>

    </article>

    <p class="text-muted">{{ $total_comments }} Komentar</p>
    @foreach ($comments as $comment)

    <div class="card mb-3">
        <div class="card-header text-primary">
            &#64;{{ $comment->commentwriter->name }}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>{{ $comment->comment }}</p>
            <p class="blockquote-footer"><small>Commented At : {{ date('d M Y H:i', strtotime($comment->created_at)) }}</small></p>
          </blockquote>
        </div>
      </div>


    @endforeach


    @if (Auth::check())
    <form class="d-flex mb-4" action="{{ route('comment') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-color-danger" name="comment"
                placeholder="Recipient's username">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
        </div>

    </form>
    @endif



    <a href="{{ url('posts') }}" class="btn btn-success">Kembali</a>


@endsection
