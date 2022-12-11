<x-admin.layout.patient_dashboard>
    <x-slot:title>Appointment</x-slot:title>

    <main style="margin-top: 58px">
        <div class="container pt-4">

            <div class="row">

                <div class="col">
                    <div class="form-outline mb-4">
                        <input type="search" class="form-control" id="datatable-search-input">
                        <label class="form-label" for="datatable-search-input">Search here...</label>
                    </div>
                    @if($message = session('message'))
                        <div class="note note-success mb-4">
                            {{ $message }}
                        </div>
                    @endif
                    <table id="myTable"
                           class="table align-middle mb-4 bg-white table-striped table-active shadow-3-strong ">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Date Created</th>
                            <th>Tests</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1"></p>
                            </td>
                            <td>

                            </td>
                            <td>
                                <span class="badge badge-danger rounded-pill d-inline"></span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn-delete" href="" style="margin-left: 5px">
                                        <i class="fa-solid fa-trash-can text-danger fa-2x"></i>

                                    </a>
                                    <a href="">
                                        <i class="fa-solid fa-user-pen text-primary fa-2x"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa-solid fa-xmark fa-2x text-warning"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form id="form-delete" method="POST" style="display: none">
                @csrf
                @method('DELETE')
            </form>
            </section>
        </div>
    </main>

</x-admin.layout.patient_dashboard>
