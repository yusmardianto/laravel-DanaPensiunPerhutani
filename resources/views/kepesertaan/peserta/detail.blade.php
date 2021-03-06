@extends('layouts.master')

@section('title', config('app.name').' | Detail Peserta Aktif')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Peserta aktif</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/karyawan') }}">Daftar Peserta Aktif</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detail Peserta Aktif</strong>
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
                    <h5>Detail Peserta Aktif</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/peserta-aktif') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Kode Aktif</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->kode_aktif }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Nama Lengkap</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->nama }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Nomor Induk Pegawai</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->nip }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Unit Kerja</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->unit_kerja }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tempat Lahir</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tempat_lahir }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal Lahir</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->birthdate }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Jenis Kelamin</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->jenis_kelamin }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Agama</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->agama }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Email</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->email }}</dd> </div>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal jadi Pegawai</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tgl_jadi_pegawai }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggal jadi Peserta</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tgl_jadi_peserta }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>MK Peserta</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->mk_peserta }}</dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Tanggungan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->tanggungan }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Golongan</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">{{ $data->golongan }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Gaji Pokok</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">Rp. {{ $data->gaji_pokok }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Gaji PNS</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">Rp. {{ $data->gaji_pns }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>PhDP</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">Rp. {{ $data->phdp }}</dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-left"><dt>Iuran Normal</dt> </div>
                                <div class="col-sm-0 text-sm-left"><dt>:</dt> </div>
                                <div class="col-sm-7 text-sm-left"><dd class="mb-1">Rp. {{ $data->iuran }}</dd> </div>
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
