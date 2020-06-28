@extends('layouts.master')

@section('title', config('app.name').' | Edit Penerima Manfaat Pensiunan')

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

        $("#select-kode-aktif").select2({width:"100%", placeholder: "- Pilih Peserta -", allowClear: true});
        $("#select-regencies").select2({width:"100%", placeholder: "Pilih Tempat", allowClear: true});
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Penerima Manfaat Pensiunan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/skpensiunan/transaksiskpensiun') }}">Daftar Penerima Manfaat Pensiunan</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Edit Penerima Manfaat Pensiunan</strong>
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
                    <h5>Edit Penerima Manfaat Pensiunan</h5>
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
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Peserta Aktif</label>
                            <div class="col-sm-10">
                                <select name="kode_aktif" id="select-kode-aktif">
                                    <option value=""></option>
                                    @foreach($kodeaktif as $aktif)
                                    <option value="{{ $aktif->kode_aktif }} - {{ $aktif->nama }}">{{ $aktif->kode_aktif }} - {{ $aktif->nama }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Penerima</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="penerima" value="{{ $data->penerima }}">
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Nomer KK / Tanggal</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="no_kk" value="{{ $data->no_kk }}">
                            </div>
                            <div class="col-lg-3 input-group date" id="data_1">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_kk" value="{{ $data->tgl_kk }}">
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Tempat / Tanggal Lahir</label>
                            <div class="col-sm-3">
                                <select name="tempat_lahir" id="select-regencies">
                                    <option value=""></option>
                                    @foreach($regencies as $regen)
                                    <option value="{{ $regen->name }}">{{ $regen->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat Tempat Tinggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat_tinggal" value="{{ $data->alamat_tinggal }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kota / Kode Pos Tempat Tinggal</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="kota_tinggal" value="{{ $data->kota_tinggal }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="pos_tinggal" value="{{ $data->pos_tinggal }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat Domisili</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat_domisili" value="{{ $data->alamat_domisili }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kota / Kode Pos / NIK Domisili</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="kota_domisili" value="{{ $data->kota_domisili }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="pos_domisili" value="{{ $data->pos_domisili }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="nik" value="{{ $data->nik }}">
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
