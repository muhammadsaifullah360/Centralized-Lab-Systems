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
                                <table class="table  table-striped table-bordered" id="dataTable" width="100%"
                                       cellspacing="0">
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
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($appointment->status == 'Approve')
                                                    <span class="badge badge-primary">Approved</span>
                                                @elseif($appointment->status == 'Sample Collected')
                                                    <span class="badge badge-secondary">Sample Collected</span>
                                                @elseif($appointment->status == 'Delivered to Lab')
                                                    <span class="badge badge-success">Delivered to Lab</span>
                                                @elseif($appointment->status == 'Done')
                                                    <span class="badge badge-success">Done</span>
                                                @else
                                                    <span class="badge badge-danger">Canceled</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($appointment->status == 'pending')
                                                    <a type="button" style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                    <a type="button" style="color: #e60000"><i
                                                            class="fas fa-minus-circle fs-4"></i></a>
                                                @elseif($appointment->status == 'approve')
                                                    <a type="button" style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @elseif($appointment->status == 'Sample Collected')
                                                    <a type="button" style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @elseif($appointment->status == 'Delivered to Lab')
                                                    <a type="button" style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @elseif($appointment->status == 'Done')
                                                    <a type="button"><i class="fas fa-file-download fs-4"></i></a>
                                                @else
                                                    <a type="button" style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @endif
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
