<!DOCTYPE html>
<html>
<head>
    <title> Surat Keterangan Berobat</title>
    <style type= "text/css">
    body {font-family: arial;  }
    .rangkasurat {width : 650px;margin:0 auto;;height: 500px;padding: 20px;}
    .surat {border-bottom: 5px solid black; padding: 2px}
    .tengah {text-align : center;line-height: 5px;}
     </style >
</head>
<body>
<div class = "rangkasurat">
     <table class="surat" width = "100%">
           <tr>
                 <td> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Lion_waiting_in_Namibia.jpg/220px-Lion_waiting_in_Namibia.jpg"></td>
                 <td class = "tengah">
                    <h2>PT. MANDIRI INTIPERKASA</h2>
                    <h3>Site Lagub, Sembakung, Kab. Nunukan</h3>
                    <h3>Provinsi Kalimantan Utara</h3>
                    <h5><i>Email: mip-site@mandirigroup.net</i></h5>
                 </td>
            </tr>
     </table >
     <div><br><br><br>
     <div style="width: 35%; text-align: left; float: right;">Site Krassi, {{ Carbon\Carbon::parse($keterangan->created_at)->isoFormat('D MMMM Y') }}</div><br>

     <p>Perihal : <b><i> Surat Keterangan Berobat</i></b></p>

        <p>Dengan surat ini, kami sampaikan bahwa:</p>
        
        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$keterangan->pasien->nama_pasien}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Umur</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php
                    $tanggal_lahir = $keterangan->pasien->tanggal_lahir;
                    $lahir    = new DateTime($tanggal_lahir);
                    $today        = new DateTime('today');
                    $usia = $today->diff($lahir);
                    echo $usia->y;
                    echo " Tahun ";
                    ?></td></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Perusahaan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$keterangan->pasien->perusahaan->nama_perusahaan_pasien}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$keterangan->pasien->pekerjaan}}</td>
            </tr>
        </table>

        <p>(Dibawah ini diisi oleh dokter yang memeriksa).</p>
        <p>Yang bersangkutan adalah benar telah berobat di (nama klinik praktek / Rumah Sakit).</p>
        <p>{{$keterangan->rumahsakitrujukan->nama_RS_rujukan}}</p><br>

        <p>Pada hasil pemeriksaan didapatkan diagnosa penyakit :</p>
        <p>{{$keterangan->namapenyakit->primer}}</p><br>

        <p>Dan pasien diresepkan obat</p>
        <p>R/</p>
        <p>{{$keterangan->resep}}</p><br>

        <p>Saran untuk pasien :</p>
        <p>{{$keterangan->saran}}</p><br>

        <p>Pasien (harus / tidak harus) kontrol kembali pada{{ Carbon\Carbon::parse($keterangan->tanggal_kembali)->format('d F Y') }}.</p>
        <p>() = coret yang tidak perlu.</p><br>

        <div style="width: 23%; text-align: left; float: left;">Dokter yang merujuk</div>
        <div style="width: 30%; text-align: left; float: center; padding-left: 250px;">Dokter yang memeriksa</div>
        <div style="width: 9%; text-align: left; float: right;">HRD</div><br>

        <br><br><br><br><br>
        
        <div style="width: 15%; text-align: left;  float: left; ">(.................................)</div>
        <div style="width: 15%; text-align: left;  float: center; padding-left: 260px;">(.................................)</div>
        <div style="width: 15%; text-align: left;  float: right; ">(.........................)</div>
        
        <br><br><br><br>
        <div style="width: 20%; text-align: left;  float: right; ">No. Revisi : 00</div>
        <div style="width: 49%; text-align: left;  float: left; ">(No:MIP/FRM/KLN/014)</div>
    </div>
    

    
    {{-- <td>@php
            $image = $izin->ttd;
            $imageData = base64_encode(file_get_contents($image));
            $src = 'data:' . mime_content_type($image) . ';base64,' . $imageData;
        @endphp 
            <img src="{{$src}}" width="140px"> </td>
        <br><br><br> --}}
</html>