<!DOCTYPE html>
<html lang="{{AppLang()}}" class="light-style layout-navbar-fixed layout-menu-fixed" dir="{{AppDir()}}" data-theme="theme-default" data-assets-path="{{url('/backend')}}/" data-template="vertical-menu-template-starter">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>@yield('title', $Setting->name)</title>

        <meta name="description" content="" />

        {{-- Favicon --}}
        <link rel="icon" type="image/x-icon" href="{{ $Setting->icon }}" />

        {{-- Icons --}}
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/fonts/tabler-icons.css" />
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/fonts/fontawesome.css" />

        {{-- Core CSS --}}
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{url('/backend')}}/css/demo.css" />

        @yield('datatableCSS')

        {{-- Vendors CSS --}}
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/libs/node-waves/node-waves.css" />
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="{{url('/backend')}}/custom.css" />

        {{-- Helpers --}}
        <script src="{{url('/backend')}}/vendor/js/helpers.js"></script>
        <script src="{{url('/backend')}}/vendor/js/template-customizer.js"></script>
        <script src="{{url('/backend')}}/js/config.js"></script>
        <style>
            input[type=url],
            input[type=email] {
                direction: ltr !important;
            }
        </style>
        @yield('css')
    </head>
    <body>
        <div class="loading">
            @php $RandLoading = rand(0,3); @endphp
            @if($RandLoading == 0)
                <span class="loader"></span>
            @elseif($RandLoading == 3)
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            @else
                <div class="lds-hourglass"></div>
            @endif
        </div>

        {{-- Layout wrapper --}}
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                {{-- Menu --}}
                @include('layout.backend.aside')
                {{-- /Menu --}}

                <!-- Layout container -->
                <div class="layout-page">

                    @include('layout.backend.top-nav')

                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @include('layout.backend.alerts')
                            @yield('content')
                        </div>

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div class="footer-container text-center">
                                    <div>
                                        {{__('trans.global.copyright')}} &copy; {{date('Y')}} - <span class="text-primary">{{ $Setting->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>

                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
            {{-- Drag Target Area To SlideIn Menu On Small Screens --}}
            <div class="drag-target"></div>
        </div>
        {{-- / Layout wrapper --}}

        <script src="{{url('/backend')}}/vendor/libs/jquery/jquery.js"></script>
        <script src="{{url('/backend')}}/vendor/libs/popper/popper.js"></script>
        <script src="{{url('/backend')}}/vendor/js/bootstrap.js"></script>
        <script src="{{url('/backend')}}/vendor/libs/node-waves/node-waves.js"></script>
        <script src="{{url('/backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="{{url('/backend')}}/vendor/libs/hammer/hammer.js"></script>

        <script src="{{url('/backend')}}/vendor/js/menu.js"></script>
        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        @yield('datatablesJS')
        <script src="{{url('/backend')}}/js/main.js"></script>


        <link rel="stylesheet" href="{{url('/backend/vendor/libs/animate-css/animate.css')}}" />
        <link rel="stylesheet" href="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.css')}}" />
        <script src="{{url('/backend/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

        <script>
            $(document).on('click','.btn-create', function(event){
                return (confirm("{{__('trans.alert.create_data')}}") ? true : false);
            });
            $(document).on('click','.btn-update', function(){
                return (confirm("{{__('trans.alert.update_data')}}") ? true : false);
            });
            $(document).on('click','.btn-delete', function(){
                return (confirm("{{__('trans.alert.delete_data')}}") ? true : false);
            });

            $('.UploadFile').filemanager('file');

            // Set Active Link
            $("a[href$='"+window.location.href+"']").parent().addClass('active');

            // Set Active Menu In Dropdown
            $('.menu-sub a').each(function(i, obj) {
                if(window.location.href == obj.href) {
                    $(this).parent().parent().parent().addClass('active open')
                }
            });

            $(window).on('load', function() {
                $('.loading').remove();
            });
        </script>
        @yield('js')
    </body>
</html>
