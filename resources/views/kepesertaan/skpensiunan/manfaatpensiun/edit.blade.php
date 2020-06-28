@extends('layouts.master')

@section('title', config('app.name').' | Edit Penetapan Manfaat Pensiun')

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

        $("#select-voucher").select2({width:"100%", placeholder: "Pilih Alasan", allowClear: true});
        $("#select-unitkerja").select2({width:"100%", placeholder: "Pilih Unit Pembayaran", allowClear: true});
        $("#select-kode-aktif").select2({width:"100%", placeholder: "Pilih Kode Aktif Peserta", allowClear: true});
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Penetapan Manfaat Pensiun</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/skpensiunan/transaksiskpensiun') }}">Daftar SK Pensiun</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Edit Penetapan Manfaat Pensiun</strong>
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
                    <h5>Edit Penetapan Manfaat Pensiun</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/skpensiunan/transaksiskpensiun') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')
                    <form method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Penangguhan</label>
                            <div class="col-lg-4 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="berlaku_dari" value="{{ $data->penangguhan_dari }}">
                            </div>
                            <label class="col-sm-0 col-form-label"> - </label>
                            <div class="col-lg-4 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="berlaku_sampai" style="text-align: left" value="{{ $data->penangguhan_sampai }}">
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Total MKp/MK</label>
                            <div class="col-lg-4 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="mkp_berlaku_dari" value="{{ $data->mkp_dari }}">
                            </div>
                            <label class="col-sm-0 col-form-label"> - </label>
                            <div class="col-lg-4 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="mkp_berlaku_sampai" style="text-align: left" value="{{ $data->mkp_sampai }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Peserta Aktif</label>
                            <div class="col-sm-10">
                                <select name="kode_aktif" id="select-kode-aktif">
                                    <option value=""></option>
                                    @foreach($kodeaktif as $row)
                                    <option value="{{ $row->kode_aktif }} - {{ $row->nama }}">{{ $row->kode_aktif }} - {{ $row->nama }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alasan</label>
                            <div class="col-sm-10">
                                <select name="alasan" id="select-voucher">
                                    <option value=""></option>
                                    @foreach($alasan as $rows)
                                    <option value="{{ $rows->kode }} - {{ $rows->name }}">{{ $rows->kode }} - {{ $rows->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Tanggal Alasan</label>
                            <div class="col-lg-10 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_alasan" value="{{ $data->tgl_alasan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit Pembayaran</label>
                            <div class="col-sm-10">
                                <select name="unit_pembayaran" id="select-unitkerja">
                                    <option value=""></option>
                                    @foreach($unit_pembayaran as $rows)
                                    <option value="{{ $rows->kode_unit }} - {{ $rows->name }}">{{ $rows->kode_unit }} - {{ $rows->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Tanggal MP DIbayar</label>
                            <div class="col-lg-10 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_mpdibayar" value="{{ $data->tgl_mpbayar }}">
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Tanggal MP Turunan</label>
                            <div class="col-lg-10 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_mpturunan" value="{{ $data->tgl_mpturun }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">MP Sekaligus</label>
                            <div class="col-lg-2 input-group date">
                                <input type="text" class="form-control" name="mp_sekaligus" value="{{ $data->mp_sekaligus }}">
                            </div>
                            <label class="col-sm-0 col-form-label">MP Pertama</label>
                            <div class="col-lg-2 input-group date">
                                <input type="text" class="form-control" name="mp_pertama" style="text-align: right" value="{{ $data->mp_pertama }}">
                            </div>
                            <label class="col-sm-0 col-form-label">MP Bulanan</label>
                            <div class="col-lg-2 input-group date">
                                <input type="text" class="form-control" name="mp_bulanan" style="text-align: right" value="{{ $data->mp_bulanan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No.Rekening A/N Lain</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_rek_lain" value="{{ $data->no_rek_lain }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea id="" cols="30" rows="10" class="form-control" name="keterangan" value="{{ $data->keterangan }}"></textarea>
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
