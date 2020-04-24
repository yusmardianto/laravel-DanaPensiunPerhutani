@extends('layouts.master')

@section('title', config('app.name').' | Detail Alasan Pensiun')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Alasan Pensiun</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/golongan') }}">Master Alasan</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail Alasan Pensiun</strong>
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
                    <h5>Detail Alasan Pensiun</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('masters/alasan') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-5">
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Kode</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->kode }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Alasan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->name }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Syarat Pensiun</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->syarat_pensiun }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Fprmula MP</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->formula_mp }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Jenis SK</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->jenis_sk }}</dd></div>
                            </dl>
                        </div>
                        <div class="col-md-5">
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Jenis Pensiun</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->jenis_pensiun }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Jenis Sisa MK</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->jenis_sisa_mk }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Usia Faktor Sekarang</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->usia_faktor_sekarang }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Usia Faktor Sekaligus</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->usia_faktor_sekaligus }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-5 text-sm-left"><dt>Kode Aktuaria</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-6 text-sm-left"><dd class="mb-1">{{ $data->kode_aktuaria }}</dd></div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
