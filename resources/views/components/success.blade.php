<div class="fade-out-3000">
    @if (session('success'))
        <div class="row justify-content-end">
            <div class="toast show toast-success w-25" role="alert" aria-live="assertive"
                 aria-atomic="true"
                 data-mdb-color="success" data-mdb-autohide="false" style="opacity: 0">
                <div class="toast-body">
                    <div class="d-flex flex-row-reverse mx-0">
                        <button type="button" class="btn-close" data-mdb-dismiss="toast"
                                aria-label="Close"></button>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="px-3 text-success fs-6"><i
                                    class="fas fa-circle-check fa-lg me-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

