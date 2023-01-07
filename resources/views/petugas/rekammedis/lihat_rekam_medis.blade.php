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
                                                 no_rekam medis="name" value="{{ $pasien->id_rekam_medis }}" placeholder="No Rekam Medis" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Nomor Induk Karyawan</label>
                                            <input type="text" id="nik" class="form-control"
                                                 name="nik" value="{{ $pasien->NIK }}" placeholder="Nomor Induk Karyawan" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>
                                    

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien->nama_pasien }}" placeholder="Nama pasien" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Umur</label>
                                            <input type="text" class="form-control" value="<?php
                                            $tanggal_lahir = $pasien->tanggal_lahir;
                                            $lahir    = new DateTime($tanggal_lahir);
                                            $today        = new DateTime('today');
                                            $usia = $today->diff($lahir);
                                            echo $usia->y;
                                            echo " Tahun ";
                                            ?>" placeholder="Umur" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Perusahaan</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien->perusahaan->nama_perusahaan_pasien }}" placeholder="Nama Perusahaan" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Jabatan</label>
                                            <input type="text" id="nama_pasien" class="form-control"
                                                 name="nama_pasien" value="{{ $pasien->jabatan->nama_jabatan }}" placeholder="Nama Jabatan" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="card-header">
                                        <h5>Riwayat Pemeriksaan</h5>
                                    </div>

                                    <div class="page-heading">

                                        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist"
                                            style="width: 100%">
                                            <a class="list-group-item list-group-item-action active"
                                                id="list-narkoba-list" data-bs-toggle="list" href="#list-narkoba"
                                                role="tab">Pemeriksaan Narkoba</a>
                                            <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list"
                                                data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan Covid-19</a>
                                            <a class="list-group-item list-group-item-action" id="list-covid-list"
                                                data-bs-toggle="list" href="#list-covid" role="tab">Pemantaauan Covid-19</a>
                                        </div>

                                        <div class="tab-content text-justify">
                                            <div class="tab-pane fade show active" id="list-narkoba" role="tabpanel"
                                                aria-labelledby="list-narkoba-list">
                                                <section id="basic-horizontal-layouts">
                                                    <div class="row match-height">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="buttons" width="100px">
                                                                        <a href="/pemeriksaan/narkotika/{{ $pasien->id }}" class="btn btn-success rounded-pill">
                                                                            <i class="fa fa-plus"></i>
                                                                            <span>Tambah</span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form class="form form-horizontal">
                                                                        <div class="form-body table-responsive">
                                                                            <table class="table" id="TABLE_1">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Tanggal Pemeriksaan</th>
                                                                                        <th>ID Pemeriksaan</th>
                                                                                        <th>Nama Pasien</th>
                                                                                        <th>Penggunaan Obat</th>
                                                                                        <th>Jenis Obat</th>
                                                                                        <th>Asal Obat</th>
                                                                                        <th>Terakhir digunakan</th>
                                                                                        <th>Aksi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($test as $tes)
                                                                                    <tr>
                                                                                        <td><B>{{ Carbon\Carbon::parse($tes->created_at)->isoFormat('D MMMM Y') }}</B>
                                                                                            <br>{{ Carbon\Carbon::parse($tes->created_at)->format('H:i:s') }}
                                                                                        </td>
                                                                                        <td>{{ $tes->pasien->id_rekam_medis }}</td>
                                                                                        <td><a href="/view/data/pasien/{{$pasien->id}}">{{ $tes->pasien->nama_pasien }}</a></td>
                                                                                        <td>{{ $tes->penggunaan_obat }}</td>
                                                                                        <td>{{ $tes->jenis_obat }}</td>
                                                                                        <td>{{ $tes->asal_obat }}</td>
                                                                                        <td>{{ $tes->terakhir_digunakan }}</td>
                                                                                        <td><div class="buttons">
                                                                                            <a href="/view/pemeriksaan/narkoba/{{$tes->id }}" title="Lihat Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                                                                            <a href="/ubah/pemeriksaan/narkoba/{{$tes->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>

                                            <div class="tab-pane fade" id="list-pemeriksaan" role="tabpanel" aria-labelledby="list-pemeriksaan-list">
                                                <section id="basic-horizontal-layouts">
                                                    <div class="row match-height">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="buttons" width="100px">
                                                                        <a href="/add/pemeriksaan/covid/{{ $pasien->id }}" class="btn btn-success rounded-pill">
                                                                            <i class="fa fa-plus"></i>
                                                                            <span>Tambah</span></a>
                                                                    </div>
                                                                </div>
                                                                    <div class="card-body">
                                                                        <form class="form form-horizontal">
                                                                            <div class="form-body table-responsive">
                                                                                <table class="table" id="TABLE_2">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Tanggal Pemeriksaan</th>
                                                                                            <th>Nama Pasien</th>
                                                                                            <th>Pemeriksaan Antigen</th>
                                                                                            <th>aksi</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($covid as $cov)
                                                                                        <tr>
                                                                                            <td><B>{{ Carbon\Carbon::parse($cov->created_at)->isoFormat('D MMMM Y') }}</B>
                                                                                                <br>{{ Carbon\Carbon::parse($cov->created_at)->format('H:i:s') }}
                                                                                            </td>
                                                                                            <td><a href="/view/data/pasien/{{$pasien->id}}">{{ $cov->pasien->nama_pasien }}</a></td>
                                                                                            <td>{{ $cov->pemeriksaan->kebutuhan }}</td>
                                                                                            <td><div class="buttons">
                                                                                                <a href="/view/rawat/inap/{{$pasien->id}}" title="Lihat Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                                                                                <a href="/ubah/pemeriksaan/covid/{{$cov->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                            </div>
                                                        </div>
                                            
                                                    </div>
                                                </section>
                                            </div>

                                            
<div class="tab-pane fade" id="list-covid" role="tabpanel" aria-labelledby="list-covid-list">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="buttons" width="100px">
                            <a href="/pemantauan/covid" class="btn btn-success rounded-pill">
                                <i class="fa fa-plus"></i>
                                <span>Tambah</span></a>
                        </div>
                    </div>
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body table-responsive">
                                    <table class="table" id="TABLE_3">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Permintaan</th>
                                                <th>ID Rawat Inap</th>
                                                <th>Nama Pasien</th>
                                                <th>Diagnosa</th>
                                                <th>Permintaan Makanan</th>
                                                <th>Catatan</th>
                                                <th>Tanggal diberikan</th>
                                                <th>Tanggal berakhirnya</th>
                                                <th>Total Pemberian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>22 Desember 2022</td>
                                                <td><a href="/view/rawat/inap">RI22120001</a></td>
                                                <td>Martuani</td>
                                                <td>Masuk angin</td>
                                                <td>Kepiting</td>
                                                <td>Supaya lekas sembuh</td>
                                                <td>22 Desember 2022</td>
                                                <td>22 Desember 2022</td>
                                                <td>30 haris</td>
                                                <td>
                                                    <div class="buttons">
                                                        <a href="/lihat/rekam/medis" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                                        <a href="" class="btn btn-success rounded-pill" title="Ubah data"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
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


<script type="text/javascript" defer="defer">
    $(document).ready(function() {
        $("table[id^='TABLE']").DataTable( {    
            "scrollCollapse": true,
            "searching": true,
            "paging": true
        } );
    } );
</script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

@include('sweetalert::alert')
@endsection
