<x-admin.layout.patient_dashboard>
    <x-slot name="title">
        Appointment List
    </x-slot>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Appointment Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                                @if ($appointment->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($appointment->status == 'approve')
                                                    <span class="badge bg-success">Approved</span>
                                                @else
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a
                                                    class="btn btn-primary btn-sm">View</a>
                                            </td>
                                        </tr>
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
