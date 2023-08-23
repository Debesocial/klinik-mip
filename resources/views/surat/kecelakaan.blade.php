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
                                <td>: {{ $kecelakaan->gen_id??'-'}} <small>{{$kecelakaan->rekam_medis?($kecelakaan->rekam_medis=='RI'?'(Rawat Inap)':'(Rawat Jalan)'):''}}</small></td>
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
                {!!nl2br($kecelakaan->anamnesis)!!}
            </p>
        </div>
    </div>
    <div class="text-center"><h5 style="margin:0; padding-top:5px">Status Lokalis</h5></div>
    <div class="row" style="border: 1px solid black; padding:3px; ">
        <div class="col">
            <p>
                {!!nl2br($kecelakaan->status_lokalis)!!}
            </p>
        </div>
    </div>
    <div class="text-center"><h5 style="margin:0; padding-top:5px">Diagnosis</h5></div>
    <div class="row" style="border: 1px solid black; padding:3px; ">
        <div class="col">
            @if ($kecelakaan->diagnosa_surat==null||$kecelakaan->diagnosa_surat==''||$kecelakaan->diagnosa_surat==' ')
            <ol>
                @foreach (json_decode($kecelakaan->nama_penyakit_id,true) as $pen)
                @php
                    $p =  $penyakit->find($pen);
                @endphp
                    <li >
                        <b>  {{$p->primer }} </b><br>
                        <small><b>Blok:</b> {{$p->sub_klasifikasi->nama_penyakit}}</small>,<br>
                        <small><b>Category:</b> {{$p->category->nama_penyakit}}</small>,<br>
                        <small><b>Chapter:</b> {{$p->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit}}</small><br>
                        <small><b>Pengertian:</b> {{$p->pengertian}}</small>
                    </li>
                @endforeach

            </ol>
            @else
            {!!nl2br($kecelakaan->diagnosa_surat)!!}
                
            @endif
            
        </div>
    </div>
    <div class="text-center"><h5 style="margin:0; padding-top:5px">Terapi yang Diberikan</h5></div>
    <div class="row" style="border: 1px solid black; padding:3px; ">
        <div class="col">
            <ul>
                <li><b>Terapi Tambahan</b>
                    <ol>
                        @foreach (json_decode($kecelakaan->tindakan, true) as $tin)
                            @php
                                // $alat =  $alkes->find($tin['alat_kesehatan']);
                                $nama_tindakan = $tindakan->find($tin['nama_tindakan'])->nama_tindakan;
                            @endphp
                            <li >
                                {{$nama_tindakan}}
                            </li>
                        @endforeach
    
                    </ol>
                </li>
                <li><b>Resep Obat</b>
                    <ol>
                        @if ($kecelakaan->resep)
                        @foreach (json_decode($kecelakaan->resep, true) as $resep)
                            @php
                                $ob = $obat->find($resep['nama_obat']);
                            @endphp
                            
                            <li>{{$ob->nama_obat}}  (<i>{{$resep['jumlah_obat']}} {{$ob->satuan_obat->satuan_obat}}</i>)</li>
                        @endforeach
                            
                        @endif
                    </ol>
                </li>
            </ul>
               
        </div>
    </div>
    <div class="row" style="margin-bottom: 50px; margin-top: 50px;">
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center">Site Krassi, {{tanggal($kecelakaan->created_at, false, true)}}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="height: 50px"></td>
                        <td style="height: 50px"></td>
                        <td style="height: 50px"></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">Dokter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection