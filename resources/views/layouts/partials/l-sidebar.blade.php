<?php
$user = Auth::user();
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{asset('img/profile_small.jpg') }}" width="48"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ $user->name }}</span>
                        <span class="text-muted text-xs block">{{ $user->email }} <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item logout-btn" href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    siDAPEN
                </div>
            </li>
            <li class="landing_link">
                <a href="{{ url('home') }}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">Home</span>
                </a>
            </li>
            <li @if(Request::segment(1) == 'master') class="active" @endif>
                <a href="#">
                    <i class="fa fa-database fa-fw"></i>
                    <span class="nav-label">Master Data</span>
                    <span class="fa arrow"></span>
                </a>
            </li>
            <li @if(Request::segment(1) == 'kepesertaan') class="active" @endif>
                <a href="#">
                    <i class="fa fa-users fa-fw"></i>
                    <span class="nav-label">Kepesertaan</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'peserta') class="active" @endif>
                        <a href="{{ url('kepesertaan/peserta') }}">Daftar Peserta Aktif</a>
                    </li>
                    <li @if(Request::segment(2) == 'skpensiun') class="active" @endif>
                        <a href="{{ url('kepesertaan/skpensiun') }}">SK Pensiunan</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::segment(1) == 'investasi') class="active" @endif>
                <a href="#">
                    <i class="fa fa-line-chart fa-fw"></i>
                    <span class="nav-label">Investasi</span>
                    <span class="fa arrow"></span>
                </a>
            </li>
            <li @if(Request::segment(1) == 'keuangan') class="active" @endif>
                <a href="#">
                    <i class="fa fa-money fa-fw"></i>
                    <span class="nav-label">Keuangan</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'pengeluaran') class="active" @endif>
                        <a href="{{ url('keuangan/pengeluaran') }}">Transaksi Pengeluaran Kas</a>
                    </li>
                    <li @if(Request::segment(2) == 'pemasukan') class="active" @endif>
                        <a href="{{ url('keuangan/pemasukan') }}">Transaksi Pemasukan Kas</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::segment(1) == 'config') class="active" @endif>
                <a href="#">
                    <i class="fa fa-cogs fa-fw"></i>
                    <span class="nav-label">Konfigurasi</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'user') class="active" @endif>
                        <a href="{{ url('config/user') }}">Daftar Pengguna</a>
                    </li>
                    <li @if(Request::segment(2) == 'laporan') class="active" @endif>
                        <a href="{{ url('config/laporan') }}">Laporan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
