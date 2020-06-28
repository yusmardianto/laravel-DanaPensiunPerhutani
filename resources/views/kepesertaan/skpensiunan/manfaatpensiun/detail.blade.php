@extends('layouts.master')

@section('title', config('app.name').' | Detail Penetapan SK Manfaat Pensiun')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Penetapan Manfaat Pensiun</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/skpensiunan/transaksiskpensiun') }}">Daftar Penetapan Manfaat Pensiun</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail Penetapan Manfaat Pensiun</strong>
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
                    <h5>Detail Penetapan Manfaat Pensiun</h5>
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
                                <div class="col-sm-4 text-sm-left"><dt>Penangguhan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->penangguhan_dari }} s/d {{ $data->penangguhan_sampai }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>MKp</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->mkp_dari  }} s/d {{ $data->mkp_sampai }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Nama Peserta</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->nama_peserta }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Alasan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->nama_alasan }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Unit Pembayaran</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->nama_unit_pembayaran }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal Bayar MP</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tgl_mpbayar }}</dd> </div>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal Turun MP</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tgl_mpturun }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>MP Sekaligus</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->mp_sekaligus }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>MP Pertama</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->mp_pertama }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>MP Bulanan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->mp_bulanan }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>No.Rekening Lain</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->no_rek_lain }}</dd> </div>
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
