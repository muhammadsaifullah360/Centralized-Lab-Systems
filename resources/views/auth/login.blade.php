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

<div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container vh-100">
        <div class="row justify-content-center gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                        <div class="card-header h5 text-center fw-bold mb-4 fs-2 border-0">
                            <span style="color: hsl(218, 81%, 75%)">Login</span>
                        </div>
                        <form class="needs-validation" novalidate method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-outline mb-4 justify-content-center d-flex">
                                <input type="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"/>
                                <label class="form-label" for="form3Example3">Email address</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control"
                                       @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <div class="form-check d-flex  mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33"
                                       {{ old('remember') ? 'checked' : '' }} checked/>
                                <label class="form-check-label" for="form2Example33">
                                    Remember me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Login
                            </button>
                            <a type="button" href="{{route('home')}}" class="btn btn-outline-danger btn-block mb-2">
                                Cancel
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
</div>
</body>
<script src="{{ asset('js/mdb.min.js') }}"></script>
</html>
