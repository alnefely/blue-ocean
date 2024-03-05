<!DOCTYPE html>
<html lang="{{AppLang()}}" class="light-style customizer-hide" dir="{{AppDir()}}" data-theme="theme-default" data-assets-path="{{url('/backend')}}/" data-template="vertical-menu-template">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>{{__('trans.auth.login')}}</title>
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
                            <h3 class="mb-1 pt-2">{{__('trans.auth.login')}}</h3>
                            <p class="mb-4">{{__('trans.auth.please_login')}}</p>
                            <form id="formAuthentication" class="mb-3" action="{{url()->current()}}" method="POST">@csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label"><i class="fa-regular fa-fw fa-envelope"></i> {{__('trans.global.email')}}</label>
                                    <input type="email" class="form-control" id="email" value="admin@admin.com" name="email" placeholder="{{__('trans.global.email')}}" autofocus />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password"><i class="fa-solid fa-fw fa-lock"></i> {{__('trans.global.password')}}</label>
                                        <a href="{{url('/admin/forgot/password')}}">
                                            <small>{{__('trans.auth.forgot_password')}}</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" value="123456" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                                        <label class="form-check-label" for="remember-me">{{__('trans.auth.remember_me')}}</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100">{{__('trans.auth.login')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{url('/backend')}}/vendor/libs/jquery/jquery.js"></script>
        <script src="{{url('/backend')}}/js/main.js"></script>
        @include('layout.backend.alerts')
    </body>
</html>
