@extends('layouts.master')

@section('title', config('app.name').' | Daftar Pengguna')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
<!-- DataTables -->
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var $dp = [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'username', name: 'username'},
            { data: 'email', name: 'email' },
        ];

        $('#dt').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url('config/user/ajaxlist') !!}',
                method: 'POST'
            },
            columns: $dp,
            columnDefs: [],
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [],
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
        <h2>Daftar Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Konfigurasi
            </li>
            <li class="breadcrumb-item active">
                <strong>Daftar Pengguna</strong>
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
                    <h5>Daftar Pengguna</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('config/user/tambah') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-plus"></i>
                            Tambah data
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-list">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
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
