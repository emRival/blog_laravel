@extends('layouts.app')

@section('title', 'Login')
@section('content')

    <div class="row">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center fw-bold">
                    Reset Password
                </div>
                <div class="card-body">
                    <form method="POST" action="/forgot-password">
                        @csrf


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                aria-describedby="emailHelp">

                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>



                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Send Link</button>
                        </div>

                    </form>

                </div>
            </div>


        </div>
    </div>

@endsection
