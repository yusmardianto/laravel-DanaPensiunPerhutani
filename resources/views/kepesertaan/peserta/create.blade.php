@extends('layouts.master')

@section('title', config('app.name').' | Tambah Peserta Aktif')

@section('stylesheets')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.numeric.min.js') }}"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
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

        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });


        $("#tel").numeric();
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah Peserta Aktif</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Kepesertaan
            </li>
            <li class="breadcrumb-item">Daftar Peserta Aktif
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah Peserta Aktif</strong>
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
                    <h5>Tambah Peserta Aktif</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/peserta') }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    @include('layouts.flashMessage')
                    <form method="post" action="{{ url()->current() }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode Aktif Peserta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_aktif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Peserta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomer KTP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_ktp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nip">
                            </div>
                        </div>
                        <div class="form-group row" id="data_1">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-lg-10 input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="birthdate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat Peserta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kota">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode Pos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pos">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="agama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis_kelamin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomer Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_telpon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="golongan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keterangan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <img id="image_preview_container" src="{{ asset('img/no_image.png') }}" alt="preview image" style="max-height: 150px;">
                                <input type="file" class="form-control" name="photo" id="image">
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