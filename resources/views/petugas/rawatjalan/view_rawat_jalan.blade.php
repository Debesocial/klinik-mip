@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rawat Jalan')
@section('pemeriksaan', 'active')
@section('jalan', 'active')
@section('breadcrumb', 'lihat_rawat_jalan')
@section('judul', 'Lihat Data Rawap Jalan')
@section('container')
@section('css')
    <style>
        
        tbody>tr>th{
            white-space: nowrap;
            vertical-align: top;
            width:1%;
        }
    </style>
@stop
<div class="card">
    <div class="card-body">
        <h5>Rawat Jalan {{$jalan->id_rawat_jalan}}</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <div hidden>{{ $jalan->pasien->perusahaan->nama_perusahaan_pasien . $jalan->pasien->divisi->nama_divisi_pasien . $jalan->pasien->jabatan->nama_jabatan . $jalan->pasien->keluarga}}</div>
                <div >Nama Pasien : <a href="#" onclick="tampilModalPasien({{ json_encode($jalan->pasien) }})">{{ $jalan->pasien->nama_pasien }} <i class="bi bi-box-arrow-up-right"></i></a></div>
            </div>
            <div class="col-md-6 text-end">
                <div >Tanggal Berobat <b>{{ $jalan->tanggal_berobat }}</b></div>
            </div>
        </div>

        <ul>
            <div class="row mb-3">
                <h6><li>Pemeriksaan</li></h6>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Anamnesis</th>
                                    <td>: {{$jalan->anamnesis}}</td>
                                </tr>
                                <tr>
                                    <th>Tinggi Badan</th>
                                    <td>: {{$jalan->tinggi_badan}} Cm</td>
                                </tr>
                                <tr>
                                    <th>Berat Badan</th>
                                    <td>: {{$jalan->berat_badan}} Kg</td>
                                </tr>
                                <tr>
                                    <th>Suhu Tubuh</th>
                                    <td>: {{$jalan->suhu_tubuh}} &deg;C</td>
                                </tr>
                                <tr>
                                    <th>Tekanan Darah</th>
                                    <td>: {{$jalan->tekanan_darah}} mmHg</td>
                                </tr>
                                <tr>
                                    <th>Saturasi Oksigen</th>
                                    <td>: {{$jalan->saturasi_oksigen}} mmHg</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Denyut Nadi</th>
                                    <td>: {{$jalan->denyut_nadi}} / {{$jalan->denyut_nadi_menit}} menit</td>
                                </tr>
                                <tr>
                                    <th>Laju Pernapasan</th>
                                    <td>: {{$jalan->laju_pernapasan}} / {{$jalan->laju_pernapasan_menit}} menit</td>
                                </tr>
                                <tr>
                                    <th>pemeriksaan_penunjang</th>
                                    <td>: {{$jalan->pemeriksaan_penunjang}}</td>
                                </tr>
                                <tr>
                                    <th>Obat yang dikonsumsi sebelumnya</th>
                                    <td>: {{$jalan->obat_konsumsi}}</td>
                                </tr>
                                <tr>
                                    <th>Dokumentasi Pendukung</th>
                                    <td>
                                        @if ($jalan->dokumen)
                                            <a href="{{asset('pemeriksaan/rawatjalan/'.$jalan->dokumen)}}" target="_blank" rel="noopener noreferrer">: {{$jalan->dokumen}}</a>
                                        @else
                                            : <small class="text-warning"> Belum ada dokumen</small>
                                        @endif 
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Lokalis</th>
                                    <td>: {{$jalan->status_lokalis}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <h6><li>Diagnosa</li></h6>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Penyakit</th>
                                    <th>Sub-Klasifikasi</th>
                                    <th>Klasifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($jalan->nama_penyakit_id) as $id_penyakit)
                                    @php
                                        $penyakit = $nama_penyakit->find($id_penyakit);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $penyakit->primer }}</td>
                                        <td>{{ $penyakit->sub_klasifikasi->nama_penyakit }}</td>
                                        <td>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <h6><li>Tindakan</li></h6>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tindakan</th>
                                    <th>Alat Kesehatan</th>
                                    <th>Jumlah Pengguna</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($jalan->tindakan) as $tindakan)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$tindakan->nama_tindakan}}</td>
                                        <td class="text-center">{{$alkes->find($tindakan->alat_kesehatan)->nama_alkes->nama_alkes}}</td>
                                        <td class="text-center">{{$tindakan->jumlah_pengguna}}</td>
                                        <td>{{$tindakan->keterangan}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <h6><li>Resep Obat</li></h6>
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Obat</th>
                                <th>Jumlah</th>
                                <th>Aturan Pakai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($jalan->resep) as $resep)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$resep->nama_obat}}</td>
                                    <td class="text-center">{{$resep->jumlah_obat}} {{$satuanobat->find($resep->satuan_obat)->satuan_obat}}</td>
                                    <td>{{$resep->aturan_pakai}}</td>
                                    <td>{{$resep->keterangan_resep}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </ul>
    </div>
</div>
  

@endsection
