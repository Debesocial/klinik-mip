@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rekam Medis')


@section('judul', 'Lihat Rekam Medis')
@section('container')    
<div class="page-heading">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-content">
                        <div class="card-header">
                            <h5>Detail Rekam Medis</h5>
                        </div>
                        <div class="card-body">
                            <form class="form" action="">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">No Rekam Medis</label>
                                            <input type="text" id="no_rekam medis" class="form-control"
                                                 no_rekam medis="name" value="" placeholder="No Rekam Medis" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Nomor Induk Karyawan</label>
                                            <input type="text" id="nik" class="form-control"
                                                 name="nik" value="" placeholder="Nomor Induk Karyawan" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>
                                    

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="" placeholder="Nama pasien" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Umur</label>
                                            <input type="text" id="umur" class="form-control"
                                                 name="umur" value="" placeholder="Umur" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Perusahaan</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="" placeholder="Nama Perusahaan" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Jabatan</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="" placeholder="Nama Jabatan" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="card-header">
                                        <h5>Riwayat Pemeriksaan</h5>
                                    </div>

                                    <div class="card-body">
                                        <table class="table" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Pemeriksaan</th>
                                                    <th>ID Pemeriksaan</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Diagnosa</th>
                                                    <th>Sub-Klasifikasi Penyakit</th>
                                                    <th>Klasifikasi Penyakit</th>
                                                    <th>Rawat Inap</th>
                                                    <th>aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>22 Desember 2022</td>
                                                    <td><a href="/view/rawat/inap">RI22120001</a></td>
                                                    <td>Martuani</td>
                                                    <td>Masuk angin</td>
                                                    <td>Demam</td>
                                                    <td>Demam tinggi</td>
                                                    <td>aktif</td>
                                                    <td><div class="buttons">
                                                        <a href="/lihat/rekam/medis" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                                        </div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </form> 
                                </div>
        </section>

</div>
@endsection
