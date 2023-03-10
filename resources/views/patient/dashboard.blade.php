<x-admin.layout.patient_dashboard>
    <x-slot:title>Patient|Dashboard</x-slot:title>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row">

                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card" style="background-color: #c5d5ef">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">0{{ $TotalAppointments ?? '' }}</h2>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">Booked Appointment</h4>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa-regular fa-calendar-check fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card" style="background-color: #ff8fa2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">0{{ $pending }}</h2>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">Pending Appointment</h4>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa-solid fa-spinner fa-3x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card" style="background-color: #72d499">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">0{{$approved}}</h2>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">Approved Appointments</h4>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa-regular fa-thumbs-up fa-3x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card" style="background-color: #f2c874">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">0{{$done}}</h2>
                                    </div>
                                    <div>
                                        <h4 class="mb-0">Finished Test</h4>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa-solid fa-vial fa-3x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</x-admin.layout.patient_dashboard>
