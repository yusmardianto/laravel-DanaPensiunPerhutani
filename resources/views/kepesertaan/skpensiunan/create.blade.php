@extends('layouts.master')

@section('title', config('app.name').' | Tambah SK Pensiunan')

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

        $("#select-periode").select2({width:"100%", placeholder: "Pilih Periode", allowClear: true});
        $("#select-voucher").select2({width:"100%", placeholder: "Pilih Voucher", allowClear: true});
        $("#select-unitkerja").select2({width:"100%", placeholder: "Pilih Unit Kerja", allowClear: true});
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah SK Pensiunan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Kepesertaan</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/skpensiunan') }}">SK Pensiunan</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah SK Pensiunan</strong>
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
                    <h5>Tambah SK Pensiunan</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/skpensiunan') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')
                    <form method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No SK Pensiunan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_sk_pensiun">
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Tanggal Pensiun</label>
                            <div class="col-lg-10 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tanggal_pensiun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Periode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="periode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode Voucher</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="voucher">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggungan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggungan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="unit_kerja">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NPWP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="npwp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea id="" cols="30" rows="10" class="form-control" name="keterangan"></textarea>
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
