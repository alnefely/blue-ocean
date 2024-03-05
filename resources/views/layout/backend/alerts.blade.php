@if( $errors->all() )
    @foreach ($errors->all() as $message)
        <div class="alert alert-danger mb-1 p-1"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</div>
    @endforeach
@endif

@if( session('error') )
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    <script src="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

    <script>
        Swal.fire({
            icon: 'error',
            text: "{{ session('error') }}",
            showClass: {
                popup: 'animate__animated animate__tada'
            },
            confirmButtonText: "{{__('trans.global.ok')}}",
            customClass: {
                confirmButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
    </script>
@endif

@if( session('info') )
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    <script src="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

    <script>
        Swal.fire({
            icon: 'info',
            text: "{{ session('info') }}",
            showClass: {
                popup: 'animate__animated animate__tada'
            },
            confirmButtonText: "{{__('trans.global.ok')}}",
            customClass: {
                confirmButton: 'btn btn-info'
            },
            buttonsStyling: false
        });
    </script>
@endif

@if( session('success') )
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    <script src="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

    <script>
        Swal.fire({
            icon: 'success',
            text: "{{ session('success') }}",
            showClass: {
                popup: 'animate__animated animate__tada'
            },
            confirmButtonText: "{{__('trans.global.ok')}}",
            customClass: {
                confirmButton: 'btn btn-success'
            },
            buttonsStyling: false
        });
    </script>
@endif

@if( session('warning') )
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    <script src="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

    <script>
        Swal.fire({
            icon: 'warning',
            text: "{{ session('warning') }}",
            showClass: {
                popup: 'animate__animated animate__tada'
            },
            confirmButtonText: "{{__('trans.global.ok')}}",
            customClass: {
                confirmButton: 'btn btn-warning'
            },
            buttonsStyling: false
        });
    </script>
@endif

@if( session('question') )
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    <script src="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

    <script>
        Swal.fire({
            icon: 'question',
            text: "{{ session('question') }}",
            showClass: {
                popup: 'animate__animated animate__tada'
            },
            confirmButtonText: "{{__('trans.global.ok')}}",
            customClass: {
                confirmButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        });
    </script>
@endif
