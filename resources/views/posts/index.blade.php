<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
    .body {
        padding: 6px;
        border-bottom: 2px solid red;
    }

    span {
        color: aqua;
    }
    </style>
</head>

<body>

    <div class="container my-4">
        <h1>
            Blog-Ku <a href="{{ url('posts/create') }}" class="btn btn-warning">+ Buat Post</a>
        </h1>

        @foreach($posts as $p)
        @php($p = explode(",", $p))

        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title">{{ $p[1] }}</h5>
                <p class="card-text">{{ $p[2] }}</p>
                <p class="card-text"><small class="text-muted">Created At {{ date("d M Y H:i", strtotime($p[3])) }}
                    </small> </p>
                <a href="{{ url("posts/$p[0]") }}" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>

        @endforeach

    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
</body>

</html>