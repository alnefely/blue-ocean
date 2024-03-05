@php
    $admin = auth('admin')->user();
    $role = $admin->role;
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <div class="app-brand-link">
            <img src="{{ $Setting->logo }}" class="app-brand-logo demo" style="height:34px;border-radius:50%;">
            <span class="app-brand-text demo menu-text fw-bold">{{ $Setting->name }}</span>
        </div>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if($role->home_show=='on')
            <li class="menu-item">
                <a href="{{url('/admin/home')}}" class="menu-link">
                    <i class="fa-solid fa-fw fa-house"></i>
                    <div>{{__('trans.global.dashboard')}}</div>
                </a>
            </li>
        @endif

        @if($role->admin_show=='on'||$role->admin_create=='on')
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="fa-solid fa-users-gear"></i>
                    <div>{{__('trans.admin.title')}}</div>
                </a>
                <ul class="menu-sub">
                    @if($role->admin_show=='on')
                        <li class="menu-item">
                            <a href="{{url('admin/admins')}}" class="menu-link">
                                <div>{{__('trans.admin.title')}}</div>
                            </a>
                        </li>
                    @endif
                    @if($role->admin_create=='on')
                        <li class="menu-item">
                            <a href="{{url('admin/admins/create')}}" class="menu-link">
                                <div>{{__('trans.admin.add_new')}}</div>
                            </a>
                        </li>
                    @endif

                    @if($role->role_show=='on')
                        <li class="menu-item">
                            <a href="{{url('admin/roles')}}" class="menu-link">
                                <div>{{__('trans.role.title')}}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if($role->backup_show=='on')
            <li class="menu-item">
                <a href="{{url('/admin/backup')}}" class="menu-link">
                    <i class="fa-solid fa-database"></i>
                    <div>{{__('trans.backup.title')}}</div>
                </a>
            </li>
        @endif

        @if($role->setting_edit=='on')
            <li class="menu-item">
                <a href="{{url('admin/settings')}}" class="menu-link">
                    <i class="fa-solid fa-gear"></i>
                    <div>{{__('trans.setting.title')}}</div>
                </a>
            </li>
        @endif

        <li class="menu-item">
            <a href="{{url('admin/logout')}}" class="menu-link">
                <i class="fa-solid fa-right-from-bracket fa-fw"></i>
                <div>{{__('trans.auth.logout')}}</div>
            </a>
        </li>


    </ul>
</aside>
