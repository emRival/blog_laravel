@extends('layouts.app')

@section('title', 'welcome')
@section('content')


    <div class="album py-5">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                {{-- 1 --}}
                {{-- @foreach ($berita as $b) --}}
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="" class="card-img-top object-fit-cover" width="100%"
                                height="225" alt="photo">
                            <div class="card-body">
                                <h5 class="card-text mb-3"></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-body-secondary">{{ date('d M', strtotime($b->tanggal)) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>

@endsection
