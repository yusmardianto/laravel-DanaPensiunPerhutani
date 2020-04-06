@extends('layouts.master')

@section('title', config('app.name').' | Tipe Pengguna')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
    $(function() {
        var $url = "{{ config('app.url') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var $column = [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
            { data: 'name', name: 'name' },
            { data: 'guard_name', name: 'guard_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ];

        $('#table-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('config/role/ajax-list') !!}',
                method: 'POST'
            },
            columns: $column,
            columnDefs: [
                {
                    "targets": 0, // your case first column
                    "className": "text-center",
                    "width": "4%"
                },
                {
                    "targets": 3,
                    "width": "180px"
                }
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }
        });

        $(document).on('click', '.delete-btn', function() {
            var dataId = $(this).data('id');
            var dataName = $(this).data('nama');
            var deleteUrl = "{{ url('config/role/delete') }}" + "/" + dataId;
            var csrf = "{{ csrf_token() }}";

            swal({
                text: "Hapus data role : "+ dataName +" ?" ,
                icon: "warning",
                dangerMode: true,
                buttons: {
                    cancel: {
                        text: "Batal",
                        value: false,
                        visible: true,
                        className: "btn btn-sm btn-white"
                    },
                    confirm: {
                        text: "Hapus",
                        value: true,
                        visible: true,
                        className: "btn btn-sm btn-danger",
                        closeModal: true
                    }
                }
            }).then((value) => {
                if (value === true) {
                    $.redirect(deleteUrl, {"_token": csrf});
                }
                swal.close();
            });;
        });
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tipe Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Konfigurasi
            </li>
            <li class="breadcrumb-item active">
                <strong>Tipe Pengguna</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tipe Pengguna</h5>
                    <div class="ibox-tools">
                        @if($user->hasAnyPermission(['Role-create']))
                        <a href="{{ url('config/role/create') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-plus"></i>
                            Tambah tipe pengguna
                        </a>
                        @endif
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-list">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Role</th>
                                <th>Platform</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
