@extends('layouts.master')

@section('title', config('app.name').' | Status Order')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Status Order</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Investasi
            </li>
            <li class="breadcrumb-item active">
                <strong>Status Order</strong>
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
                    <h5>Status Order</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/peserta/tambah') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-list">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>No Rekening</th>
                                <th>Email</th>
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
