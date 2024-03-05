<!DOCTYPE html>
<html lang="{{AppLang()}}" dir="{{AppDir()}}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{__('trans.auth.password_recovery')}}</title>

        @if(AppDir()=='rtl')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.rtl.min.css" />
        @else
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
        @endif

        <style>
            body {
                background: #f5f5f5
            }
            .email-content {
                max-width: 1000px;
                margin: 20px auto;
                box-shadow: 1px 1px 8px #d9d9d9;
                background: #FFF;
                padding: 10px;
                border-radius: 8px;
            }
            .logo {
                width: 80px;
                height: 80px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="email-content">
                <div style="text-align: center; margin-bottom: 10px">
                    <a href="{{url('/')}}">
                        <img src="{{ url($Setting->logo) ?? 0 }}" class="logo" alt="{{ $Setting->name }}">
                    </a>
                </div>

                <div style="text-align: center; margin-bottom: 10px">
                    <h4>{{__('trans.auth.password_recovery')}}</h4>
                </div>

                <div style="text-align: center; margin-bottom: 10px">
                    <p class="text-center">You can use the new password</p>
                    <h5>{{__('trans.auth.new_password')}}: {{$data}}</h5>
                </div>
            </div>
        </div>
    </body>
</html>
