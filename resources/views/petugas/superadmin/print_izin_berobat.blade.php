<!DOCTYPE html>
<head>
    <title>Surat Izin Berobat</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>Surat Izin Berobat</h3>
        <br><br>
        <div style="width: 50%; text-align: left; float: right;">Site Krassi,.................</div><br>

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
                <td style="width: 65%;">{{$izin->pasien->tempat_lahir}}, {{$izin->pasien->tanggal_lahir}}</td>
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

        <div style="width: 50%; text-align: left; float: right;">Salam</div><br>
        <br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">Klinik PT MIP</div>

    </div>
</body>

</html>