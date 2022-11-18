<?php
	session_start();
	$timeout = 60; // setting timeout dalam menit
	$logout = "/logout"; // redirect halaman logout

	$timeout = $timeout * 60; // menit ke detik
	if(isset($_SESSION['start_session'])){
		$elapsed_time = time()-$_SESSION['start_session'];
		if($elapsed_time >= $timeout){
			session_destroy();
			echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
		}
	}

	$_SESSION['start_session']=time();

?>

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
                    <li class="sidebar-title"><strong>MAIN MENU</strong></li>
                    <li class="sidebar-item @yield('dashboard')">
                        <a href="/dashboard" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-title"><strong>MASTER DATA</strong></li>
                    <li class="sidebar-item  @yield('side') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MD User</span>
                        </a>
                        <ul class="submenu  @yield('data')">
                            <li class="submenu-item @yield('user')">
                                <a href="{{ route('superadmin.datauser') }}"> Data Petugas</a>
                                </a>
                            </li>
                            <li class="submenu-item @yield('level')">
                                <a href="{{ route('superadmin.level') }}"><i class="bi bi-arrow-return-right"></i> Kategori Petugas</a>
                            </li>
                            <li class="submenu-item @yield('jadwal')">
                                <a href="{{ route('superadmin.jadwal') }}"><i class="bi bi-arrow-return-right"></i> Jadwal Petugas</a>
                            </li>
                            <li class="submenu-item @yield('mitra')">
                                <a href="{{ route('superadmin.mitrakerja') }}"> Data Mitra Kerja</a>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item @yield('kate')  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
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

                    <li class="sidebar-item @yield('organisasi') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
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

                    <li class="sidebar-item @yield('obalkes') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MD Obat & Alkes</span>
                        </a>
                        <ul class="submenu @yield('obat')">
                            <li class="submenu-item @yield('alkes')">
                                <a href="{{ route('superadmin.dataobat') }}"> Data Obat / Alkes</a>
                            </li>
                            <li class="submenu-item @yield('nama')">
                                <a href="{{ route('superadmin.namaobat') }}"><i class="bi bi-arrow-return-right"></i> Nama O/A</a>
                            </li>
                            <li class="submenu-item @yield('jenis')">
                                <a href="{{ route('superadmin.jenisobat') }}"><i class="bi bi-arrow-return-right"></i> Jenis O/A</a>
                            </li>
                            <li class="submenu-item @yield('golongan')">
                                <a href="{{ route('superadmin.golonganobat') }}"><i class="bi bi-arrow-return-right"></i> Golongan O/A</a>
                            </li>
                            <li class="submenu-item @yield('satuan')">
                                <a href="{{ route('superadmin.satuanobat') }}"><i class="bi bi-arrow-return-right"></i> Satuan O/A</a>
                            </li>
                            <li class="submenu-item @yield('bobot')">
                                <a href="{{ route('superadmin.bobotobat') }}"><i class="bi bi-arrow-return-right"></i> Bobot O/A</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item @yield('md') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>MD Pemeriksaan</span>
                        </a>
                        <ul class="submenu @yield('periksa')">
                            <li class="submenu-item @yield('anti')">
                                <a href="{{ route('superadmin.pemeriksaanantigen') }}"> Kebutuhan Pemeriksaan Antigen</a>
                            </li>
                            <li class="submenu-item @yield('cov')">
                                <a href="{{ route('superadmin.hasilpemantauan') }}">  Kode Hasil Pemantauan Covid</a>
                            </li>
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
                    <li class="sidebar-item @yield('pemeriksaan') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Screening</span>
                        </a>
                        <ul class="submenu @yield('screen')">
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <li class="submenu-item @yield('narko')">
                                <a href="{{ route('pemeriksaan.datapemeriksaannarkoba') }}"> Pemeriksaan Narkotika</a>
                            </li>
                            @endif
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <li class="submenu-item @yield('covid')">
                                <a href="{{ route('pemeriksaan.datapemeriksaancovid') }}"> Pemeriksaan Covid</a>
                            </li>
                            @endif
                            @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <li class="submenu-item @yield('pemantauan')">
                                <a href="{{ route('superadmin.pemantauancovid') }}"> Pemantauan Covid</a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item @yield('medis')">
                        <a href="{{ route('rekammedis.datarekammedis') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Rekam Medis</span>
                        </a>
                    </li>
                    
                    @endif

                    <li class="sidebar-item @yield('rawat') has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Rawat Inap</span>
                        </a>
                        <ul class="submenu @yield('inap')">
                            <li class="submenu-item @yield('daftar')">
                                <a href="{{ route('superadmin.rawatinap') }}"> Daftar Pasien Rawat Inap</a>
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
                    </li>

                    <li class="sidebar-item @yield('medical') has-sub">
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
                    </li>

                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-title"><strong>SURAT KETERANGAN</strong></li>
                    <li class="sidebar-item @yield('berobat')">
                        <a href="{{ route('superadmin.keteranganberobat') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Keterangan Berobat</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item  @yield('izinberobat')">
                        <a href{{ route('superadmin.dataizinberobat') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Izin Berobat</span>
                        </a>
                    </li>
                    <li class="sidebar-item @yield('izinistirahat')">
                        <a href="{{ route('istirahat.dataizinistirahat') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Izin Istirahat</span>
                        </a>
                    </li>
                    @endif
                    <li class="sidebar-item  @yield('suratrujukan')">
                        <a href="{{ route('superadmin.datasuratrujukan') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Rujukan</span>
                        </a>
                    </li>
                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item @yield('keterangansehat')">
                        <a href="{{ route('superadmin.keterangansehat') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Keterangan Sehat</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                    <li class="sidebar-item @yield('persetujuanmedis')">
                        <a href="{{ route('superadmin.persetujuantindakanmedis') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Persetujuan Tindakan Medis</span>
                        </a>
                    </li>
                    @endif

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