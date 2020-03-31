@extends('layouts.master')

@section('title', config('app.name').' | Daftar Pengguna')

@section('stylesheets')
<link href="{{ asset('css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/textSpinners/spinners.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#select-roles").chosen({
            width:"100%", placeholder_text_single: "- Pilih Tipe Pengguna -", allow_single_deselect : true
        });
    });
</script>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah Data Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Konfigurasi
            </li>
            <li class="breadcrumb-item">Daftar Pengguna
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah Data Pengguna</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title panel-primary">
                    <h5>Tambah Data Pengguna</h5>
                    <div class="ibox-tools">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-xs modal-form">
                            <i class="fa fa-arrow-circle-o-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form Input Data Pengguna
                        </div>
                    @include('layouts.flashMessage')
                    <div class="panel-body">
                        <form method="post" action="{{ url()->current() }}" enctype="multipart/form-data" id="form-user">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tipe Pengguna (Roles)</label>
                                        <div class="col-sm-9">
                                            <select id="select-roles" name="roles">
                                                <option value=""></option>
                                                @foreach ($roles as $row)
                                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="confirm-password">
                                        </div>
                                    </div>
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
</div>
@endsection
