@extends('layout.backend.app')
@section('title', __('trans.setting.title'))


@section('content')
<div class="card mb-4">
    {{-- <h5 class="card-header">@yield('title')</h5> --}}
    <div class="card-body">
        <form action="{{ url()->current() }}" method="post">@csrf

            <div class="row">

                <div class="col-12">
                    <div class="divider divider-primary">
                        <div class="divider-text text-primary">{{__('trans.setting.general')}}</div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">{{__('trans.setting.name')}} <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" required name="name" value="{{old('name', $Setting->name)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">{{__('trans.setting.email')}} <b class="text-danger">*</b></label>
                    <input type="email" class="form-control" required name="email" value="{{old('email', $Setting->email)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Phone <b class="text-danger">*</b></label>
                    <input type="number" class="form-control" required name="phone" value="{{old('phone', $Setting->phone)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Address <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" required name="address" value="{{old('address', $Setting->address)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label>{{ __('trans.setting.timezone') }} <strong class="text-danger">*</strong></label>
                    <select name="timezone" class="select2 form-select" required>
                        @foreach ($timezone_identifiers as $item)
                            <option @if(date_default_timezone_get()==$item) selected @endif value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">{{__('trans.setting.description')}} <b class="text-danger">*</b></label>
                    <textarea name="description" class="form-control" rows="3">{{old('description', $Setting->description)}}</textarea>
                </div>



                {{--  --}}
                <div class="col-12">
                    <div class="divider divider-success">
                        <div class="divider-text text-success">{{__('trans.setting.logo')}} & {{__('trans.setting.icon')}}</div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label>{{__('trans.setting.logo')}} <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="thumbnail" data-preview="holder" class="UploadFile btn btn-primary text-white">
                                {{ __('trans.global.choose') }}
                            </a>
                        </span>
                        <input id="thumbnail" dir="ltr" required class="form-control" type="text" name="logo" value="{{ old('logo',$Setting->logo) }}" />
                     </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;">
                        @if(!empty(old('logo',$Setting->logo)))
                            <img src="{{ old('logo',$Setting->logo) }}" style="height: 5rem;">
                        @endif
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label>{{__('trans.setting.icon')}} <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="thumbnail2" data-preview="holder2" class="UploadFile btn btn-primary text-white">
                                {{ __('trans.global.choose') }}
                            </a>
                        </span>
                        <input id="thumbnail2" dir="ltr" required class="form-control" type="text" name="icon" value="{{ old('icon',$Setting->icon) }}" />
                     </div>
                    <div id="holder2" style="margin-top:15px;max-height:100px;">
                        @if(!empty(old('icon',$Setting->icon)))
                            <img src="{{ old('icon',$Setting->icon) }}" style="height: 5rem;">
                        @endif
                    </div>
                </div>

                <div class="col-12">
                    <div class="divider divider-danger">
                        <div class="divider-text text-danger">{{__('trans.setting.code_title')}}</div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">{{__('trans.setting.head_code')}}</label>
                    <textarea name="head_code" dir="ltr" class="form-control code" rows="5">{{old('head_code', $Setting->head_code)}}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">{{__('trans.setting.footer_code')}}</label>
                    <textarea name="footer_code" dir="ltr" class="form-control code" rows="5">{{old('footer_code', $Setting->footer_code)}}</textarea>
                </div>


                <div class="col-12">
                    <div class="divider divider-warning">
                        <div class="divider-text text-warning">{{__('trans.setting.social_media')}}</div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-facebook"></i> Facebook</label>
                    <input type="url" class="form-control" name="facebook" value="{{old('facebook', $Setting->facebook)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-instagram"></i> instagram</label>
                    <input type="url" class="form-control" name="instagram" value="{{old('instagram', $Setting->instagram)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-x-twitter"></i> twitter</label>
                    <input type="url" class="form-control" name="twitter" value="{{old('twitter', $Setting->twitter)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-linkedin"></i> linkedIn</label>
                    <input type="url" class="form-control" name="linkedIn" value="{{old('linkedIn', $Setting->linkedIn)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-snapchat"></i> snapchat</label>
                    <input type="url" class="form-control" name="snapchat" value="{{old('snapchat', $Setting->snapchat)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-pinterest"></i> pinterest</label>
                    <input type="url" class="form-control" name="pinterest" value="{{old('pinterest', $Setting->pinterest)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-tiktok"></i> tiktok</label>
                    <input type="url" class="form-control" name="tiktok" value="{{old('tiktok', $Setting->tiktok)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-threads"></i> threads</label>
                    <input type="url" class="form-control" name="threads" value="{{old('threads', $Setting->threads)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-youtube"></i> youtube</label>
                    <input type="url" class="form-control" name="youtube" value="{{old('youtube', $Setting->youtube)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-telegram"></i> telegram</label>
                    <input type="url" class="form-control" name="telegram" value="{{old('telegram', $Setting->telegram)}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label><i class="fa-brands fa-fw fa-whatsapp"></i> whatsapp</label>
                    <input type="url" class="form-control" name="whatsapp" value="{{old('whatsapp', $Setting->whatsapp)}}" />
                </div>

                <div class="col-12">
                    <div class="divider divider-info">
                        <div class="divider-text text-info">{{__('trans.setting.config_email')}}</div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail Protocol</label>
                    <select name="MAIL_MAILER" class="form-select">
                        <option @if(env('MAIL_MAILER')=='smtp') selected @endif value="smtp">SMTP</option>
                        <option @if(env('MAIL_MAILER')=='mail') selected @endif value="mail">Mail</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail Host</label>
                    <input type="text" dir="ltr" name="MAIL_HOST" class="form-control" value="{{env('MAIL_HOST')}}" />
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail Username</label>
                    <input type="text" dir="ltr" name="MAIL_USERNAME" class="form-control" value="{{env('MAIL_USERNAME')}}" />
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail Password</label>
                    <input type="text" dir="ltr" name="MAIL_PASSWORD" class="form-control" value="{{env('MAIL_PASSWORD')}}" />
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail Port</label>
                    <input type="number" dir="ltr" name="MAIL_PORT" class="form-control" value="{{env('MAIL_PORT')}}" />
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail Encryption</label>
                    <select name="MAIL_ENCRYPTION" class="form-select">
                        <option @if(env('MAIL_ENCRYPTION')=='null') selected @endif value="null">NULL</option>
                        <option @if(env('MAIL_ENCRYPTION')=='tls') selected @endif value="tls">TLS</option>
                        <option @if(env('MAIL_ENCRYPTION')=='ssl') selected @endif value="ssl">SSL</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail From Address</label>
                    <input type="email" dir="ltr" name="MAIL_FROM_ADDRESS" class="form-control" value="{{env('MAIL_FROM_ADDRESS')}}" />
                </div>

                <div class="col-md-3 mb-3">
                    <label>Mail From Name</label>
                    <input type="text" name="MAIL_FROM_NAME" class="form-control" value="{{env('MAIL_FROM_NAME')}}" />
                </div>


                <div class="col-md-12 mt-4">
                    <button class="btn btn-primary btn-update">{{__('trans.global.save')}}</button>
                </div>

            </div> {{-- End Row --}}
        </form>
    </div>
  </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/backend/vendor/libs/select2/select2.css" />
    <style>
        .tox-notifications-container,
        .tox-throbber__busy-spinner,
        .tox-promotion-link{
            display: none !important;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>
    <script src="{{ url('/backend/editor_config.js') }}"></script>

    <script src="/backend/vendor/libs/select2/select2.js"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
