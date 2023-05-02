@extends('layouts.dashboard.app')

@section('title', 'Ubah Pemantauan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('pemantauan', 'active')
@section('breadcrumb', 'ubah_pemantauan_covid')
@section('judul', 'Ubah Pemantauan Covid')
@section('css')
<style>
    .step-trigger {
        font-size: 0.8rem !important;
    }
    .step.active .step-trigger{
        font-size: 1rem !important;

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
                    <form class="form needs-validation" action="/ubah/pemantauan/covid/{{  $pemantauan->id  }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id" value="{{ $pemantauan->pasien_id }}">
                        <div id="test-nl-1" class="content">
                            <div class="container mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <mb-3>
                                            <label class="form-label">Nomor Kamar <b class="color-red">*</b></label>
                                            <input type="text" id="no_kamar" class="form-control" name="no_kamar" placeholder="Nomor Kamar" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" value="{{ $pemantauan->no_kamar }}">
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Nomor kamar harus diisi dan jumlah karakter maksimal 4 karakter.
                                            </div>
                                        </mb-3>
                                    </div>
                                </div>
                                <div class="row mt-3" id="detail_pasien">
                                    <div class="col">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Nama Pasien</th>
                                                                    <td id="nama">: {{ $pemantauan->pasien->nama_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>ID Rekam Medis</th>
                                                                    <td id="rekam_medis">: {{ $pemantauan->pasien->id_rekam_medis }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nomor Induk Karyawan</th>
                                                                    <td id="nomor_induk_karyawan">: {{ $pemantauan->pasien->NIK }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tempat Tanggal Lahir</th>
                                                                    <td id="ttl">: {{ $pemantauan->pasien->tempat_lahir.', '.$pemantauan->pasien->tanggal_lahir }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td id="alamat">: {{ $pemantauan->pasien->alamat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan</th>
                                                                    <td id="pekerjaan">: {{ $pemantauan->pasien->pekerjaan }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tbody>

                                                                <tr>
                                                                    <th>Perusahaan</th>
                                                                    <td id="perusahaan">: {{ $pemantauan->pasien->perusahaan->nama_perusahaan_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Divisi</th>
                                                                    <td id="divisi">: {{ $pemantauan->pasien->divisi->nama_divisi_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jabatan</th>
                                                                    <td id="jabatan">: {{ $pemantauan->pasien->jabatan->nama_jabatan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Kelamin</th>
                                                                    <td id="jenis_kelamin">: {{ $pemantauan->pasien->jenis_kelamin }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Telepon</th>
                                                                    <td id="telepon">: {{ $pemantauan->pasien->telepon }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td id="email">: {{ $pemantauan->pasien->email }}</td>
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
                                                <option disabled>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->suhu_pagi)? 'selected':'' }}>{{ $hasil->nama_pemantauan }}</option>
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
                                                <option disabled >Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->td)? 'selected':'' }}>{{
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
                                                <option disabled >Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->hr)? 'selected':'' }}>{{
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
                                                <option disabled >Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->spo)? 'selected':'' }}>{{
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
                                            <textarea type="text" id="gejala" class="form-control" name="gejala">{{ $pemantauan->gejala }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Pemeriksaan</label>
                                            <textarea type="text" id="jenis_pemeriksaan" class="form-control" name="jenis_pemeriksaan">{{ $pemantauan->jenis_pemeriksaan }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Pemeriksaan <b class="color-red">*</b></label>
                                            <input type="date" id="tanggal_pemeriksaan" class="form-control" name="tanggal_pemeriksaan" value="{{ $pemantauan->tanggal_pemeriksaan }}">
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
                            <div class="container mb-3">
                                <p>Silahkan pilih pemeriksaan penunjangan apabila ada pemeriksaan penunjangan.</p>
                                <div class="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="check_laboratorium" {{ ($pemantauan->hasil_laboratorium!=null)? 'checked':'' }}>
                                        <h6 class="form-check-label">Laboratorium</h6>
                                    </div>
                                    <div id="_laboratorium" {{ ($pemantauan->hasil_laboratorium==null)? 'style=display:none':''}}>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label">Hasil Laboratorium <b class="text-danger">*</b></label>
                                                <textarea type="text" id="hasil_laboratorium" class="form-control" name="hasil_laboratorium">{{ $pemantauan->hasil_laboratorium }}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Lampiran Hasil Laboratorium</label>
                                                        <input class="form-control" type="file" id="lampiran_laboratorium" name="lampiran_laboratorium" value="{{ $pemantauan->lampiran_laboratorium }}" multiple>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Pemeriksaan <b class="text-danger">*</b></label>
                                                        <input type="date" id="tanggal_laboratorium" class="form-control" name="tanggal_laboratorium" value="{{ $pemantauan->tanggal_laboratorium }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-top pt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="check_rapid" {{ ($pemantauan->hasil_rapid!=null)? 'checked' : '' }}>
                                        <h6 class="form-check-label">Rapid Test</h6>
                                    </div>
                                    <div id="_rapid" {{ ($pemantauan->hasil_rapid==null)? 'style=display:none;' : '' }}>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label">Hasil Rapid Test <b class="text-danger">*</b></label>
                                                <textarea type="text" id="hasil_rapid" class="form-control" name="hasil_rapid" >{{ $pemantauan->hasil_rapid }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Lampiran Hasil Rapid Test</label>
                                                        <input class="form-control" type="file" id="lampiran_rapid" name="lampiran_rapid" value="{{ $pemantauan->lapiran_rapid }}" multiple>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tanggal Pemeriksaan <b class="text-danger">*</b></label>
                                                        <input type="date" id="tanggal_rapid" class="form-control" name="tanggal_rapid" value="{{ $pemantauan->tanggal_rapid }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-top pt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="check_rontgen" {{ ($pemantauan->hasil_rontgen!=null)? 'checked' : '' }}>
                                        <h6 class="form-check-label">Rontgen Thorax</h6>
                                    </div>
                                    <div id="_rontgen" style="<?=($pemantauan->hasil_rontgen==null)? 'display:none;' : ''?> ">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label">Hasil Rontgen Thorax <b class="text-danger">*</b></label>
                                                    <textarea type="text" id="hasil_rontgen" class="form-control"name="hasil_rontgen" >{{ $pemantauan->hasil_rontgen }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Lampiran Hasil Rontgen Thorax</label>
                                                            <input class="form-control" type="file" id="lampiran_rontgen" name="lampiran_rontgen" value="{{ $pemantauan->lampiran_rontgen }}" multiple>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Tanggal Pemeriksaan <b class="text-danger">*</b></label>
                                                                <input type="date" id="tanggal_rontgen" class="form-control"name="tanggal_rontgen" value="{{ $pemantauan->tanggal_rontgen }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Keterangan(Upaya apa yang akan dilakukan tempat rujukan kasus)</label>
                                                    <textarea type="text" id="keterangan" class="form-control" name="keterangan"></textarea>
                                                </div>
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
                                    onclick="lanjut3()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-4" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Silahkan isi formulir riwayat perjalanan jika ada riwayat perjalanan,</p>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Perjalanan</label>
                                            <input type="date" id="perjalanan" class="form-control" name="perjalanan" value="{{ $pemantauan->perjalanan }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kabupaten/Kota Asal</label>
                                            <input type="text" id="asal" class="form-control" name="asal" placeholder="Masukkan kabupaten/kota Asal" value="{{ $pemantauan->asal }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kota Tujuan</label>
                                            <input type="text" id="kota_tujuan" class="form-control" name="kota_tujuan" placeholder="Masukkan kota tujuan" value="{{ $pemantauan->kota_tujuan }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut4()"><b>Selanjutnya</b> <i
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
                                                        <tr>
                                                            <th>Nomor Kamar</th>
                                                            <td id="review_no_kamar"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h5 class="card-title">Hasil Pemantauan</h5>
                                            <div class="table-responsive">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Suhu Pagi</th>
                                                            <td id="review_suhu_pagi"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>TD</th>
                                                            <td id="review_td"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>HR</th>
                                                            <td id="review_hr"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>SPO2</th>
                                                            <td id="review_spo"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tanggal Pemeriksaan</th>
                                                            <td id="review_tanggal_pemeriksaan"></td>
                                                        </tr>
    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <h5>Pemeriksaan Penunjangan</h5>
                                            <div class="col">
                                                <div class="table-responsive">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <th>Laboratorium</th>
                                                                <td id="review_laboratorium">: -</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Rapid Test</th>
                                                                <td id="review_rapid">: -</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Rontgen Thorax</th>
                                                                <td id="review_rontgen">: -</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h5>Riwayat Perjalanan</h5>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Tanggal Perjalanan</th>
                                                            <td id="review_perjalanan">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kabupaten/Kota Asal</th>
                                                            <td id="review_asal">: -</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kota Tujuan</th>
                                                            <td id="review_kota_tujuan">: -</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                animation: true,
            }) 
            var validatedHasilPemantauan = ['suhu_pagi','td','hr','spo','tanggal_pemeriksaan'];
            var penunjanganForm = ['laboratorium', 'rapid', 'rontgen'];
            var riwayatPerjalanan = ['perjalanan', 'asal','kota_tujuan' ]
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
                    if ($(this).val() !== "" || $(this).val()!==null) {
                        $(this).removeClass('is-invalid')
                    }
                })
                $('textarea').change(function() {
                    if ($(this).val() !== "" || $(this).val()!==null) {
                        $(this).removeClass('is-invalid')
                    }
                })
                
                var cur = {'hasil_laboratorium':"{{ $pemantauan->hasil_laboratorium }}", 'lampiran_laboratorium':"{{ $pemantauan->lampiran_laboratorium }}",'tanggal_laboratorium':"{{ $pemantauan->tanggal_laboratorium }}",
                            'hasil_rontgen':"{{ $pemantauan->hasil_rontgen }}", 'lampiran_rontgen':"{{ $pemantauan->lampiran_rontgen }}",'tanggal_rontgen':"{{ $pemantauan->tanggal_rontgen }}",
                            'hasil_rapid':"{{ $pemantauan->hasil_rapid }}", 'lampiran_rapid':"{{ $pemantauan->lampiran_rapid }}",'tanggal_rapid':"{{ $pemantauan->tanggal_rapid }}",
                            'keterangan':"{{ $pemantauan->keterangan }}"}

                $('input[id^="check_"]').change(function(){
                    var label = $(this).attr('id').split('_')[1];
                    var required = ['hasil','tanggal','lampiran'];
                    if($(this).is(':checked')==true){
                        required.forEach(reqs => {
                            var form = $('#'+reqs+'_'+label);
                            form.val(cur[reqs+'_'+label]);
                        });
                        if(label == 'rontgen'){
                            $('#keterangan').val(cur['keterangan']);
                        }
                        $(this).parent().siblings('div[id^="_"]').show();
                        $('#review_'+label).html(': <span class="text-primary"><i class="bi bi-check-circle"></i></span>')
                    }else{
                        // $(this).parent().siblings('div[id^="_"]').hide();
                        $('#_'+label).hide();
                        $('#review_'+label).html(': -')
                        required.forEach(reqs => {
                            var form = $('#'+reqs+'_'+label);
                            form.val('');
                        });
                        if(label == 'rontgen'){
                            $('#keterangan').val('');
                        }

                    }
                })
            });

            function lanjut1() {
                stepper2.next();
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
                    setRevPemantauan();
                    stepper2.next();
                }
            }

            function lanjut3() {
                var validation_hasil = true;
                var required = ['hasil','tanggal'];
                penunjanganForm.forEach(penunjangan => {
                    var formCheck = $('#check_'+penunjangan);
                    if(formCheck.is(':checked')==true){
                        required.forEach(reqs => {
                            var formInput = $('#'+reqs+'_'+penunjangan);
                            if(formInput.val()==null||formInput.val()==''){
                                validation_hasil = false
                                formInput.addClass('is-invalid');
                            }else{
                                formInput.addClass('is-valid');
                            }
                        });
                    }
                });
                
                if (validation_hasil === true) {
                    stepper2.next()
                }
            }

            function lanjut4() {
                riwayatPerjalanan.forEach(id => {
                    var value = $('#'+id);
                    var review = $('#review_'+id);
                    if (value.val()) {
                        review.text(': '+value.val());
                    }
                });
                stepper2.next();
            }

            function setRevPemantauan() {
                validatedHasilPemantauan.forEach(pemantauan => {
                    var td = $('td#review_'+pemantauan);
                    var value = $('#'+pemantauan);
                    td.text(': '+value.val());
                });
            }           
        </script>
    @stop

</section>

@endsection