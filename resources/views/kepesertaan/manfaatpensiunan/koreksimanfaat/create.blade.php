@extends('layouts.master')

@section('title', config('app.name').' | Koreksi Manfaat Pensiunan')

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
    });

    $("#select-a").select2({width:"100%", placeholder: "Pilih ", allowClear: true});
    $("#select-b").select2({width:"100%", placeholder: "Pilih ", allowClear: true});
    $("#select-c").select2({width:"100%", placeholder: "Pilih ", allowClear: true});
    $("#select-d").select2({width:"100%", placeholder: "Pilih ", allowClear: true});




</script>
@endsection


@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tambah Koreksi Manfaat Pensiunan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Kepesertaan</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('home') }}">Manfaat Pensiunan</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('kepesertaan/manfaatpensiunan/koreksimanfaat') }}">Tambah Transaksi</a>
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
                    <h5>Tambah Data Koreksi Pembayaran Pensiunan</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('kepesertaan/manfaatpensiunan/koreksimanfaat') }}" class="btn btn-primary btn-xs modal-form">
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
                                    <label class="col-sm-2 col-form-label">Kode Pensiun</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="kd_pensiun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Penerima</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="penerima">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Transaksi</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control"  name="no_trx"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">Tanggal Pensiun</label>
                                    <div class="col-lg-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_pensiun">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Lama</label>
                                    <div class="col-lg-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_pensiun_lama" style="text-align: right">
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">Tanggal MP Dibayar</label>
                                    <div class="col-lg-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_mp_dibayar">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Turunan</label>
                                    <div class="col-lg-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tgl_mp_turunan" style="text-align: right">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Unit Usaha</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="kd_unit_usaha">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alasan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="alasan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Pensiun</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="jenis_pensiun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gaji Pokok</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="gaji_pokok">
                                    </div>
                                </div>

                                <div class="ibox-title">
                                    <h4>Tambah Data Pembayaran Manfaat Pensiunan</h4>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Penerima</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nama_penerima">
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">Tempat</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-lg-3 input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="" style="text-align: right">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat 1</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat 2</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">Kota</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Kode Pos</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Telepon/Fax</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NPWP</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit Pembayaran</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Rekening</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Atas nama/lain</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan (bebas)</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>

                                <div class="ibox-title">
                                    <h4>Perhitungan Manfaat Pensiunan dan PPH21</h4>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">???</label>
                                    <div class="col-sm-3">
                                        <select name="kd_voucher" id="select-a">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="kd_voucher" id="select-b">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">???</label>
                                    <div class="col-sm-3">
                                        <select name="kd_voucher" id="select-c">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="kd_voucher" id="select-d">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">MP Bulanan U/M 20% Sekaligus</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tambahan/Potongan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">???</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <label class="col-sm-1 col-form-label">???</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row" id="data_1">
                                    <label class="col-sm-2 col-form-label">???</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                    <label class="col-sm-1 col-form-label">???</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Netto (setahun / disetahunkan)</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PTKP (setahun / disetahunkan)</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PKP (setahun / disetahunkan)</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PPH 21 (tahun/bulan)</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PPH 21 Koreksi</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Denda non NPWP</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tambahan / Potongan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Manfaat Pensiun dibayar</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="">
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
