@extends('surat.surat')
@section('no_surat','No: MIP/FRM/KLN/017');
@section('no_revisi','00');

@section('body-surat')
    
    <h3 class="text-center"><b>Surat Permohonan Ijin Istirahat</b></h3>
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $istirahat->pasien->nama_pasien }}</td>
                </tr>
                <tr>
                    <td>NIK Karyawan</td>
                    <td>: {{ $istirahat->pasien->NIK??'-' }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ $istirahat->pasien->perusahaan->nama_perusahaan_pasien??'-' }}</td>
                </tr>
                <tr>
                    <td>Divisi</td>
                    <td>: {{ $istirahat->pasien->divisi->nama_divisi_pasien??'-' }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: {{ $istirahat->pasien->jabatan->nama_jabatan??'-' }}</td>
                </tr>
                <tr>
                    <td>Hari/Tanggal Berobat</td>
                    <td>: {{tanggal($istirahat->created_at,null,null,true)}}</td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td>: {{$istirahat->keluhan}}</td>
                </tr>
                <tr>
                    <td>Diagnosa Dokter/Medice</td>
                    <td>: {{$istirahat->namapenyakit->primer}}</td>
                </tr>
                <tr>
                    <td>Diagnosa Dokter/Medice (Sekunder)</td>
                    <td>: {{$istirahat->namapenyakitsekunder->primer??'-'}}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">Penanganan/Tindakan Dokter</td>
                    <td>
                        <ol style="margin:0; padding-left: 20px;">
                            @if (is_array(json_decode($istirahat->tindakan)))
                            @foreach (json_decode($istirahat->tindakan) as $tindakan)
                                @php
                                    $dataAlkes = $alkes->find($tindakan->alat_kesehatan);   
                                @endphp
                                <li>
                                    <b>{{$tindakan->nama_tindakan}}</b><br>
                                    Alat : <b>{{$dataAlkes->nama_alkes}} ({{$tindakan->jumlah_pengguna}} {{$dataAlkes->satuan_obat->satuan_obat}})</b><br>
                                    <i>Ket. {{$tindakan->keterangan}}</i>
                                </li>
                            @endforeach
                                
                            @else
                            -
                            @endif
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">Obat Yang Dikonsumsi</td>
                    <td style="vertical-align: top;">
                        <ol style="margin:0; padding-left: 20px;" >
                            @if (is_array(json_decode($istirahat->terapi)))
                            @foreach (json_decode($istirahat->terapi) as $terapi)
                                @php
                                    $dataObat = $obat->find($terapi->nama_obat);
                                @endphp
                                <li>
                                    <b>{{$dataObat->nama_obat}} ({{$terapi->jumlah_obat}} {{$dataObat->satuan_obat->satuan_obat}})</b><br>
                                   {{ $terapi->aturan_pakai}}. <br>
                                   <i>ket.{{$terapi->keterangan_resep}}</i> 
                                </li>
                            @endforeach
                                
                            @else
                            -
                            @endif
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">Rekomendasi Dokter/Klinik</td>
                    <td>:
                        @if ($istirahat->rekomendasi==1)
                            <b>Dapat Bekerja Seperti Biasa</b>
                        @endif
                        @if ($istirahat->rekomendasi==2)
                            <b>Dapat Bekerja Dengan Catatan, <i>{{$istirahat->dapat_bekerja_catatan}}</i></b> 
                        @endif
                        @if ($istirahat->rekomendasi==3)
                            <b>Istirahat di MESS Karyawan selama {{diffDay($istirahat->dari, $istirahat->sampai)}}</b> <br>
                            <div style="padding-left:7px;">
                                dari {{tanggal($istirahat->dari,true,null,null, true)}} <br>
                                sampai {{tanggal($istirahat->sampai,true,null,null,true)}}
                            </div>
                        @endif
                        @if ($istirahat->rekomendasi==4)
                            <b>Rujukan ke {!!($istirahat->rumah_sakit_rujukan_id=='10')?'<i>'.$istirahat->other_rs.'</i>':$istirahat->rumahsakitrujukan->nama_RS_rujukan!!}, {{$istirahat->spesialisrujukan->nama_spesialis_rujukan}}</b>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-top:30px">
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=30% class="text-center">Karyawan/Pasien</td>
                        <td width=30% class="text-center">HRGA/Atasan Langsung</td>
                        <td width=30% class="text-center">Klinik PT. MIP</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="height: 50px"></td>
                        <td style="height: 50px"></td>
                        <td style="height: 50px"></td>
                    </tr>
                    <tr>
                        <td class="text-center">(-------------------)</td>
                        <td class="text-center">(-------------------)</td>
                        <td class="text-center">(-------------------)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
