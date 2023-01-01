<x-admin.layout.dashboard>
    <x-slot:title>Admin | Laboratories</x-slot:title>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <section>
                <div class="row">
                    <div class=" col-12 d-flex flex-md-row-reverse mb-4 ">
                        <button type="button" class="btn btn-success" data-mdb-toggle="modal"
                                data-mdb-target="#exampleModal">
                            <i class="far fa-plus-square"></i> Add Lab
                        </button>
                        <!-- Modal -->
                        <form action="{{ route('admin.lab.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                                 id="exampleModal"
                                 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="text-center"><h5 class="modal-title" id="exampleModalLabel">Add
                                                    Lab Details</h5></div>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row justify-content-center">
                                                <form class="bg-white p-2 needs-validation" novalidate>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-outline mb-4">
                                                                <input type="text" class="form-control" name="name"
                                                                       id="validationCustom01" required/>
                                                                <label for="validationCustom01" class="form-label">Lab
                                                                    Name</label>
                                                                <div class="valid-feedback">Looks good!</div>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <input type="text" id="form1Example1"
                                                                       class="form-control" name="license_number"/>
                                                                <label class="form-label" for="form1Example1">License
                                                                    Number
                                                                </label>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <input type="Text" id="numberField"
                                                                       class="form-control" name="contact"/>
                                                                <label class="form-label" for="form1Example1">Contact
                                                                    Number</label>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <input type="file" name="profile_image"
                                                                       class="form-control"
                                                                       aria-label="file example" required/>
                                                                <div class="invalid-feedback">Example invalid form file
                                                                    feedback
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <select id="inputState" class="form-select mb-3"
                                                                    name="user_id">
                                                                @foreach($users as $user)
                                                                    <option
                                                                        value="{{ $user->id }}"> {{ $user->name }} </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-outline">
                                                                <textarea class="form-control" id="textAreaExample"
                                                                          rows="3" name="address"></textarea>
                                                                <label class="form-label"
                                                                       for="textAreaExample">Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
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
                @if($message = session('message'))
                    <div class="note note-success mb-4">
                        {{ $message }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table align-middle mb-4 bg-white shadow-3-strong">
                        <thead class="table-dark">
                        <tr>
                            <th>Lab Name</th>
                            <th>License Number</th>
                            <th>Contact</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($labs as $lab)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="{{asset('images/'.$lab->profile_image)}}"
                                            class="rounded-circle"
                                            alt=""
                                            style="width: 45px; height: 45px"
                                        />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{ $lab->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{ $lab->license_number }}</p>

                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{ $lab->contact}}</p>
                                </td>
                                <td>
                                    <p class="badge badge-primary rounded-pill d-inline">{{ $lab->user->name }}</p>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn-delete" href="{{ route('delete.lab',$lab->id) }}">
                                            <div class="fa-2x" style="color: #e60000">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </a>
                                        <a href="{{ route('edit.labs',$lab->id) }}">
                                            <div class="fa-2x" style="color: #0040ff">
                                                <i class="fa-solid fa-user-pen"></i>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <form id="form-delete" method="POST" style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </section>
        </div>
    </main>

</x-admin.layout.dashboard>
