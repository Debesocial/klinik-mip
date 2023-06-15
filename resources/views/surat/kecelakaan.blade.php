@extends('surat.surat')

@section('no_surat','No: MIP/FRM/KLN/00');
@section('no_revisi','00');

@section('body-surat')
    <div class="row">
        <div class="col text-center">
            <p>
                <b><u>FORM KECELAKAAN KERJA</u></b> <br>
            </p>
        </div>
    </div>

    <div class="row" style="">
        <div class="col" style="border: 1px solid black; padding:3px">
            <h5 style="margin:0">IDENTITAS PASIEN</h5>
            <table >
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>No. RM</td>
                                <td>: {{ $kecelakaan->pasien->id_rekam_medis}} </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $kecelakaan->pasien->nama_pasien }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding-left:3cm">
                        <table>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{$kecelakaan->pasien->alamat}}</td>
                            </tr>
                            <tr>
                                <td>Perusahaan</td>
                                <td>: {{$kecelakaan->pasien->perusahaan->nama_perusahaan_pasien??'-'}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="border: 1px solid black; padding:3px; margin-top: 10px;">
        <div class="col">
           <table>
                <tr>
                    <td>Tanggal Kejadian</td>
                    <td>: {{tanggal($kecelakaan->tanggal_kejadian, null, null,true)}}</td>
                </tr>
                <tr>
                    <td>Lokasi Kejadian</td>
                    <td>: {{$kecelakaan->lokasi_kejadian->nama_lokasi}}</td>
                </tr>
                <tr>
                    <td>Nama Pengantar</td>
                    <td>: {{$kecelakaan->pengantar}}</td>
                </tr>
           </table>
        </div>
    </div>
    
    <div class="text-center"><h5 style="margin:0; padding-top:5px">Anamnesis/Kronologi</h5></div>
    <div class="row" style="border: 1px solid black; padding:3px; ">
        <div class="col">
            <p>
                {{$kecelakaan->anamnesis}}
            </p>
        </div>
    </div>
    <div class="text-center"><h5 style="margin:0; padding-top:5px">Status Lokalis</h5></div>
    <div class="row" style="border: 1px solid black; padding:3px; ">
        <div class="col">
            <p>
                {{$kecelakaan->status_lokalis}}
            </p>
        </div>
    </div>
    <div class="text-center"><h5 style="margin:0; padding-top:5px">Diagnosis</h5></div>
    <div class="row" style="border: 1px solid black; padding:3px; ">
        <div class="col">
            <table class="w100">
                <thead style="border-bottom: 1px solid black">
                    <th>Nama Penyakit</th>
                    <th>Klasifikasi</th>
                    <th>Sub Klasifikasi</th>
                </thead>
                <tbody>
                    @foreach (json_decode($kecelakaan->nama_penyakit_id) as $pen);
                    @php
                        $p =  $penyakit->find($pen);
                        
                    @endphp
                        <tr >
                            <td class="text-center" >{{$p->primer}}</td>
                            <td class="text-center">{{$p->sub_klasifikasi->nama_penyakit}}</td>
                            <td class="text-center">{{$p->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center"><h5 style="margin:0; padding-top:5px">Terapi yang Diberikan</h5></div>
    <div class="row" style="border: 1px solid black; padding:3px; ">
        <div class="col">
            <table class="w100">
                <thead style="border-bottom: 1px solid black">
                    <th>Nama Tindakan</th>
                    <th>Alat Kesehatan</th>
                    <th>Jumlah Pengguna</th>
                    <th>Keterangan</th>
                </thead>
                <tbody>
                    @foreach (json_decode($kecelakaan->tindakan, true) as $tin);
                        @php
                            $alat =  $alkes->find($tin['alat_kesehatan']);
                        @endphp
                        <tr >
                            <td class="text-center" >{{$tin['nama_tindakan']}}</td>
                            <td class="text-center">{{$alat->nama_alkes}}</td>
                            <td class="text-center">{{$tin['jumlah_pengguna']}} {{$alat->satuan_obat->satuan_obat}}</td>
                            <td class="text-center">{{$tin['keterangan']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection