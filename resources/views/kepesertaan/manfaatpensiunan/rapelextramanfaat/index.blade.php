@extends('layouts.master')

@section('title', config('app.name').' | Rapel Extra Manfaat Pensiunan')

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
            { data: 'kode_voucher', name: 'kode_voucher' },
            { data: 'jenis_transaksi', name: 'jenis_transaksi' },
            { data: 'tgl_trx', name: 'tgl_trx' },
            { data: 'nama', name: 'nama' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ];

        $('#table-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('kepesertaan/manfaatpensiunan/rapelextramanfaat/ajax-list') !!}',
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

        $(document).on('click', '.modal-form', function() {
            $('#import-manfaat').modal({show:true});
            $('#manfaat').select2({
                placeholder: "Choose File Manfaat...",
                minimumInputLength: 2,
                ajax: {
                    url: "{{ url('load-member') }}",
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });

        $(document).on('click', '.delete-btn', function() {
            var dataId = $(this).data('id');
            var deleteUrl = "{{ url('kepesertaan/manfaatpensiunan/rapelextramanfaat/delete') }}" + "/" + dataId;
            var csrf = "{{ csrf_token() }}";

            swal({
                text: "Hapus Data Transaksi ?" ,
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
        <h2>Rapel & Extra Manfaat Pensiunan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Kepesertaan
            </li>
            <li class="breadcrumb-item">Manfaat Pensiunan
            </li>
            <li class="breadcrumb-item active">
                <strong>Rapel & Extra Manfaat Pensiunan</strong>
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
                    <h5>Manfaat Pensiunan</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/manfaatpensiunan/rapelextramanfaat/create') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-plus"></i>
                            Tambah Transaksi
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
                                <th>Kode Voucher</th>
                                <th>Jenis Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama</th>
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

<div class="modal inmodal " id="import-rapel" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Import Data Rapel Extra Manfaat Pensiun</h4>
                <small class="font-bold">Masukkan File Excel</small>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ url('kepesertaan/manfaatpensiunan/rapelextramanfaat/upload') }}" method="POST" class="form-horizontal" id="inputForm" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="custom-file">
                                    <input id="logo" type="file" class="custom-file-input" name="sk_file">
                                    <label for="logo" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white btn-sm" type="reset">Cancel</button>
                                    <button class="btn btn-primary btn-sm" type="submit">Submit data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
