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
                                                <label for="kategori_pasien">Kategori Pasien <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="kategori_pasien" id="kategori_pasien">
                                                    <option value="">Pilih Kategori Pasien</option>
                                                    @foreach ($kategori as $kate)
                                                <option value="{{ $kate->id }}">{{ $kate->nama_kategori }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="NIK">NIK <b class="color-red">*</b></label>
                                                <input type="text" id="NIK" class="form-control"
                                                 name="NIK" value="{{ $pasien['NIK'] }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="perusahaan">Perusahaan <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="perusahaan" id="perusahaan" onchange="yesnoCheck_lainnya(this);">
                                                    <option value="">Pilih Perusahaan</option>
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
                                                <label for="divisi">Divisi <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="divisi" id="divisi">
                                                    <option value="">Pilih Divisi</option>
                                                    @foreach ($divisi as $div)
                                                <option value="{{ $div->id }}" {{ $div->id == $pasien->divisi->id ? 'selected' : '' }}>{{ $div->nama_divisi_pasien }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan">Jabatan <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="jabatan" id="jabatan">
                                                    <option value="">Pilih Jabatan</option>
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
                                                <input type="text" id="umur" class="form-control"
                                                 name="umur" value="{{ $pasien['umur'] }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option value=""></option>
                                                    <option value="Pria">Laki-laki</option>
                                                    <option value="Wanita">Perempuan</option>
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
                                                <input type="text" id="telepon" class="form-control"
                                                 name="telepon" value="{{ $pasien['telepon'] }}" required>
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
                                                <input class="form-check-input" type="radio" name="alergi"
                                                    id="alergi" value="0"> Tidak
                                                    <input class="form-check-input" type="radio" name="alergi"
                                                        id="alergi" value="1" checked> Ya
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
                                                    <label for="alamat_keluarga">Hubungan Keluarga <b class="color-red">*</b></label>
                                                    <select class="choices form-select">
                                                        <option value=""></option>
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
                                                    <input type="text" id="telepon_keluarga" class="form-control"
                                                        name="telepon_keluarga" value="{{ $pasien->keluarga->telepon }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_keluarga">Email </label>
                                                    <input type="email_keluarga" id="email_keluarga" class="form-control"
                                                        name="email_keluarga" value="{{ $pasien->keluarga->email }}" required>
                                            </div>
                                            <div class=" d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Submit</button>
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
