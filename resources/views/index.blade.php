@extends('layouts.app')

@section('title', 'welcome')
@section('content')


    {{-- <div class="album py-5">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                @foreach ($post as $p)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="" class="card-img-top object-fit-cover" width="100%" height="225"
                                alt="photo">
                            <div class="card-body">
                                <h5 class="card-text mb-3">{{ $p->title }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-body-secondary"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <main class="container">
        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently
                    about what’s most interesting in this post’s contents.</p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>

        @foreach ($post as $p)
            <div class="row mb-2">
                <div class="col-md-12">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">World</strong>
                            <h3 class="mb-0">{{ $p->title }}</h3>
                            <div class="mb-1 text-body-secondary">{{ date('d M Y H:i', strtotime($p->created_at)) }}</div>
                            <p class="card-text mb-auto">{!! Str::limit($p->content, 10, '(...)') !!}</p>
                            <a href="{{ url("posts/$p->slug") }}" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <div class="card shadow-sm">
                                <img src="{{ url('storage/' . $p->image) }}" class="card-img-top object-fit-cover"
                                    width="100%" height="250" alt="photo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </main>

@endsection
