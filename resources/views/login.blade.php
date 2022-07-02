@extends('template')
@section('content')
<div class="row">
    <div class="col-md-4 offset-md-4 mt-5">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @endif
        <div class="card">
            <div class="card-header bg-dark text-light">
                Form Login
            </div>
            <div class="card-body p-2">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            autofocus placeholder="Email" value="{{old('email')}}" />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
