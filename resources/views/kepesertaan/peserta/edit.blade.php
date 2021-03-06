@extends('layouts.master')

@section('title', config('app.name').' | Ubah Peserta Aktif')

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
        $('#birthdate .input-group.date').datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            endDate: new Date()
        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            endDate: new Date(),
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#data_2 .input-group.date').datepicker('setStartDate', minDate);
        });

        $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            endDate: new Date()
        });

        $('#data_3 .input-group.date').datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            endDate: new Date()
        });

        $("#tel").numeric();
        $("#kode-pos").numeric();

        $("#select-golongan").on('change', function(){
            if (($(this).val() !== null) && ($(this).val() !== "") && ($(this).val() !== undefined) && ($(this).val().length !== 0)) {
                $.ajax({
                    url: "{{ url('kepesertaan/peserta-aktif/ajax-byGolongan') }}" + "/" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        $("#golongan_gaji").val(data.html);
                    }
                }).fail(function() {
                    $("#golongan_gaji").val();
                });
            }
        });

        $("#select-status").on('change', function(){
            if (($(this).val() !== null) && ($(this).val() !== "") && ($(this).val() !== undefined) && ($(this).val().length !== 0)) {
                $.ajax({
                    url: "{{ url('kepesertaan/peserta-aktif/ajax-byStatus') }}" + "/" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        $("#status_gaji").val(data.html);
                    }
                }).fail(function() {
                    $("#status_gaji").val(data.html);
                });
            }
        });

        $("#select-regencies").select2({width:"100%", placeholder: "Pilih Tempat", allowClear: true});
        $("#select-jeniskelamin").select2({width:"100%", placeholder: "Jenis Kelamin", allowClear: true});
        $("#select-agama").select2({width:"100%", placeholder: "Pilih Agama", allowClear: true});
        $("#select-tanggungan").select2({width:"100%", placeholder: "Pilih Tanggungan", allowClear: true});
        $("#select-aktif").select2({width:"100%", placeholder: "Status Aktif", allowClear: true});
        $("#select-status").select2({width:"100%", placeholder: "Pilih Status", allowClear: true});
        $("#select-golongan").select2({width:"100%", placeholder: "Pilih Golongan", allowClear: true});
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ubah Peserta Aktif</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/peserta-aktif') }}">Daftar Peserta Aktif</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Ubah Peserta Aktif</strong>
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
                    <h5>Ubah Peserta Aktif</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/peserta-aktif') }}" class="btn btn-primary btn-xs modal-form">
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
                            <label class="col-sm-2 col-form-label">Kode Aktif Peserta</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="kode_aktif" value="{{ $data->kode_aktif }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Peserta</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nip" value="{{ $data->nip }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit Kerja</label>
                            <div class="col-sm-6">
                                <select name="tanggungan" id="select-tanggungan">
                                    <option value=""></option>
                                    @foreach($unit_kerja as $kerjas)
                                    <option value="{{ $kerjas->kd_unit }}" @if($data->unit_kerja == $kerjas->kd_unit) selected="" @endif>{{ $kerjas->kd_unit }} - {{ $kerjas->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="birthdate">
                            <label class="col-sm-2 col-form-label">Tempat / Tanggal Lahir</label>
                            <div class="col-sm-3">
                                <select name="tempat_lahir" id="select-regencies">
                                    <option value=""></option>
                                    @foreach($regencies as $regen)
                                    <option value="{{ $regen->id }}" @if($data->tempat_lahir == $regen->id) selected="" @endif>{{ $regen->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="birthdate" value="{{ $data->birthdate }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <select name="jenis_kelamin" id="select-jeniskelamin">
                                    <option value=""></option>
                                    @foreach($gender as $gen)
                                    <option value="{{ $gen->kode }}" @if($data->jenis_kelamin == $gen->kode) selected="" @endif>{{ $gen->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-6">
                                <select name="agama" id="select-agama">
                                    <option value=""></option>
                                    @foreach($religion as $rel)
                                    <option value="{{ $rel->id }}" @if($data->agama == $rel->id) selected="" @endif>{{ $rel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggungan</label>
                            <div class="col-sm-6">
                                <select name="tanggungan" id="select-tanggungan">
                                    <option value=""></option>
                                    @foreach($tanggungan as $row)
                                    <option value="{{ $row->name }}" @if($data->tanggungan == $row->name) selected="" @endif>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Tanggal Jadi Pegawai</label>
                            <div class="col-lg-6 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_jadi_pegawai" value="{{ $data->tgl_jadi_pegawai }}">
                            </div>
                        </div>
                        <div class="form-group row" id="data_2">
                            <label class="col-sm-2 col-form-label">Tanggal Jadi Peserta</label>
                            <div class="col-lg-6 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_jadi_peserta" value="{{ $data->tgl_jadi_peserta }}">
                            </div>
                        </div>
                        <div class="form-group row" id="data_3">
                            <label class="col-sm-2 col-form-label">MK Luar</label>
                            <div class="col-lg-6 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="mk_peserta" value="{{ $data->mk_peserta }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Golongan</label>
                            <div class="col-sm-3">
                                <select name="golongan" id="select-golongan">
                                    <option value=""></option>
                                    @foreach($golongan as $gol)
                                    <option value="{{ $gol->id }}" @if($data->golongan == $gol->id) selected="" @endif>{{ $gol->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="golongan_gaji" id="golongan_gaji" placeholder="Gaji Pokok" readonly style="text-align:right;" value="{{ $data->golongan_gaji }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-3">
                                <select name="status" id="select-status">
                                    <option value=""></option>
                                    @foreach($status as $stat)
                                    <option value="{{ $stat->id }}" @if($data->status == $stat->id) selected="" @endif>{{ $stat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="status_gaji" id="status_gaji" placeholder="Gaji Pokok" readonly style="text-align:right;" value="{{ $data->status_gaji }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pangkat</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="pangkat" value="{{ $data->pangkat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <textarea id="" cols="30" rows="10" class="form-control" name="keterangan">{{ $data->keterangan }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status Aktif</label>
                            <div class="col-sm-6">
                                <select name="is_active" id="select-aktif">
                                    <option value=""></option>
                                    <option value="1" @if($data->is_active == 1) selected="" @endif>Aktif</option>
                                    <option value="2" @if($data->is_active == 0) selected="" @endif>Nonaktif</option>
                                </select>
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
