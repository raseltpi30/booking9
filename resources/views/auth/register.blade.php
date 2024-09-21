@extends('layouts.admin')
@section('title')
    Register
@endsection
@section('admin_content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{asset('backend')}}/assets/images/logo.svg" alt="logo">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="fw-light">Signing up is easy. It only takes a few steps</h6>
                        <form action="{{ route('register') }}" method="POST" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('email') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" id="email" name="email" class="form-control @error ('name') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirm Password" class="form-control">
                            </div>
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN UP</button>
                            </div>
                            <div class="text-center mt-4 fw-light"> Already have an account? <a
                                    href="{{route('login')}}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection


{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Register</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>
</body>

</html> --}}