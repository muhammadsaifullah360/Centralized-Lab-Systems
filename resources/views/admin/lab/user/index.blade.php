<x-admin.layout.dashboard>
    <x-slot:title>Admin | Users</x-slot:title>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row">
                <div class="col d-flex mb-4">
                    <div class="input-group rounded d-flex flex-md-row mt-3">
                        <input type="search" id="myInput" onkeyup="myFunction() "name="search" id="search" class="form-control rounded"
                               placeholder="Search User"
                               aria-label="Search"
                               aria-describedby="search-addon"/>
                        <span class="input-group-text border-0" id="search-addon"><i
                                class="fas fa-search"></i></span>
                    </div>
                    <button type="button" class="btn btn-success" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                        <i class="fa-solid fa-user-plus fa-2x"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if($message = session('message'))
                        <div class="note note-success mb-4">
                            {{ $message }}
                        </div>
                    @endif
                    <table id="myTable" class="table align-middle mb-4 bg-white table-striped table-active shadow-3-strong ">
                        <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count())
                            @foreach($users as $index => $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="https://mdbootstrap.com/img/new/standard/nature/184.jpg"
                                                alt=""
                                                style="width: 45px; height: 45px"
                                                class="rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $user-> name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user -> email }}</p>
                                    </td>
                                    <td>
                            <span
                                class="badge badge-danger rounded-pill d-inline">{{ str($user -> role)->ucfirst() }}</span>
                                    </td>
                                    <td>{{ $user -> phone }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a class="btn-delete" href="{{ route('delete.users',$user->id) }}">
                                                <div class="fa-2x" style="color: #e60000">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </div>
                                            </a>
                                            <a href="{{ route('edit.users',$user->id) }}">
                                                <div class="fa-2x" style="color: #0040ff">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <form id="form-delete" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </table>
                    {!! $users->withQueryString()->links() !!}
                </div>
            </div>
        </div>
        <!-- Modal -->
        <form action="{{ route('user.store') }}" method="post">
            <div class="modal fade" data-mdb-backdrop="static" data-mdb-keyboard="false"
                 id="exampleModal"
                 tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                @csrf
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="text-center"><h5 class="modal-title" id="exampleModalLabel">Add
                                    User
                                    Details</h5></div>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-outline mb-4">
                                            <input type="text" name="name" class="form-control"
                                                   id="name" required/>
                                            <label for="name" class="form-label">Name</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email"
                                                   class="form-control"/>
                                            <label class="form-label" for="email">Email
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" name="password" id="password"
                                                   class="form-control"/>
                                            <label class="form-label"
                                                   for="password">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="Text" id="phone" name="phone"
                                                   class="form-control"/>
                                            <label class="form-label" for="phone">Phone
                                                Number</label>
                                        </div>
                                    </div>
                                </div>

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
    </main>
</x-admin.layout.dashboard>
