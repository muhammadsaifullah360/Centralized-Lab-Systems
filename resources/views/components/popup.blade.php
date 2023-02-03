<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.16/sweetalert2.all.js"></script>
    <script>
        function popup(icon, title) {
            Swal.fire({
                icon: icon,
                title: title,
                // showConfirmButton: false,
                confirmButtonText: 'Ok',
                confirmButtonColor: '#173D73',
                // timer: 2500,
            })
        }

        function popupWithText(icon, title, text) {
            Swal.fire({
                icon: icon,
                title: title,
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                confirmButtonColor: '#173D73',
                text: text,
            })
        }
    </script>
    @if(session('popup'))
        <script>
            popupWithText('info', '{{ session('popup')['title'] }}', '{{ session('popup')['text'] }}')
        </script>
        @php
            session()->pull('popup');
        @endphp
    @endif

    @if(session('success'))
        <script>
            let title = '{{ session('success') }}';
            popup('success', title);
        </script>
    @endif
    @if(session('info'))
        <script>
            let title = '{{ session('info') }}';
            popup('info', title);
        </script>
    @endif
    @if(session('warning'))
        <script>
            let title = '{{ session('warning') }}';
            popup('warning', title);
        </script>
    @endif
    @if(session('error'))
        <script>
            let title = '{{ session('error') }}';
            popup('error', title);
        </script>
    @endif
</div>
