@extends('layouts.master')

@section('title', config('app.name').' | Tambah Rapel Manfaat Pensiunan')

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


        $("#select-jenis_transaksi").select2({width:"100%", placeholder: "Pilih Jenis Transaksi", allowClear: true});
        $("#select-kodepensiun").select2({width:"100%", placeholder: "Pilih Kode Pensiun", allowClear: true});
        $("#select-kode_voucher").select2({width:"100%", placeholder: "Pilih Kode Voucher", allowClear: true});


      //  $("#select-status").select2({width:"100%", placeholder: "Pilih Status", allowClear: true});
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ubah Transaksi Rapel Extra Manfaat Pensiunan </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Kepesertaan
            </li>
            <li class="breadcrumb-item">Manfaat Pensiunan
            </li>
            <li class="breadcrumb-item">Rapel & Extra Manfaat Pensiunan
            </li>
            <li class="breadcrumb-item active">
                <strong>Ubah Transaksi</strong>
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
                    <h5>Tambah Transaksi</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/manfaatpensiunan/rapelextramanfaat') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')
                    <form method="post" action="{{ url()->current() }}" enctype="multipart/form-data"  id="form-user">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Transaksi</label>
                                        <div class="col-sm-6">
                                            <select name="jenis_transaksi" id="select-jenis_transaksi">
                                                <option value=""></option>
                                                @foreach($jenistrx as $row)
                                                <option value="{{ $row->name }}" @if ($data ->jenis_transaksi == $row->name) selected="" @endif>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kode Voucher</label>
                                        <div class="col-sm-6">
                                            <select name="kode_voucher" id="select-kode_voucher">
                                                <option value=""></option>
                                                @foreach($kodvcr as $row)
                                                <option value="{{ $row->kode_voucher }}" @if ($data ->kode_voucher == $row->kode_voucher) selected="" @endif>{{ $row->kode_voucher }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No Transaksi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="no_trx" value="{{ $data->no_trx }}">
                                        </div>
                                    </div>
                                    <div class="form-group row" id="data_1">
                                        <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                        <div class="col-lg-6 input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_trx" value="{{ $data->tgl_trx }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No Daftar Bayar MP</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="no_daftar_bayar_MP" value="{{ $data->no_daftar_bayar_MP }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kode Pensiun</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="kode_pensiun" value="{{ $data->kode_pensiun }}">
                                        </div>
                                    </div>
                                {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pensiun</label>
                                    <div class="col-sm-6">
                                        <select name="rapelextra" id="select-kodepensiun">
                                            <option value=""></option>
                                            @foreach($kodepensiun as $kdpensiun)
                                            <option value="{{ $kdpensiun->id }}">{{ $kdpensiun->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                                        </div>
                                    </div>
                                    <div class="form-group row" id="data_1">
                                        <label class="col-sm-2 col-form-label">Berlaku / Bulan</label>
                                        <div class="col-lg-2 input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="berlaku_dari" value="{{ $data->berlaku_dari }}">
                                        </div>
                                        <label class="col-sm-0 col-form-label">s/d</label>
                                        <div class="col-lg-2 input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="berlaku_sampai" style="text-align: right" value="{{ $data->berlaku_sampai }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">MP PPH21</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="pph21" value="{{ $data->pph21 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Non MP PPH21</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nonpph21" value="{{ $data->nonpph21 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-6">
                                            <textarea id="" cols="30" rows="10" class="form-control" name="keterangan"> {{ $data->keterangan }}</textarea>
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
