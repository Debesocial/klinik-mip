@extends('surat.surat')

@section('no_surat','No: MIP/FRM/KLN/018');
@section('no_revisi','00');

@section('body-surat')
    <div class="row">
        <div class="col text-center">
            <p>
                <b><u>SURAT KETERANGAN DOKTER</u></b> <br>
                Nomor : {{$sehat->no_surat}}
            </p>
        </div>
    </div>

    <p>
        Yang bertanda tangan di bawah ini Dokter Pemeriksa PT. Mandiri Intiperkasa, Site Krassi, Kalimantan Utara. Dalam menjalankan tugas mengingat Sumpah Jabatan, dengan ini menerangkan dengan sesungguhnya bahwa :	
    </p>

    <div class="row" style="margin-left: 1cm">
        <div class="col">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $sehat->pasien->nama_pasien }}</td>
                </tr>
                <tr>
                    <td>Umur / Tanggal Lahir</td>
                    <td>: {{ umur($sehat->pasien->tanggal_lahir)}} / {{tanggal($sehat->pasien->tanggal_lahir, false)}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $sehat->pasien->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $sehat->pasien->alamat }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $sehat->pasien->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ ($sehat->pasien->perusahaan->nama_perusahaan_pasien)??'-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <p><b><u>Dengan hasil pemeriksaan sebagai berikut: </u></b></p>
    <div class="row" style="margin-left: 1cm">
        <div class="col">
            <table>
                <tbody>
                    <tr>
                        <td>Tinggi Badan</td>
                        <td>: {{$sehat->tinggi_badan}} Cm</td>
                    </tr>
                    <tr>
                        <td>Berat Badan</td>
                        <td>: {{$sehat->berat_badan}} Kg</td>
                    </tr>
                    <tr>
                        <td>Tekanan Darah</td>
                        <td>: {{$sehat->tekanan_darah}} / {{$sehat->tekanan_darah_per}} mmHg</td>
                    </tr>
                    <tr>
                        <td>Nadi</td>
                        <td>: {{$sehat->denyut_nadi}}x /menit</td>
                    </tr>
                    <tr>
                        <td>Temperatur</td>
                        <td>: {{$sehat->suhu_tubuh}} &deg;C</td>
                    </tr>
                    <tr>
                        <td>Laju Pernapasan</td>
                        <td>: {{$sehat->laju_pernapasan}}x /menit</td>
                    </tr>
                    <tr>
                        <td>Pemeriksaan Fisik</td>
                        <td>: Dalam Batas Normal</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <p>Setelah dilakukan pemeriksaan fisik di atas dapat dinyatakan dalam keadaan :</p>
    <h3 class="text-center">
        <b>
            @if ($sehat->hasil==1)
                    <span style="color: darkgreen"><u>SEHAT</u></span>
            @else
                    <span style="color: red"><u>TIDAK SEHAT</u></span>
            @endif
        </b>
    </h3>
    <p>Surat keterangan sehat ini dibuat untuk keperluan : {{$sehat->tujuan}}</p>
    <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana semestinya.</p>

    <div class="row" style="margin-bottom: 50px; margin-top: 50px;">
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center">Site Krassi, {{tanggal($sehat->created_at, false, true)}}</td>
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