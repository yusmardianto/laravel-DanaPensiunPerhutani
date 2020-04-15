@extends('layouts.master')

@section('title', config('app.name').' | Tambah Peserta Aktif')

@section('stylesheets')
<link href="{{ asset('css/plugins/dualListbox/bootstrap-duallistbox.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/dualListbox/jquery.bootstrap-duallistbox.js') }}"></script>

<script>
$('.dual_select').bootstrapDualListbox({
    selectorMinimalHeight: 400
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
                            <label class="col-sm-2 col-form-label">Nama Peserta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomer KTP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ktp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nip">
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
                                <select class="form-control-sm form-control input-s-sm inline">
                                    <option value="0">- Pilih Agama Peserta -</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Kristen</option>
                                    <option value="3">Protestan</option>
                                    <option value="4">Hindu</option>
                                    <option value="5">Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control-sm form-control input-s-sm inline">
                                    <option value="0">- Pilih Jenis Kelamin Peserta -</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomer Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telpon">
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
