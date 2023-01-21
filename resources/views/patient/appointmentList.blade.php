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
                                <table id="myTable" class="table  table-striped table-bordered">
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
                                            <td>{{ $appointment->created_at->format('d.m.Y')}}</td>
                                            <td>
                                                @if ($appointment->status == 'Pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($appointment->status == 'Approve')
                                                    <span class="badge badge-primary">Approved</span>
                                                @elseif($appointment->status == 'Sample Collected')
                                                    <span class="badge badge-secondary">Sample Collected</span>
                                                @elseif($appointment->status == 'Delivered to Lab')
                                                    <span class="badge badge-success">Delivered to Lab</span>
                                                @elseif($appointment->status == 'Done')
                                                    <span class="badge badge-success">Done</span>
                                                @elseif($appointment->status == 'Canceled')
                                                    <span class="badge badge-danger">Canceled</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($appointment->status == 'Pending')
                                                    <a href="{{ route('view.appointment',$appointment->id) }}"
                                                       type="button" data-mdb-toggle="modal"
                                                       data-mdb-target="#exampleModal{{$appointment->id}}"
                                                       style="color: #3b71ca"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                    <a class="btn-delete"
                                                       href="{{ route('appointment.delete',$appointment->id)}}"
                                                       style="color: #dc4c64"><i
                                                            class="fas fa-minus-circle fs-4"></i></a>
                                                @elseif($appointment->status == 'Approve')
                                                    <a type="button" style="color: #3b71ca"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @elseif($appointment->status == 'Sample Collected')
                                                    <a type="button" style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @elseif($appointment->status == 'Delivered to Lab')
                                                    <a type="button" style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @elseif($appointment->status == 'Done')
                                                    <a href="{{ route('pdf.generate', $appointment->id) }}"
                                                       type="button"><i class="fas fa-file-download fs-4"></i></a>
                                                @else
                                                    <a href="{{ route('view.appointment',$appointment->id) }}"
                                                       type="button" data-mdb-toggle="modal"
                                                       data-mdb-target="#exampleModal{{$appointment->id}}"
                                                       style="color: #0040ff"><i
                                                            class="fas fa-eye fs-4"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <form id="form-delete" method="POST" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </table>
                            </div>

                        </div>
                        <!-- Modal -->
                        <form method="POST">
                            <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                                 id="exampleModal{{$appointment->id}}"
                                 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="text-center"><h5 class="modal-title" id="exampleModalLabel">
                                                    Details</h5></div>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row justify-content-center">

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" class="form-control"
                                                                   id="name" value="{{ $appointment->test }}" readonly/>
                                                            <label for="name" class="form-label">Test Name</label>
                                                        </div>
                                                        <div class="form-outline mb-2">
                                                                                <textarea name="remark" type="text"
                                                                                          class="form-control"
                                                                                          id="name"
                                                                                          required>{{ $appointment->remark ?? '' }}</textarea>
                                                            <label for="name"
                                                                   class="form-label">Remarks</label>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-mdb-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
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
