@php
    $role = auth('admin')->user()->role;
@endphp
@extends('layout.backend.app')
@section('title', __('trans.backup.title'))

@section('css')
	<style>
     .load-page {
        position: fixed;
        background-color: rgb(0 0 0 / 69%);
        width: 100%;
        height: 100vh;
        top: 0;
        right: 0;
        z-index: 999999;
        color: #FFF !important;
        text-align: center;
        padding: 10px;
        display: none;
        justify-content: center;
        align-items: center;
        font-size: 20px;
    }
    th,td {
        border: 1px solid #DDD
    }
    </style>
@endsection

@section('content')

<div class="load-page">
    <div>
        <span class="mt-5">{!! __('trans.backup.alertBackup') !!}</span>
        <br />
        <span class="mt-3"><i class="fas fa-spinner fa-spin fa-2x"></i></span>
    </div>
</div>

<div class="card mb-2">
    <div class="card-body">
        <h4 class="mb-0">@yield('title')</h4>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        @if ($role->backup_create=='on')
            <a class="btn btn-primary mb-3" href="{{ url('/admin/backup/create') }}"><i class="fas fa-fw fa-database"></i> {{ __('trans.backup.createBackup') }}</a>
        @endif
        <form style="overflow: auto" action="{{ url('admin/backup/delete') }}" method="post"> @csrf
            <table class="table table-border">
                <thead>
                    <tr>
                        @if ($role->backup_delete=='on')
                            <th style="font-size: 12px;" scope="col">
                                <input type="checkbox" class="btn btn-sm" id="checkAll" />
                                <button class="btn btn-danger btn-sm" onclick="if (confirm(`{{__('trans.backup.alert_delete')}}`)) {return true;}else{return false;}">
                                    <i class="far fa-fw fa-trash-alt"></i>
                                </button>
                            </th>
                        @endif
                        <th style="font-size: 12px;" scope="col">{{__('trans.backup.file_name')}}</th>
                        <th style="font-size: 12px;" scope="col">{{__('trans.backup.file_size')}}</th>
                        <th style="font-size: 12px;" scope="col">{{__('trans.global.actions')}}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach( $backupFiles as $index => $file )
                        <tr>
                            @if ($role->backup_delete=='on')
                                <td scope="row">
                                    <input type="checkbox" name="data[]" class="btn btn-sm" value="{{basename($file)}}" />
                                </td>
                            @endif
                            <td scope="row" dir="ltr">{{ basename($file) }}</td>
                            <td scope="row" dir="ltr">{{ formatSizeUnits($file) }}</td>
                            <td scope="row">

                                @if ($role->backup_download=='on')
                                    <a onclick="if (confirm(`{{__('trans.backup.alertDownload')}}`)) {return true;}else{return false;}" href="{{ url('admin/backup/download/'.basename($file)) }}" class="btn btn-sm btn-info"><i class="fas fa-fw fa-download"></i> {{__('trans.backup.download')}}</a>
                                @endif

                                @if ($role->backup_restore=='on')
                                    <a href="{{ url('admin/db-restore/'.basename($file)) }}" class="btn btn-sm btn-success db-restore"><i class="fas fa-fw fa-reply-all"></i> {{ __('trans.backup.recovery') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('.db-restore').on('click', function() {
            if (confirm(`{{ __('trans.backup.alert_recovery') }}`)) {
                $('.load-page').css('display','flex');
                return true;
            }else{
                return false;
            }
        });

        $('#checkAll').on('change', function() {
            if( $(this).is(":checked") ) {
                $('input[type=checkbox]').prop('checked', true);
            }
            else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
    </script>
@endsection
