@extends('layouts.dashboard.app')

@section('title', 'Ubah Data Pasien')

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Ubah Data Pasien')
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
                                <form class="form" action="/ubah/data/pasien/{{ $pasien->id }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kategori_pasien_id">Kategori Pasien <b class="color-red">*</b></label> 
                                                <select class="choices form-select" name="kategori_pasien_id" id="kategori_pasien_id" required>
                                                    <option disabled selected>Pilih Kategori Pasien</option>
                                                    @foreach ($kategori as $kate)
                                                <option value="{{ $kate->id }}">{{ $kate->nama_kategori }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="NIK">Nomor Induk Karyawan <b class="color-red">*</b></label>
                                                <input type="text" id="NIK" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                 name="NIK" value="{{ $pasien['NIK'] }}" maxlength="16" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="perusahaan_id">Perusahaan <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="perusahaan_id" id="perusahaan_id" onchange="yesnoCheck_lainnya(this);">
                                                    <option disabled selected>Pilih Perusahaan</option>
                                                    <option value="lainnya">other</option>
                                                    @foreach ($perusahaan as $peru)
                                                <option value="{{ $peru->id }}" {{ $peru->id == $pasien->perusahaan->id ? 'selected' : '' }}>{{ $peru->nama_perusahaan_pasien }}</option>
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
                                                <select class="choices form-select" name="divisi_id" id="divisi_id">
                                                    <option disabled selected>Pilih Divisi</option>
                                                    @foreach ($divisi as $div)
                                                <option value="{{ $div->id }}" {{ $div->id == $pasien->divisi->id ? 'selected' : '' }}>{{ $div->nama_divisi_pasien }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan_id">Jabatan <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="jabatan_id" id="jabatan_id">
                                                    <option disabled selected>Pilih Jabatan</option>
                                                    @foreach ($jabatan as $jabat)
                                                <option value="{{ $jabat->id }}" {{ $jabat->id == $pasien->jabatan->id ? 'selected' : '' }}>{{ $jabat->nama_jabatan }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                                <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien['nama_pasien'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir <b class="color-red">*</b></label>
                                                <input type="text" id="tempat_lahir" class="form-control"
                                                 name="tempat_lahir" value="{{ $pasien['tempat_lahir'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir <b class="color-red">*</b></label>
                                                <input type="date" id="tanggal_lahir" class="form-control"
                                                 name="tanggal_lahir" value="{{ $pasien['tanggal_lahir'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="umur">Umur <b class="color-red">*</b></label>
                                                <input type="number" id="umur" class="form-control"
                                                 name="umur" value="{{ $pasien['umur'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option disabled selected></option>
                                                    <option value="Laki_laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat <b class="color-red">*</b></label>
                                                <input type="text" id="alamat" class="form-control"
                                                 name="alamat" value="{{ $pasien['alamat'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_mess">Alamat Mess</label>
                                                <input type="text" id="alamat_mess" class="form-control"
                                                 name="alamat_mess" value="{{ $pasien['alamat_mess'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                                <input type="text" id="pekerjaan" class="form-control"
                                                 name="pekerjaan" value="{{ $pasien['pekerjaan'] }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="telepon">Telepon <b class="color-red">*</b></label>
                                                <input type="text" id="telepon" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                 name="telepon" value="{{ $pasien['telepon'] }}" maxlength="13" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email<b>*</b></label>
                                                <input type="email" id="email" class="form-control"
                                                 name="email" value="{{ $pasien['email'] }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Alergi Obat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-check-input" type="radio" name="alergi_obat"
                                                    id="alergi_obat" value="0"> Tidak
                                                    <input class="form-check-input" type="radio" name="alergi_obat"
                                                        id="alergi_obat" value="1" checked> Ya
                                            </div>

                                            <div class="col-md-2">
                                                <label>Hamil/Menyusui</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-check-input" type="radio" name="hamil_menyusui"
                                                    id="hamil_menyusui" value="0"> Tidak
                                                <label for="">
                                                    <input class="form-check-input" type="radio" name="hamil_menyusui"
                                                        id="hamil_menyusui" value="1" checked> Ya
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <h3>Data Keluarga</h3>
                                                <div class="form-group">
                                                    <label for="nama_keluarga">Nama Keluarga <b class="color-red">*</b></label>
                                                    <input type="text" id="nama_keluarga" class="form-control"
                                                 name="nama_keluarga" value="{{ $pasien->keluarga->nama }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hubungan_keluarga">Hubungan Keluarga <b class="color-red">*</b></label>
                                                    <select class="choices form-select" id="hubungan_keluarga" name="hubungan_keluarga">
                                                        <option disabled selected>Pilih Hubungan Keluarga</option>
                                                    @foreach ($keluarga as $kel)
                                                <option value="{{ $kel->id }}" {{ $kel->id == $pasien->keluarga->id ? 'selected' : '' }}>{{ $kel->hubungan }}</option>
                                                @endforeach
                                                <option value="Ayah">Ayah</option>
                                                        <option value="Ibu">Ibu</option>
                                                        <option value="Adik">Adik</option>
                                                        <option value="Abang">Abang</option>
                                                        <option value="Kakak">Kakak</option>
                                                        <option value="Ayah Mertua">Ayah Mertua</option>
                                                        <option value="Ibu Mertua">Ibu Mertua</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_keluarga">Alamat <b class="color-red">*</b></label>
                                                    <input type="text" id="alamat_keluarga" class="form-control"
                                                        name="alamat_keluarga" value="{{ $pasien->keluarga->alamat }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pekerjaan_keluarga">Pekerjaan <b class="color-red">*</b></label>
                                                    <input type="text" id="pekerjaan_keluarga" class="form-control"
                                                        name="pekerjaan_keluarga" value="{{ $pasien->keluarga->pekerjaan }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telepon_keluarga">Telepon <b class="color-red">*</b></label>
                                                    <input type="text" id="telepon_keluarga" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        name="telepon_keluarga" value="{{ $pasien->keluarga->telepon }}" maxlength="13" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_keluarga">Email </label>
                                                    <input type="email_keluarga" id="email_keluarga" class="form-control"
                                                        name="email_keluarga" value="{{ $pasien->keluarga->email }}" required>
                                            </div>
                                            <div class=" d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Simpan</button>
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
