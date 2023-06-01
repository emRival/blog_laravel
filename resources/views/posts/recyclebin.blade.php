@extends('layouts.app')
@section('title', "Histori Hapus")
@section('content')
        <h1>
            Histori Hapus <a href="{{ url('posts') }}" class="btn btn-success">Kembali</a>
        </h1>

        @foreach($posts as $p)

        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title">{{ $p->title }}</h5>
                <p class="card-text">{!! $p->content !!}</p>
                <p class="card-text"><small class="text-muted">Created At
                        {{ date("d M Y H:i", strtotime($p->created_at)) }}
                    </small> </p>

            {{-- * form hapus data --}}
             <form action="{{ url("posts/$p->id/permanent")}}" method="post">
                @method('DELETE')
                @csrf

                <button type="submit"class="btn btn-primary my-4">Hapus Permanen</button>

            </form>

            <form action="{{ url("posts/$p->id/restore")}}" method="post">
                @method('DELETE')
                @csrf

                <button type="submit"class="btn btn-warning my-4">restore</button>

            </form>
            </div>
        </div>

        @endforeach

   @endsection
