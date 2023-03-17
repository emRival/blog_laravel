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

            <a href="{{ url('posts/trash') }}" class="btn btn-danger">Riwayat Hapus</a>
            
        </h1>
        <p class="text-muted">Total Postingan Aktif : <span class="badge bg-success">
            {{ $total_active }}</span>  / Total postingan non Aktif : 
            <span class="badge bg-warning">
                {{ $total_nonActive }}</span>  / Total postingan dihapus : <span class="badge bg-danger">{{ $total_dihapus }}</span> </p>

        @foreach($posts as $p)

        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title">{{ $p->title }}</h5>
                <p class="card-text">{{ $p->content }}</p>
                <p class="card-text"><small class="text-muted">Created At
                        {{ date("d M Y H:i", strtotime($p->created_at)) }}
                    </small> </p>
                <a href="{{ url("posts/$p->id") }}" class="btn btn-primary">Selengkapnya</a>
                <a href="{{ url("posts/$p->id/edit") }}" class="btn btn-warning">Edit</a>
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