@extends('layouts.master')

@section('title', config('app.name').' | Detail SK Pensiun')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail SK Pensiun</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/skpensiunan/transaksiskpensiun') }}">Daftar SK Pensiun</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail SK Pensiun</strong>
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
                    <h5>Detail SK Pensiun</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/skpensiunan/transaksiskpensiun') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Jenis Transaksi</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->jenis_transaksi }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Peserta Pasif</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->kode_pasif }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Kode Voucher</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->voucher }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Unit Kerja</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->unit_kerja }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal Pensiun</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tanggal_pensiun }}</dd></div>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>No Transaksi SK</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->no_trx_sk }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal Transaksi SK</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tgl_trx_sk }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>No SK Pensiun</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->no_sk_pensiun }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal SK Pensiun</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tgl_sk_pensiun }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>No SK PHK</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->no_sk_phk }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal SK PHK</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tgl_sk_phk }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Keterangan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->keterangan }}</dd> </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
