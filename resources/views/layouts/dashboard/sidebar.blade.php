<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                <div class="logo d-flex flex-column gap-4 mb-6 align-items-center justify-content-center">
                        <a href=""><img src="{{asset('assets/images/logo/logo_klinik.png')}}" alt="" style="width: 195px; height: 85px;"></a>
                        <strong style="font-size: 25px; border-bottom: 3px;" class="text-center">KLINIK MIP</strong>
                </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title"><strong>MENU</strong></li>

                    <li class="sidebar-item active ">
                        <a href="/dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('perawat.daftar') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Pendaftaran Pasien</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.dataobat') }}">Obat</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.datapasien') }}">Pasien</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.datauser') }}">Petugas</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.lokasikejadian') }}">Lokasi Kejadian</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.rsrujukan') }}">Rumah Sakit Rujukan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.spesialisrujukan') }}">Dokter Spesialis</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.hasilpemantauan') }}">Hasil Pemantauan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>LogOut</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>