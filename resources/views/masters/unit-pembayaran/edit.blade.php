@extends('layouts.master')

@section('title', config('app.name').' | Ubah Unit Pembayaran')

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
        $("#pos").numeric();

        $("#select-group-pembayaran").select2({width:"100%", placeholder: "Pilih Group Pembayaran", allowClear: true});
    });
</script>

@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ubah Daftar Unit Pembayaran</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('masters/unit-pembayaran') }}">Master Unit Pembayaran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Ubah Daftar Unit Pembayaran</strong>
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
                    <h5>Ubah Data Unit Pembayaran</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('masters/unit-pembayaran') }}" class="btn btn-primary btn-xs modal-form">
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
                                    <label class="col-sm-2 col-form-label">Kode Unit Pembayaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kode_unit" value="{{ $data->kode_unit }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Unit Pembayaran</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Group Pembayaran</label>
                                    <div class="col-sm-10">
                                        <select name="kode_group" id="select-group-pembayaran">
                                            <option value=""></option>
                                            @foreach($kodegroup as $group)
                                            <option value="{{ $group->kode_group }}" @if($data->kode_group == $group->kode_group) selected="" @endif>{{ $group->kode_group }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-lg-10 input-group date">
                                        <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}">
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
                                        <input type="text" class="form-control" name="pos" value="{{ $data->pos }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-lg-9 input-group date">
                                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ $data->keterangan }}</textarea>
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
