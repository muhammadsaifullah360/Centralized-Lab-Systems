<x-admin.layout.operator_dashboard>
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
                                <table class="table table-striped table-bordered" id="dataTable">
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
                                                <a href="{{ route('edit.appointment', $appointment->id) }}"
                                                   type="button" class="ms-3" data-mdb-toggle="modal"
                                                   data-mdb-target="#modal-{{ $appointment->id }}">
                                                    <i class="fas fa-eye fs-4"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                                             id="modal-{{ $appointment->id }}"
                                             tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            @csrf
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="text-center"><h5 class="modal-title"
                                                                                     id="exampleModalLabel">
                                                                Appointment
                                                                Details</h5></div>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row justify-content-center">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-outline mb-4">
                                                                        <input type="text" name="name" id="name"
                                                                               value="{{ $appointment->test }}"
                                                                               class="form-control"
                                                                               required/>
                                                                        <label for="name" class="form-label">Test
                                                                            Name</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-4">
                                                                        <input type="text" name="name"
                                                                               value="{{ $appointment->user->name }}"
                                                                               class="form-control"
                                                                               id="name" required/>
                                                                        <label for="name" class="form-label">Patient
                                                                            Name</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-4">
                                                                        <input type="text" name="name"
                                                                               value="{{ $appointment->phone }}"
                                                                               class="form-control"
                                                                               id="name" required/>
                                                                        <label for="name" class="form-label">Phone
                                                                            Number</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-4">
                                            <textarea type="text" name="name" class="form-control"
                                                      id="name" required>{{ $appointment->address }}</textarea>
                                                                        <label for="name"
                                                                               class="form-label">Address</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-2">
                                            <textarea type="text" name="name" class="form-control"
                                                      id="name" required></textarea>
                                                                        <label for="name"
                                                                               class="form-label">Remarks</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-4">
                                                                        <label for="inputState"></label>
                                                                        <select id="inputState" name="status"
                                                                                class="form-select ">
                                                                            <option
                                                                                value="{{ $appointment->status}}"
                                                                                disabled
                                                                                selected>{{ $appointment->status}}</option>
                                                                            <option>Approve</option>
                                                                            <option>Sample Collected</option>
                                                                            <option>Delivered to Lab</option>
                                                                            <option>Done</option>
                                                                            <option>Canceled</option>

                                                                        </select>
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
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="#" method="post">

        </form>
    </main>
</x-admin.layout.operator_dashboard>

