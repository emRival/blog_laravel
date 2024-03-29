@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')

    <h1 class="my-4">Buat Post Baru</h1>

    <form method="post" action="{{ url('posts') }}" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">
            @error('title')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea type='text' class="form-control" id="content" rows="3" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type='file' class="form-control"  rows="3"  name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>

    </form>

@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
