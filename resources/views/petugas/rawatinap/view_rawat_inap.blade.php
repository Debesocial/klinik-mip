@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rawat Inap')
@section('breadcrumb', 'lihat_rawat_inap')
@section('periksa', 'active')
@section('inap', 'active')
@section('judul', 'Lihat Rawat Inap')
@section('css')
    <style>
        input[type=radio] {
            transform: scale(1.5);
            margin-right: 0.3rem;
        }
        
        th{
            white-space: nowrap;
            vertical-align: top;
        }
        
    </style>
@stop
@section('container')

<div class="row">
    <div class="col-11">
        <h5>Data Rawat Inap <i>{{ $rawat_inap->id_rawat_inap }}</i></h5>
    </div>
    <div class="text-end col-1">
        <a href="#" class="toogle-show" stat=1 onclick="showDetail()" ><span class="badge bg-secondary" id="badge-toogle"><i class="bi bi-caret-up-fill"></i></a>
    </div>
</div>
<div class="card" id="bio-pasien">
    <div class="card-body" >
        <div class="row mb-3">
            <div class="col-md-7">
                <div class="row mb-2">
                    <h5 class="card-title">Biodata Pasien</h5>
                    <div class="table-responsive">
                        @php
                            $pasien = $rawat_inap->pasien;
                        @endphp
                        <div hidden>{{ $rawat_inap->pasien->perusahaan->nama_perusahaan_pasien . $rawat_inap->pasien->divisi->nama_divisi_pasien . $rawat_inap->pasien->jabatan->nama_jabatan .$rawat_inap->pasien->keluarga }}</div>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <td id="nama">: <a href="#" onclick="tampilModalPasien({{ json_encode($pasien) }})">{{ $pasien->nama_pasien }}</a></td>
                                </tr>
                                <tr>
                                    <th>ID Rekam Medis</th>
                                    <td id="rekam_medis">: {{ $pasien->id_rekam_medis}}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td id="ttl">: {{ $pasien->tempat_lahir .', '. $pasien->tanggal_lahir}}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td id="alamat">: {{ $pasien->alamat}}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td id="pekerjaan">: {{ $pasien->pekerjaan}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h5 class="card-title">Data Pemeriksaan</h5>
                <table class="table table-striped table-borderless table-hover">
                    <tbody>
                        <tr>
                            <th>Mulai Dirawat</th>
                            <td id="_mulai_rawat">
                                :  {{ $rawat_inap->mulai_rawat }}
                            </td>
                        </tr>
                        <tr>
                            <th>Berakhir Dirawat
                            </th>
                            <td id="_berakhir_rawat">
                                :  {{ $rawat_inap->berakhir_rawat }}
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Penyakit</th>
                            <td id="_nama_penyakit_id">
                                :  {{ $rawat_inap->namapenyakit->primer }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
</div>


<div class="tab-content text-justify">
    <div class="tab-pane fade show active" id="list-dokter" role="tabpanel" aria-labelledby="list-dokter-list">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h6>Pemeriksaan Instruksi Dokter</h6>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="buttons" width="100px">
                            <a href="" class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="TABLE_1">
                        <thead>
                            <tr>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Nama Pasien</th>
                                <th>Diagnosa</th>
                                <th>Sub-Klasifikasi Penyakit</th>
                                <th>Klasifikasi Penyakit</th>
                                <th>Rawat Inap</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>        
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="list-perawat" role="tabpanel" aria-labelledby="list-perawat-list">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h6>Pemeriksaan Intervensi Keperawatan</h6>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="buttons" width="100px">
                            <a href="" class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
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
            </div>
        </div>
    </div>                                            
    <div class="tab-pane fade" id="list-makanan" role="tabpanel" aria-labelledby="list-makanan-list">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h6>Permintaan Makanan</h6>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="buttons" width="100px">
                            <a href="" class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
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
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="list-tandavital" role="tabpanel" aria-labelledby="list-tandavital-list">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h6>Pemantauan Tanda Vital</h6>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="buttons" width="100px">
                            <a href="" class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
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
            </div>
        </div>
    </div>
</div>


          
@section('js')
    <script type="text/javascript" defer="defer">
        $(document).ready(function() {
            $("table[id^='TABLE']").DataTable( {    
                "scrollCollapse": true,
                "searching": true,
                "paging": true
            } );
        } );

        function showDetail(val){
            var toogle = $('.toogle-show');
            if (toogle.attr('stat')==1) {
                $('#bio-pasien').hide('slow');
                $('#badge-toogle').html('<i class="bi bi-caret-down-fill">')
                toogle.attr('stat',0);
            }else{
                $('#bio-pasien').show('slow');
                $('#badge-toogle').html('<i class="bi bi-caret-up-fill">')
                toogle.attr('stat',1);
            }
        }
    </script>
@endsection


@endsection