<!DOCTYPE html>
<html>
<head>
    <title> Surat Persetujuan Tindakan Medis</title>
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
                 <td> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Lionel-Messi-Argentina-2022-FIFA-World-Cup_%28cropped%29.jpg/220px-Lionel-Messi-Argentina-2022-FIFA-World-Cup_%28cropped%29.jpg"> </td>
                 <td class = "tengah">
                       <h2>PT MANDIRI INTIPERKASA</h2>
                       <h3><i>Site</i> Krassi, Kabupaten Nunukan & Tana Tidung,</h3>
                       <h3>Provinsi Kalimantan Utara</h3>
                       <h3><i>Email: mip-site@mandirigroup.net</i></h3>
                 </td>
            </tr>
     </table >
     <div><br><br><br>
        <div style="width: 60%; text-align: left; float: center; padding-left: 170px;"><h4>SURAT PERSETUJUAN TINDAKAN MEDIS</h4></div><br>
        <div style="width: 50%; text-align: left; float: left; padding-left: 250px;"><h4><i>(INFORMED CONSENT)</i></h4></div><br><br><br>

        <table>
            <p>Bersama Surat Ini saya sampaikan bahwa:</p>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$tindakan->pasien->nama_pasien}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Umur/Tanggal Lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?php
                    $tanggal_lahir = $tindakan->pasien->tanggal_lahir;
                    $lahir    = new DateTime($tanggal_lahir);
                    $today        = new DateTime('today');
                    $usia = $today->diff($lahir);
                    echo $usia->y;
                    echo " Tahun ";
                    ?>, {{ Carbon\Carbon::parse($tindakan->pasien->tanggal_lahir)->isoFormat('D MMMM Y') }}  </td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Jabatan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$tindakan->pasien->jabatan->nama_jabatan}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Perusahaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$tindakan->pasien->perusahaan->nama_perusahaan_pasien}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Riwayat Penyakit</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$tindakan->riwayat}}</td>
            </tr>
        </table>
        <br>

        <p>Dengan ini menyatakan <b>SETUJU/MENOLAK</b> untuk dilakukan tindakan medis berupa</p>
        <p>........................................................................................................................................</p><br>

        <p>Pernyataan ini saya buat dengan sesungguhnya bahwa :</p><br>

        <p>1.	Saya telah diberikan penjelasan oleh dokter mengenai tindakan medis yang diperlukan, juga akan bahaya, resiko serta kemungkinan-kemungkinan yang dapat timbul sebagai akibat tindakan medis tersebut.</p>
        <p>2.	Saya telah memahami sepenuhnya penjelasan yang diberikan dokter tersebut dan menerima resiko yang timbul akibat dari tindakan medis tersebut.</p>

        <br><br>

        <p>Atas perhatiannya kami ucapkan terima kasih.</p><br><br>

        <div style="width: 23%; text-align: left; float: left; padding-left: 110px;">Hormat kami,</div>
        <div style="width: 9%; text-align: left; float: right;"></div><br>

        <br><br><br><br><br>
        
        <div style="width: 15%; text-align: left;  float: left; padding-left: 80px;">(.................................)</div>
        <div style="width: 15%; text-align: left;  float: right; padding-right: 200px;">(.........................)</div><br>

        <div style="width: 30%; text-align: left;  float: right; padding-right: 50px">Klinik PT. MIP</div>
        <div style="width: 15%; text-align: left;  float: left; padding-left: 200px">Karyawan</div><br>

        <br><br><br><br>
        <div style="width: 20%; text-align: left;  float: right; ">No. Revisi : 00</div>
        <div style="width: 49%; text-align: left;  float: left; ">(No:MIP/FRM/KLN/003)</div>
    </div>
    
</html>