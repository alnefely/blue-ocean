@extends('layout.backend.app')
@section('title', __('trans.role.title'))

@php
    $myRole = auth('admin')->user()->role;
@endphp

@section('content')
    <h4 class="fw-semibold mb-4">@yield('title')</h4>

    <!-- Role cards -->
    <div class="row g-4">

        @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-normal mb-2">{{ __('trans.role.total_use',['count'=>$role->admins_count]) }}</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                @foreach ($role->admins as $admin)
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $admin->name }}" class="avatar avatar-sm pull-up" >
                                        <img class="rounded-circle" src="{{ $admin->img }}" alt="{{ $admin->name }}" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-1">

                            <div class="role-heading">
                                <h4 class="mb-1">{{ $role->name }}</h4>
                                @if($role->main != 'main')
                                    @if (auth('admin')->user()->role->role_edit == 'on')
                                        <a href="javascript:;" data-id="{{$role->id}}" data-bs-toggle="modal" data-bs-target="#addRoleModal"class="role-edit-modal role-edit"><span>{{__('trans.role.edit_role')}}</span></a>
                                    @else
                                        <span>{{__('trans.role.not_edit')}}</span>
                                    @endif
                                @else
                                    <div class="text-success">
                                        <i class="ti ti-circle-check"></i>
                                        {{__('trans.role.full_access')}}
                                    </div>
                                @endif
                            </div>

                            @if($role->main != 'main')
                                @if ($myRole->role_delete == 'on')
                                    <form action="{{url('/admin/roles/'.$role->id)}}" method="post">
                                        @csrf {{ method_field('DELETE') }}
                                        <button class="btn btn-icon btn-delete btn-sm btn-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        @if (auth('admin')->user()->role->role_create == 'on')
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100">
                    <div class="row h-100">
                        <div class="col-sm-4">
                            <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                                <img src="/backend/img/illustrations/add-new-roles.png" class="img-fluid mt-sm-4 mt-md-0" alt="add" width="83"/>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body text-center ps-sm-0">
                                <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mt-4 mb-2 text-nowrap add-new-role">
                                    {{ __('trans.role.add_new') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @include('backend.roles.model')
    </div>
@endsection

@section('css') @endsection

@section('js')
<script>
    $('.add-new-role').on('click', function() {
        $('input[type=checkbox]').prop('checked', false);
        $('#addRoleForm').attr('action', "{{ url('/admin/roles') }}")
        $('#modalRoleName').val('');
        $('.model-save-btn').toggleClass('btn-create btn-update').html("{{__('trans.global.save')}}");

        $('.role-title').html("{{__('trans.role.add_new')}}");
    });

    $('.role-edit').on('click', function() {
        var id = $(this).data('id');
        $('.model-save-btn').toggleClass('btn-update btn-create').html("{{__('trans.global.update')}}");
        $('.role-title').html("{{__('trans.role.edit_role')}}");

        $.ajax({
            type: 'get',
            url: "{{url('admin/roles')}}/"+id,
            data: {id:id},
            beforeSend: function() {
                $('input[type=checkbox]').prop('checked', false);
                $('#addRoleForm').attr('action', "{{ url('/admin/roles/edit') }}/"+id)
            },
        }).done(function(res) {
            $('#modalRoleName').val(res.data['name']);
            for (const role in res.data) {
                if(res.data[role] == 'on') {
                    $('#'+role).prop('checked', true);
                }else {
                    $('#'+role).prop('checked', false);
                }
            }
        });
    });

    $('#selectAll').on('change', function() {
        if( $(this).is(":checked") ) {
            $('input[type=checkbox]').prop('checked', true);
        }
        else {
            $('input[type=checkbox]').prop('checked', false);
        }
    });
</script>
@endsection
