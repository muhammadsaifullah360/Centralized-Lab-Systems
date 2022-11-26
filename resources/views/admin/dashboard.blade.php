<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Admin Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
    <!-- MDB -->
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
                <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple ">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Laboratories</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <div class="">
                    <h4> Admin Dashboard of ODLMS</h4>
                </div>
            </a>
            <!-- Search form -->
            <form class="d-none d-md-flex input-group w-auto my-auto">

            </form>

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- Notification dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                       role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Some news</a></li>
                        <li><a class="dropdown-item" href="#">Another news</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Something else</a>
                        </li>
                    </ul>
                </li>

                <!-- Avatar -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                       id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle"
                             height="22"
                             alt="" loading="lazy"/>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">My profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
        <!--Section: Minimal statistics cards-->
        <section>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-success">03</h3>
                                    <p class="mb-0">Total Labs</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-flask fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div class="align-self-center">
                                    <i class="far fa-comment-alt text-warning fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h3>156</h3>
                                    <p class="mb-0">New Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div class="align-self-center">
                                    <i class="fas fa-chart-line text-success fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h3>64.89 %</h3>
                                    <p class="mb-0">Bounce Rate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                        Add Lab
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false" id="exampleModal"
                         tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="text-center"><h5 class="modal-title" id="exampleModalLabel">Add Lab
                                            Details</h5></div>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <form class="bg-white p-2 needs-validation" novalidate>

                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Email input -->
                                                    <div class="form-outline mb-4">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                               value="Mark" required/>
                                                        <label for="validationCustom01" class="form-label">Lab
                                                            Name</label>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="form1Example1" class="form-control"/>
                                                        <label class="form-label" for="form1Example1">License Number
                                                        </label>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <input type="email" id="form1Example1" class="form-control"/>
                                                        <label class="form-label" for="form1Example1">Email
                                                            address</label>
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="form1Example1" class="form-control"/>
                                                        <label class="form-label" for="form1Example1">Manager
                                                            Name</label>
                                                    </div>
                                                    <!-- input -->
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="form1Example1" class="form-control"/>
                                                        <label class="form-label" for="form1Example1">Contact
                                                            Number</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <!-- input -->
                                                    <div class="input-group form-outline mb-4">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                        <input type="text" class="form-control"
                                                               id="validationCustomUsername"
                                                               aria-describedby="inputGroupPrepend" required/>
                                                        <label for="validationCustomUsername" class="form-label">Username</label>
                                                        <div class="invalid-feedback">Please choose a username.</div>
                                                    </div>
                                                    <!-- input -->
                                                    <div class="form-outline mb-4">
                                                        <input type="password" id="form1Example1" class="form-control"/>
                                                        <label class="form-label" for="form1Example1">Password</label>
                                                    </div>
                                                    <!-- input -->
                                                    <div class="form-outline mb-4">
                                                        <input type="Text" id="form1Example1" class="form-control"/>
                                                        <label class="form-label" for="form1Example1">Phone
                                                            Number</label>
                                                    </div>
                                                    <!-- input -->
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="form1Example1" class="form-control"/>
                                                        <label class="form-label" for="form1Example1">Address</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--        tabel start from here--}}
            <table class="table align-middle mb-4 bg-white">
                <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">John Doe</p>
                                <p class="text-muted mb-0">john.doe@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Software engineer</p>
                        <p class="text-muted mb-0">IT department</p>
                    </td>
                    <td>
                        <span class="badge badge-success rounded-pill d-inline">Active</span>
                    </td>
                    <td>Senior</td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded">
                            Edit
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                                class="rounded-circle"
                                alt=""
                                style="width: 45px; height: 45px"
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">Alex Ray</p>
                                <p class="text-muted mb-0">alex.ray@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Consultant</p>
                        <p class="text-muted mb-0">Finance</p>
                    </td>
                    <td>
                        <span class="badge badge-primary rounded-pill d-inline">Onboarding</span>
                    </td>
                    <td>Junior</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-link btn-rounded btn-sm fw-bold"
                            data-mdb-ripple-color="dark"
                        >
                            Edit
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                class="rounded-circle"
                                alt=""
                                style="width: 45px; height: 45px"
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">Kate Hunington</p>
                                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Designer</p>
                        <p class="text-muted mb-0">UI/UX</p>
                    </td>
                    <td>
                        <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                    </td>
                    <td>Senior</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-link btn-rounded btn-sm fw-bold"
                            data-mdb-ripple-color="dark"
                        >
                            Edit
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>

        </section>
        <!--Section: Minimal statistics cards-->

        <!--Section: Statistics with subtitles-->
        <section>

            <div class="row">
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">$76,456.00</h2>
                                    </div>
                                    <div>
                                        <h4>Total Sales</h4>
                                        <p class="mb-0">Monthly Sales Amount</p>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="far fa-heart text-danger fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">$36,000.00</h2>
                                    </div>
                                    <div>
                                        <h4>Total Cost</h4>
                                        <p class="mb-0">Monthly Cost</p>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-wallet text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section: Statistics with subtitles-->
    </div>
</main>
<!--Main layout-->
<!-- MDB -->
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>

</body>

</html>
