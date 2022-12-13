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
                       <h3>Site Lagub Sembakung - Nunukan KAL-TIM</h3>
                       <h3><i>Telp : 021 - 5670037 Ext. 496</i></h3>
                 </td>
            </tr>
     </table >
     <div><br><br><br>
     <div style="width: 50%; text-align: left; float: right;">Site Krassi, {{ Carbon\Carbon::parse($izin->created_at)->format('d F Y') }}</div><br>

        <p>Kepada Yth.</p>
        <p>...........................................</p>
        <p>...........................................</p>
        <p>di-</p>&ensp;
        <p>Tempat</p>
        <p>Perihal : <b><i> Surat Izin Berobat</i></b></p>

        <table>
            <p>Bersama Surat Ini saya sampaikan bahwa:</p>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$izin->pasien->nama_pasien}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat, tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$izin->pasien->tempat_lahir}}, {{ Carbon\Carbon::parse($izin->pasien->tanggal_lahir)->format('d F Y') }}  </td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$izin->pasien->alamat}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$izin->pasien->pekerjaan}}</td>
            </tr>
        </table>

        <p>Yang bersangkutan di atas saat ini kondisinya dalam keadaan sakit. Saya menyarankan yang bersangkutan unutk diberikan izin untuk berobat ke tarakan.</p>
        <p>Demikian Surat ini saya buat, atas perhatian dan kerja samanya kami ucapkan terimakasih.</p>

        <div style="width: 10%; text-align: left; float: right;">Salam</div><br>
        <br><br><br><br><br>
        {{-- <td>@php
            $image = $izin->ttd;
            $imageData = base64_encode(file_get_contents($image));
            $src = 'data:' . mime_content_type($image) . ';base64,' . $imageData;
        @endphp 
            <img src="{{$src}}" width="140px"> </td>
        <br><br><br> --}}
        <div style="width: 15%; text-align: left; border-top: 5px solid black; float: right; ">Klinik PT MIP</div>
        <br><br>
        <div style="width: 44%; text-align: left;  float: right; ">No. Revisi : 00</div>
        <div style="width: 49%; text-align: left;  float: right; ">(No:MIP/FRM/KLN/015)</div>
    </div>
    
</html>