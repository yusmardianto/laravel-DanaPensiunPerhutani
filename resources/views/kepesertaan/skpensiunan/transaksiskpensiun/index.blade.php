@extends('layouts.master')

@section('title', config('app.name').' | SK Pensiunan')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<style>
    th {
        font-size: 13px;
        text-align: center;
    }
    td {
        font-size: 13px;
    }
</style>
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
            { data: 'no_sk_pensiun', name: 'no_sk_pensiun' },
            { data: 'nama_peserta', name: 'nama_peserta' },
            { data: 'kode_voucher', name: 'kode_voucher' },
            { data: 'tanggal_pensiun', name: 'tanggal_pensiun' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ];

        $('#table-list1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('kepesertaan/skpensiunan/transaksiskpensiun/ajax-list') !!}',
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
                    "targets": [0,1,2,3,4],
                    "className": "text-center",
                },
                {
                    "targets": 5,
                    "width": "21%"
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

        var $column = [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
            { data: 'penangguhan_dari', name: 'penangguhan_dari' },
            { data: 'penangguhan_sampai', name: 'penangguhan_sanpai' },
            { data: 'nama_peserta', name: 'nama_peserta' },
            { data: 'nama_alasan', name: 'nama_alasan' },
            { data: 'mp_bulanan', name: 'mp_bulanan' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ];

        $('#table-list2').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('kepesertaan/skpensiunan/manfaatpensiun/ajax-list') !!}',
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
                    "targets": [0,1,2,3,4,5],
                    "className": "text-center",
                },
                {
                    "targets": 6,
                    "width": "21%"
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

        var $column = [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
            { data: 'no_kk', name: 'no_kk' },
            { data: 'kode_aktif', name: 'kode_aktif' },
            { data: 'penerima', name: 'penerima' },
            { data: 'tempat_lahir', name: 'tempat_lahir' },
            { data: 'tgl_lahir', name: 'tgl_lahir' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ];

        $('#table-list3').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('kepesertaan/skpensiunan/penerimamanfaat/ajax-list') !!}',
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
                    "targets": [0,1,2,3,4,5],
                    "className": "text-center",
                },
                {
                    "targets": 6,
                    "width": "21%"
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
            var dataName = $(this).data('name');
            var deleteUrl = "{{ url('kepesertaan/skpensiunan/transaksiskpensiun/destroy') }}" + "/" + dataId;
            var csrf = "{{ csrf_token() }}";

            swal({
                text: "Hapus Data Pengguna "+ dataName +" ?" ,
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

        $(document).on('click', '.delete-btn', function() {
            var dataId = $(this).data('id');
            var dataName = $(this).data('name');
            var deleteUrl = "{{ url('kepesertaan/skpensiunan/manfaatpensiun/destroy') }}" + "/" + dataId;
            var csrf = "{{ csrf_token() }}";

            swal({
                text: "Hapus Data Pengguna "+ dataName +" ?" ,
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
        <h2>SK Pensiunan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>SK Pensiunan</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="row m-t-lg">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-1">
                    <span class="class">Transaksi SK Pensiunan</span>
                </a>
                </li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-2">
                    <span class="class">Manfaat Pensiunan</span>
                </a>
                </li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-3">
                    <span class="class">Penerima Manfaat Pensiun</span>
                </a>
                </li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-4">
                    <span class="class">Formula Manfaat Pensiunan</span>
                </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="ibox-title">
                        <div>
                            <a href="{{ url('kepesertaan/skpensiunan/transaksiskpensiun/create') }}" class="btn btn-primary btn-xs modal-form">
                                <i class="fa fa-plus"></i>
                                Tambah data
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        @include('layouts.flashMessage')
                        <table class="table table-striped " id="table-list1" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>No SK Pensiun</th>
                                <th>Nama Peserta</th>
                                <th>Voucher</th>
                                <th>Tanggal Pensiun</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="ibox-title">
                        <div>
                            <a href="{{ url('kepesertaan/skpensiunan/manfaatpensiun/create') }}" class="btn btn-primary btn-xs modal-form">
                                <i class="fa fa-plus"></i>
                                Tambah data
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-striped " id="table-list2" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Penangguhan Dari</th>
                                <th>Penangguhan Sampai</th>
                                <th>Nama Peserta</th>
                                <th>Alasan Pensiun</th>
                                <th>Manfaat Pensiun Bulanan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="ibox-title">
                        <div>
                            <a href="{{ url('kepesertaan/skpensiunan/penerimamanfaat/create') }}" class="btn btn-primary btn-xs modal-form">
                                <i class="fa fa-plus"></i>
                                Tambah data
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-striped " id="table-list3" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomer KK</th>
                                <th>Peserta</th>
                                <th>Nama Penerima</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div>
                </div>
                <div id="tab-4" class="tab-pane">
                    <div class="ibox-title">
                        <div>
                            <a href="{{ url('kepesertaan/skpensiunan/transaksiskpensiun/create') }}" class="btn btn-primary btn-xs modal-form">
                                <i class="fa fa-plus"></i>
                                Tambah data
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-striped " id="table-list4" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Penangguhan</th>
                                <th>Nama Peserta</th>
                                <th>Alasan Pensiun</th>
                                <th>Tanggal Pensiun</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
