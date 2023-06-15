@extends('surat.surat')

@section('no_surat','No: MIP/FRM/KLN/019');
@section('no_revisi','00');

@section('body-surat')
    <div class="row">
        <div class="col text-center">
            <p>
                <b><u>SURAT KETERANGAN HASIL PEMERIKSAAN NARKOTIKA</u></b> <br>
                Nomor : {{$narko->no_surat}}
            </p>
        </div>
    </div>

    <p>
        Yang bertanda tangan dibawah ini menerangkan bahwa telah dilakukan pemeriksaan narkotika, atas permintaan PT. Mandiri Intiperkasa terhadap :	
    </p>

    <div class="row" style="margin-left: 1cm; margin-bottom: 10px;">
        <div class="col">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $narko->pasien->nama_pasien }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>: {{ umur($narko->pasien->tanggal_lahir)}} </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $narko->pasien->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>: {{$narko->pasien->tempat_lahir}} / {{tanggal($narko->pasien->tanggal_lahir, false)}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $narko->pasien->alamat }} </td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $narko->pasien->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Perusahaan</td>
                    <td>: {{ ($narko->pasien->perusahaan->nama_perusahaan_pasien)??'-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <b >A. Riwayat Penggunaan Obat-obatan</b>
    <ol style="margin-top:0; margin-bottom: 10px;">
        <li>Penggunaan obat-obatan dalam seminggu terakhir : {{$narko->penggunaan_obat??'-'}}</li>
        <li>Jenis obat yang diguanakan : {{$narko->jenis_obat??'-'}}</li>
        <li>Asal Obat : {{$narko->asal_obat??'-'}}</li>
        <li>Terakhir minum : {{$narko->terakhir_digunakan??'-'}}</li>
    </ol>

    <b>B. Hasil Tes Urin</b><br>
    Pemeriksaan urin dengan metode <b>Rapid Diagnostic Test (6 Parameter)</b>
    <table style="padding-left:0.5cm">
        <tbody>
            <tr>
                <td><b>1. Amphetamine (AMP)</b></td>
                <td class={{($narko->amp==0)?'bg-blue':'bg-red'}}>: <b>{{($narko->amp==0)?'Negatif':'Positif'}}</b></td>
            </tr>
            <tr>
                <td><b>2. Methamphetamine (MET) <i></td>
                <td class={{($narko->met==0)?'bg-blue':'bg-red'}}>: <b>{{($narko->met==0)?'Negatif':'Positif'}}</b></td>
            </tr>
            <tr>
                <td><b>3. TetraHydroCannibinol (THC)</b></td>
                <td class={{($narko->thc==0)?'bg-blue':'bg-red'}}>: <b>{{($narko->thc==0)?'Negatif':'Positif'}}</b></td>
            </tr>
            <tr>
                <td><b>4. Benzodiazepine (BZO)</b></td>
                <td class={{($narko->bzo==0)?'bg-blue':'bg-red'}}>: <b>{{($narko->bzo==0)?'Negatif':'Positif'}}</b></td>
            </tr>
            <tr>
                <td><b>5. Morphine (MOP)</b></td>
                <td class={{($narko->mop==0)?'bg-blue':'bg-red'}}>: <b>{{($narko->mop==0)?'Negatif':'Positif'}}</b></td>
            </tr>
            <tr>
                <td><b>6. Cocaine (COC) <i></td>
                <td class={{($narko->coc==0)?'bg-blue':'bg-red'}}>: <b>{{($narko->coc==0)?'Negatif':'Positif'}}</b></td>
            </tr>
        </tbody>
    </table>

    <p>Dapat disimpulkan bahwa dari hasil pemeriksaan, nama yang bersangkutan dinyatakan <br> 
        @if ($narko->amp == 0 && $narko->met == 0 && $narko->thc == 0 && $narko->bzo == 0 && $narko->mop == 0 && $narko->coc == 0)
        <span class="bg-blue"><b>Tidak Terindikasi</b></span>
        @else
            <span class="bg-red"><b>Terindikasi</b></span>
        @endif 
    mengkonsumsi jenis zat yang telah disebutkan di atas. Demikian Surat Keterangan Pemeriksaan Narkotika ini  {{($narko->tujuan_surat)?'dibuat, guna untuk '.$narko->tujuan_surat:''}}.</p>



    <div class="row" style="margin-bottom: 50px; margin-top: 10px;">
        <div class="col">
            <table class="w100">
                <thead>
                    <tr>
                        <td width=30% class="text-center"></td>
                        <td width=30% class="text-center"></td>
                        <td width=40% class="text-center">Site Krassi, {{tanggal($narko->created_at, false, true)}} <br> Dokter Penanggung Jawab</td>
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
                        <td class="text-center"><b>dr. Greysia Manarisip</b><br><small><u>SIP: 449.1/010/SIPD/DPMPTSP-III/IV/2021</u></small></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection