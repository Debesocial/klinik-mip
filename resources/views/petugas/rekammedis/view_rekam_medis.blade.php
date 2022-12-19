@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rekam Medis')


@section('judul', 'Lihat Data Rekam Medis')
@section('container')    
<div class="page-heading">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            {{-- @error("message")
                    <p class="text-danger">{{$message}}</p>
                @enderror --}}
                            <form class="form" action="">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">No Rekam Medis</label>
                                            <input type="text" id="name" class="form-control"
                                                 name="name" value="{{ $pasien['id_rekam_medis'] }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Nomor Induk Kependudukan</label>
                                            <input type="text" id="nik" class="form-control"
                                                 name="nik" value="{{ $pasien['NIK'] }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>
                                    

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien['nama_pasien'] }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Perusahaan</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien->perusahaan->nama_perusahaan_pasien }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Jabatan</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien->jabatan->nama_jabatan }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Umur</label>
                                            <input type="text" id="umur" class="form-control"
                                                 name="umur" value="<?php 
                                                 $tanggal_lahir = $pasien->tanggal_lahir;
                                                 $lahir    =new DateTime($tanggal_lahir);
                                                 $today        =new DateTime('today');
                                                 $usia = $today->diff($lahir);
                                                 echo $usia->y; echo " Tahun ";
                                                 ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="card-body">
                                        <table class="table" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Pemeriksaan</th>
                                                    <th>Nama</th>
                                                    <th>Diagnosa</th>
                                                    <th>Sub-Klasifikasi Penyakit</th>
                                                    <th>Klasifikasi Penyakit</th>
                                                    <th>Rawat Inap</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                    
                                    
                                </form>
                                        
                                </div>

                                    </section>

</div>
@endsection
