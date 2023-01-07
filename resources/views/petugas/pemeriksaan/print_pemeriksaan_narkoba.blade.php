<!DOCTYPE html>
<html>
<head>
    <title> Surat Izin Berobat  </title>
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
                 <td> <img width="50" height="50" src="1.png"> </td>
                 <td class = "tengah">
                       <h2>PT. MANDIRI INTIPERKASA</h2>
                       <h4>Site Lagub, Kecamatan Sembakung, Kabupaten Nunukan</h4>
                       <h4>Provinsi Kalimantan Utara</h4>
                       <h4><i>Email: mip-site@mandirigroup.net</i></h4>
                 </td>
            </tr>
     </table >
     <div>
    <h2 style="text-align: center"><u>Surat Keterangan  Hasil Pemeriksaan Narkotika</u></h2>
    <h4 style="text-align: center">Nomor:.../MIP-SITE/KLN/.../...</h4>
    <br><br><br>
        

        <p>Yang bertanda tangan di bawah ini menerangkat bahwa telah dilakukan pemeriksaan narkotika, atas permintaan PT. Mandiri Inti Perkasa terhadap:</p>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$narkoba->pasien->nama_pasien}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Umur</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php
                    $tanggal_lahir = $narkoba->pasien->tanggal_lahir;
                    $lahir    = new DateTime($tanggal_lahir);
                    $today        = new DateTime('today');
                    $usia = $today->diff($lahir);
                    echo $usia->y;
                    echo " Tahun ";
                    ?></td></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Tempat / Tanggal Lahir</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$narkoba->pasien->tempat_lahir}}, {{ Carbon\Carbon::parse($narkoba->pasien->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Alamat</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$narkoba->pasien->alamat}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$narkoba->pasien->pekerjaan}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Perusahaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$narkoba->pasien->perusahaan->nama_perusahaan_pasien}}</td>
            </tr>
        </table>


        <h3>A. Riwayat Penggunaan Obat-obatan</h3>
        <p style="padding: 20px"><b>1. </b> Penggunaan obat-obatan dalam seminggu terakhir:........</p>
        <p style="padding: 20px"><b>2. </b> Jenis obat yang digunakan:...........</p>
        <p style="padding: 20px"><b>3. </b> Asal obat:.............</p>
        <p style="padding: 20px"><b>4. </b> Terakhir Minum:...........</p>
        <br>

        <h3>B. Hasil Test Urin</h3>
        <p style="padding: 20px">Pemeriksaan urin dengan metode <b>Rapid Diagnostic Test (6 Paremeter)</b></p>
        <table style="padding: 20px">
            <tr>
                <td style="width: 30%;"><b>1. Amphetamine (AMP)</b></td>
                <td style="width: 5%;"><b>:</b></td>
                <td style="width: 65%;">Posiif/Negatif</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;"><b>2. Methamphetamine (MET)</b></td>
                <td style="width: 5%; vertical-align: top;"><b>:</b></td>
                <td style="width: 65%;">Posiif/Negatif</td>
            </tr>
            <tr>
                <td style="width: 30%;"><b>TetraHydroCannibinol (TCH)</b></td>
                <td style="width: 5%;"><b>:</b></td>
                <td style="width: 65%;">Posiif/Negatif</td>
            </tr>
            <tr>
                <td style="width: 30%;"><b>Benzodiazepine (BZO)</b></td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">Posiif/Negatif</td>
            </tr>
            <tr>
                <td style="width: 30%;"><b>Morphine (MOP)</b></td>
                <td style="width: 5%;"><b>:</b></td>
                <td style="width: 65%;">Posiif/Negatif</td>
            </tr>
            <tr>
                <td style="width: 30%;"><b>Cocaine (COC)</b></td>
                <td style="width: 5%;"><b>:</b></td>
                <td style="width: 65%;">Posiif/Negatif</td>
            </tr>
        </table>

        <p>Dapat disimpulkan bahwa dari hasil pemeriksaan, nama yang bersangkutan <b>Terindikasi / Tidak Terindikasi</b> mengkonsumsi jenis zat yang telah disebutkan di atas.
        Demikian Surat Keterangan Pemeriksaan Narkotika ini dibuat, guna untuk .....</p>
<br>

        <div style="width: 35%; text-align: left; float: right;">Site Krassi, {{ Carbon\Carbon::parse($narkoba->created_at)->isoFormat('D MMMM Y') }}</div><br><br>

        <div style="width: 50%; text-align: left; float: right;">Dokter Penanggung Jawab</div><br>
        <br><br><br><br><br>

        <div style="width: 48%; text-align: left; float: right; "><u><b>dr. Greysia Manarisip</b></u></div><br>
        <div style="width: 99%; text-align: right; float: left; "><u><b>SIP: 449.1/010/SIPD/DPMPTSP-III/IV/2021</b></u></div>
        <br><br>
        <div style="width: 44%; text-align: left;  float: right; ">No. Revisi : 01</div>
        <div style="width: 49%; text-align: left;  float: right; ">(No:MIP/FRM/KLN/019)</div>
    </div>
    
</html>