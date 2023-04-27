@extends('layouts.dashboard.app')

@section('title', 'Tambah Pemantauan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('pemantauan', 'active')
@section('breadcrumb', 'tambah_pemantauan_covid')
@section('judul', 'Tambah Pemantauan Covid')
@section('css')
<style>
    .step-trigger {
        font-size: 0.8rem !important;
    }
</style>
@stop
@section('container')



    <div class="card">
        <div class="card-body">
            <div id="stepper2" class="bs-stepper">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#test-nl-1">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-person-fill"></i></span>
                            <span class="bs-stepper-label">Pilih Pasien</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-2">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-clipboard-check"></i></span>
                            <span class="bs-stepper-label">Hasil Pemantauan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-clipboard-data"></i></span>
                            <span class="bs-stepper-label">Pemeriksaan Penunjangan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-4">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane" viewBox="0 0 16 16">
                                    <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z"/>
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Riwayat Perjalanan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-5">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-check-circle"></i></i></span>
                            <span class="bs-stepper-label">Simpan Data</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form class="form needs-validation" action="/pemantauan/covid" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id">
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Silahkan pilih Pasien berdasarkan <b>ID rekam
                                                medis</b><b class="color-red"> *</b></label>
                                        <select id="select_pasien_id" class="form-select" onchange="pilihPasien(this)"
                                            required>
                                            <option value="" selected>Pasien</option>
                                            @foreach ($pasien_id as $key => $pas)
                                                <option value="{{ $key }}"
                                                    perusahaan="{{ $pas->perusahaan->nama_perusahaan_pasien }}"
                                                    divisi={{ $pas->divisi->nama_divisi_pasien }}
                                                    jabatan={{ $pas->jabatan->nama_jabatan }}>
                                                    {{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Silahkan pilih salah satu pasien.
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3" id="detail_pasien" style="display: none">
                                    <div class="col">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Nama Pasien</th>
                                                                    <td id="nama"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>ID Rekam Medis</th>
                                                                    <td id="rekam_medis"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nomor Induk Karyawan</th>
                                                                    <td id="nomor_induk_karyawan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tempat Tanggal Lahir</th>
                                                                    <td id="ttl"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td id="alamat"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan</th>
                                                                    <td id="pekerjaan"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tbody>

                                                                <tr>
                                                                    <th>Perusahaan</th>
                                                                    <td id="perusahaan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Divisi</th>
                                                                    <td id="divisi"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jabatan</th>
                                                                    <td id="jabatan"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Kelamin</th>
                                                                    <td id="jenis_kelamin"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Telepon</th>
                                                                    <td id="telepon"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td id="email"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div></div>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut1()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-2" class="content">
                            <div class="container">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Suhu Pagi <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="suhu_pagi" id="suhu_pagi">
                                                <option disabled selected>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}">{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Suhu pagi harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">TD <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="td" id="td">
                                                <option disabled selected>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}">{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                TD harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">HR <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="hr" id="hr">
                                                <option disabled selected>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}">{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                HR harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">SPO2 <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="spo" id="spo">
                                                <option disabled selected>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}">{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                SPO2 harus diisi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label">Gejala</label>
                                            <textarea type="text" id="gejala" class="form-control" name="gejala"> </textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Pemeriksaan</label>
                                            <textarea type="text" id="jenis_pemeriksaan" class="form-control" name="jenis_pemeriksaan"> </textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Pemeriksaan <b class="color-red">*</b></label>
                                            <input type="date" id="tanggal_pemeriksaan" class="form-control" name="tanggal_pemeriksaan">
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Tanggal Pemeriksaan harus diisi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut2()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-3" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Silahkan isi hasil test urin</p>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-borderles">
                                                <tbody>
                                                    <tr>
                                                        <th>Amphetamine(AMP) <b class="text-danger">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="amp" id="amp" value="0">

                                                            Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="amp" id="amp" value="1">

                                                            Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-amp">
                                                                Hasil periksa AMP harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Methamphetamine(MET) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="met" id="met" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="met" id="met" value="1">

                                                            Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-met">
                                                                Hasil periksa MET harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>TetraHydroCannibinol(THC) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="thc" id="thc" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="thc" id="thc" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-thc">
                                                                Hasil periksa THC harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Benzodiazepine(BZO) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="bzo" id="bzo" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="bzo" id="bzo" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-bzo">
                                                                Hasil periksa BZO harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Morphine(MOP) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="mop" id="mop" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="mop" id="mop" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-mop">
                                                                Hasil periksa MOP harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Cocaine(COC) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="coc" id="coc" value="0">
                                                            <label class="form-check-label" for="no">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="coc" id="coc" value="1">
                                                            <label class="form-check-label" for="yes">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-coc">
                                                                Hasil periksa COC harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut3()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-4" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Silahkan isi hasil test urin</p>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-borderles">
                                                <tbody>
                                                    <tr>
                                                        <th>Amphetamine(AMP) <b class="text-danger">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="amp" id="amp" value="0">

                                                            Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="amp" id="amp" value="1">

                                                            Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-amp">
                                                                Hasil periksa AMP harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Methamphetamine(MET) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="met" id="met" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="met" id="met" value="1">

                                                            Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-met">
                                                                Hasil periksa MET harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>TetraHydroCannibinol(THC) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="thc" id="thc" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="thc" id="thc" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-thc">
                                                                Hasil periksa THC harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Benzodiazepine(BZO) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="bzo" id="bzo" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="bzo" id="bzo" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-bzo">
                                                                Hasil periksa BZO harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Morphine(MOP) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="mop" id="mop" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="mop" id="mop" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-mop">
                                                                Hasil periksa MOP harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Cocaine(COC) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="coc" id="coc" value="0">
                                                            <label class="form-check-label" for="no">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="coc" id="coc" value="1">
                                                            <label class="form-check-label" for="yes">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-coc">
                                                                Hasil periksa COC harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut3()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-5" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p>Silahkan periksa kembali data yang sudah dimasukan. Apabila data sudah
                                            sesuai, silahkan simpan data.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <h5 class="card-title">Biodata Pasien</h5>
                                            <div class="table-responsive">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Nama Pasien</th>
                                                            <td id="nama"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>ID Rekam Medis</th>
                                                            <td id="rekam_medis"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tempat Tanggal Lahir</th>
                                                            <td id="ttl"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat</th>
                                                            <td id="alamat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pekerjaan</th>
                                                            <td id="pekerjaan"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h5 class="card-title">Penggunaan Obat</h5>
                                            <div id="review-obat1" style="display: none">
                                                <p>Pasien tidak ada menggunakan obat dalam seminggu terakhir</p>
                                            </div>
                                            <div id="review-obat2" style="display: none">
                                                <p class="mb-0">Penggunaan Obat pasien dalam satu minggu terakhir</p>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Cara penggunaan obat</th>
                                                            <td id="penggunaan_obat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Jenis obat</th>
                                                            <td id="jenis_obat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Asal obat</th>
                                                            <td id="asal_obat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Terakhir digunakan</th>
                                                            <td id="terakhir_digunakan"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="card-title">Hasil Test Urin</h5>
                                        <table class="table table-striped table-borderless table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Amphetamine(AMP)</th>
                                                    <td id="review-amp">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Methamphetamine(MET)</th>
                                                    <td id="review-met">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>TetraHydroCannibinol(THC)
                                                    </th>
                                                    <td id="review-thc">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Benzodiazepine(BZO)</th>
                                                    <td id="review-bzo">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Morphine(MOP)</th>
                                                    <td id="review-mop">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Cocaine(COC)</th>
                                                    <td id="review-coc">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="submit" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.next()"><b>Simpan</b> <i class="bi bi-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                linear: true,
                animation: true
            })
            var validatedHasilPemantauan = ['suhu_pagi','td','hr','spo','tanggal_pemeriksaan']
            
            $(document).ready(function() {
                $('#select_pasien_id').select2({
                    theme: "bootstrap-5",
                    selectionCssClass: 'select2--small',
                    dropdownCssClass: 'select2--small',
                });

                $('input').keyup(function(event) {
                    if ($(this).hasClass('is-invalid')) {
                        $(this).removeClass('is-invalid')
                    }
                })
                $('select').change(function() {
                    if ($(this).val() !== "") {
                        $(this).removeClass('is-invalid').addClass('is-valid')
                    }
                })
                $('input').change(function() {
                    if ($(this).val() !== "") {
                        $(this).removeClass('is-invalid').addClass('is-valid')
                    }
                })
            });

            

            function pilihPasien(data) {
                var pasien_index = $('#select_pasien_id').val();
                if (pasien_index === '') {
                    $('#detail_pasien').fadeOut('slow')
                    $('#select_pasien_id').removeClass('is-valid')
                    $('#select_pasien_id').addClass('is-invalid')
                    $('.invalid-feedback').addClass('d-block')
                } else {
                    var pasien = @json($pasien_id)[pasien_index];
                    $('[name=pasien_id]').val(pasien.id)
                    $('td#nama').text(": " + pasien.nama_pasien);
                    $('td#rekam_medis').text(": " + pasien.id_rekam_medis);
                    $('td#nomor_induk_karyawan').text(": " + pasien.NIK)
                    $('td#ttl').text(": " + pasien.tempat_lahir + ', ' + pasien.tanggal_lahir)
                    $('td#alamat').text(": " + pasien.alamat)
                    $('td#pekerjaan').text(": " + pasien.pekerjaan)
                    $('td#perusahaan').text(": " + pasien.perusahaan.nama_perusahaan_pasien)
                    $('td#divisi').text(": " + pasien.divisi.nama_divisi_pasien)
                    $('td#jabatan').text(": " + pasien.jabatan.nama_jabatan)
                    $('td#jenis_kelamin').text(": " + pasien.jenis_kelamin)
                    $('td#telepon').text(": " + pasien.telepon)
                    var email = pasien.email ?? '-'
                    $('td#email').text(": " + email);
                    $('.invalid-feedback').removeClass('d-block')
                    $('#detail_pasien').fadeIn('slow')

                }
            }

            function lanjut1() {
                var pasien_index = $('#select_pasien_id').val();
                if (pasien_index == "") {
                    $('#select_pasien_id').removeClass('is-valid')
                    $('#select_pasien_id').addClass('is-invalid')
                } else {
                    $('#select_pasien_id').removeClass('is-invalid')
                    $('#select_pasien_id').addClass('is-valid')
                    stepper2.next()
                }
            }

            function lanjut2() {
                var validated = true;
                validatedHasilPemantauan.forEach(valid => {
                    var input = $('#'+valid);
                    if (input.val()==null||input.val()=='') {
                        input.addClass('is-invalid').removeClass('is-valid');
                        validated = false;
                    } else {
                        input.addClass('is-valid').removeClass('is-invalid');
                    }
                });

                if(validated === true){
                    stepper2.next();
                }
            }

            function lanjut3() {
                var tests = ['amp', 'met', 'thc', 'bzo', 'mop', 'coc'];
                var validation_hasil = true;
                tests.forEach(test => {
                    var value_test = $('input[name="' + test + '"]:checked').val()
                    if (value_test === undefined) {
                        $('#invalid-' + test).show();
                        validation_hasil = false;
                    }
                    setReviewHasilNarkoba(test, value_test);
                });
                setReviewObat();

                if (validation_hasil === true) {
                    stepper2.next()
                }
            }

            function clearFormObat() {
                var inputs = ['penggunaan_obat', 'jenis_obat', 'asal_obat', 'terakhir_digunakan']
                inputs.forEach(input => {
                    $('input[name="' + input + '"]').val("");
                });
            }

            function setReviewObat() {
                if (value_obatobatan === "tidak") {
                    $('#review-obat2').hide();
                    $('#review-obat1').show();
                } else {
                    $('#review-obat2').show();
                    $('#review-obat1').hide();
                    var inputs = ['penggunaan_obat', 'jenis_obat', 'asal_obat', 'terakhir_digunakan']
                    inputs.forEach(input => {
                        var value_input = $('input[name="' + input + '"]').val();
                        $('td#' + input).text(": " + value_input);
                    });
                }
            }

            function setReviewHasilNarkoba(test, val_test) {
                if (val_test == "0")
                    $('#review-' + test).html(': <span class="badge bg-primary">Negatif</span>')
                else
                    $('#review-' + test).html(': <span class="badge bg-danger">Positif</span>')
            }
        </script>
    @stop

</section>

@endsection