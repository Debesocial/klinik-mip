@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rawat Inap')

@section('judul', 'Lihat Rawat Inap')
@section('container')
<div class="page-heading">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h5>Detail Rawat Inap</h5>
                        </div>
                        <div class="card-body">
                            <form class="form" action="">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Tanggal Mulai Rawat Inap</label>
                                            <input type="date" id="" class="form-control"  value="{{ ($rawat_inap->mulai_rawat) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Tanggal Berakhirnya Rawat Inap</label>
                                            <input type="date" id="" class="form-control"  value="{{ ($rawat_inap->berakhir_rawat) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">ID Rawat Inap</label>
                                            <input type="text" id="" class="form-control"  value="{{ ($rawat_inap->id_rawat_inap) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Nomor Induk Karyawan</label>
                                            <input type="text" id="" class="form-control"  placeholder="Nomor Induk Karyawan" value="{{ $pasien['NIK'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input type="text" id="nama_pasien" class="form-control" name="nama_pasien"
                                                value="{{ $pasien['nama_pasien'] }}" placeholder="Nama pasien" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Diagnosa</label>
                                            <input type="text" id="diagnosa" class="form-control" value="{{ ($rawat_inap->namapenyakit->primer) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pasien">Sub Klasifikasi Penyakit</label>
                                            <input type="text" id="" class="form-control" name="" value=""
                                                placeholder="Sub Klasifikasi Penyakit" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Klasifikasi Penyakit</label>
                                            <input type="text" id="" class="form-control" name="" value=""
                                                placeholder="Klasifikasi Penyakit" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <input type="text" id="" class="form-control" name="" value=""
                                                placeholder="Status" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <br><br><br><br>
                                    <div class="card-header">
                                        <h5 class="card-title">Hasil Pemeriksaan</h5>
                                    </div>

                                    <div class="page-heading">

                                        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist"
                                            style="width: 100%">
                                            <a class="list-group-item list-group-item-action active"
                                                id="list-dokter-list" data-bs-toggle="list" href="#list-dokter"
                                                role="tab">Pemeriksaan Instruksi Dokter</a>
                                            <a class="list-group-item list-group-item-action" id="list-perawat-list"
                                                data-bs-toggle="list" href="#list-perawat" role="tab">Pemeriksaan
                                                Intervensi Keperawatan</a>
                                            <a class="list-group-item list-group-item-action" id="list-makanan-list"
                                                data-bs-toggle="list" href="#list-makanan" role="tab">Permintaan
                                                Makanan</a>
                                            <a class="list-group-item list-group-item-action" id="list-tandavital-list"
                                                data-bs-toggle="list" href="#list-tandavital" role="tab">Pemantaauan
                                                Tanda Vital</a>
                                        </div>

                                        <div class="tab-content text-justify">
                                            <div class="tab-pane fade show active" id="list-dokter" role="tabpanel"
                                                aria-labelledby="list-dokter-list">
                                                <section id="basic-horizontal-layouts">
                                                    <div class="row match-height">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="buttons" width="100px">
                                                                        <a href="" class="btn btn-success rounded-pill">
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
                                                                                        <th>Diagnosa</th>
                                                                                        <th>Sub-Klasifikasi Penyakit
                                                                                        </th>
                                                                                        <th>Klasifikasi Penyakit</th>
                                                                                        <th>Rawat Inap</th>
                                                                                        <th>aksi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>22 Desember 2022</td>
                                                                                        <td><a
                                                                                                href="/view/rawat/inap">RI22120001</a>
                                                                                        </td>
                                                                                        <td>Martuani</td>
                                                                                        <td>Masuk angin</td>
                                                                                        <td>Demam</td>
                                                                                        <td>Demam tinggi</td>
                                                                                        <td>aktif</td>
                                                                                        <td>
                                                                                            <div class="buttons">
                                                                                                <a href="/lihat/rekam/medis" title="Lihat Data"class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
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

                                            <div class="tab-pane fade" id="list-perawat" role="tabpanel" aria-labelledby="list-perawat-list">
                                                <section id="basic-horizontal-layouts">
                                                    <div class="row match-height">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <div class="buttons" width="100px">
                                                                        <a href="" class="btn btn-success rounded-pill">
                                                                            <i class="fa fa-plus"></i>
                                                                            <span>Tambah</span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <form class="form form-horizontal">
                                                                            <div class="form-body table-responsive">
                                                                                <table class="table" id="TABLE_2">
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
                                            
                                                    </div>
                                                </section>
                                            </div>

                                            
<div class="tab-pane fade" id="list-makanan" role="tabpanel" aria-labelledby="list-makanan-list">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="buttons" width="100px">
                            <a href="" class="btn btn-success rounded-pill">
                                <i class="fa fa-plus"></i>
                                <span>Tambah</span></a>
                        </div>
                    </div>
                    <div class="card-content">
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

        </div>
    </section>
</div>

<div class="tab-pane fade" id="list-tandavital" role="tabpanel" aria-labelledby="list-tandavital-list">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="buttons" width="100px">
                            <a href="" class="btn btn-success rounded-pill">
                                <i class="fa fa-plus"></i>
                                <span>Tambah</span></a>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body table-responsive">
                                    <table class="table" id="TABLE_4">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Pemeriksaan</th>
                                                <th>ID Pemeriksaan</th>
                                                <th>Nama Pasien</th>
                                                <th>Skala Nyeri</th>
                                                <th>HR</th>
                                                <th>BP</th>
                                                <th>Temp</th>
                                                <th>RR</th>
                                                <th>Saturasi Oksigen</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>22 Desember 2022</td>
                                                <td>RP22120001</td>
                                                <td>Martuani</td>
                                                <td>B</td>
                                                <td>B</td>
                                                <td>B</td>
                                                <td>B</td>
                                                <td>B</td>
                                                <td>B</td>
                                                <td>
                                                    <div class="buttons">
                                                        <a href="/lihat/rekam/medis" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
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

@endsection