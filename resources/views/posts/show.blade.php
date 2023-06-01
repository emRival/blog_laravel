@extends('layouts.app')
@section('title', $post->title)
@section('content')

    <article class="blog-post mt-5">
        <img src="{{ url('storage/' . $post->image) }}" class="card-img-top object-fit-cover" width="100%" height="350"
            alt="photo">
        <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
        <p class="blog-post-meta"><small class="text-muted">Created By {{ $post->postwriter->name }} At
                {{ date('d M Y H:i', strtotime($post->created_at)) }}
            </small></p>
        <p> {!! $post->content !!}</p>

    </article>

    <p class="text-muted">{{ $total_comments }} Komentar</p>

    @foreach ($comments->take(1) as $comment)
        <div class="card mb-3">
            <div class="card-header text-primary">
                &#64;{{ $comment->commentwriter->name }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{ $comment->comment }}</p>
                    <p class="blockquote-footer"><small>Commented At :
                            {{ date('d M Y H:i', strtotime($comment->created_at)) }}</small></p>
                </blockquote>
            </div>
        </div>
    @endforeach

    @if ($comments->count() > 1)

        <div class="position-relative">
            <a class="position-absolute top-50 start-50 translate-middle" id="showAllComments">Show All Comments</a>
        </div>

        <div id="hiddenComments" style="display: none;">
            @foreach ($comments->skip(1) as $comment)
                <div class="card mb-3">
                    <div class="card-header text-primary">
                        &#64;{{ $comment->commentwriter->name }}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $comment->comment }}</p>
                            <p class="blockquote-footer"><small>Commented At :
                                    {{ date('d M Y H:i', strtotime($comment->created_at)) }}</small></p>
                        </blockquote>
                    </div>
                </div>
            @endforeach
        </div>


        <script>
            document.getElementById("showAllComments").addEventListener("click", function() {
                document.getElementById("hiddenComments").style.display = "block";
                this.style.display = "none";
            });
        </script>
    @endif



    @if (Auth::check())
        <form class="d-flex my-5" action="{{ route('comment') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="comment" placeholder="Recipient's username">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
            </div>

        </form>
    @endif


    @if (Auth::user()->role == 'admin')
        <a href="{{ url('posts') }}" class="btn btn-success">Kembali</a>
        @if (Auth::user()->id == $post->user_id)
            <a href="{{ url("posts/$post->slug/edit") }}" class="btn btn-info">Edit</a>
        @endif
    @else
        <a href="{{ url('/') }}" class="btn btn-success">Kembali</a>
    @endif





@endsection
