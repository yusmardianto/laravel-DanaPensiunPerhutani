@extends('layouts.master')

@section('title', config('app.name').' | Detail Peserta')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Peserta</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/peserta') }}">Master Peserta</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail Peserta</strong>
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
                    <h5>Detail Peserta</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('masters/peserta') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-5">
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Nama Lengkap</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->name }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>ID Peserta</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->id_card }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal Lahir</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->birthdate }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Alamat</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->address }}</dd></div>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <dl class="row mb-0">
                                <div class="col-sm-3 text-sm-left"><dt>Email</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{ $data->email }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-3 text-sm-left"><dt>No Hp</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{ $data->phonenumber }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-3 text-sm-left"><dt>Foto</dt></div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt></div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1">
                                        <div class="photos">
                                            <img alt="image" class="feed-photo" src="{{ asset('foto/masterpeserta/'.$data->photo) }}">
                                        </div>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
