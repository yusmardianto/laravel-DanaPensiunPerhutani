@extends('layouts.master')

@section('title', config('app.name').' | Tambah Pengguna')

@section('stylesheets')
<link href="{{ asset('css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/textSpinners/spinners.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/jquery.numeric.min.js') }}"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah Transaksi Rapel & Extra Iuran Normal per Peserta</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Kepesertaan
            </li>
            <li class="breadcrumb-item">Iuran Pensiunan
            </li>
            <li class="breadcrumb-item">Rapel & Extra Iuran Normal per Peserta
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah Transaksi</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Tambah Transaksi</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('config/user')}}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')
                    <form method="post" action="{{ url()->current() }}" enctype="multipart/form-data" id="form-user">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Voucher</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="kd_voucher" value="{{ old('kd_voucher') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Transaksi</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="no_transaksi" value="{{ old('no_transaksi') }}">
                                    </div>
                                    <div class="form-grow row" id="data_1">
                                        <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                        <div class="col-sm-3 input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_transaksi">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-4 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_transaksi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Peserta</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="nama_peserta" value="{{ old('nama_peserta') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Bulan Berlaku</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="berlaku_dari">
                                    </div>
                                    <label class="col-sm-3 col-form-label">s/d</label>
                                </div>
                                <div class='form-group row'>
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password">
                                        <small class="form-text m-b-none">* Min 8 karakter</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="confirm-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-2 col-sm-offset-2">
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
