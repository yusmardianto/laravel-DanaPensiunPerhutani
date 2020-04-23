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
                        <li><a class="dropdown-item" href="{{ url('user/profile') }}">Profil</a></li>
                        <li><a class="dropdown-item" href="{{ url('user/resetpassword') }}">Ubah Password</a></li>
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

            @if($user->hasAnyPermission(['Role-list', 'User-list', 'Master-list', 'Kepesertaan-list']))
            <li @if(Request::segment(1) == 'masters') class="active" @endif>
                <a href="#">
                    <i class="fa fa-database fa-fw"></i>
                    <span class="nav-label">Master Data</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'karyawan') class="active" @endif>
                        <a href="{{ url('masters/karyawan') }}">Master Karyawan</a>
                    </li>
                    <li @if(Request::segment(2) == 'peserta') class="active" @endif>
                        <a href="{{ url('masters/peserta') }}">Master Peserta</a>
                    </li>
                    <li @if(Request::segment(2) == 'status') class="active" @endif>
                        <a href="{{ url('masters/status') }}">Master Status</a>
                    </li>
                    <li @if(Request::segment(2) == 'bank') class="active" @endif>
                        <a href="{{ url('masters/bank') }}">Master Bank</a>
                    </li>
                    <li @if(Request::segment(2) == 'golongan') class="active" @endif>
                        <a href="{{ url('masters/golongan') }}">Master Golongan</a>
                    </li>
                    <li @if(Request::segment(2) == 'voucher') class="active" @endif>
                        <a href="{{ url('masters/voucher') }}">Master Voucher</a>
                    </li>
                    <li @if(Request::segment(2) == 'unit-kerja') class="active" @endif>
                        <a href="{{ url('masters/unit-kerja') }}">Master Unit Kerja</a>
                    </li>
                    <li @if(Request::segment(2) == 'pejabat-kerja') class="active" @endif>
                        <a href="{{ url('masters/pejabat-kerja') }}">Master Pejabat Kerja</a>
                    </li>
                    <li @if(Request::segment(2) == 'periode') class="active" @endif>
                        <a href="{{ url('masters/periode') }}">Master Periode</a>
                    </li>
                    <li @if(Request::segment(2) == 'group-pembayaran') class="active" @endif>
                        <a href="{{ url('masters/group-pembayaran') }}">Master Group Pembayaran</a>
                    </li>
                    <li @if(Request::segment(2) == 'group-pembayaran') class="active" @endif>
                        <a href="{{ url('masters/unit-pembayaran') }}">Master Unit Pembayaran</a>
                    </li>
                    <li @if(Request::segment(2) == 'alasan') class="active" @endif>
                        <a href="{{ url('masters/alasan') }}">Master Alasan</a>
                    </li>
                </ul>
            </li>
            @endif

            @if($user->hasAnyPermission(['Role-list', 'User-list', 'Master-list', 'Kepesertaan-list']))
            <li @if(Request::segment(1) == 'kepesertaan') class="active" @endif>
                <a href="#">
                    <i class="fa fa-users fa-fw"></i>
                    <span class="nav-label">Kepesertaan</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'peserta-aktif') class="active" @endif>
                        <a href="{{ url('kepesertaan/peserta-aktif') }}">Daftar Peserta Aktif</a>
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
            @endif

            @if($user->hasAnyPermission(['Role-list', 'User-list', 'Master-list', 'Pengembangan dan Investasi-list']))
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
            @endif

            @if($user->hasAnyPermission(['Role-list', 'User-list', 'Master-list', 'Keuangan-list']))
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
            @endif

            @if($user->hasAnyPermission(['Role-list', 'User-list']))
            <li @if(Request::segment(1) == 'config') class="active" @endif>
                <a href="#">
                    <i class="fa fa-cogs fa-fw"></i>
                    <span class="nav-label">Konfigurasi</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'module') class="active" @endif>
                        <a href="{{ url('config/module') }}">Module</a>
                    </li>
                    <li @if(Request::segment(2) == 'role') class="active" @endif>
                        <a href="{{ url('config/role') }}">Tipe Pengguna</a>
                    </li>
                    <li @if(Request::segment(2) == 'user') class="active" @endif>
                        <a href="{{ url('config/user') }}">Daftar Pengguna</a>
                    </li>
                </ul>
            </li>
            @endif

            <li @if(Request::segment(1) == 'report') class="active" @endif>
                <a href="#">
                    <i class="fa fa-print"></i> <span class="nav-label">Laporan</span> <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::segment(2) == 'lap-kepesertaan') class="active" @endif>
                        <a href="{{ url('report/kepesertaan') }}">Laporan Kepesertaan</a>
                    </li>
                    <li @if(Request::segment(2) == 'lap-investasi') class="active" @endif>
                        <a href="{{ url('report/investasi') }}">Laporan Transaksi Investasi</a>
                    </li>
                    <li @if(Request::segment(2) == 'lap-keuangan') class="active" @endif>
                        <a href="{{ url('report/keuangan') }}">Laporan Keuangan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
