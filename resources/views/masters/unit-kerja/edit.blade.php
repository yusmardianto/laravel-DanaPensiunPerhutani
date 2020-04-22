@extends('layouts.master')

@section('title', config('app.name').' | Ubah Data Unit Kerja')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.numeric.min.js') }}"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ubah Data Unit Kerja</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/unit-kerja') }}">Master Unit Kerja</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Ubah Data Unit Kerja</strong>
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
                    <h5>Ubah Data Unit Kerja</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('masters/unit-kerja') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')

                    <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Unit Kerja</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kd_unit" value="{{ $data->kd_unit }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Unit Kerja</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pejabat</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="pejabat" value="{{ $data->pejabat }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat 1</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="alamat1" value="{{ $data->alamat1 }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat 2</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="alamat2" value="{{ $data->alamat2 }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kota</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="kota" value="{{ $data->kota }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="kd_pos" value="{{ $data->kd_pos }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="provinsi" value="{{ $data->provinsi }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No. Telepon</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="telepon" value="{{ $data->telepon }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-lg-10 input-group date">
                                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ $data->keterangan }}></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white btn-sm" type="reset">Batal</button>
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
