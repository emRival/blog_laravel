@extends('layouts.app')

@section('title', 'Reset Password')
@section('content')

    <div class="row">
        <div class="col-md-4 mx-auto">
          <div class="card">
            <div class="card-body">
                <h2>Register</h2>
                <form action="/reset-password" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{$request->route('token')}}">
                    {{-- 1 --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id=""
                            value="{{ old('email', $request->email) }}">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- 2 --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id=""
                            value="{{ old('password') }}">
                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- 3 --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control">
                    </div>
                    {{-- 4 --}}
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>


        </div>
    </div>

@endsection
