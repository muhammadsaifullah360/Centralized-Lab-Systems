<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>{{ $title ?? 'ODLS' }}</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid mx-3">
        <a><img src="{{asset('images/img.png')}}" alt="Online Diagnostic lab management system" width="72px"
                height="59px"> </a>
        <div class="d-flex flex-row-reverse">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-nav ml-auto">

                    @guest()
                        <li class="nav-item ">
                            <a class="nav-link hover-shadow" style="color: #ff7200"
                               href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light hover-shadow" href="{{ route('register') }}">Signup</a>
                        </li>
                    @endguest
                    @auth()
                        <div class="dropdown">
                            <a
                                class="btn btn-outline-warning dropdown-toggle rounded-pill hover-shadow fw-bold"
                                href="{{ route('patient.dashboard') }}"
                                role="button"
                                id="dropdownMenuLink"
                                data-mdb-toggle="dropdown"
                                aria-expanded="false"
                            >
                                {{ Auth::user()->name }}
                            </a>
                        </div>
                        <div class="dropdown" style="margin-left: 3px;">
                            <a class=" btn btn-outline-success rounded-pill " href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endauth
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
                        is built to automate the system
                    </p>
                </div>
            </div>
        </div>
        <div class="col align-self-center">
            <div class="card ">
                <div class="card-body">
                    <form method="GET">
                        <div class="text-center mb-3  fw-bold " style="font-family: Poppins, Sans-serif, serif;
                        font-size: 40px;
                        font-weight: 700;
                        color: #ff7200;
                        text-decoration:underline ;">
                            <label for="name">Search Here</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="search" class="form-control"
                                   id="search" required/>
                            <label for="search" class="form-label">Search here...</label>
                            <div class="invalid-feedback"></div>
                        </div>

                        {{--                        <div class="form-outline mb-4">--}}
                        {{--                            <label for="inputState"></label><select id="inputState" name="search"--}}
                        {{--                                                                    class="form-select mb-3" required>--}}
                        {{--                                @foreach($tests as $test)--}}
                        {{--                                    <option--}}
                        {{--                                        value="{{ $test->id }}"> {{ $test->name }} </option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}

                        <button type="submit" class="btn btn-secondary fw-bold shadow-3-strong rounded-pill">Search
                        </button>
                        <div class="form-outline mt-3">
                            <label class="form-label"><i class="fa  fa-exclamation-circle"></i>
                                <a>Help</a>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-10 animate__animated animate__fadeInDown " id="sign-in">
    <div class="row g-0">
        <div class="col">
            <div class="row">
                <div class="col">
                    <table class="table align-middle mb-0 bg-white" >
                        <thead class="bg-light">
                        <tr class="table-dark">
                            <th>Lab</th>
                            <th>Test Name</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($results))
                            @foreach($results as $result)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="{{asset('images/'.$result->lab->profile_image)}}"
                                                alt=""
                                                style="width: 45px; height: 45px"
                                                class="rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $result->lab->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $result->name }}</p>
                                    </td>

                                    <td>{{ $result->price }} rs</td>
                                    <td>
                                        <a href="{{ route('appointment.dashboard', $result->id) }}" type="button"
                                           class="btn btn-link btn-sm btn-rounded">
                                            BOOK
                                        </a>
                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Company name
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#" class="text-reset">Angular</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">React</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Vue</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Mian Channu , Punjab, PK</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        miansaif360@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> +92 3041302417</p>
                    <p><i class="fas fa-print me-3"></i> +92 3155458916</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="#">System Bot</a>
    </div>
</footer>
<!-- Footer -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script>
    function showDiv() {
        document.getElementById('sign-in').style.display = "block";
        document.getElementById('sign-in').reset();
    }
</script>
</html>
