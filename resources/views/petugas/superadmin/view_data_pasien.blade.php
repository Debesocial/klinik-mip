@extends('layouts.dashboard.app')
@section('title', 'Lihat Data Pasien')
@section('judul', 'Lihat Data Pasien')
@section('breadcrumb', 'lihat_data_pasien')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h5>Data Pasien</h5>
                                    <div class="form-group">
                                        <label for="">Kategori pasien </label>
                                        <input type="text" id="" class="form-control" name="" value="{{ $pasien->kategori->nama_kategori }}" disabled>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nama_pasien">Nama Pasien </label>
                                        <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" value="{{ $pasien['nama_pasien'] }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="NIK">Nomor Induk Karyawan </label>
                                        <input type="text" id="NIK" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="NIK" value="{{ $pasien['NIK'] }}" maxlength="16" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor Induk Kependudukan </label>
                                        <input type="text" class="form-control"  value="{{ $pasien['penduduk'] }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="perusahaan_id">Perusahaan </label>
                                        <input type="text" id="perusahaan_id" class="form-control" name="perusahaan_id" value="{{ $pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                                    </div>
                                    <div class="form-group" id="lain" style="display: none;">
                                        <label for="lain">Lain-lain</label>
                                        <input type="text" id="lain" class="form-control" name="lain" placeholder="lainnya">
                                    </div>
                                    <div class="form-group">
                                        <label for="divisi_id">Divisi </label>
                                        <input type="text" id="divisi_id" class="form-control" name="divisi_id" value="{{ $pasien->divisi->nama_divisi_pasien }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan_id">Jabatan </label>
                                        <input type="text" id="jabatan_id" class="form-control" name="jabatan_id" value="{{ $pasien->jabatan->nama_jabatan }}" disabled>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir </label>
                                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" value="{{ $pasien['tempat_lahir'] }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir </label>
                                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="{{ $pasien['tanggal_lahir'] }}" disabled>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="umur">Umur </label>
                                        <input type="number" id="umur" class="form-control" name="umur" value="<?php
                                        $tanggal_lahir = $pasien['tanggal_lahir'];
                                        $lahir    = new DateTime($tanggal_lahir);
                                        $today        = new DateTime('today');
                                        $usia = $today->diff($lahir);
                                        echo $usia->y;
                                        echo " Tahun ";
                                        ?>" disabled>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin </label>
                                        <input type="text" id="jenis_kelamin" class="form-control" name="jenis_kelamin" value="{{ $pasien['jenis_kelamin'] }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat </label>
                                        <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $pasien['alamat'] }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_mess">Alamat Mess</label>
                                        <input type="text" id="alamat_mess" class="form-control" name="alamat_mess" value="{{ $pasien['alamat_mess'] }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan </label>
                                        <input type="text" id="pekerjaan" class="form-control" name="pekerjaan" value="{{ $pasien['pekerjaan'] }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="telepon">Telepon </label>
                                        <input type="text" id="telepon" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telepon" value="{{ $pasien['telepon'] }}" maxlength="13" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" value="{{ $pasien['email'] }}" disabled>
                                    </div>
                                </div>

                    

                                        <div class="col-md-6 col-12">
                                            <h5>Data Keluarga</h5>
                                                <div class="form-group">
                                                    <label for="nama_keluarga">Nama Keluarga </label>
                                                    <input type="text" id="nama_keluarga" class="form-control"
                                                 name="nama_keluarga" value="{{ $pasien->keluarga->nama }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hubungan_keluarga">Hubungan Keluarga </label>
                                                    <input type="text" id="alamat_keluarga" class="form-control"
                                                        name="alamat_keluarga" value="{{ $pasien->keluarga->hubungan }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_keluarga">Alamat </label>
                                                    <input type="text" id="alamat_keluarga" class="form-control"
                                                        name="alamat_keluarga" value="{{ $pasien->keluarga->alamat }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pekerjaan_keluarga">Pekerjaan </label>
                                                    <input type="text" id="pekerjaan_keluarga" class="form-control"
                                                        name="pekerjaan_keluarga" value="{{ $pasien->keluarga->pekerjaan }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telepon_keluarga">Nomor Telepon </label>
                                                    <input type="text" id="telepon_keluarga" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        name="telepon_keluarga" value="{{ $pasien->keluarga->telepon }}" maxlength="13" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_keluarga">Email </label>
                                                    <input type="email_keluarga" id="email_keluarga" class="form-control"
                                                        name="email_keluarga" value="{{ $pasien->keluarga->email }}" disabled>
                                            </div>

                                            {{-- <div class="form-group">
                                                <div class="col-4">
                                                    <button type="button" class="form-control btn btn-secondary me-1 mb-1" onclick="javascript:window.history.back();"> Kembali</button>
                                                </div>
                                            </div> --}}
                                           
                                        </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection