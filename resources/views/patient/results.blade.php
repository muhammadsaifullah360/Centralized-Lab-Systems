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
                                                    <a href="#"
                                                       type="button" class="ms-3" data-mdb-toggle="modal"
                                                       data-mdb-target="#modal-b">
                                                        <i class="fas fa-eye fs-4"></i>
                                                    </a>
                                                @endif</td>
                                        </tr>
                                        <form method="POST">
                                            @csrf
                                            <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                                                 id="modal-b"
                                                 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                @csrf
                                                <div
                                                    class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
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
                                                            <div class="row justify-content-center">
                                                                <div class="row">
                                                                    <div class="col">

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
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin.layout.patient_dashboard>
