@extends('layouts.dashboard.app')

@section('title', 'View Data Pasien')
@section('kate', 'active')
@section('pasien', 'active')
@section('da', 'active')

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'View Data Pasien')
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
                                <form class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            
                                            <div class="form-group">
                                                <label for="NIK">Nomor Induk Karyawan <b class="color-red">*</b></label>
                                                <input type="text" id="NIK" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                 name="NIK" value="{{ $pasien['NIK'] }}" maxlength="16" disabled>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="perusahaan_id">Perusahaan <b class="color-red">*</b></label>
                                                <input type="text" id="perusahaan_id" class="form-control"
                                                 name="perusahaan_id" value="{{ $pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                                            </div>
                                            <div class="form-group" id="lain" style="display: none;">
                                                <label for="lain">Lain-lain</label>
                                                <input type="text" id="lain" class="form-control" name="lain"
                                                    placeholder="lainnya">
                                            </div>
                                            <div class="form-group">
                                                <label for="divisi_id">Divisi <b class="color-red">*</b></label>
                                                <input type="text" id="divisi_id" class="form-control"
                                                 name="divisi_id" value="{{ $pasien->divisi->nama_divisi_pasien }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan_id">Jabatan <b class="color-red">*</b></label>
                                                <input type="text" id="jabatan_id" class="form-control"
                                                 name="jabatan_id" value="{{ $pasien->jabatan->nama_jabatan }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                                <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien['nama_pasien'] }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir <b class="color-red">*</b></label>
                                                <input type="text" id="tempat_lahir" class="form-control"
                                                 name="tempat_lahir" value="{{ $pasien['tempat_lahir'] }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir <b class="color-red">*</b></label>
                                                <input type="date" id="tanggal_lahir" class="form-control"
                                                 name="tanggal_lahir" value="{{ $pasien['tanggal_lahir'] }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="umur">Umur <b class="color-red">*</b></label>
                                                <input type="number" id="umur" class="form-control"
                                                 name="umur" value="{{ $pasien['umur'] }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin <b class="color-red">*</b></label>
                                                <input type="text" id="jenis_kelamin" class="form-control"
                                                 name="jenis_kelamin" value="{{ $pasien['jenis_kelamin'] }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat <b class="color-red">*</b></label>
                                                <input type="text" id="alamat" class="form-control"
                                                 name="alamat" value="{{ $pasien['alamat'] }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_mess">Alamat Mess</label>
                                                <input type="text" id="alamat_mess" class="form-control"
                                                 name="alamat_mess" value="{{ $pasien['alamat_mess'] }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                                <input type="text" id="pekerjaan" class="form-control"
                                                 name="pekerjaan" value="{{ $pasien['pekerjaan'] }}" disabled>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="telepon">Telepon <b class="color-red">*</b></label>
                                                <input type="text" id="telepon" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                 name="telepon" value="{{ $pasien['telepon'] }}" maxlength="13" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email<b>*</b></label>
                                                <input type="email" id="email" class="form-control"
                                                 name="email" value="{{ $pasien['email'] }}" disabled>
                                            </div>
                                            

                                            
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <h3>Data Keluarga</h3>
                                                <div class="form-group">
                                                    <label for="nama_keluarga">Nama Keluarga <b class="color-red">*</b></label>
                                                    <input type="text" id="nama_keluarga" class="form-control"
                                                 name="nama_keluarga" value="{{ $pasien->keluarga->nama }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hubungan_keluarga">Hubungan Keluarga <b class="color-red">*</b></label>
                                                    <input type="text" id="alamat_keluarga" class="form-control"
                                                        name="alamat_keluarga" value="{{ $pasien->keluarga->hubungan }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_keluarga">Alamat <b class="color-red">*</b></label>
                                                    <input type="text" id="alamat_keluarga" class="form-control"
                                                        name="alamat_keluarga" value="{{ $pasien->keluarga->alamat }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pekerjaan_keluarga">Pekerjaan <b class="color-red">*</b></label>
                                                    <input type="text" id="pekerjaan_keluarga" class="form-control"
                                                        name="pekerjaan_keluarga" value="{{ $pasien->keluarga->pekerjaan }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telepon_keluarga">Telepon <b class="color-red">*</b></label>
                                                    <input type="text" id="telepon_keluarga" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        name="telepon_keluarga" value="{{ $pasien->keluarga->telepon }}" maxlength="13" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_keluarga">Email </label>
                                                    <input type="email_keluarga" id="email_keluarga" class="form-control"
                                                        name="email_keluarga" value="{{ $pasien->keluarga->email }}" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="email_keluarga">Coba </label>
                                                <input type="text" id="" class="form-control"
                                                    name="" value="<?php
                                                    $pasien = $pasien->created_at;
                                                    echo 'RM'.substr( date($pasien, 'Y'), -2).''.$month.''.str_pad($no,4,"0",STR_PAD_LEFT);
                                                    ?>" >
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
