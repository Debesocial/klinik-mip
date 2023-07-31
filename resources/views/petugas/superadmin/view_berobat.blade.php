@extends('layouts.dashboard.app')
@section('title', 'Detail Keterangan Berobat')
@section('berobat', 'active')
@section('breadcrumb', 'lihat_keterangan_berobat')

@section('judul', 'Detail Keterangan Berobat')
@section('container')


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <div class="body">
                            <tr>
                                <th>Nama Pasien</th>
                                <td>: <a href="#"onclick="tampilModalPasien({{ json_encode($keterangan->pasien) }})">{{$keterangan->pasien->nama_pasien}} <i class="bi bi-box-arrow-up-right"></i>  </a></td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>: {{umur($keterangan->pasien->tanggal_lahir)}}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>: {{ $keterangan->pasien->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th>Perusahaan</th>
                                <td>: {{ ($keterangan->pasien->perusahaan->nama_perusahaan_pasien)??'-' }}</td>
                            </tr>
                            <tr>
                                <th>RS Rujukan</th>
                                <td>: {{ ($keterangan->rumah_sakit_rujukans_id==10)? $keterangan->rs_lain :$keterangan->rumahsakitrujukan->nama_RS_rujukan }}</td>
                            </tr>
                            <tr>
                                <th>Dokter yang Memeriksa</th>
                                <td>: {{$keterangan->dokter_periksa}}</td>
                            </tr>
                            <tr>
                                <th>Diagnosa Primer</th>
                                <td>: {{$keterangan->namapenyakit->primer}}</td>
                            </tr>
                            <tr>
                                <th>Diagnosa Sekunder</th>
                                <td>: {{$keterangan->sekunders->primer??'-'}}</td>
                            </tr>
                            <tr>
                                <th>Saran</th>
                                <td>: {{$keterangan->saran}}</td>
                            </tr>
                            <tr>
                                <th>Kontrol Kembali</th>
                                <td>: {{($keterangan->kontrol == 1)?tanggal($keterangan->tanggal_kembali, false):'-'}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengembalian Surat</th>
                                <td>: {{tanggal($keterangan->tanggal_pengembalian)}}</td>
                            </tr>
                            <tr>
                                <th>Dokter yang Merujuk</th>
                                <td>: {{$keterangan->dokterRujuk->name}}</td>
                            </tr>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection