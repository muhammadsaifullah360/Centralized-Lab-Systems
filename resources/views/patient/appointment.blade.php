<x-admin.layout.patient_dashboard>
    <x-slot:title>Appointment</x-slot:title>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row">
                <form " method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body shadow-3-strong py-5">
                            <div class="card-header">
                                <div class="row justify-content-center">
                                    <form class="bg-white p-2 needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="justify-content-center mb-4"><h3 class="">Add
                                                        Appoinment</h3></div>
                                                <div class="form-outline mb-4">
                                                    <input type="text" class="form-control" name="name"
                                                           id="validationCustom01" required/>
{{--                                                    <label for="validationCustom01" value="{{$tests->name}}" class="form-label">Test--}}
                                                        Name</label>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="Text" id="form1Example1"
                                                           class="form-control" name="contact"/>
                                                    <label class="form-label" for="form1Example1">Contact
                                                        Number</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="Text" id="form1Example1"
                                                           class="form-control disabled " name="price"/>
                                                    <label class="form-label " for="form1Example1">price</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                                <textarea class="form-control" id="textAreaExample"
                                                                          rows="3" name="address"></textarea>
                                                    <label class="form-label"
                                                           for="textAreaExample">Address</label>
                                                </div>

                                                <div class="">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-mdb-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
    </main>

</x-admin.layout.patient_dashboard>
