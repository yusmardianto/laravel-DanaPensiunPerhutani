@extends('layouts.master')

@section('title', config('app.name').' | Tambah Transaksi Iuran')

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
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $("#select-kd_voucher").select2({width:"100%", placeholder: "- Pilih Voucher -", allowClear: true});
        $("#select-peserta").select2({width:"100%", placeholder: "- Pilih Peserta -", allowClear: true});
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
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/iuranpensiunan/rapel-extra') }}">Rapel & Extra Iuran Normal per Peserta</a>
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
                        <a href="{{ url('kepesertaan/iuranpensiunan/rapel-extra')}}" class="btn btn-primary btn-xs modal-form">
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
                                    <div class="col-sm-10">
                                        <select name="kd_voucher" id="select-kd_voucher">
                                            <option value=""></option>
                                            @foreach($voucher as $row)
                                            <option value="{{ $row->kode_voucher }}">{{ $row->kode_voucher }} ({{ $row->nama_voucher }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Transaksi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_transaksi">
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">Tgl Transaksi</label>
                                    <div class="col-sm-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_transaksi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Aktif / Nama</label>
                                    <div class="col-sm-10">
                                        <select name="kd_peserta" id="select-peserta">
                                            <option value=""></option>
                                            @foreach($peserta as $row)
                                            <option value="{{ $row->kode_aktif }} - {{ $row->nama }}">{{ $row->kode_aktif }} - {{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">Bulan Berlaku</label>
                                    <div class="col-sm-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="berlaku_dari">
                                    </div>
                                    <label class="col-form-label">s/d</label>
                                    <div class="col-sm-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="berlaku_sampai">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gaji Pokok</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="gaji_pokok">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PhDP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="phdp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Beban Peserta</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="beban_peserta">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Beban Pemberi Kerja</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="beban_pemberikerja">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Total Rapel</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="total_rapel">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea id="" cols="30" rows="10" class="form-control" name="keterangan"></textarea>
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
