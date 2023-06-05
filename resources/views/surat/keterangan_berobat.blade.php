@extends('surat.surat')
@section('no_surat','No: MIP/FRM/KLN/014');
@section('no_revisi','00');

@section('body-surat')
    <div class="row">
        <div class="col text-end">
            <p>Kab. Nunukan, {{ tanggal($keteranganberobat->created_at, false) }}</p>
        </div>
    </div>

    <p> Perihal : <b><i>Surat Keterangan Berobat</i></b></p>
    <p>Dengan surat ini, kami sampaikan bahwa:</p>

    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $keteranganberobat->pasien->nama_pasien }}</td>
                <tr>
                    <td>Umur</td>
                    <td>: {{ umur($keteranganberobat->pasien->tanggal_lahir) }}</td>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $keteranganberobat->pasien->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ ($keteranganberobat->pasien->perusahaan->nama_perusahaan_pasien)??'-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <p>Yang bersangkutan adalah benar telah berobat di
        <b><u>{{ $keteranganberobat->rumahsakitrujukan->nama_RS_rujukan }}</u></b>.
        Pada hasil pemeriksaan didapatkan diagnosa penyakit <b><u>{{ $keteranganberobat->namapenyakit->primer }}</u></b>
        dan pada pasien diresepkan obat <i>{{ $keteranganberobat->resep }}</i>.
    </p>
    <p>Saran untuk pasien: {{ $keteranganberobat->saran }}.</p>
    @if ($keteranganberobat->kontrol == 1)
        <p>Pasien <b>harus</b> kontrol kembali pada <b>{{ tanggal($keteranganberobat->tanggal_kembali, false) }}</b>.</p>
    @else
        <p>Pasien <b><u>tidak harus</u></b> kontrol kembali.</p>
    @endif

    <div class="row" style="margin-bottom: 50px; margin-top: 50px;">
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=30% class="text-center">Dokter yang merujuk,</td>
                        <td width=30% class="text-center">Dokter yang memeriksa,</td>
                        <td width=30% class="text-center">HRD</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="height: 50px"></td>
                        <td style="height: 50px"></td>
                        <td style="height: 50px"></td>
                    </tr>
                    <tr>
                        <td class="text-center">dokter</td>
                        <td class="text-center">dokter</td>
                        <td class="text-center">hrd</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
@endsection
