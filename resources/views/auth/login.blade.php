<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/background_image.css')}}">
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
                <div class="card-body py-5 px-md-5">
                    <div class="card-header h5 text-center fw-bold mb-4 fs-2 border-0">
                        <span style="color: hsl(218, 81%, 75%)">Login</span>
                    </div>
                    <form class="needs-validation" novalidate method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                            @enderror
                            <label class="form-label" for="email">Email address</label>
                            <p class="invalid-feedback">
                                Please enter the valid email!
                            </p>
                        </div>

                        <div class="form-outline mb-4">
                            <input name="password" type="password" id="password" class="form-control
                                       @error('password') is-invalid @enderror" required
                                   autocomplete="current-password"/>
                            @error('password')
                            <p class="invalid-feedback">
                                Please enter the password!
                            </p>
                            @enderror
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="form-check d-flex  mb-4">
                            <input type="checkbox" id="remember" name="remember" value="yes"
                                   class="form-check-input me-2"
                                   {{ old('remember') ? 'checked' : '' }} checked/>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-4">
                            Login
                        </button>
                        <a type="button" href="{{route('register')}}" class="btn btn-outline-danger btn-block mb-2">
                            Sign Up
                        </a>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{ asset('js/mdb.min.js') }}"></script>
</html>
