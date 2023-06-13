@extends('layouts.app')
@section('title', "Edit Postingan")
@section('content')
        <h1 class="my-4">Edit Postingan</h1>

        <form method="post" action="{{ url("posts/$selected_post->slug") }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" value="{{ $selected_post->title }}" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" id="content" rows="3" name="content" value="{{ $selected_post->content }}"
                    required>{{ $selected_post->content }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type='file' class="form-control" rows="3" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>

            <button type="button"class="btn btn-danger my-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</button>

        </form>

             {{-- * form hapus data --}}
             {{-- <form action="{{ url("posts/$post->id")}}" method="post">
                @method('DELETE')
                @csrf



            </form> --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Postingan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin Untuk Menghapus Postingan "<span class="text-danger fw-bold">{{ $selected_post->title }}</span>"
        </div>
        <div class="modal-footer">
            <form action="{{ url("posts/$selected_post->id")}}" method="post">
                @method('DELETE')
                @csrf
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </form>
        </div>
      </div>
    </div>
  </div>
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
