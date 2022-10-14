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
                                <a href="{{ route('superadmin.datauser') }}"> Data Petugas</a>
                                </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.level') }}"><i class="bi bi-arrow-return-right"></i> Kategori Petugas</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.jadwal') }}"><i class="bi bi-arrow-return-right"></i> Jadwal Petugas</a>
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
                                <a href="{{ route('superadmin.datapasien') }}"> Data Pasien</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.kategoripasien') }}"><i class="bi bi-arrow-return-right"></i> Kategori Pasien</a>
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
                                <a href="{{ route('superadmin.jabatan') }}"> Jabatan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.divisi') }}"> Divisi</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.perusahaan') }}"> Perusahaan</a>
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
                                <a href="{{ route('superadmin.dataobat') }}"> Data Obat / Alkes</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.namaobat') }}"><i class="bi bi-arrow-return-right"></i> Nama O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.jenisobat') }}"><i class="bi bi-arrow-return-right"></i> Jenis O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.golonganobat') }}"><i class="bi bi-arrow-return-right"></i> Golongan O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.satuanobat') }}"><i class="bi bi-arrow-return-right"></i> Satuan O/A</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.bobotobat') }}"><i class="bi bi-arrow-return-right"></i> Bobot O/A</a>
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
                                <a href="{{ route('superadmin.pemeriksaannarkoba') }}"> Pemeriksaan Narkotika</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.pemeriksaancovid') }}"> Pemeriksaan Covid</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="#"><i class="bi bi-arrow-return-right"></i> Kebutuhan Pemeriksaan Antigen</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.pemantauancovid') }}"> Pemantauan Covid</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.hasilpemantauan') }}"><i class="bi bi-arrow-return-right"></i> Kode Hasil Pemantauan Covid</a>
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
                                <a href="{{ route('superadmin.rawatinapdokter') }}"> Pemeriksaan Rawat Inap Intruksi Dokter</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.rawatinapperawat') }}"> Pemeriksaan Rawat Inap Intervensi Keperawatan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.permintaanmakanan') }}"> Permintaan Makanan (Gizi)</a>
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
                                <a href="{{ route('superadmin.kecelakaankerja') }}"> Kecelakaan Kerja</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.lokasikejadian') }}"><i class="bi bi-arrow-return-right"></i> Lokasi Kejadian </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title"><strong>SURAT KETERANGAN</strong></li>
                    <li class="sidebar-item">
                        <a href="{{ route('superadmin.keteranganberobat') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Keterangan Berobat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('superadmin.izinberobat') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Izin Berobat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('superadmin.izinistirahat') }}" class='sidebar-link'>
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
                                <a href="{{ route('superadmin.suratrujukan') }}">Surat Rujukan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.rsrujukan') }}"><i class="bi bi-arrow-return-right"></i> Rumah Sakit Rujukan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('superadmin.spesialisrujukan') }}"><i class="bi bi-arrow-return-right"></i> Dokter Spesialis Rujukan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('superadmin.keterangansehat') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Keterangan Sehat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('superadmin.persetujuantindakanmedis') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Persetujuan Tindakan Medis</span>
                        </a>
                    </li>

                    <li class="sidebar-title"><strong>AKUN</strong></li>
                    <li class="sidebar-item">
                        <a href="" class='sidebar-link'>
                            <i class="bi bi-gear"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class='sidebar-link'>
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>