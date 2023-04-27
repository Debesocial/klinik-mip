@extends('layouts.dashboard.app')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')

@section('title', 'Lihat Data Pemeriksaan Covid-19')
@section('breadcrumb', 'lihat_pemeriksaan_covid')
@section('judul', 'Lihat Data Pemeriksaan Covid-19')
@section('container')


<div class="card">
    <div class="card-body">
        <div class="container mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h5>Biodata Pasien</h5>
                    <div class="table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <td id="nama">: {{ $covid->pasien->nama_pasien }}</td>
                                </tr>
                                <tr>
                                    <th>ID Rekam Medis</th>
                                    <td id="rekam_medis">: {{ $covid->pasien->id_rekam_medis }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Karyawan</th>
                                    <td id="nomor_induk_karyawan">: {{ $covid->pasien->NIK }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td id="ttl">: {{ $covid->pasien->tempat_lahir.', '.$covid->pasien->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td id="alamat">: {{ $covid->pasien->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td id="pekerjaan">: {{ $covid->pasien->pekerjaan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Data Pemeriksaan</h5>
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Kebutuhan Pemeriksaan</th>
                                <td id="kebutuhan">: {{ $covid->pemeriksaan->kebutuhan }}</td>
                            </tr>
                            <tr>
                                <th>Hasil Pemeriksaan</th>
                                <td id="hasil">: 
                                    @if ($covid->hasil_pemeriksaan==1)
                                        <span class="badge bg-danger">Positif</span>
                                    @else
                                        <span class="badge bg-primary">Negatif</span>
                                    @endif
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