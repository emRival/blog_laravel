@extends('layouts.app')

@section('title', 'welcome')
@section('content')

    <main class="container">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($post as $index => $p)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="1000">
                        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
                            <div class="col-md-6 px-0">
                                <h1 class="display-4 fst-italic">{{ $p->title }}</h1>
                                <a href="" class="lead mb-0"><a href="{{ url("posts/$p->slug") }}" class="text-white fw-bold">Continue reading...</a></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($post as $p)
           <x-news-card
           :newsTitle="$p->title"
           :newsContent="$p->content"
           :newsImage="$p->image"
           :newsDate="$p->created_at"
           :slug="$p->slug" />
        @endforeach

    </main>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 1000 // Transition every 3 seconds (adjust the timing as needed)
        });
    });
</script>
@endsection
