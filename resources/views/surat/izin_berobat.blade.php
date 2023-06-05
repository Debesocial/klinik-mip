@extends('surat.surat-2')
@section('no_surat','No: MIP/FRM/KLN/015');
@section('no_revisi','00');

@section('body-surat')
    <div class="row">
        <div class="col text-end">
            <p style="margin-bottom: 0">Site Krassi, {{ tanggal($izinberobat->created_at, false) }}</p>
        </div>
    </div>
    <p style="margin-top: 0">Kepada Yth. <br>
        <u>Lorem ipsum dolor sit</u> <br>
        di &mdash;  Tempat
    </p>

    <p>Perihal : <b><i>Permohonan Ijin Berobat</i></b></p>
    <p>Dengan surat ini, saya sampaikan bahwa:</p>
    <div class="row" style="padding-left:1cm;">
        <div class="col">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $izinberobat->pasien->nama_pasien }}</td>
                <tr>
                    <td>Umur</td>
                    <td>: {{ umur($izinberobat->pasien->tanggal_lahir) }}</td>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $izinberobat->pasien->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ ($izinberobat->pasien->perusahaan->nama_perusahaan_pasien)??'-' }}</td>
                </tr>
            </table>
        </div>
    </div>
    <p>
        Yang bersangkutan di atas saat ini kondisinya dalam keadaan sakit. Saya menyarankan yang bersangkutan dapat diberikan ijin untuk berobat ke <b><i>{{$izinberobat->tempat}}</i></b>
    </p>
    <p>Demikian surat ini saya buat, atas perhatian dan kerja samanya saya ucapkan terima kasih.</p>

    <div class="row" >
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center">Salam</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="height: 30px"></td>
                        <td style="height: 30px"></td>
                        <td style="height: 30px"></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">Klinik PT. MIP</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
