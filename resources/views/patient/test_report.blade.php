<x-admin.layout.patient_dashboard>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <h3 class="note note-success"> Tests Results</h3>
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Test Name</th>
                                        <th>Phone Number</th>
                                        <th>Appointment Date</th>
                                        <th>Actions</th>
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
                                                @if($appointment->status == 'Done')
                                                    <a href="{{ route('pdf.generate', $appointment->id) }}"><i
                                                            class="fas fa-file-download fs-4"></i></a>
                                                    <a href="{{ route('edit.report',$appointment->id)}}"
                                                       type="button" class="ms-3"> <i class="fas fa-eye fs-4"></i></a>
                                                    <a type="button"
                                                       data-mdb-toggle="modal" data-mdb-target="#exampleModal"> <i
                                                            class="fas fa-star fs-4"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <form  action="{{ route('rating') }}" method="POST">
                                                                @csrf
                                                                <input name="appointment_id" value="{{ $appointment->id }}" hidden>
                                                                <input name="user_id" value="{{ $appointment->user->id }}" hidden>
                                                                <input name="lab_id" value="{{ $appointment->lab->id }}" hidden>
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Rate
                                                                            this test
                                                                            service {{ $appointment->test }}</h5>
                                                                        <button type="button" class="btn-close"
                                                                                data-mdb-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="rating-css">
                                                                            <div class="star-icon">
                                                                                <input type="radio" value="1"
                                                                                       name="stars_rated" checked
                                                                                       id="rating1">
                                                                                <label for="rating1"
                                                                                       class="fa fa-star"></label>
                                                                                <input type="radio" value="2"
                                                                                       name="stars_rated"
                                                                                       id="rating2">
                                                                                <label for="rating2"
                                                                                       class="fa fa-star"></label>
                                                                                <input type="radio" value="3"
                                                                                       name="stars_rated"
                                                                                       id="rating3">
                                                                                <label for="rating3"
                                                                                       class="fa fa-star"></label>
                                                                                <input type="radio" value="4"
                                                                                       name="stars_rated"
                                                                                       id="rating4">
                                                                                <label for="rating4"
                                                                                       class="fa fa-star"></label>
                                                                                <input type="radio" value="5"
                                                                                       name="stars_rated"
                                                                                       id="rating5">
                                                                                <label for="rating5"
                                                                                       class="fa fa-star"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-mdb-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            submit
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
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
    <style>
        .rating-css div {
            color: #ffe400;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }

        .rating-css input {
            display: none;
        }

        .rating-css input + label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

        .rating-css input:checked + label ~ label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
    </style>
</x-admin.layout.patient_dashboard>
