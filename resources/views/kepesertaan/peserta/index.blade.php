@extends('layouts.master')

@section('title', config('app.name').' | Daftar Peserta Aktif')

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
            { data: 'kode_aktif', name: 'kode_aktif' },
            { data: 'nama', name: 'nama' },
            { data: 'nip', name: 'nip' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ];

        $('#table-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('kepesertaan/peserta-aktif/ajax-list') !!}',
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
                    "targets": [1,3],
                    "className": "text-center",
                },
                {
                    "targets": 4,
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
            var deleteUrl = "{{ url('kepesertaan/peserta-aktif/delete') }}" + "/" + dataId;
            var csrf = "{{ csrf_token() }}";

            swal({
                text: "Hapus Data Peserta "+ dataName +" ?" ,
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
            });
        });
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Daftar Peserta Aktif</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Daftar Peserta Aktif</strong>
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
                    <h5>Daftar Peserta Aktif</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/peserta-aktif/create') }}" class="btn btn-primary btn-xs">
                            <i class="fa fa-plus"></i>
                            Tambah Peserta Aktif
                        </a>
                        <a href="#modalUpload" class="btn btn-primary btn-xs" data-toggle="modal">Upload Excel <i class="fa fa-upload"></i></a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-list">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Aktif</th>
                                <th>Nama Peserta</th>
                                <th>Nomor Induk Pegawai</th>
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

<div class="modal inmodal" id="modalUpload" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Upload Excel</h4>
            </div>
            <form action="{{ url('kepesertaan/peserta-aktif/upload') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" class="form-control" name="excel">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload <i class="fa fa-upload"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
