<x-admin.layout.operator_dashboard>
    <x-slot name="title">Appointment List</x-slot>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <h3 class="note note-success"> All Appointments</h3>
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    @if($message = session('message'))
                        <div class="note note-success mb-4 animate_animated animate__bounceIn ">
                            {{ $message }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group rounded d-flex flex-md-row mt-2 mb-4">
                                <input type="search" id="myInput" onkeyup="myFunction() " name="search"
                                       class="form-control rounded"
                                       placeholder="Search appointment..."
                                       aria-label="Search"
                                       aria-describedby="search-addon"/>
                                <span class="input-group-text border-0" id="search-addon"><i
                                        class="fas fa-search"></i></span>
                            </div>
                            <div class="table-responsive rounded-5">
                                <table id="myTable" class="table table-striped table-bordered" id="dataTable">
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
                                                <a href="{{ route('edit.appointment',$appointment->id) }}"
                                                   type="button" class="ms-3" data-mdb-toggle="modal"
                                                   data-mdb-target="#modal-{{ $appointment->id }}">
                                                    <i class="fas fa-eye fs-4"></i>
                                                </a>
                                                 @if( $appointment->status == 'Done')
                                                    <a href="{{ route('upload.report' , $appointment->id) }}"
                                                       type="button">
                                                        <i class="fas fa-file-upload fs-4" style="color: #686b6a"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        <form method="POST">
                                            @csrf
                                            <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                                                 id="modal-{{ $appointment->id }}"
                                                 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                @csrf
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="text-center"><h5
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Appointment
                                                                    Details</h5></div>
                                                            <button type="button" class="btn-close"
                                                                    data-mdb-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row justify-content-center">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-outline mb-4">
                                                                            <input type="text" name="test" id="name"
                                                                                   value="{{ $appointment->test ?? ''}}"
                                                                                   class="form-control"
                                                                                   required/>
                                                                            <label for="name" class="form-label">Test
                                                                                Name</label>
                                                                            <div class="invalid-feedback"></div>
                                                                        </div>
                                                                        <div class="form-outline mb-4">
                                                                            <input type="text" name=""
                                                                                   value="{{ $appointment->user->name ?? '' }}"
                                                                                   class="form-control"
                                                                                   id="name" required/>
                                                                            <label for="name" class="form-label">Patient
                                                                                Name</label>
                                                                            <div class="invalid-feedback"></div>
                                                                        </div>
                                                                        <div class="form-outline mb-4">
                                                                            <input type="text" name="phone"
                                                                                   value="{{ $appointment->phone  ?? ''}}"
                                                                                   class="form-control"
                                                                                   id="name" required/>
                                                                            <label for="name" class="form-label">Phone
                                                                                Number</label>
                                                                            <div class="invalid-feedback"></div>
                                                                        </div>
                                                                        <div class="form-outline mb-4">
                                                                            <textarea type="text" name="address"
                                                                                      class="form-control"
                                                                                      id="name"
                                                                                      required>{{ $appointment->address ?? ''}}</textarea>
                                                                            <label for="name"
                                                                                   class="form-label">Address</label>
                                                                            <div class="invalid-feedback"></div>
                                                                        </div>
                                                                        <div class="form-outline mb-2">
                                                                                <textarea name="remark" type="text"
                                                                                          class="form-control"
                                                                                          id="name"
                                                                                          required>{{ $appointment->remark ?? '' }}</textarea>
                                                                            <label for="name"
                                                                                   class="form-label">Remarks</label>

                                                                        </div>
                                                                        <div class="mb-4">
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
                                                            <button
                                                                formaction="{{ route('update.appointment', $appointment->id ?? '')}}"
                                                                type="submit" class="btn btn-primary">Save
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
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</x-admin.layout.operator_dashboard>

