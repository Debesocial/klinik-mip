@extends('layouts.dashboard.app')
@section('title', 'Lihat Data Petugas')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')

@section('judul', 'Lihat Data Petugas')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Data Mitra Kerja</h5><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Mitra Kerja</label> <b class="color-red">*</b></label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Petugas" value="{{ $user['name'] }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nik">Nomor Induk Karyawan</label> <b class="color-red">*</b></label>
                                            <input type="text" id="nik" class="form-control" name="statsu" value="{{ $user['nik'] }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email <b class="color-red">*</b></label>
                                            <input type="text" id="email" class="form-control" name="email" value="{{ $user['email'] }}" disabled>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="level_id">Level </label> <b class="color-red">*</b></label>
                                            <input type="level_id" id="level_id" class="form-control" name="email" value="{{ $user->level->nama_level }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="perusahaan">Perusahaan</label> <b class="color-red">*</b></label>
                                            <input type="text" id="perusahaan" class="form-control" name="perusahaan" value="{{ $user->perusahaan->nama_perusahaan_pasien }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="divisi">Divisi</label> <b class="color-red">*</b></label>
                                            <input type="text" id="divisi" class="form-control" name="divisi" value="{{ $user->divisi->nama_divisi_pasien }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon</label> <b class="color-red">*</b></label>
                                            <input type="text" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telp" value="{{ $user['telp'] }}" maxlength="13" disabled>
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status</label> <b class="color-red">*</b></label>
                                            <input type="text" id="statsu" class="form-control" name="statsu" value="{{ $user['status'] }}" disabled>
                                        </div>
                                    </div>

                                    
                                    <button type="button" style="width: 50%" class="form-control btn btn-secondary me-1 mb-1" onclick="javascript:window.history.back();"> Kembali</button>
                                </div>

                                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection