<style>
    :root {
        --body-bg: rgb(204, 204, 204);
        --white: #ffffff;
        --darkWhite: #ccc;
        --black: #000000;
        --dark: #615c60;
        --themeColor: #3b71ca;
        --pageShadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    body {
        background-color: var(--body-bg);
    }

    .page {
        background: var(--white);
        display: block;
        margin: 0 auto;
        position: relative;
        box-shadow: var(--pageShadow);
    }

    .page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
        overflow: hidden;
    }

    .bb {
        border-bottom: 3px solid var(--darkWhite);
    }

    /* Top Section */
    .top-content {
        padding-bottom: 15px;
    }

    .logo img {
        height: 60px;
    }

    .top-left p {
        margin: 0;
    }

    .top-left .graphic-path {
        height: 40px;
        position: relative;
    }

    .top-left .graphic-path::before {
        content: "";
        height: 20px;
        background-color: var(--darkWhite);
        position: absolute;
        left: 15px;
        right: 0;
        top: -15px;
        z-index: 2;
    }

    .top-left .graphic-path::after {
        content: "";
        height: 22px;
        width: 17px;
        background: var(--black);
        position: absolute;
        top: -13px;
        left: 6px;
        transform: rotate(45deg);
    }

    .top-left .graphic-path p {
        color: var(--white);
        height: 40px;
        left: 0;
        right: -100px;
        text-transform: uppercase;
        background-color: var(--themeColor);
        font-size: 26px;
        z-index: 3;
        position: absolute;
        padding-left: 10px;
    }

    /* User Store Section */
    .store-user {
        padding-bottom: 25px;
    }

    .store-user p {
        margin: 0;
        font-weight: 600;
    }

    .store-user .address {
        font-weight: 400;
    }

    .store-user h2 {
        color: var(--themeColor);
        font-family: 'Rajdhani', sans-serif;
    }

    .extra-info p span {
        font-weight: 400;
    }

    /* Product Section */
    thead {
        color: var(--white);
        background: var(--themeColor);
    }

    .table td,
    .table th {
        text-align: center;
        vertical-align: middle;
    }

    tr th:first-child,
    tr td:first-child {
        text-align: left;
    }

    .media img {
        height: 60px;
        width: 60px;
    }

    .media p {
        font-weight: 400;
        margin: 0;
    }

    .media p.title {
        font-weight: 600;
    }

    /* Balance Info Section */
    .balance-info .table td,
    .balance-info .table th {
        padding: 0;
        border: 0;
    }

    .balance-info tr td:first-child {
        font-weight: 600;
    }

    tfoot {
        border-top: 2px solid var(--darkWhite);
    }

    tfoot td {
        font-weight: 600;
    }

    /* Cart BG */
    .cart-bg {
        height: 250px;
        bottom: 32px;
        left: -40px;
        opacity: 0.3;
        position: absolute;
    }

    /* Footer Section */
    footer {
        text-align: center;
        position: absolute;
        bottom: 30px;
        left: 75px;
    }

    footer hr {
        margin-bottom: -22px;
        border-top: 3px solid var(--darkWhite);
    }

    footer a {
        color: var(--themeColor);
    }

    footer p {
        padding: 6px;
        border: 3px solid var(--darkWhite);
        background-color: var(--white);
        display: inline-block;
    }
</style>
<div class="page mb-4" size="A4">
    <div class="p-5">
        <section class="top-content bb d-flex justify-content-between">
            <div class="logo d-flex justify-content-center">
                <img
                    src="{{asset('images/'.$appointment->lab->profile_image)}}"
                    class="rounded-circle"
                    alt=""
                    style="width: 45px; height: 45px"
                />
                <h2 class="fs-bold" style="color: #e92428">{{ $appointment->lab->name }}</h2>
            </div>
            <div class="top-left">
                <div class="graphic-path">
                    <p>Report</p>
                </div>
                <div class="position-relative">
                    <p>Report No. <span>7368347</span></p>
                </div>
            </div>
        </section>
        <section class="store-user mt-3">
            <div class="col-10">
                <div class="row bb pb-3">
                    <div class="col-7">
                        <p style="text-decoration: underline">Patient,</p>
                        <h2>{{ $appointment->user->name }}</h2>
                        <p class="address"> {{ $appointment->address }}<br>
                            Abington MA 2351,
                        <div class="txn mt-2">Contact: {{ $appointment->phone}}</div>
                    </div>

                </div>
                <div class="row extra-info pt-3 ">
                    <div class="col-7">
                        <p>Payment Method: <span>COD</span></p>
                    </div>
                    <div class="col-5">
                        <p>Date: <span>{{ date('d-m-Y') }}</span></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-area mt-4">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>Test Name</td>
                    <td>Resulted Value</td>
                    <td>Normal value</td>
                    <td>Price</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="media">
                            <div class="media-body">
                                <p class="mt-0 title">{{ $appointment->test }}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{ $appointment->report->resulted_value }}</td>
                    <td>{{ $appointment->report->normal_value }}</td>
                    <td>200$</td>
                </tr>
                </tbody>
            </table>
        </section>
        <footer>
            <hr>
            <div class="d-flex justify-content-center">
                <p class="m-0 text-center">
                    This report is not valid for court.
                </p>
            </div>
            <div class="social pt-3">
                                                            <span class="pr-2">
                                                                <i class="fas fa-mobile-alt"></i>
                                                                <span>0123456789 </span>
                                                            </span>
                <span class="pr-2">
                                                                <i class="fas fa-envelope"></i>
                                                                <span>{{ $appointment->lab->user->email }}</span>
                                                            </span>
                <span class="pr-2">
                                                                <i class="fab fa-facebook-f"></i>
                                                                <span>/sabur.7264</span>
                                                            </span>

            </div>
        </footer>
    </div>
</div>
