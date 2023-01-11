<x-admin.layout.patient_dashboard>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row">
                <form>
                    @csrf
                    <div class="page" size="A4">
                        <div class="p-5">
                            <section class="top-content bb d-flex justify-content-between">
                                <div class="logo">
                                    <h2 style="color: #dc4c64">{{ $appointment->lab->name }}</h2>
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
                                    <div class="row extra-info pt-3">
                                        <div class="col-7">
                                            <p>Payment Method: <span>bKash</span></p>
                                            <p>Order Number: <span>#868</span></p>
                                        </div>
                                        <div class="col-5">
                                            <p>Date: <span>10-04.2021</span></p>
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
                    <div class="modal-footer">
                        <a href="{{ route('report') }}" type="button" class="btn btn-danger"
                        >Close
                        </a>
                        <a
                            href="{{ route('pdf.generate') }}" type="submit" class="btn btn-primary">Download
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </main>


</x-admin.layout.patient_dashboard>
