@extends('layouts.master')

@section('title', config('app.name').' | Tambah Pengguna Role')

@section('stylesheets')
<link href="{{ asset('css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script>

<script>
$('.chosen-select').chosen({width: "100%"});
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah Data Pengguna Role</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Konfigurasi
            </li>
            <li class="breadcrumb-item">Tipe pengguna
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah Data Pengguna Role</strong>
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
                    <h5>Tambah Data Pengguna Role</h5>
                    <div class="ibox-tools">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-xs modal-form">
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
                            <label class="col-sm-2 col-form-label">Tipe Pengguna</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{ $role->name }}" disabled>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Daftar Pengguna</label>
                            <div class="col-sm-10">
                                <select data-placeholder="- Pilih Nama Pengguna -" class="chosen-select" name="pengguna">
                                    <option value=""></option>
                                    @foreach ($users as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }} ({{$row->username }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
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
