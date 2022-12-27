<x-admin.layout.patient_dashboard>
    <title>change Password</title>
    <div class="container" style="margin-top: 10%; margin-left: 15%">
        <div class="row justify-content-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                        <div class="card-header h5 text-center fw-bold mb-4 fs-2 border-0">
                            <span style="color: hsl(218, 81%, 75%)">Change Password</span>
                        </div>
                        <form class="needs-validation" novalidate method="POST">
                            @csrf

                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="password" class="form-control
                                       @error('password') is-invalid @enderror" required
                                       autocomplete="current-password"/>
                                @error('password')
                                <p class="invalid-feedback">
                                    Please enter the password!
                                </p>
                                @enderror
                                <label class="form-label" for="form3Example4">Current Password<label style="color: red">*</label></label>
                            </div>
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="password" class="form-control
                                       @error('password') is-invalid @enderror" required
                                       autocomplete="current-password"/>
                                @error('password')
                                <p class="invalid-feedback">
                                    Please enter the password!
                                </p>
                                @enderror
                                <label class="form-label" for="form3Example4">New Password<label style="color: red">*</label></label>
                            </div>
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="password" class="form-control
                                       @error('password') is-invalid @enderror" required
                                       autocomplete="current-password"/>
                                @error('password')
                                <p class="invalid-feedback">
                                    Please enter the password!
                                </p>
                                @enderror
                                <label class="form-label" for="form3Example4">Confirm Password<label style="color: red">*</label></label>
                            </div>


                            <button type="button" class="btn btn-primary btn-block mb-4">
                                Change Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout.patient_dashboard>

