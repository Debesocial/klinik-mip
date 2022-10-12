<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo flex-column gap-4 mb-6 align-items-center justify-content-center">
                        <a href=""><img src="{{asset('assets/images/logo/logo-klinik.JPG')}}" alt="" style="width: 150px; height: 50px;"></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title"><strong>MAIN MENU</strong></li>
                    <li class="sidebar-item active ">
                        <a href="/dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-title"><strong>MASTER DATA</strong></li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MD User</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Data Petugas</a>
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Kategori Petugas</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Jadwal Petugas</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Data Mitra Kerja</a>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MD Pasien</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Data Pasien</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Kategori Pasien</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MD Organisasi</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Jabatan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Divisi</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Perusahaan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MD Obat & Alkes</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Data Obat / Alkes</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Nama O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Jenis O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Golongan O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Satuan O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Bobot O/A</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title"><strong>PEMERIKSAAN</strong></li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Screening</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Pemeriksaan Narkotika</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Pemeriksaan Covid</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Kebutuhan Pemeriksaan Antigen</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Pemantauan Covid</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Kode Hasil Pemantauan Covid</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Rekam Medis</span>
                        </a>

                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Rekam Medis</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Klasifikasi Penyakit</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Sub Klasifikasi Penyakit</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Diagnosa</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Rawat Inap</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Daftar Pasien Rawat Inap</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Pemeriksaan Rawat Inap Intruksi Dokter</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Pemeriksaan Rawat Inap Intervensi Keperawatan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Permintaan Makanan (Gizi)</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MCU</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Hasil Pemeriksaan Berkala, Khusus dan Akhir</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"> Hasil Pemeriksaan Kesehatan Awal</a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Kecelakaan Kerja</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#"> Kecelakaan Kerja</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Lokasi Kejadian </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title"><strong>SURAT KETERANGAN</strong></li>
                    <li class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Keterangan Berobat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Izin Berobat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Izin Istirahat</span>
                        </a>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Rujukan</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="#">Surat Rujukan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Rumah Sakit Rujukan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Dokter Spesialis Rujukan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Keterangan Sehat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Persetujuan Tindakan Medis</span>
                        </a>
                    </li>

                    <li class="sidebar-title"><strong>AKUN</strong></li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class='sidebar-link'>
                            <i class="bi bi-gear"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>