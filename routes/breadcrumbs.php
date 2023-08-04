<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/** Data Petugas */
Breadcrumbs::for('data_petugas', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.datauser'));
     $trail->push('Data Petugas', route('superadmin.datauser'));
});
Breadcrumbs::for('tambah_data_petugas', function (BreadcrumbTrail $trail) {
     $trail->parent('data_petugas');
     $trail->push('Tambah Data Petugas',);
});
Breadcrumbs::for('ubah_data_petugas', function (BreadcrumbTrail $trail) {
     $trail->parent('data_petugas');
     $trail->push('Ubah Data Petugas');
});
Breadcrumbs::for('lihat_data_petugas', function (BreadcrumbTrail $trail) {
     $trail->parent('data_petugas');
     $trail->push('Lihat Data Petugas');
});
/** Level Petugas */
Breadcrumbs::for('level_petugas', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.level'));
     $trail->push('Level Petugas', route('superadmin.level'));
});
Breadcrumbs::for('tambah_level_petugas', function (BreadcrumbTrail $trail) {
     $trail->parent('level_petugas');
     $trail->push('Tambah Level Petugas');
});
Breadcrumbs::for('ubah_level_petugas', function (BreadcrumbTrail $trail) {
     $trail->parent('level_petugas');
     $trail->push('Ubah Level Petugas');
});

/** Mitra Kerja */
Breadcrumbs::for('mitra_kerja', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.mitrakerja'));
     $trail->push('Mitra Kerja', route('superadmin.mitrakerja'));
});
Breadcrumbs::for('tambah_mitra_kerja', function (BreadcrumbTrail $trail) {
     $trail->parent('mitra_kerja');
     $trail->push('Tambah Mitra Kerja');
});
Breadcrumbs::for('ubah_mitra_kerja', function (BreadcrumbTrail $trail) {
     $trail->parent('mitra_kerja');
     $trail->push('Ubah Mitra Kerja');
});
Breadcrumbs::for('lihat_mitra_kerja', function (BreadcrumbTrail $trail) {
     $trail->parent('mitra_kerja');
     $trail->push('Lihat Mitra Kerja');
});

/** Data Pasien */
Breadcrumbs::for('data_pasien', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.datapasien'));
     $trail->push('Data Pasien', route('superadmin.datapasien'));
});
Breadcrumbs::for('tambah_data_pasien', function (BreadcrumbTrail $trail) {
     $trail->parent('data_pasien');
     $trail->push('Tambah Data Pasien',);
});
Breadcrumbs::for('ubah_data_pasien', function (BreadcrumbTrail $trail) {
     $trail->parent('data_pasien');
     $trail->push('Ubah Data Pasien');
});
Breadcrumbs::for('lihat_data_pasien', function (BreadcrumbTrail $trail) {
     $trail->parent('data_pasien');
     $trail->push('Lihat Data Pasien');
});

/** Kategori Pasien */
Breadcrumbs::for('kategori_pasien', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.kategoripasien'));
     $trail->push('Data Kategori Pasien', route('superadmin.kategoripasien'));
});
Breadcrumbs::for('tambah_kategori_pasien', function (BreadcrumbTrail $trail) {
     $trail->parent('kategori_pasien');
     $trail->push('Tambah Kategori Pasien',);
});
Breadcrumbs::for('ubah_kategori_pasien', function (BreadcrumbTrail $trail) {
     $trail->parent('kategori_pasien');
     $trail->push('Ubah Kategori Pasien');
});

/** Jabatan */
Breadcrumbs::for('jabatan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.jabatan'));
     $trail->push('Data Jabatan', route('superadmin.jabatan'));
});
Breadcrumbs::for('tambah_jabatan', function (BreadcrumbTrail $trail) {
     $trail->parent('jabatan');
     $trail->push('Tambah Jabatan',);
});
Breadcrumbs::for('ubah_jabatan', function (BreadcrumbTrail $trail) {
     $trail->parent('jabatan');
     $trail->push('Ubah Jabatan');
});

/** Divisi */
Breadcrumbs::for('divisi', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.divisi'));
     $trail->push('Data divisi', route('superadmin.divisi'));
});
Breadcrumbs::for('tambah_divisi', function (BreadcrumbTrail $trail) {
     $trail->parent('divisi');
     $trail->push('Tambah divisi',);
});
Breadcrumbs::for('ubah_divisi', function (BreadcrumbTrail $trail) {
     $trail->parent('divisi');
     $trail->push('Ubah divisi');
});

/** Perusahaan */
Breadcrumbs::for('perusahaan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.perusahaan'));
     $trail->push('Data perusahaan', route('superadmin.perusahaan'));
});
Breadcrumbs::for('tambah_perusahaan', function (BreadcrumbTrail $trail) {
     $trail->parent('perusahaan');
     $trail->push('Tambah perusahaan',);
});
Breadcrumbs::for('ubah_perusahaan', function (BreadcrumbTrail $trail) {
     $trail->parent('perusahaan');
     $trail->push('Ubah perusahaan');
});

/** Data Obat */
Breadcrumbs::for('data_obat', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('obat.dataobats'));
     $trail->push('Data Obat', route('obat.dataobats'));
});
Breadcrumbs::for('tambah_data_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('data_obat');
     $trail->push('Tambah Data Obat',);
});
Breadcrumbs::for('ubah_data_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('data_obat');
     $trail->push('Ubah Data Obat');
});
/** Nama Obat */
Breadcrumbs::for('nama_obat', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.namaobat'));
     $trail->push('Nama Obat', route('superadmin.namaobat'));
});
Breadcrumbs::for('tambah_nama_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_obat');
     $trail->push('Tambah Data Obat',);
});
Breadcrumbs::for('ubah_nama_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_obat');
     $trail->push('Ubah Data Obat');
});
/** Golongan Obat */
Breadcrumbs::for('golongan_obat', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.golonganobat'));
     $trail->push('Golongan Obat', route('superadmin.golonganobat'));
});
Breadcrumbs::for('tambah_golongan_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('golongan_obat');
     $trail->push('Tambah Golongan Obat',);
});
Breadcrumbs::for('ubah_golongan_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_obat');
     $trail->push('Ubah Golongan Obat');
});
/** Satuan Obat */
Breadcrumbs::for('satuan_obat', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.satuanobat'));
     $trail->push('Satuan Obat', route('superadmin.satuanobat'));
});
Breadcrumbs::for('tambah_satuan_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('satuan_obat');
     $trail->push('Tambah Satuan Obat',);
});
Breadcrumbs::for('ubah_satuan_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_obat');
     $trail->push('Ubah Satuan Obat');
});
/** bobot Obat */
Breadcrumbs::for('bobot_obat', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.bobotobat'));
     $trail->push('Bobot Obat', route('superadmin.bobotobat'));
});
Breadcrumbs::for('tambah_bobot_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('bobot_obat');
     $trail->push('Tambah Bobot Obat',);
});
Breadcrumbs::for('ubah_bobot_obat', function (BreadcrumbTrail $trail) {
     $trail->parent('bobot_obat');
     $trail->push('Ubah Bobot Obat');
});
/** Produk Kesehatan */
Breadcrumbs::for('produk_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('obat.dataproduk'));
     $trail->push('Produk Kesehatan', route('obat.dataproduk'));
});
Breadcrumbs::for('tambah_produk_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('produk_kesehatan');
     $trail->push('Tambah Produk Kesehatan',);
});
Breadcrumbs::for('ubah_produk_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('produk_kesehatan');
     $trail->push('Ubah Produk Kesehatan');
});
/** Alat Kesehatan */
Breadcrumbs::for('alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('obat.dataalkes'));
     $trail->push('Alat Kesehatan', route('obat.dataalkes'));
});
Breadcrumbs::for('tambah_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('alat_kesehatan');
     $trail->push('Tambah Alat Kesehatan',);
});
Breadcrumbs::for('ubah_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('alat_kesehatan');
     $trail->push('Ubah Alat Kesehatan');
});
/** Nama Alat Kesehatan */
Breadcrumbs::for('nama_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('obat.namaalkes'));
     $trail->push('Nama Alat Kesehatan', route('obat.namaalkes'));
});
Breadcrumbs::for('tambah_nama_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_alat_kesehatan');
     $trail->push('Tambah Nama Alat Kesehatan',);
});
Breadcrumbs::for('ubah_nama_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_alat_kesehatan');
     $trail->push('Ubah Nama Alat Kesehatan');
});
/** Golongan Alat Kesehatan */
Breadcrumbs::for('golongan_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('obat.golonganalkes'));
     $trail->push('Golongan Alat Kesehatan', route('obat.golonganalkes'));
});
Breadcrumbs::for('tambah_golongan_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('golongan_alat_kesehatan');
     $trail->push('Tambah Golongan Alat Kesehatan',);
});
Breadcrumbs::for('ubah_golongan_alat_kesehatan', function (BreadcrumbTrail $trail) {
     $trail->parent('golongan_alat_kesehatan');
     $trail->push('Ubah Golongan Alat Kesehatan');
});
/** Pemeriksaan Antigen */
Breadcrumbs::for('pemeriksaan_antigen', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.pemeriksaanantigen'));
     $trail->push('Pemeriksaan Antigen', route('superadmin.pemeriksaanantigen'));
});
Breadcrumbs::for('tambah_pemeriksaan_antigen', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_antigen');
     $trail->push('Tambah Pemeriksaan Antigen',);
});
Breadcrumbs::for('ubah_pemeriksaan_antigen', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_antigen');
     $trail->push('Ubah Pemeriksaan Antigen');
});
/** Kode pemantauan */
Breadcrumbs::for('kode_covid', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.hasilpemantauan'));
     $trail->push('Kode Pemantauan', route('superadmin.hasilpemantauan'));
});
Breadcrumbs::for('tambah_kode_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('kode_covid');
     $trail->push('Tambah kode pemantauan',);
});
Breadcrumbs::for('ubah_kode_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('kode_covid');
     $trail->push('Ubah kode pemantauan');
});
/** Klasifikasi penyakit */
Breadcrumbs::for('klasifikasi_penyakit', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.klasifikasipenyakit'));
     $trail->push('Klasifikasi Penyakit', route('superadmin.klasifikasipenyakit'));
});
Breadcrumbs::for('tambah_klasifikasi_penyakit', function (BreadcrumbTrail $trail) {
     $trail->parent('klasifikasi_penyakit');
     $trail->push('Tambah Klasifikasi Penyakit',);
});
Breadcrumbs::for('ubah_klasifikasi_penyakit', function (BreadcrumbTrail $trail) {
     $trail->parent('klasifikasi_penyakit');
     $trail->push('Ubah Klasifikasi Penyakit');
});
/** subklasifikasi penyakit */
Breadcrumbs::for('subklasifikasi_penyakit', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.subklasifikasi'));
     $trail->push('Subklasifikasi Penyakit', route('superadmin.subklasifikasi'));
});
Breadcrumbs::for('tambah_subklasifikasi_penyakit', function (BreadcrumbTrail $trail) {
     $trail->parent('subklasifikasi_penyakit');
     $trail->push('Tambah Subklasifikasi Penyakit',);
});
Breadcrumbs::for('ubah_subklasifikasi_penyakit', function (BreadcrumbTrail $trail) {
     $trail->parent('subklasifikasi_penyakit');
     $trail->push('Ubah Subklasifikasi Penyakit');
});
/** Nama Penyakit */
Breadcrumbs::for('nama_penyakit', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.namapenyakit'));
     $trail->push('Nama Penyakit', route('superadmin.namapenyakit'));
});
Breadcrumbs::for('tambah_nama_penyakit', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_penyakit');
     $trail->push('Tambah Nama Penyakit',);
});
Breadcrumbs::for('ubah_nama_penyakit', function (BreadcrumbTrail $trail) {
     $trail->parent('nama_penyakit');
     $trail->push('Ubah Nama Penyakit');
});
/** Lokasi Kejadian */
Breadcrumbs::for('lokasi_kejadian', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.lokasikejadian'));
     $trail->push('Lokasi Kejadian', route('superadmin.lokasikejadian'));
});
Breadcrumbs::for('tambah_lokasi_kejadian', function (BreadcrumbTrail $trail) {
     $trail->parent('lokasi_kejadian');
     $trail->push('Tambah Lokasi Kejadian',);
});
Breadcrumbs::for('ubah_lokasi_kejadian', function (BreadcrumbTrail $trail) {
     $trail->parent('lokasi_kejadian');
     $trail->push('Ubah Lokasi Kejadian');
});
/** Rumah Sakit Rujukan */
Breadcrumbs::for('rs_rujukan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.rsrujukan'));
     $trail->push('Rumah Sakit Rujukan', route('superadmin.rsrujukan'));
});
Breadcrumbs::for('tambah_rs_rujukan', function (BreadcrumbTrail $trail) {
     $trail->parent('rs_rujukan');
     $trail->push('Tambah Rumah Sakit Rujukan',);
});
Breadcrumbs::for('ubah_rs_rujukan', function (BreadcrumbTrail $trail) {
     $trail->parent('rs_rujukan');
     $trail->push('Ubah Rumah Sakit Rujukan');
});
/** Tindakan */
Breadcrumbs::for('tindakan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.tindakan'));
     $trail->push('Tindakan', route('superadmin.tindakan'));
});
Breadcrumbs::for('tambah_tindakan', function (BreadcrumbTrail $trail) {
     $trail->parent('tindakan');
     $trail->push('Tambah Tindakan',);
});
Breadcrumbs::for('ubah_tindakan', function (BreadcrumbTrail $trail) {
     $trail->parent('tindakan');
     $trail->push('Ubah Tindakan');
});
/** Aturan Pakai */
Breadcrumbs::for('aturan_pakai', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', '/aturan_pakai');
     $trail->push('Aturan Pakai', '/aturan_pakai');
});
Breadcrumbs::for('tambah_aturan_pakai', function (BreadcrumbTrail $trail) {
     $trail->parent('aturan_pakai');
     $trail->push('Tambah Aturan Pakai',);
});
Breadcrumbs::for('ubah_aturan_pakai', function (BreadcrumbTrail $trail) {
     $trail->parent('aturan_pakai');
     $trail->push('Ubah Aturan Pakai');
});
/** Dosis */
Breadcrumbs::for('dosis', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', '/dosis');
     $trail->push('Dosis', '/dosis');
});
Breadcrumbs::for('tambah_dosis', function (BreadcrumbTrail $trail) {
     $trail->parent('dosis');
     $trail->push('Tambah Dosis',);
});
Breadcrumbs::for('ubah_dosis', function (BreadcrumbTrail $trail) {
     $trail->parent('dosis');
     $trail->push('Ubah Dosis');
});
/** Dokter Spesialis */
Breadcrumbs::for('spesialis_rujukan', function (BreadcrumbTrail $trail) {
     $trail->push('Master Data', route('superadmin.spesialisrujukan'));
     $trail->push('Dokter Spesialis Rujukan', route('superadmin.spesialisrujukan'));
});
Breadcrumbs::for('tambah_spesialis_rujukan', function (BreadcrumbTrail $trail) {
     $trail->parent('spesialis_rujukan');
     $trail->push('Tambah Dokter Spesialis Rujukan',);
});
Breadcrumbs::for('ubah_spesialis_rujukan', function (BreadcrumbTrail $trail) {
     $trail->parent('spesialis_rujukan');
     $trail->push('Ubah Dokter Spesialis Rujukan');
});
/** Rekam Medis */
Breadcrumbs::for('rekam_medis', function (BreadcrumbTrail $trail) {
     $trail->push('Rekam Medis', route('rekammedis.datarekammedis'));
});
Breadcrumbs::for('tambah_rekam_medis', function (BreadcrumbTrail $trail) {
     $trail->parent('rekam_medis');
     $trail->push('Tambah Rekam Medis',);
});
Breadcrumbs::for('lihat_rekam_medis', function (BreadcrumbTrail $trail) {
     $trail->parent('rekam_medis');
     $trail->push('Lihat Rekam Medis');
});

/** Rawat Jalan */
Breadcrumbs::for('rawat_jalan', function (BreadcrumbTrail $trail) {
     $trail->push('Pemeriksaan', route('rawatjalan.daftarrawatjalan'));
     $trail->push('Pasien Rawat Jalan', route('rawatjalan.daftarrawatjalan'));
});
Breadcrumbs::for('tambah_rawat_jalan', function (BreadcrumbTrail $trail) {
     $trail->parent('rawat_jalan');
     $trail->push('Tambah Pasien Rawat Jalan',);
});
Breadcrumbs::for('ubah_rawat_jalan', function (BreadcrumbTrail $trail) {
     $trail->parent('rawat_jalan');
     $trail->push('Ubah Pasien Rawat Jalan');
});
Breadcrumbs::for('lihat_rawat_jalan', function (BreadcrumbTrail $trail) {
     $trail->parent('rawat_jalan');
     $trail->push('Lihat Pasien Rawat Jalan');
});
/** Rawat Inap */
Breadcrumbs::for('rawat_inap', function (BreadcrumbTrail $trail) {
     $trail->push('Pemeriksaan', route('superadmin.daftarrawatinap'));
     $trail->push('Pasien Rawat Inap', route('superadmin.daftarrawatinap'));
});
Breadcrumbs::for('tambah_rawat_inap', function (BreadcrumbTrail $trail) {
     $trail->parent('rawat_inap');
     $trail->push('Tambah Pasien Rawat Inap',);
});
Breadcrumbs::for('ubah_rawat_inap', function (BreadcrumbTrail $trail) {
     $trail->parent('rawat_inap');
     $trail->push('Ubah Pasien Rawat Inap');
});
Breadcrumbs::for('lihat_rawat_inap', function (BreadcrumbTrail $trail) {
     $trail->parent('rawat_inap');
     $trail->push('Lihat Pasien Rawat Inap');
});
/** Pemeriksaan Narkoba */
Breadcrumbs::for('pemeriksaan_narkoba', function (BreadcrumbTrail $trail) {
     $trail->push('Pemeriksaan', route('pemeriksaan.datapemeriksaannarkoba'));
     $trail->push('Data Pemeriksaan Narkotika', route('pemeriksaan.datapemeriksaannarkoba'));
});
Breadcrumbs::for('tambah_pemeriksaan_narkoba', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_narkoba');
     $trail->push('Tambah Pemeriksaan Narkotika',);
});
Breadcrumbs::for('ubah_pemeriksaan_narkoba', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_narkoba');
     $trail->push('Ubah Pemeriksaan Narkotika');
});
Breadcrumbs::for('lihat_pemeriksaan_narkoba', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_narkoba');
     $trail->push('Lihat Pemeriksaan Narkotika');
});

/** Pemeriksaan Covid */
Breadcrumbs::for('pemeriksaan_covid', function (BreadcrumbTrail $trail) {
     $trail->push('Pemeriksaan', route('pemeriksaan.datapemeriksaancovid'));
     $trail->push('Data Pemeriksaan Covid', route('pemeriksaan.datapemeriksaancovid'));
});
Breadcrumbs::for('tambah_pemeriksaan_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_covid');
     $trail->push('Tambah Pemeriksaan Covid',);
});
Breadcrumbs::for('ubah_pemeriksaan_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_covid');
     $trail->push('Ubah Pemeriksaan Covid');
});
Breadcrumbs::for('lihat_pemeriksaan_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('pemeriksaan_covid');
     $trail->push('Lihat Pemeriksaan Covid');
});

/** MCU */
Breadcrumbs::for('mcu', function (BreadcrumbTrail $trail) {
     $trail->push('Pemeriksaan', '/mcu');
     $trail->push('Data MCU', '/mcu');
});
Breadcrumbs::for('add_mcu_awal', function (BreadcrumbTrail $trail) {
     $trail->parent('mcu');
     $trail->push('Tambah MCU Awal', '/add_mcu/awal');
});
Breadcrumbs::for('ubah_mcu_awal', function (BreadcrumbTrail $trail) {
     $trail->parent('mcu');
     $trail->push('Ubah MCU Awal', '/ubah_mcu/awal');
});
Breadcrumbs::for('view_mcu_awal', function (BreadcrumbTrail $trail) {
     $trail->parent('mcu');
     $trail->push('MCU Awal', '/ubah_mcu/awal');
});
Breadcrumbs::for('add_mcu_lanjutan', function (BreadcrumbTrail $trail) {
     $trail->parent('mcu');
     $trail->push('Tambah MCU', '/ubah_mcu/lanjutan');
});
Breadcrumbs::for('ubah_mcu_lanjutan', function (BreadcrumbTrail $trail) {
     $trail->parent('mcu');
     $trail->push('ubah MCU', '/ubah_mcu/lanjutan');
});
Breadcrumbs::for('view_mcu_lanjutan', function (BreadcrumbTrail $trail) {
     $trail->parent('mcu');
     $trail->push('MCU', '/ubah_mcu/lanjutan');
});

/** Pemantauan Covid */
Breadcrumbs::for('pemantauan_covid', function (BreadcrumbTrail $trail) {
     $trail->push('Pemeriksaan', route('pemeriksaan.datapemeriksaancovid'));
     $trail->push('Data Pemantauan Covid', route('pemeriksaan.datapemeriksaancovid'));
});
Breadcrumbs::for('tambah_pemantauan_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('pemantauan_covid');
     $trail->push('Tambah Pemantauan Covid',);
});
Breadcrumbs::for('ubah_pemantauan_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('pemantauan_covid');
     $trail->push('Ubah Pemantauan Covid');
});
Breadcrumbs::for('lihat_pemantauan_covid', function (BreadcrumbTrail $trail) {
     $trail->parent('pemantauan_covid');
     $trail->push('Lihat Pemantauan Covid');
});
/** Pemantauan Tanda Vital */
Breadcrumbs::for('pemantauan_tanda_vital', function (BreadcrumbTrail $trail) {
     $trail->push('Pemeriksaan', route('superadmin.datapemantauantandavital'));
     $trail->push('Data Pemantauan Tanda Vital', route('superadmin.datapemantauantandavital'));
});
Breadcrumbs::for('tambah_pemantauan_tanda_vital', function (BreadcrumbTrail $trail) {
     $trail->parent('pemantauan_tanda_vital');
     $trail->push('Tambah Pemantauan Tanda Vital',);
});
Breadcrumbs::for('ubah_pemantauan_tanda_vital', function (BreadcrumbTrail $trail) {
     $trail->parent('pemantauan_tanda_vital');
     $trail->push('Ubah Pemantauan Tanda Vital');
});
Breadcrumbs::for('lihat_pemantauan_tanda_vital', function (BreadcrumbTrail $trail) {
     $trail->parent('pemantauan_tanda_vital');
     $trail->push('Lihat Pemantauan Tanda Vital');
});
/** Keterangan Berobat */
Breadcrumbs::for('keterangan_berobat', function (BreadcrumbTrail $trail) {
     $trail->push('Surat Keterangan', route('superadmin.dataketeranganberobat'));
     $trail->push('Data Keterangan Berobat', route('superadmin.dataketeranganberobat'));
});
Breadcrumbs::for('tambah_keterangan_berobat', function (BreadcrumbTrail $trail) {
     $trail->parent('keterangan_berobat');
     $trail->push('Tambah Keterangan Berobat',);
});
Breadcrumbs::for('ubah_keterangan_berobat', function (BreadcrumbTrail $trail) {
     $trail->parent('keterangan_berobat');
     $trail->push('Ubah Keterangan Berobat');
});
Breadcrumbs::for('lihat_keterangan_berobat', function (BreadcrumbTrail $trail) {
     $trail->parent('keterangan_berobat');
     $trail->push('Detail Keterangan Berobat');
});
/** Izin Berobat */
Breadcrumbs::for('izin_berobat', function (BreadcrumbTrail $trail) {
     $trail->push('Surat Keterangan', route('superadmin.dataizinberobat'));
     $trail->push('Data Izin Berobat', route('superadmin.dataizinberobat'));
});
Breadcrumbs::for('tambah_izin_berobat', function (BreadcrumbTrail $trail) {
     $trail->parent('izin_berobat');
     $trail->push('Tambah Izin Berobat',);
});
Breadcrumbs::for('ubah_izin_berobat', function (BreadcrumbTrail $trail) {
     $trail->parent('izin_berobat');
     $trail->push('Ubah Izin Berobat');
});
/** Izin Istirahat */
Breadcrumbs::for('izin_istirahat', function (BreadcrumbTrail $trail) {
     $trail->push('Surat Keterangan', route('istirahat.dataizinistirahat'));
     $trail->push('Data Izin Istirahat', route('istirahat.dataizinistirahat'));
});
Breadcrumbs::for('tambah_izin_istirahat', function (BreadcrumbTrail $trail) {
     $trail->parent('izin_istirahat');
     $trail->push('Tambah Izin Istirahat',);
});
Breadcrumbs::for('ubah_izin_istirahat', function (BreadcrumbTrail $trail) {
     $trail->parent('izin_istirahat');
     $trail->push('Ubah Izin Istirahat');
});
/** Surat Rujukan */
Breadcrumbs::for('surat_rujukan', function (BreadcrumbTrail $trail) {
     $trail->push('Surat Keterangan', route('superadmin.datasuratrujukan'));
     $trail->push('Data Surat Rujukan', route('superadmin.datasuratrujukan'));
});
Breadcrumbs::for('tambah_surat_rujukan', function (BreadcrumbTrail $trail) {
     $trail->parent('surat_rujukan');
     $trail->push('Tambah Surat Rujukan',);
});
Breadcrumbs::for('ubah_surat_rujukan', function (BreadcrumbTrail $trail) {
     $trail->parent('surat_rujukan');
     $trail->push('Ubah Surat Rujukan');
});
/** Keterangan Sehat */
Breadcrumbs::for('keterangan_sehat', function (BreadcrumbTrail $trail) {
     $trail->push('Surat Keterangan', route('superadmin.dataketerangansehat'));
     $trail->push('Data Keterangan Sehat', route('superadmin.dataketerangansehat'));
});
Breadcrumbs::for('tambah_keterangan_sehat', function (BreadcrumbTrail $trail) {
     $trail->parent('keterangan_sehat');
     $trail->push('Tambah Keterangan Sehat',);
});
Breadcrumbs::for('ubah_keterangan_sehat', function (BreadcrumbTrail $trail) {
     $trail->parent('keterangan_sehat');
     $trail->push('Ubah Keterangan Sehat');
});
/** Tindakan Medis */
Breadcrumbs::for('tindakan_medis', function (BreadcrumbTrail $trail) {
     $trail->push('Surat Keterangan', route('superadmin.datatindakanmedis'));
     $trail->push('Data Persetujuan Tindikan Medis', route('superadmin.datatindakanmedis'));
});
Breadcrumbs::for('tambah_tindakan_medis', function (BreadcrumbTrail $trail) {
     $trail->parent('tindakan_medis');
     $trail->push('Tambah Persetujuan Tindikan Medis',);
});
Breadcrumbs::for('ubah_tindakan_medis', function (BreadcrumbTrail $trail) {
     $trail->parent('tindakan_medis');
     $trail->push('Ubah Persetujuan Tindikan Medis');
});
/** Kecelakaan Kerja */
Breadcrumbs::for('kecelakaan', function (BreadcrumbTrail $trail) {
     $trail->push('Surat Keterangan', route('superadmin.datakecelakaankerja'));
     $trail->push('Data Kecelakaan Kerja', route('superadmin.datakecelakaankerja'));
});
Breadcrumbs::for('tambah_kecelakaan', function (BreadcrumbTrail $trail) {
     $trail->parent('kecelakaan');
     $trail->push('Tambah Kecelakaan Kerja',);
});
Breadcrumbs::for('ubah_kecelakaan', function (BreadcrumbTrail $trail) {
     $trail->parent('kecelakaan');
     $trail->push('Ubah Kecelakaan Kerja');
});

Breadcrumbs::for('ubah_password', function (BreadcrumbTrail $trail) {
     $trail->push('Akun');
     $trail->push('Ubah Kata Sandi');
});
Breadcrumbs::for('ubah_profil', function (BreadcrumbTrail $trail) {
     $trail->push('Akun');
     $trail->push('Ubah Profil User');
});
