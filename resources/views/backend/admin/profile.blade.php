@extends('layout.backend.app')
@section('title', __('trans.admin.profile'))

@section('content')

<div class="card mb-4">
    <h4 class="card-header">@yield('title')</h4>
    <div class="card-body">
        <form action="{{ url()->current() }}" method="post">@csrf

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">{{__('trans.admin.name')}} <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" required name="name" value="{{old('name',$admin->name)}}" placeholder="{{__('trans.admin.name')}}" />
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">{{__('trans.global.email')}} <b class="text-danger">*</b></label>
                    <input type="email" class="form-control" required name="email" value="{{old('email',$admin->email)}}" placeholder="{{__('trans.email')}}"  />
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-password-toggle">
                        <label class="form-label">{{__('trans.global.password')}}</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                            <span class="input-group-text cursor-pointer" id="basic-default-password">
                                <i class="ti ti-eye-off"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-12"></div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">{{__('trans.admin.info')}}</label>
                    <textarea name="info" class="form-control" placeholder="{{__('trans.admin.info')}}" rows="5">{{old('info',$admin->info)}}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label>{{__('trans.admin.img')}} <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="thumbnail" data-preview="holder" class="UploadFile btn btn-primary text-white">
                                {{ __('trans.global.choose') }}
                            </a>
                        </span>
                        <input id="thumbnail" dir="ltr" required class="form-control" type="text" name="img" value="{{ old('img',$admin->img) }}" />
                     </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;">
                        @if(!empty(old('img',$admin->img)))
                            <img src="{{ old('img',$admin->img) }}" style="height: 5rem;">
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-info btn-update">{{__('trans.global.update')}}</button>
                </div>
            </div> {{-- End Row --}}
        </form>
    </div>
  </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/backend/vendor/libs/select2/select2.css" />
@endsection

@section('js')
    <script src="/backend/vendor/libs/select2/select2.js"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
