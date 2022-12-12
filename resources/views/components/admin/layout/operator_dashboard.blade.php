<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>{{ $title ?? 'Lab Admin Dashboard' }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
            integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
            crossorigin="anonymous"></script>
</head>

<body>
<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">

                <a href="{{ route('operator.dashboard') }}" class="list-group-item list-group-item-action py-2 ripple"
                   aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                </a>

                <a href="{{ route('appointment') }}"
                   class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-users fa-fw me-3"></i><span>Appointment List</span></a>

                <a href="#" class="list-group-item list-group-item-action py-2 ripple ">
                    <i class="fa-solid fa-user-plus me-3"></i><span>Registered Users</span>
                </a>

                <a href="{{ route('tests.dashboard') }}" class="list-group-item list-group-item-action py-2 ripple ">
                    <i class="fas fa-list fa-fw me-3"></i><span>Test List</span>
                </a>

                <a href="{{ route('about.dashboard') }}" class="list-group-item list-group-item-action py-2 ripple ">
                    <i class="fas fa-book-reader fa-fw me-3"></i><span>Reports</span>
                </a>
            </div>
        </div>
    </nav>

    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">

        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <a class="navbar-brand" href="#">
                <div class="">
                    <h5 style="color: #146EBE"><i class="fa-solid fa-user"></i> Lab Admin</h5>
                </div>
            </a>
            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <ul class="navbar-nav navbar-nav ml-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-mdb-toggle="dropdown" aria-expanded="false">
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
                        <!-- Avatar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                               id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle"
                                     height="22"
                                     alt="" loading="lazy"/>
                            </a>
                        </li>
                    @endguest
                </ul>
            </ul>
        </div>

    </nav>
</header>

{{ $slot }}
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
