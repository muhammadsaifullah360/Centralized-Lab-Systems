<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
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
                        <span style="color: hsl(218, 81%, 75%)">Signup</span>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-outline mb-4">
                            <input name="name"
                                   value="{{ old('name') }}"
                                   type="text"
                                   id="name"
                                   class="form-control"
                                   required/>
                            <label class="form-label" for="name">Name</label>
                            <div class="invalid-feedback">
                                Please enter your name.
                            </div>
                        </div>

                        <div class="form-outline mb-4 ">
                            <input type="text" id="phone"
                                   class="form-control"
                                   name="phone"
                                   value="{{ old('phone') }}"
                                   required/>
                            <label class="form-label" for="phone">Phone</label>
                            <div class="invalid-feedback">
                                Please enter your phone number.
                            </div>
                        </div>

                        <div class="form-outline mb-4 ">
                            <input type="email" id="email"
                                   class="form-control"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"/>
                            <label class="form-label" for="email">Email address</label>
                            <div class="invalid-feedback">
                                Please enter your email address.
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control"
                                   name="password" required
                                   pattern="^.{8,}$"
                                   autocomplete="current-password"/>
                            <label class="form-label" for="password">Password</label>
                            <div class="invalid-feedback">
                                Password must be at least 8 characters long.
                            </div>
                        </div>
                        <div class="form-outline">
                            <input type="password" id="password_confirmation" class="form-control"
                                   name="password_confirmation"
                                   pattern="^.{8,}$"
                                   required
                                   autocomplete="current-password"/>
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="invalid-feedback">
                                Confirm Password must be at least 8 characters long.
                            </div>
                        </div>
                        @error('password')
                        <span class="text-danger small error-msg">{{ $message }}</span>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-block mt-5 mb-4">
                            Signup
                        </button>
                        <a type="button" href="{{route('home')}}" class="btn btn-outline-danger btn-block mb-2">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
</html>

