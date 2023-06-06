@extends('surat.surat')

@section('no_surat','No: MIP/FRM/KLN/013');
@section('no_revisi','00');

@section('body-surat')
    <div class="row">
        <div class="col text-end">
            <p>Site Krassi, {{ tanggal($rujukan->created_at, false, true) }}</p>
        </div>
    </div>

    <p> Perihal : <b><i>Surat Rujukan</i></b></p>
    <p>Dengan surat ini, kami sampaikan bahwa:</p>

    <div class="row" style="margin-left:1cm">
        <div class="col">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $rujukan->pasien->nama_pasien }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>: {{ umur($rujukan->pasien->tanggal_lahir) }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $rujukan->pasien->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ ($rujukan->pasien->perusahaan->nama_perusahaan_pasien)??'-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <p>
        Riwayat perjalanan penyakit: <br>
        {{$rujukan->riwayat}}
    </p>

    <p>
        Pada pasien telah kami berikan obat <br>
        R/ <br>
        {{$rujukan->obat_diberikan}}
    </p>

    <p>
        Dan hasil pengobatan pasien: <br>
        {{$rujukan->hasil_pengobatan}}
    </p>
    <p>
        Mohon penanganan dan pengobatan yang lebih intensif. Atas perhatian rekan sejawat, kami mengucapkan terima kasih. 
    </p>

    <div class="row" style="margin-bottom: 50px; margin-top: 50px;">
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center">Salam,</td>
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
                        <td class="text-center">Klinik PT. MIP</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection