<x-admin.layout.operator_dashboard>

    <div class="container py-5 ">
        <div class="row justify-content-center align-items-center">
            <div class="col-8 ">
                <div class="card-body mt-5 p-4 p-md-5 shadow-3-strong text-center">
                    <h1 class="mb-4 text-success text-decoration-underline">Well Come To {{$lab->name}}</h1>
                    <div class="row justify-content-center">

                        <div class="col-3">
                            <h4 class="mb-6 text-danger">Address </h4>
                            <h4 class="mb-4  text-danger">License_Number</h4>
                            <h4 class="mb-4 text-danger">Phone</h4>

                        </div>
                        <div class="col-3">
                            <p class="mb-5  text-warning">{{$lab->address}}</p>
                            <p class="mb-4 text-warning">{{$lab->license_number}}</p>
                            <p class="mb-4 text-warning">{{$lab->contact}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout.operator_dashboard>

