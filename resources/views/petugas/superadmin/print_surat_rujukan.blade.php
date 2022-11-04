<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Rujukan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: #333;
        text-align: left;
        font-size: 18px;
        margin: 0;
    }
    .container {
        margin: 0 auto;
        margin-top: 0px;
        /* padding: 40px;
        width: 750px; */
        height: auto;
        background-color: #fff;
    }
    caption {
        font-size: 28px;
        margin-bottom: 15px;
    }
    table {
        border: none;
        border-collapse: collapse;
        /* margin: 0 auto;
        width: 790px; */
    }
    td,
    tr,
    th {
        border: none;
        font-size: 13px;
        width: 109px;
    }
    th {
        background-color: #f0f0f0;
    }
    h4,
    p {
        margin: 0px;
    }
    
    </style>
</head>

<body>
    <div class="container">
        <h4>&nbsp;&nbsp;Data Surat Izin Berobat </h4>

        <br><br>
        <h4>Data Pasien</h4>
        <br>
        <table class="table">
            <thead>
                <tr style="text-align: center;">
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Pekerjaan</th>
                    <th>Telepon</th>
                    <th>Tempat</th>
                    <th>Tanggal</th>
                    <th>riwayat</th>
                    <th>Obat yang Diberikan</th>
                    <th>Hasil Pengobatan</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center;">
                    <td>{{$surat->pasien->nama_pasien}}</td>
                    <td>{{$surat->pasien->umur}}</td>
                    <td>{{$surat->pasien->pekerjaan}}</td>
                    <td>{{$surat->pasien->telepon}}</td>
                    <td>{{$surat->tempat}}</td>
                    <td>{{$surat->tanggal}}</td>
                    <td>{{$surat->riwayat}}</td>
                    <td>{{$surat->obat_diberikan}}</td>
                    <td>{{$surat->hasil_pengobatan}}</td>
                    <td>
                        <img src="{{ asset($surat->ttd) }}" style="width: 50px; height: 50px">
                    </td>
                </tr>
                </select>
            </tbody>
        </table>

    </div>
</body>

</html>