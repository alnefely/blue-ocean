<style>
    tr td {
        border: 1px solid #DDD;
    }
</style>
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
      <div class="modal-content p-3 p-md-5">
        <button class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close" ></button>
        <div class="modal-body">
            <div class="text-center mb-4">
                <h3 class="role-title mb-2">{{ __('trans.role.add_new') }}</h3>
            </div>
            <!-- Add role form -->
            <form id="addRoleForm" method="POST" class="row g-3"> @csrf
                <div class="col-4 mb-4">
                    <label class="form-label" for="modalRoleName">{{__('trans.role.name')}} <b class="text-danger">*</b></label>
                    <input type="text" id="modalRoleName" placeholder="{{__('trans.role.name')}}" required name="name" class="form-control" tabindex="-1" />
                </div>
                <div class="col-12">
                    <!-- Permission table -->
                    <div class="table-responsive">

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="selectAll" />
                            <label class="form-check-label" for="selectAll">{{__('trans.role.select_all')}}</label>
                        </div>

                        <table class="table table-border">
                            <tbody>

                                <tr>
                                    <td class="text-nowrap fw-semibold">{{__('trans.backup.title')}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="backup_show" id="backup_show" />
                                        <label class="form-check-label" for="backup_show"> {{ __('trans.role.show') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="backup_create" id="backup_create" />
                                        <label class="form-check-label" for="backup_create"> {{ __('trans.role.create') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="backup_delete" id="backup_delete" />
                                        <label class="form-check-label" for="backup_delete"> {{ __('trans.role.delete') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="backup_download" id="backup_download" />
                                        <label class="form-check-label" for="backup_download"> {{ __('trans.backup.download') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="backup_restore" id="backup_restore" />
                                        <label class="form-check-label" for="backup_restore"> {{ __('trans.backup.recovery') }} </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-nowrap fw-semibold">{{__('trans.role.title')}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="role_show" id="role_show" />
                                        <label class="form-check-label" for="role_show"> {{ __('trans.role.show') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="role_create" id="role_create" />
                                        <label class="form-check-label" for="role_create"> {{ __('trans.role.create') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="role_edit" id="role_edit" />
                                        <label class="form-check-label" for="role_edit"> {{ __('trans.role.edit') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="role_delete" id="role_delete" />
                                        <label class="form-check-label" for="role_delete"> {{ __('trans.role.delete') }} </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-nowrap fw-semibold">{{__('trans.admin.title')}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="admin_show" id="admin_show" />
                                        <label class="form-check-label" for="admin_show"> {{ __('trans.role.show') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="admin_create" id="admin_create" />
                                        <label class="form-check-label" for="admin_create"> {{ __('trans.role.create') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="admin_edit" id="admin_edit" />
                                        <label class="form-check-label" for="admin_edit"> {{ __('trans.role.edit') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="admin_delete" id="admin_delete" />
                                        <label class="form-check-label" for="admin_delete"> {{ __('trans.role.delete') }} </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="admin_profile" id="admin_profile" />
                                        <label class="form-check-label" for="admin_profile"> {{ __('trans.admin.profile') }} </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-nowrap fw-semibold">{{__('trans.setting.title')}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="setting_edit" id="setting_edit" />
                                        <label class="form-check-label" for="setting_edit"> {{ __('trans.role.edit') }} </label>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-nowrap fw-semibold">{{__('trans.global.dashboard')}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" name="home_show" id="home_show" />
                                        <label class="form-check-label" for="home_show"> {{ __('trans.role.show') }} </label>
                                    </td>
                                </tr>
                                {{-- |||||||||||||||||||||||||||||||||||||||||||||||||||| --}}

                            </tbody>
                        </table>
                    </div>
                    <!-- Permission table -->
                </div>
                <div class="col-12 text-center mt-4">
                    <button class="btn btn-primary me-sm-3 me-1 model-save-btn btn-create">{{ __('trans.global.save') }}</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close" >
                        {{__('trans.global.cancel')}}
                    </button>
                </div>
            </form>
            <!--/ Add role form -->
        </div>
      </div>
    </div>
</div>
