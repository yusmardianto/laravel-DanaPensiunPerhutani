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

        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });



        $("#nilai_manfaat").numeric();

      //  $("#select-status").select2({width:"100%", placeholder: "Pilih Status", allowClear: true});
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah Rapel Manfaat Pensiunan </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/manfaatpensiunan/rapelextramanfaat') }}">Daftar Rapel Extra Manfaat Pensiunan </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah Rapel Manfaat Pensiunan</strong>
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
                    <h5>Tambah Rapel Manfaat Pensiunan</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/manfaatpensiunan/rapelextramanfaat') }}" class="btn btn-primary btn-xs modal-form">
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
                            <label class="col-sm-2 col-form-label">No Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_transaksi" value="{{ $data->no_transaksi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Peserta Aktif</label>
                            <div class="col-sm-10">
                                <select name="kode_aktif" id="select-peserta">
                                    <option value=""></option>
                                    @foreach($peserta as $pesertas)
                                    <option value="{{ $pesertas->kode_aktif }}" @if ($data ->kode_aktif == $pesertas->kode_aktif) selected="" @endif>{{ $pesertas->kode_aktif }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode Rapel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kd_rapel" value="{{ $data ->kd_rapel }}">
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Alasan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alasan" value="{{ $data ->alasan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit Pembayaran</label>
                            <div class="col-sm-10">
                                <select name="kode_unit" id="select-unit">
                                    <option value=""></option>
                                    @foreach($unit as $units)
                                    <option value="{{ $units->kode_unit }}" @if ($data ->kode_unit == $units->kode_unit) selected="" @endif>{{ $units->kode_unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nilai Manfaat Pensiunan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nilai_manfaat" value="{{ $data ->nilai_manfaat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tunjangan PPH</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tunjangan_pph" value="{{ $data ->tunjangan_pph }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Biaya Pensiun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="biaya_pensiun" value="{{ $data ->biaya_pensiun }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Penghasilan Kena Pajak</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="penghasilan_kenapajak" value="{{ $data ->penghaslan_kenapajak }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea id="" cols="30" rows="10" class="form-control" name="keterangan"> value="{{ $data ->keterangan }}"</textarea>
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
