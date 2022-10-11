@extends('layouts.dashboard.app')

@section('title', 'Add Data Pasien')

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Add Data Pasien')
        @section('container')
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                </div>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">

                    </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <form class="form" action="/add/data/pasien" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kategori_pasien_id">Kategori Pasien <b class="color-red">*</b></label>
                                                <select class="choices form-select">
                                                    <option value="">Pilih Kategori Pasien</option>
                                                    @foreach ($kategori as $kate)
                                                        <option value="{{ $kate->id }}">{{ $kate->nama_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="NIK">NIK <b class="color-red">*</b></label>
                                                <input type="text" id="NIK" class="form-control" name="NIK"
                                                    placeholder="Masukkan NIK">
                                            </div>
                                            <div class="form-group">
                                                <label for="perusahaan">Perusahaan <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="lainnya" id="lainnya" required
                                                    onchange="yesnoCheck_lainnya(this);">
                                                    <option value="">Pilih Perusahaan</option>
                                                    <option value="lainnya">other</option>
                                                    @foreach ($perusahaan as $peru)
                                                        <option value="{{ $peru->id }}">
                                                            {{ $peru->nama_perusahaan_pasien }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group" id="lain" style="display: none;">
                                                <label for="lain">Lain-lain</label>
                                                <input type="text" id="lain" class="form-control" name="lain"
                                                    placeholder="lainnya">
                                            </div>
                                            <div class="form-group">
                                                <label for="divisi_id">Divisi <b class="color-red">*</b></label>
                                                <select class="choices form-select">
                                                    <option value="">Pilih Divisi</option>
                                                    @foreach ($divisi as $divi)
                                                        <option value="{{ $divi->id }}">{{ $divi->nama_divisi_pasien }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan_id">Jabatan <b class="color-red">*</b></label>
                                                <select class="choices form-select">
                                                    <option value="">Pilih Jabatan</option>
                                                    @foreach ($jabatan as $jabat)
                                                        <option value="{{ $jabat->id }}">{{ $jabat->nama_jabatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien" placeholder="Masukkan nama pasien">
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir <b class="color-red">*</b></label>
                                                <input type="text" id="tempat_lahir" class="form-control"
                                                    name="tempat_lahir" placeholder="Masukkan Tempat lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir <b class="color-red">*</b></label>
                                                <input type="date" id="tanggal_lahir" class="form-control"
                                                    name="tanggal_lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="umur">Umur <b class="color-red">*</b></label>
                                                <input type="text" id="umur" class="form-control" name="umur"
                                                    placeholder="Masukkan tempat lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan_id">Jenis Kelamin <b class="color-red">*</b></label>
                                                <select class="choices form-select">
                                                    <option value=""></option>
                                                    <option value="Pria">Laki-laki</option>
                                                    <option value="Wanita">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat <b class="color-red">*</b></label>
                                                <input type="text" id="alamat" class="form-control" name="alamat"
                                                    placeholder="Masukkan Alamat">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_mess">Alamat Mess</label>
                                                <input type="text" id="alamat_mess" class="form-control"
                                                    name="alamat_mess" placeholder="Masukkan Alamat Mess">
                                            </div>
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                                <input type="text" id="pekerjaan" class="form-control"
                                                    name="pekerjaan" placeholder="Masukkan Pekerjaan">
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon">Telepon <b class="color-red">*</b></label>
                                                <input type="text" id="telepon" class="form-control" name="telepon"
                                                    placeholder="masukkan No Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email <b class="color-red">*</b></label>
                                                <input type="email" id="email" class="form-control"
                                                    name="email">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Alergi Obat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-check-input" type="radio" name="alergi"
                                                    id="alergi"> Tidak
                                                <label for="">
                                                    <input class="form-check-input" type="radio" name="alergi"
                                                        id="alergi" checked> Ya
                                                </label>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Hamil/Menyusui</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-check-input" type="radio" name="hamil_menyusui"
                                                    id="hamil_menyusui"> Tidak
                                                <label for="">
                                                    <input class="form-check-input" type="radio" name="hamil_menyusui"
                                                        id="hamil_menyusui" checked> Ya
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <h3>Data Keluarga</h3>
                                                <div class="form-group">
                                                    <label for="nama">Nama Keluarga <b class="color-red">*</b></label>
                                                    <input type="text" id="nama" class="form-control"
                                                        name="nama" placeholder="Nama Keluarga" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hubungan">Hubungan Keluarga <b class="color-red">*</b></label>
                                                    <input type="text" id="hubungan" class="form-control"
                                                        name="hubungan" placeholder="Hubungan dalam keluarga" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat <b class="color-red">*</b></label>
                                                    <input type="text" id="alamat" class="form-control"
                                                        name="alamat" placeholder="Alamat Keluarga" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                                    <input type="text" id="pekerjaan" class="form-control"
                                                        name="pekerjaan" placeholder="Pekerjaan Keluarga" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telepon">Telepon <b class="color-red">*</b></label>
                                                    <input type="text" id="telepon" class="form-control"
                                                        name="telepon" placeholder="No Telepon Keluarga" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email <b class="color-red">*</b></label>
                                                    <input type="email" id="email" class="form-control"
                                                        name="email" placeholder="Masukkan Email Keluarga" required>
                                                </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </div>

@endsection
