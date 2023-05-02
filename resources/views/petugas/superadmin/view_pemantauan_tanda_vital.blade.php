@extends('layouts.dashboard.app')

@section('title', 'View Pemantauan Tanda vital')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('tandavital', 'active')
@section('breadcrumb', 'lihat_pemantauan_tanda_vital')
@section('judul', 'View Pemantauan Tanda vital')
@section('container')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="card-title">Biodata Pasien</h5>
                    <div class="table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <td id="nama">: {{ $pemantauan->pasien->nama_pasien }}</td>
                                </tr>
                                <tr>
                                    <th>ID Rekam Medis</th>
                                    <td id="rekam_medis">: {{ $pemantauan->pasien->id_rekam_medis }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Karyawan</th>
                                    <td id="nomor_induk_karyawan">: {{ $pemantauan->pasien->NIK }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td id="ttl">: {{ $pemantauan->pasien->tempat_lahir.', '.$pemantauan->pasien->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td id="alamat">: {{ $pemantauan->pasien->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td id="pekerjaan">: {{ $pemantauan->pasien->pekerjaan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">Hasil Pemeriksaan Tanda Vital</h5>
                    <table class="table table-striped table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Skala Nyeri</th>
                                <td id="_skala_nyeri">
                                    : {{ $pemantauan->skala_nyeri }}
                                </td>
                            </tr>
                            <tr>
                                <th>HR</th>
                                <td id="_hr">
                                    : {{ $pemantauan->hr }}
                                </td>
                            </tr>
                            <tr>
                                <th>BP</th>
                                <td id="_bp">
                                    : {{ $pemantauan->bp }}
                                </td>
                            </tr>
                            <tr>
                                <th>Temp</th>
                                <td id="_temp">
                                    : {{ $pemantauan->temp }}
                                </td>
                            </tr>
                            <tr>
                                <th>RR</th>
                                <td id="_rr">
                                    : {{ $pemantauan->rr }}
                                </td>
                            </tr>
                            <tr>
                                <th>Saturasi Oksigen</th>
                                <td id="_saturasi_oksigen">
                                    : {{ $pemantauan->saturasi_oksigen }}
                                </td>
                            </tr>
                            <tr>
                                <th>Ketetangan</th>
                                <td id="_keterangan">: {{ $pemantauan->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        
            </div>
        </div>
    </div>
</div>



@endsection