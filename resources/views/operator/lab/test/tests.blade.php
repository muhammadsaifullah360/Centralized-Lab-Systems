<x-admin.layout.operator_dashboard>
    <x-slot:title>Lab Admin|Tests</x-slot:title>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row">
                <div class=" col-12 d-flex flex-md-row-reverse mb-4 ">
                    <button type="button" class="btn btn-success" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                        <i class="far fa-plus-square"></i> Add New Test
                    </button>
                    <!-- Modal -->
                    <form action="{{ route('add.test') }}" method="POST">
                        @csrf
                        <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                             id="exampleModal"
                             tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="text-center"><h5 class="modal-title" id="exampleModalLabel">Add
                                                Test</h5></div>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <form class="bg-white p-2 needs-validation" novalidate>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-outline mb-4">
                                                            <input type="text" class="form-control" name="name"
                                                                   id="name" required/>
                                                            <label for="name" class="form-label">
                                                                Name</label>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <input type="text" id="price"
                                                                   class="form-control" name="price"/>
                                                            <label class="form-label" for="form1Example1">Price
                                                            </label>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <select id="inputState" name="status"
                                                                    class="form-select mb-3">
                                                                <options></options>
                                                                <option>Active</option>
                                                                <option>Inactive</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-outline shadow-3-strong rounded-2">
                                                                <textarea name="description" class="form-control"
                                                                          id="textAreaExample"
                                                                          rows="3"></textarea>
                                                            <label class="form-label"
                                                                   for="textAreaExample">Description</label>
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


            <table class="table align-middle mb-4 bg-white shadow-3-strong">
                <thead class="table-dark">
                <tr>
                    <th width="5%">#</th>
                    <th width="15%">Date Created</th>
                    <th width="25%">Name</th>
                    <th width="15%">Price</th>
                    <th width="15%">Status</th>
                    <th class=" d-flex justify-content-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $index => $test)
                    <tr>

                        <td>{{ $index++ }}</td>
                        <td>
                            {{ $test->created_at }}
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $test->name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $test->price }}0</p>
                        </td>
                        <td>
                            @if($test->status == 'Active')
                                <span class="badge badge-success">{{ $test->status }}</span>
                            @else
                                <span class="badge badge-danger">{{ $test->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="btn-delete " style="margin-right: 20px" href="{{ route('delete.test',$test->id) }}">
                                    <div class="fa-2x" style="color: #e60000">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </div>
                                </a>
                                <a href="">
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

            <form id="form-delete" method="POST" style="display: none">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </main>

</x-admin.layout.operator_dashboard>
