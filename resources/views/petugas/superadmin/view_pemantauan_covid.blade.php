@extends('layouts.dashboard.app')

@section('title', 'View Pemantauan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('pemantauan', 'active')
@section('breadcrumb', 'lihat_pemantauan_covid')

@section('judul', 'View Pemantauan Covid')
@section('container')

<div class="container">
    <div class="card">
        <div class="card-body">
            {{-- <p>Tanggal Pemantauan : <b>{{ date_format($pemantauan->created_at, 'Y-m-d H:i') }}</b></p> --}}
            <div class="row mb-3">
                <h5>Biodata Pasien</h5>
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <table>
                        <tbody>
                            <tr>
                                <th>Perusahaan</th>
                                <td id="perusahaan">: {{ $pemantauan->pasien->perusahaan->nama_perusahaan_pasien }}</td>
                            </tr>
                            <tr>
                                <th>Divisi</th>
                                <td id="divisi">: {{ $pemantauan->pasien->divisi->nama_divisi_pasien }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td id="jabatan">: {{ $pemantauan->pasien->jabatan->nama_jabatan }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td id="jenis_kelamin">: {{ $pemantauan->pasien->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td id="telepon">: {{ $pemantauan->pasien->telepon }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td id="email">: {{ $pemantauan->pasien->email }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Kamar</th>
                                <td>: {{ $pemantauan->no_kamar }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-3">
                <h5 >Hasil Pemantauan</h5>
                <div class="col-md-6">
                    <table>
                        <tbody>
                            <tr>
                                <th>Suhu Pagi</th>
                                <td>: {{ $pemantauan->suhu_pagi }}</td>
                            </tr>
                            <tr>
                                <th>TD</th>
                                <td>: {{ $pemantauan->td }}</td>
                            </tr>
                            <tr>
                                <th>HR</th>
                                <td>: {{ $pemantauan->hr }}</td>
                            </tr>
                            <tr>
                                <th>SPO2</th>
                                <td>: {{ $pemantauan->spo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table>
                        <tbody>
                            <tr>
                                <th>Gejala</th>
                                <td>: {{ $pemantauan->gejala }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Pemeriksaan</th>
                                <td>: {{ $pemantauan->jenis_pemeriksaan }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pemeriksaan</th>
                                <td>: {{ $pemantauan->tanggal_pemeriksaan}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5> Pemeriksaan Penunjangan</h5>
                    <ol>
                        @php
                            $n = 0;
                        @endphp
                        @if ($pemantauan->hasil_laboratorium!=null)
                            <h6><li>Laboratorium</li></h6>
                            <table class="mb-1">
                                <tbody>
                                    <tr>
                                        <th>Hasil Laboratorium</th>
                                        <td>: {{ $pemantauan->hasil_laboratorium }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lampiran Hasil Laboratorium</th>
                                        <td>: {!! ($pemantauan->lampiran_laboratorium==' ')? '<a href="'.$pemantauan->lampiran_laboratorium.'">'.$pemantauan->lampiran_laboratorium.'</a>' : '-' !!}</td>
                                    </tr>
                                    <tr>
                                        <th> Tanggal Pemeriksaan </th>
                                        <td>: {{ $pemantauan->tanggal_laboratorium }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @php
                                $n++;
                            @endphp
                        @endif
                        @if ($pemantauan->hasil_rapid!=null)
                            <h6><li>Rapid Test</li></h6>
                            <table class="mb-1">
                                <tbody>
                                    <tr>
                                        <th>Hasil Rapid Test</th>
                                        <td>: {{ $pemantauan->hasil_rapid }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lampiran Hasil Rapid Test</th>
                                        <td>: {!! ($pemantauan->lampiran_rapid==' ')? '<a href="'.$pemantauan->lampiran_rapid.'">'.$pemantauan->lampiran_rapid.'</a>' : '-' !!}</td>
                                    </tr>
                                    <tr>
                                        <th> Tanggal Pemeriksaan </th>
                                        <td>: {{ $pemantauan->tanggal_rapid }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @php
                                $n++;
                            @endphp
                        @endif
                        @if ($pemantauan->hasil_rontgen!=null)
                            <h6><li>Rontgen Torax</li></h6>
                            <table class="mb-1">
                                <tbody>
                                    <tr>
                                        <th>Hasil Rontgen Torax</th>
                                        <td>: {{ $pemantauan->hasil_rontgen }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lampiran Hasil Rontgen Torax</th>
                                        <td>: {!! ($pemantauan->lampiran_rontgen==' ')? '<a href="'.$pemantauan->lampiran_rontgen.'">'.$pemantauan->lampiran_rontgen.'</a>' : '-' !!}</td>
                                    </tr>
                                    <tr>
                                        <th> Tanggal Pemeriksaan </th>
                                        <td>: {{ $pemantauan->tanggal_rontgen }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>: {{ $pemantauan->keterangan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @php
                                $n++;
                            @endphp
                        @endif
                        @if ($n==0)
                            -
                        @endif
                    </ol>
                </div>
                <div class="col-md-6">
                    <h5>Riwayat Perjalanan</h5>
                    <table>
                        <tbody>
                            <tr>
                                <th>Tanggal Perjalanan</th>
                                <td>: {{ $pemantauan->perjalanan }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten/Kota Asal</th>
                                <td>: {{ $pemantauan->asal }}</td>
                            </tr>
                            <tr>
                                <th>Kota Tujuan</th>
                                <td>: {{ $pemantauan->kota_tujuan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection