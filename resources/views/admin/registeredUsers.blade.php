<x-admin.layout.dashboard>
    <x-slot name="title">
        {{ __('Registered Users') }}
    </x-slot>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <h3 class="note note-success"> Registered Users</h3>
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    @if($message = session('message'))
                        <div class="note note-success mb-4 animate_animated animate__bounceIn">
                            {{ $message }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group rounded d-flex flex-md-row mt-2 mb-4">
                                <input type="search" id="myInput" onkeyup="myFunction() " name="search"
                                       class="form-control rounded"
                                       placeholder="search..."
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
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Registered Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user ->name }}</td>
                                            <td>{{ $user ->email }}</td>
                                            <td>{{ $user-> phone }}</td>
                                            <td>{{ $user -> address }}</td>
                                            <td>{{ $user -> created_at }}</td>
                                        </tr>
                                    @endforeach
                                    <form method="POST">
                                        @csrf
                                        <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                                             id="modal"
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
                                                                               value=""
                                                                               class="form-control"
                                                                               required/>
                                                                        <label for="name" class="form-label">Test
                                                                            Name</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-4">
                                                                        <input type="text" name=""
                                                                               value=""
                                                                               class="form-control"
                                                                               id="name" required/>
                                                                        <label for="name" class="form-label">Patient
                                                                            Name</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-4">
                                                                        <input type="text" name="phone"
                                                                               value=""
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
                                                                                      required></textarea>
                                                                        <label for="name"
                                                                               class="form-label">Address</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-2">
                                                                                <textarea name="remark" type="text"
                                                                                          class="form-control"
                                                                                          id="name"
                                                                                          required></textarea>
                                                                        <label for="name"
                                                                               class="form-label">Remarks</label>
                                                                        <div class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="form-outline mb-4">
                                                                        <label for="inputState"></label>
                                                                        <select id="inputState" name="status"
                                                                                class="form-select ">
                                                                            <option
                                                                                value=""
                                                                                disabled
                                                                                selected></option>
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
                                                            formaction="#"
                                                            type="submit" class="btn btn-primary">Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

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
</x-admin.layout.dashboard>
