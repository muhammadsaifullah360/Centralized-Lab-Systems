@if ($errors->any())
    <style>
        .toast {
            position: fixed;
            z-index: 9999;
            bottom: 2%;
            right: 1%;
        }
    </style>
    <script>
        // Toast animation.
        $('.toast').each(function () {
            let elem = $(this);
            elem.css('margin-right', '-500px');
            elem.animate({"margin-right": '+=500', "opacity": '+=1'}, 400, 'linear');
        })
    </script>
    <div class="row justify-content-end">
        <div class="toast show toast-danger w-25" role="alert" aria-live="assertive"
             aria-atomic="true"
             data-mdb-color="danger" data-mdb-autohide="false">
            <div class="toast-header toast-danger">
                <i class="fas fa-exclamation-circle fa-lg me-2"></i>
                <div class="me-auto h5 mt-2 text-danger fw-bold">Please fix the following {{ $errors->count() }}
                    error{{ $errors->count() == 1 ? '' : 's' }}.
                </div>
                <button type="button" class="btn-close" data-mdb-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row mb-4">
                    <div class="col">
                        @foreach ($errors->all() as $error)
                            <div class="px-3 text-danger fs-6"><i
                                    class="fas fa-xmark fa-lg me-2"></i>{{ ''.$error }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

{{--<div class="toast toast-danger show" role="alert" aria-live="assertive"--}}
{{--     aria-atomic="true" data-mdb-autohide="false">--}}
{{--    <div class="toast-header toast-danger">--}}
{{--        <i class="fas fa-exclamation-circle fa-lg me-2"></i>--}}
{{--        <div class="h5 mt-2 text-danger fw-bold">Please fix the following 3 errors.--}}
{{--        </div>--}}
{{--        <button type="button" class="btn-close" data-mdb-dismiss="toast" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--    <div class="toast-body">--}}
{{--        <div class="row mb-4">--}}
{{--            <div class="col">--}}
{{--                <div class="px-3 text-danger fs-6"><i--}}
{{--                        class="fas fa-xmark fa-lg me-2"></i>this is dummy error--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

