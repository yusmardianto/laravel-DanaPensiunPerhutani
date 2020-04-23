@extends('layouts.master')

@section('title', config('app.name').' | Edit Alasan')

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
<script>
    $(document).ready(function(){
        $("#tel").numeric();
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Master Data Alasan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/golongan') }}">Alasan</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Edit Alasan</strong>
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
                    <h5>Input Data Alasan</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('masters/alasan') }}" class="btn btn-primary btn-xs modal-form">
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
                                    <label class="col-sm-3 col-form-label">Kode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="kode" value="{{ $data->kode }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alasan</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="alasan" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Syarat Pensiun</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="syarat_pensiun" value="{{ $data->syarat_pensiun }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Formula MP</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="formula_mp" value="{{ $data->formula_mp }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis SK</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="jenis_sk" value="{{ $data->jenis_sk }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Pensiun</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="syarat_pensiun" value="{{ $data->syarat_pensiun }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Sisa MK</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="jenis_sisa_mk" value="{{ $data->jenis_sisa_mk }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Usia Faktor Sekarang</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="usia_faktor_sekarang" value="{{ $data->usia_faktor_sekarang }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Usia Faktor Sekaligus</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="usia_faktor_sekaligus" value="{{ $data->usia_faktor_sekaligus }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kode Aktuaria</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="kode_akturia" value="{{ $data->kode_akturia }}">
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
