@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rawat Jalan')
@section('pemeriksaan', 'active')
@section('jalan', 'active')
@section('breadcrumb', 'lihat_rawat_jalan')
@section('judul', 'Lihat Data Rawap Jalan')
@section('container')
@section('css')
    <style>
        
        th{
            white-space: nowrap;
            vertical-align: top;
        }
    </style>
@stop
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h5>Biodata Pasien</h5>
                <div class="table-responsive">
                    <table>
                        <tbody>
                            <tr>
                                <th>Nama Pasien</th>
                                <div hidden>{{ $rawat_jalan->pasien->perusahaan->nama_perusahaan_pasien . $rawat_jalan->pasien->divisi->nama_divisi_pasien . $rawat_jalan->pasien->jabatan->nama_jabatan . $rawat_jalan->pasien->keluarga}}</div>
                                <td id="nama"> <a href="#" onclick="tampilModalPasien({{ json_encode($rawat_jalan->pasien) }})">: {{ $rawat_jalan->pasien->nama_pasien }}</a></td>
                            </tr>
                            <tr>
                                <th>ID Rekam Medis</th>
                                <td id="rekam_medis">: {{ $rawat_jalan->pasien->id_rekam_medis }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Tanggal Lahir</th>
                                <td id="ttl">: {{ $rawat_jalan->pasien->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td id="alamat">: {{ $rawat_jalan->pasien->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td id="pekerjaan">: {{ $rawat_jalan->pasien->pekerjaan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="card-title">Data Pemeriksaan</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Tangga Berobat</th>
                                <td id="_tanggal_berobat">
                                    : {{ $rawat_jalan->tanggal_berobat }}
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Penyakit</th>
                                <td id="_nama_penyakit_id">
                                    : {{ $rawat_jalan->namapenyakit->primer }}
                                </td>
                            </tr>
                            <tr>
                                <th>Tindakan
                                </th>
                                <td id="_tindakan_id">
                                    : {{ $rawat_jalan->tindakan->nama_tindakan }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  

@endsection
