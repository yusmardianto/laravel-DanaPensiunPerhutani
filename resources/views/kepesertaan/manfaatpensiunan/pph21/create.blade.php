@extends('layouts.master')

@section('title', config('app.name').' | Pph 21 Masa Sebelumnya Manfaat Pensiunan')

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

        $("#select-kodepensiun").select2({width:"100%", placeholder: "Pilih Kode Pensiun", allowClear: true});

    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah Pph 21 Masa Sebelumnya Manfaat Pensiunan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/manfaatpensiunan/pph21manfaat') }}">Daftar Pph 21 Sebelumnya Manfaat Pensiunan</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah PPH 21 Manfaat Pensiunan</strong>
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
                    <h5>Tambah Pph 21 Sebelumnya Manfaat Pensiunan</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/manfaatpensiunan/pph21manfaat') }}" class="btn btn-primary btn-xs modal-form">
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
                                    <label class="col-sm-2 col-form-label">Kode Pensiun / Nama</label>
                                    <div class="col-sm-6">
                                        <select name="kode_pensiun" id="select-kodepensiun">
                                            <option value=""></option>
                                            @foreach($peserta as $row)
                                            <option value="{{ $row->kode_aktif }} - {{ $row->nama }}">{{ $row->kode_aktif }} - {{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Perusahaan Lama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_perusahaan_lama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NPWP Perusahaan Lama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="npwp_perusahaan_lama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Penghasilan Netto</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="netto">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PPH 21 Sudah Dipotong</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pph21">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-6">
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
</div>
@endsection
