<x-admin.layout.patient_dashboard>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <h3 class="note note-success"> Tests Results</h3>
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Test Name</th>
                                        <th>Phone Number</th>
                                        <th>Appointment Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($appointments as $key => $appointment)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $appointment->test }}</td>
                                            <td>{{ $appointment->phone }}</td>
                                            <td>{{ $appointment->created_at}}</td>
                                            <td>
                                                @if($appointment->status == 'Done')
                                                    <a type="button"><i class="fas fa-file-download fs-4"></i></a>
                                                    <a href="{{ route('edit.report') }}"
                                                       type="button" class="ms-3" data-mdb-toggle="modal"
                                                       data-mdb-target="#modal-b-{{$appointment->id}}">
                                                        <i class="fas fa-eye fs-4"></i>
                                                    </a>
                                                @endif</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form method="POST">
                            @csrf
                            <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                                 id="modal-b-{{ $appointment->id}}"
                                 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                @csrf
                                <div
                                    class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="text-center"><h5
                                                    class="modal-title"
                                                    id="exampleModalLabel">
                                                    Report</h5></div>
                                            <button type="button" class="btn-close"
                                                    data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="my-5 page" size="A4">
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
                                                    <section class="store-user mt-5">
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
                                                                            <p class="mt-0 title" >{{ $appointment->test }}</p>
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
                                                    <div class="d-flex justify-content-center">
                                                        <footer>
                                                            <hr>
                                                            <p class="m-0 text-center">
                                                                View THis Invoice Online At - <a href="#">
                                                                    invoice/saburbd.com/#868 </a>
                                                            </p>
                                                            <div class="social pt-3">
                                                            <span class="pr-2">
                                                                <i class="fas fa-mobile-alt"></i>
                                                                <span>0123456789 </span>
                                                            </span>
                                                                <span class="pr-2">
                                                                <i class="fas fa-envelope"></i>
                                                                <span>me@saburali.com</span>
                                                            </span>
                                                                <span class="pr-2">
                                                                <i class="fab fa-facebook-f"></i>
                                                                <span>/sabur.7264</span>
                                                            </span>

                                                            </div>
                                                        </footer>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                    data-mdb-dismiss="modal">Close
                                            </button>
                                            <button
                                                type="submit" class="btn btn-primary">Download
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin.layout.patient_dashboard>
