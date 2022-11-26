<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>{{ $title ?? 'ODLS' }}</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid mx-3">
        <a><img src="{{asset('images/img.png')}}" alt="Online Diagnostic lab management system" width="70px" height="60px"> </a>
        <div class="d-flex flex-row-reverse">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About Us</a>
                    </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container px-0 ">
    <div class="row g-0">
        <div class="col-8">
            <div class="content">
                <div class=""><h1>Book Appointments & <br><span> Get Reports</span> <br>On door step</h1>
                    <p class="par">Book, track, manage and reconcile all your online diagnostic tests in one place! <br>
                        Every
                        little feature
                        is built to automate
                    </p>
                </div>
            </div>
        </div>
        <div class="col align-self-center">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="text-center mb-3 textSettings">
                            <label for="name">Search Here</label>
                        </div>
                        <div class="form-group mb-4">
                            <label for="type"></label>
                            <select id="type" class="form-select" name="type[]" multiple>
                                <option value="CBC">CBC</option>
                                <option value="Blood Glucose">Blood Glucose</option>
                                <option value="KFT">KFT</option>
                                <option value="LFT">LFT</option>
                                <option value="MRI Scan">MRI Scan</option>
                                <option value="ECG">ECG</option>
                                <option value="EEG">EEG</option>
                                <option value="X-Rays">X-Rays</option>
                                <option value="Ultrasound">Ultrasound</option>
                                <option value="PET Scan">PET Scan</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" placeholder="Enter here If not found" class="form-control" id="name" name="name">
                        </div>
                        <div class="btn btn-secondary">Search</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="row g-0">

        <div class="col">
            <div class="row">
                <div class="col-9 border">
                    Sample
                </div>
                <div class="col border">
                    asample
                </div>
            </div>
        </div>

    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
</html>
