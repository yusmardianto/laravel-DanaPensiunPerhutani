<?php
$user = Auth::user();
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{asset('img/dapen-bulat.png') }}" width="50"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ $user->name }}</span>
                        <span class="text-muted text-xs block">{{ $user->getRoleNames()[0] ?? "" }}<b class="caret"></b></span>
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
                    <li @if(Request::segment(2) == 'skpensiunan') class="active" @endif>
                        <a href="{{ url('kepesertaan/skpensiunan') }}">SK Pensiunan</a>
                    </li>
                    <li @if(Request::segment(2) == 'iuranpensiunan') class="active" @endif>
                        <a href="{{ url('kepesertaan/iuranpensiunan') }}">Iuran Pensiunan</a>
                    </li>
                    <li @if(Request::segment(2) == 'manfaatpensiunan') class="active" @endif>
                        <a href="{{ url('kepesertaan/manfaatpensiunan') }}">Manfaat Pensiunan</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::segment(1) == 'investasi') class="active" @endif>
                <a href="#">
                    <i class="fa fa-line-chart fa-fw"></i>
                    <span class="nav-label">Investasi</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'datatransaksi') class="active" @endif>
                        <a href="{{ url('investasi/datatransaksi') }}">Data Transaksi</a>
                    </li>
                    <li @if(Request::segment(2) == 'laporan') class="active" @endif>
                        <a href="{{ url('investasi/laporantransaksi') }}">Laporan Transaksi</a>
                    </li>
                    <li @if(Request::segment(2) == 'statusorder') class="active" @endif>
                        <a href="{{ url('investasi/statusorder') }}">Status Order</a>
                    </li>
                    <li @if(Request::segment(2) == 'perubahanstatusorder') class="active" @endif>
                        <a href="{{ url('investasi/perubahanstatusorder') }}">Perubahan Status Order</a>
                    </li>
                    <li @if(Request::segment(2) == 'suratinstruksi') class="active" @endif>
                        <a href="{{ url('investasi/suratinstruksi') }}">Surat Instruksi</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::segment(1) == 'keuangan') class="active" @endif>
                <a href="#">
                    <i class="fa fa-money fa-fw"></i>
                    <span class="nav-label">Keuangan</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'pemasukan') class="active" @endif>
                        <a href="{{ url('keuangan/pemasukan') }}">Transaksi Pemasukan Kas</a>
                    </li>
                    <li @if(Request::segment(2) == 'pengeluaran') class="active" @endif>
                        <a href="{{ url('keuangan/pengeluaran') }}">Transaksi Pengeluaran Kas</a>
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
                    <li @if(Request::segment(2) == 'role') class="active" @endif>
                        <a href="{{ url('config/role') }}">Tipe Pengguna</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
