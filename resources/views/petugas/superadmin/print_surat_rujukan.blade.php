<!DOCTYPE html>
<html>
<head>
    <title> Surat Izin Rujukan  </title>
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
                 {{-- <td> <img src="{{ public_path('assets/image/bg/1.png')}}"> </td> --}}
                 <td class = "tengah">
                       <h2>PT. MANDIRI INTIPERKASA</h2>
                       <h3>Site Lagub, Kecematan Sembakung, Kab. Nunukan</h3>
                       <h3><i>Telp : 021 - 5670037 Ext. 496</i></h3>
                 </td>
            </tr>
     </table >
     <div><br><br><br>
     <div style="width: 35%; text-align: left; float: right;">Site Krassi, {{ Carbon\Carbon::parse($surat->created_at)->isoFormat('D MMMM Y') }}</div><br>

        <p>Perihal : <b><i> Surat Izin Rujukan</i></b></p>
        <table>
            <p>Dengan surat ini, kami sampaikan bahwa:</p><br>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$surat->pasien->nama_pasien}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Umur</td>
                <td style="width: 5%;">:</td>
                <td><?php
                    $tanggal_lahir = $surat->pasien->tanggal_lahir;
                    $lahir    = new DateTime($tanggal_lahir);
                    $today        = new DateTime('today');
                    $usia = $today->diff($lahir);
                    echo $usia->y;
                    echo " Tahun ";
                    ?></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Pekerjaan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$surat->pasien->pekerjaan}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Perusahaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$surat->pasien->perusahaan->nama_perusahaan_pasien}}</td>
            </tr>
        </table>

        

        <p>Riwayat Perjalanan Penyakit:</p>
        <p>{{$surat->riwayat}}</p>
        <br>
        <p>Pada pasien telah kami berikan obat:</p>
        <p>{{$surat->obat_diberikan}}</p>
        <br>
        <p>Dan hasil pengobatan pada pasien:</p>
        <p>{{$surat->hasil_pengobatan}}</p>
        <br>

        <p>Mohon penanganan dan pengobatan yang lebih intesif. Atas perhatian rekan sejawat, kami mengucapkan terima kasih.</p>

        <div style="width: 10%; text-align: left; float: right;">Salam</div><br>
        <br><br><br><br><br>
        
        <div style="width: 15%; text-align: left; border-top: 5px solid black; float: right; ">Klinik PT MIP</div>
        <br><br><br>
        <div style="width: 18%; text-align: left;  float: right; ">No. Revisi : 00</div>
        <div style="width: 90%; text-align: left;  float: right; ">(No:MIP/FRM/KLN/013)</div>
    </div>
    
</html>