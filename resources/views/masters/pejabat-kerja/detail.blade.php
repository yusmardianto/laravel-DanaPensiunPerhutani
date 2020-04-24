@extends('layouts.master')

@section('title', config('app.name').' | Detail Pejabat Kerja')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Voucher</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/voucher') }}">Master Pejabat Kerja</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail Pejabat Kerja</strong>
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
                    <h5>Detail Pejabat Kerja</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('masters/pejabat-kerja') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-5">
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Kode Pejabat Kerja</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->kode_pejabat_kerja }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Nama Pejabat Kerja</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->nama_pejabat_kerja }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Keterangan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->keterangan }}</dd></div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
