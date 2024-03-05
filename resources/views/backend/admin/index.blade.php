@extends('layout.backend.app')
@section('title', __('trans.admin.title'))


@section('datatableCSS')
    @include('layout.backend.datatables-css')
@endsection

@section('datatablesJS')
    @include('layout.backend.datatables-js')
@endsection

@section('content')
<div class="card mb-2">
    <div class="card-body">
        <h4 class="mb-0">@yield('title')</h4>
    </div>
</div>
<div class="card">
    <div class="card-datatable table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="exp-col">{{__('trans.global.id')}}</th>
                <th class="exp-col">{{__('trans.admin.name')}}</th>
                <th class="exp-col">{{__('trans.global.email')}}</th>
                <th class="exp-col">{{__('trans.admin.role')}}</th>
                <th class="exp-col">{{__('trans.global.created_at')}}</th>
                <th>{{__('trans.global.actions')}}</th>
            </tr>
        </thead>
        <tfoot><tr></tr></tfoot>
      </table>
    </div>

@endsection

@section('js')

<script>

    $(document).ready(function(){


        var table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, 'desc' ]],
            lengthMenu: lengthMenu("{{__('trans.global.all')}}"),
            language: getlang(),
            dom: dom(),
            buttons: buttons("{{__('trans.admin.add_new')}}","{{url('admin/admins/create')}}"),
            ajax: "{{ url('/admin/admins') }}",
            columns: [
                {data:'id'},
                {data:'name'},
                {data:'email'},
                {data:'role.name'},
                {data:'created_at'},
            ],
            columnDefs: [
                {
                    targets: 5,
                    render: function (data, type, row, meta) {
                        if( row.main == 'main' ){
                            return "{{__('trans.admin.main')}}";
                        }else {
                            return `
                                <a href="{{url('/admin/admins/`+row.id+`/edit')}}" class="btn btn-sm rounded-pill btn-info"><i class="ti ti-edit"></i></a>
                                <form action="{{url('/admin/admins')}}/`+row.id+`" style="display:inline-block" method="post">@csrf {{ method_field('DELETE') }}
                                    <button class="btn btn-sm rounded-pill btn-danger btn-delete"><i class="ti ti-trash"></i></button>
                                </form>
                            `;
                        }
                    }
                },
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var that = this;
                    $('input', this.header()).on('keyup change input clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            },
        });

        $(window).on('load', function() {
            $('.table thead th').each(function () {
                var title = $(this).text();
                if( $(this).hasClass('exp-col') ) {
                    $(this).html(title+'<input type="text" class="form-control" placeholder="{{__("trans.global.search")}}: ' + title + '" />');
                }
                $('.table tfoot tr').append(`<th><b>`+title+`</b></th>`);
            });
        });

    });
</script>
@endsection
