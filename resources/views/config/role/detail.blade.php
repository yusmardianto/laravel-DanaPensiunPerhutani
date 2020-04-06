@extends('layouts.master')

@section('title', config('app.name').' | Detail Tipe Pengguna')

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
            { data: 'username', name: 'username' },
            { data: 'email', name: 'email' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'is_active', name: 'is_active', orderable: false, searchable: false, render: function (data, type, row) {
                if (row.is_active == '1') {
                    return '<label class="label label-success">Aktif</label>';
                }
                else {
                    return '<label class="label label-danger">Tidak Aktif</label>';
                    }
                }
            }
        ];

        $('#table-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('config/role/ajax-user/'.$hashed_id.'') !!}',
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
                    "targets": 5,
                    "width": "170px"
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
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Tipe Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Konfigurasi
            </li>
            <li class="breadcrumb-item">Tipe Pengguna
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail</strong>
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
                    <h5>Detail Tipe Pengguna</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('config/role') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row mb-0">
                                <div class="col-sm-3 text-sm-left"><dt>Nama Role</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{ $role->name }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-3 text-sm-left"><dt>Nama Guard</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{ $role->guard_name }}</dd></div>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row mb-0">
                                <div class="col-sm-3 text-sm-left"><dt>Permissions</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-8 text-sm-left"><dd class="mb-1">
                                        @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <label class="label label-success">{{ $v->name }},</label>
                                        @endforeach
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Daftar Pengguna</h5>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-list">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nomor Hp</th>
                                <th>Status Pengguna</th>
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
