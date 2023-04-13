<?php
// session_start();
// $timeout = 60; // setting timeout dalam menit
// $logout = "/logout"; // redirect halaman logout

// $timeout = $timeout * 60; // menit ke detik
// if (isset($_SESSION['start_session'])) {
//     $elapsed_time = time() - $_SESSION['start_session'];
//     if ($elapsed_time >= $timeout) {
//         session_destroy();
//         echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
//     }
// }

// $_SESSION['start_session'] = time();

?>
<style>
    .sidebar-wrapper .menu .sidebar-link {
        font-size: .85rem;
    }
</style>

<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active" style="width: 350px;">
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
                    <li class="sidebar-title"><strong>MENU UTAMA</strong></li>
                    <li class="sidebar-item @yield('dashboard')">
                        <a href="/dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Halaman Utama</span>
                        </a>
                    </li>

                    <li class="sidebar-title"><strong>MASTER DATA</strong></li>
                    <li class="sidebar-item  @yield('side') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                            <span>MD Petugas</span>
                        </a>
                        <ul class="submenu  @yield('data')">
                            <li class="submenu-item @yield('user')">
                                <a href="{{ route('superadmin.datauser') }}"> Data Petugas</a>
                                </a>
                            </li>
                            <li class="submenu-item @yield('level')">
                                <a href="{{ route('superadmin.level') }}"><i class="bi bi-arrow-return-right"></i> Level Petugas</a>
                            </li>
                            {{-- <li class="submenu-item @yield('jadwal')">
                                <a href="{{ route('superadmin.jadwal') }}"><i class="bi bi-arrow-return-right"></i> Jadwal Petugas</a>
                            </li> --}}
                            <li class="submenu-item @yield('mitra')">
                                <a href="{{ route('superadmin.mitrakerja') }}"> Data Mitra Kerja</a>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "perawat")
                    <li class="sidebar-item @yield('kate')  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>MD Pasien</span>
                        </a>
                        <ul class="submenu @yield('da')">
                            <li class="submenu-item @yield('pasien')">
                                <a href="{{ route('superadmin.datapasien') }}"> Data Pasien</a>
                            </li>
                            <li class="submenu-item @yield('gori')">
                                <a href="{{ route('superadmin.kategoripasien') }}"><i class="bi bi-arrow-return-right"></i> Kategori Pasien</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    <li class="sidebar-item @yield('organisasi') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-diagram-3-fill"></i>
                            <span>MD Organisasi</span>
                        </a>
                        <ul class="submenu @yield('organ')">
                            <li class="submenu-item @yield('jabatan')">
                                <a href="{{ route('superadmin.jabatan') }}"> Jabatan</a>
                            </li>
                            <li class="submenu-item @yield('divisi')">
                                <a href="{{ route('superadmin.divisi') }}"> Divisi</a>
                            </li>
                            <li class="submenu-item @yield('perusahaan')">
                                <a href="{{ route('superadmin.perusahaan') }}"> Perusahaan</a>
                            </li>
                        </ul>
                    </li>

                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "apoteker")
                    <li class="sidebar-item @yield('obalkes') has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                              </svg>
                            <span>MD Obat, Produk Kesehatan & Alat/Bahan Kesehatan</span>
                        </a>
                        <ul class="submenu @yield('obat')">
                            <li class="submenu-item @yield('alkes')">
                                <a href="{{ route('obat.dataobats') }}"> Data Obat</a>
                            </li>
                            <li class="submenu-item @yield('nama')">
                                <a href="{{ route('superadmin.namaobat') }}"><i class="bi bi-arrow-return-right"></i> Nama Obat</a>
                            </li>
                            <li class="submenu-item @yield('golongan')">
                                <a href="{{ route('superadmin.golonganobat') }}"><i class="bi bi-arrow-return-right"></i> Golongan Obat</a>
                            </li>
                            <li class="submenu-item @yield('satuan')">
                                <a href="{{ route('superadmin.satuanobat') }}"><i class="bi bi-arrow-return-right"></i> Satuan </a>
                            </li>
                            <li class="submenu-item @yield('bobot')">
                                <a href="{{ route('superadmin.bobotobat') }}"><i class="bi bi-arrow-return-right"></i> Bobot </a>
                            </li>
                            <li class="submenu-item @yield('produk')">
                                <a href="{{ route('obat.dataproduk') }}"> Data Produk Kesehatan</a>
                            </li>
                            <li class="submenu-item @yield('al')">
                                <a href="{{ route('obat.dataalkes') }}"> Data Alat/Bahan Kesehatan</a>
                            </li>
                            <li class="submenu-item @yield('namkes')">
                                <a href="{{ route('obat.namaalkes') }}"><i class="bi bi-arrow-return-right"></i> Nama Alat/Bahan Kesehatan</a>
                            </li>
                            <li class="submenu-item @yield('golkes')">
                                <a href="{{ route('obat.golonganalkes') }}"><i class="bi bi-arrow-return-right"></i> Golongan Alat/Bahan Kesehatan</a>
                            </li>
                            
                        </ul>
                    </li>
                    @endif

                    <li class="sidebar-item @yield('md') has-sub">
                        <a href="#" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart-fill" viewBox="0 0 16 16">
                                <path d="M6.5 13a6.474 6.474 0 0 0 3.845-1.258h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.008 1.008 0 0 0-.115-.1A6.471 6.471 0 0 0 13 6.5 6.502 6.502 0 0 0 6.5 0a6.5 6.5 0 1 0 0 13Zm0-8.518c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                              </svg>
                            <span>MD Pemeriksaan</span>
                        </a>
                        <ul class="submenu @yield('periksa')">
                            <li class="submenu-item @yield('anti')">
                                <a href="{{ route('superadmin.pemeriksaanantigen') }}"> Kebutuhan Pemeriksaan Antigen</a>
                            </li>
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")
                            <li class="submenu-item @yield('cov')">
                                <a href="{{ route('superadmin.hasilpemantauan') }}"> Kode Hasil Pemantauan Covid</a>
                            </li>
                            @endif
                            <li class="submenu-item @yield('klas')">
                                <a href="{{ route('superadmin.klasifikasipenyakit') }}"> Klasifikasi Penyakit</a>
                            </li>
                            <li class="submenu-item @yield('sub')">
                                <a href="{{ route('superadmin.subklasifikasi') }}">Sub Klasifikasi Penyakit</a>
                            </li>
                            <li class="submenu-item @yield('dia')">
                                <a href="{{ route('superadmin.namapenyakit') }}"> Diagnosa</a>
                            </li>
                            <li class="submenu-item @yield('lok')">
                                <a href="{{ route('superadmin.lokasikejadian') }}"> Lokasi Kejadian</a>
                            </li>
                            <li class="submenu-item @yield('rs')">
                                <a href="{{ route('superadmin.rsrujukan') }}"> Rumah Sakit Rujukan</a>
                            </li>
                            <li class="submenu-item @yield('spes')">
                                <a href="{{ route('superadmin.spesialisrujukan') }}"> Dokter Spesialis Rujukan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title"><strong>PEMERIKSAAN</strong></li>

                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item @yield('rekam')  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-journal-text"></i>
                            <span>Rekam Medis</span>
                        </a>
                        <ul class="submenu @yield('rawat')">
                            <li class="submenu-item @yield('medis')">
                                <a href="{{ route('rekammedis.datarekammedis') }}">Rekam Medis</a>
                            </li>
                            <li class="submenu-item @yield('jalan')">
                                <a href="{{ route('rawatjalan.daftarrawatjalan') }}">Daftar Pasien Rawat Jalan</a>
                            </li>
                            <li class="submenu-item @yield('inap')">
                                <a href="{{ route('superadmin.daftarrawatinap') }}">Daftar Pasien Rawat Inap</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    {{-- <li class="sidebar-item @yield('rawat') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Rawat Inap</span>
                        </a>
                        <ul class="submenu @yield('inap')">
                            <li class="submenu-item @yield('daftar')">
                                <a href=""> Daftar Pasien Rawat Inap</a>
                            </li>
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <li class="submenu-item @yield('dokter')">
                                <a href="{{ route('superadmin.rawatinapdokter') }}"> Pemeriksaan Rawat Inap Intruksi Dokter</a>
                            </li>
                            @endif
                            @if(Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin" )
                            <li class="submenu-item @yield('perawat')">
                                <a href="{{ route('superadmin.rawatinapperawat') }}"> Pemeriksaan Rawat Inap Intervensi Keperawatan</a>
                            </li>
                            @endif
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <li class="submenu-item @yield('makanan')">
                                <a href="{{ route('makanan.datapermintaanmakanan') }}"> Permintaan Makanan (Gizi)</a>
                            </li>
                            @endif
                            <li class="submenu-item @yield('tanda')">
                                <a href="{{ route('superadmin.pemantauantandavital') }}">Pemantauan Tanda Vital</a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="sidebar-item @yield('pemeriksaan') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-ui-checks"></i>
                            <span>Screening</span>
                        </a>
                        <ul class="submenu @yield('screen')">
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")
                            <li class="submenu-item @yield('narko')">
                                <a href="{{ route('pemeriksaan.datapemeriksaannarkoba') }}"> Pemeriksaan Narkotika</a>
                            </li>
                            @endif
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")
                            <li class="submenu-item @yield('covid')">
                                <a href="{{ route('pemeriksaan.datapemeriksaancovid') }}"> Pemeriksaan Covid</a>
                            </li>
                            @endif
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <li class="submenu-item @yield('pemantauan')">
                                <a href="{{ route('superadmin.datapemantauancovid') }}"> Pemantauan Covid</a>
                            </li>
                            @endif
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <li class="submenu-item @yield('tandavital')">
                                <a href="{{ route('superadmin.datapemantauantandavital') }}"> Pemantauan Tanda Vital</a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    {{-- <li class="sidebar-item @yield('medical') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MCU</span>
                        </a>
                        <ul class="submenu @yield('cek')">
                            <li class="submenu-item @yield('hasil')">
                                <a href="{{ route('superadmin.keteranganpemeriksaan') }}"> Hasil Pemeriksaan Berkala, Khusus dan Akhir</a>
                            </li>
                            <li class="submenu-item @yield('awal')">
                                <a href="{{ route('superadmin.pengesahanhasil') }}"> Hasil Pemeriksaan Kesehatan Awal</a>
                            </li>
                        </ul>
                    </li>

                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item   @yield('kecelakaan')">
                        <a href="{{ route('superadmin.kecelakaankerja') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Kecelakaan Kerja</span>
                        </a>
                        @endif
                    </li> --}}

                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-title"><strong>SURAT KETERANGAN</strong></li>
                    <li class="sidebar-item @yield('berobat')">
                        <a href="{{ route('superadmin.dataketeranganberobat') }}" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                                <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                                <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/>
                            </svg>
                            <span>Keterangan Berobat</span>
                        </a>
                        
                    </li>
                    @endif
                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item  @yield('izinberobat')">
                        <a href="{{ route('superadmin.dataizinberobat') }}" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/>
</svg>
                            <span>Izin Berobat</span>
                        </a>
                    </li>
                    <li class="sidebar-item @yield('izinistirahat')">
                        <a href="{{ route('istirahat.dataizinistirahat') }}" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/>
</svg>
                            <span>Izin Istirahat</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item  @yield('suratrujukan')">
                        <a href="{{ route('superadmin.datasuratrujukan') }}" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/>
</svg>
                            <span>Rujukan</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")
                    <li class="sidebar-item @yield('keterangansehat')">
                        <a href="{{ route('superadmin.dataketerangansehat') }}" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/>
</svg>
                            <span>Keterangan Sehat</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")
                    <li class="sidebar-item @yield('persetujuanmedis')">
                        <a href="{{ route('superadmin.datatindakanmedis') }}" class='sidebar-link'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/>
</svg>
                            <span>Persetujuan Tindakan Medis</span>
                        </a>
                    </li>
                    @endif

                    <li class="sidebar-title"><strong>AKUN</strong></li>
                    <li class="sidebar-item">
                        <a href="/ubah/password/{{ Auth::user()->id }}" class='sidebar-link'>
                            <i class="bi bi-gear"></i>
                            <span>Ubah Kata Sandi</span>
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