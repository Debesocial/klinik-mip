@extends('surat.surat')

@section('no_surat','No: MIP/FRM/KLN/003');
@section('no_revisi','00');

@section('body-surat')
    <h3 class="text-center" style="margin:0; padding:0;">SURAT PERSETUJUAN TINDAKAN MEDIS <br> (INFORMED CONSENT)</h3>
    
    <p>
        Saya yang bertanda tangan dibawah ini :
    </p>
    <div class="row" style="padding-left:1cm;">
        <div class="col">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $tindakan->pasien->nama_pasien }}</td>
                <tr>
                    <td>Umur/Tgl Lahir</td>
                    <td>: {{ umur($tindakan->pasien->tanggal_lahir) }}/ {{tanggal($tindakan->pasien->tanggal_lahir, null, true)}}</td>
                <tr>
                    <td>Posisi/Jabatan</td>
                    <td>: {{ $tindakan->pasien->jabatan->nama_jabatan??'-' }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ ($tindakan->pasien->perusahaan->nama_perusahaan_pasien)??'-' }}</td>
                </tr>
                <tr>
                    <td>Riwayat Penyakit</td>
                    <td>: {{ ($tindakan->riwayat)??'-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <p>Dengan in menyatakan <b>{{$tindakan->hasil==1?'SETUJU':'TIDAK SETUJU'}}</b> untuk dilakukan tindakan medis berupa <b>{{$tindakan->tindakan}}</b></p>

    <p>
        Pernyataan ini saya buat dengan sesungguhnya bahwa : 
        <ol>
            <li>
                Saya telah diberikan penjelasan oleh dokter mengenai tindakan medis yang diperlukan, juga akan bahaya, resiko serta kemungkinan-kemungkinan yang dapat timbul sebagai akibat tindakan medis tersebut.
            </li>
            <li>
                Saya telah memahami sepenuhnya penjelasan yang diberikan dokter tersebut dan menerima resiko yang timbul akibat dari tindakan medis tersebut.
            </li>
        </ol>
        Atas perhatianya , kami ucapkan terima kasih.
    </p>
    
    <div class="row" style="padding-top:50px">
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=50% class="text-center">Hormat Kami,</td>
                        <td width=50% class="text-center"></td>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="height: 50px"></td>
                        <td style="height: 50px"></td>
                        
                    <tr>
                        <td class="text-center">(-------------------) <br> Klinik PT. MIP </td>
                        <td class="text-center">({{$tindakan->pasien->nama_pasien}}) <br> Karyawan</td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection