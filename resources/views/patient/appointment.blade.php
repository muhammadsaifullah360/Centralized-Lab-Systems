<x-admin.layout.patient_dashboard>
    <x-slot:title>Book Appointment</x-slot:title>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <a href="{{ route('appointment.list') }}" class="btn btn-danger">Show all appointments</a>
            <div class="row">
                <form action="{{ route('appointment.store') }}" method="POST"
                      class="p-2 needs-validation" novalidate>
                    @csrf
                    <div class="card">
                        <div class="card-body py-5">
                            <div class="card-header">
                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <div class="justify-content-center mb-4"><h3 class="note note-success">Add
                                                Appoinment</h3></div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control" name="test"
                                                   value="{{ $test->name ?? '' }}"
                                                   id="name" readonly required/>
                                            <label class="form-label" for="name">Test Name</label>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form1Example1"
                                                   class="form-control" name="price"
                                                   value="{{ $test->price ?? ''}}" readonly/>
                                            <label class="form-label " for="form1Example1">Test Price</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="phone" type="text" id="numberField"
                                                   value="{{ $user->phone ?? '' }}"
                                                   class="form-control" required/>
                                            <input name="user_id" value="{{ $user->id ?? ''}}" hidden></input>
                                            <input name="lab_id" value="{{ $lab->id ?? ''}}" hidden></input>
                                            <label class="form-label" for="form1Example1">Contact Number</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                                <textarea class="form-control" id="textAreaExample"
                                                          rows="3" name="address">{{ $user->address ?? '' }}</textarea>
                                            <label class="form-label"
                                                   for="address">Address</label>
                                        </div>
                                        <div>
                                            <a href="{{route('home')}}" class="btn btn-secondary">
                                                Close
                                            </a>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
    </main>

</x-admin.layout.patient_dashboard>
