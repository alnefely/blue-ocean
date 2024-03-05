<!DOCTYPE html>
<html lang="{{AppLang()}}" class="light-style customizer-hide" dir="{{AppDir()}}" data-theme="theme-default" data-assets-path="{{url('/backend')}}/" data-template="vertical-menu-template">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>{{__('trans.auth.forgot_password')}}</title>
        <meta name="description" content="{{ $Setting->description }}" />

        {{-- Favicon --}}
        <link rel="icon" type="image/x-icon" href="{{ $Setting->icon }}" />

        {{-- Icons --}}
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/fonts/tabler-icons.css" />

        {{-- Core CSS --}}
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{url('/backend')}}/css/demo.css" />

        {{-- Page --}}
        <link rel="stylesheet" href="{{url('/backend')}}/vendor/css/pages/page-auth.css" />

        <script src="{{url('/backend')}}/vendor/js/helpers.js"></script>
        <script src="{{url('/backend')}}/vendor/js/template-customizer.js"></script>
        <script src="{{url('/backend')}}/js/config.js"></script>

        {{-- Custom --}}
        <link rel="stylesheet" href="{{url('/backend')}}/custom.css" />
    </head>
    <body>
        <div class="container">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-1 pt-2 text-center">{{__('trans.auth.forgot_password')}}</h3>
                            <form id="formAuthentication" class="mb-3" action="{{url()->current()}}" method="POST">@csrf
                                @include('layout.backend.alerts')

                                <div class="mb-3 mt-3">
                                    <label for="email" class="form-label"><i class="fa-regular fa-fw fa-envelope"></i> {{__('trans.global.email')}}</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{__('trans.auth.enter_email')}}" autofocus />
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100">{{__('trans.auth.password_recovery')}}</button>
                                </div>

                                <div class="text-center">
                                    <a href="{{url('admin/login')}}">{{ __('trans.auth.back_login') }}</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{url('/backend')}}/vendor/libs/jquery/jquery.js"></script>
        <script src="{{url('/backend')}}/js/main.js"></script>

    </body>
</html>
