<div class="ps-1">
    <h3>{{$obat->nama_obat}}</h3>
    <h6>{{$obat->kode}}</h6>

</div>
<div class="table-responsive">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <th>Golongan</th>
                <td>: {{$obat->golongan_obat->nama_golongan_obat}}</td>
            </tr>
            <tr>
                <th>Satuan</th>
                <td>: {{$obat->satuan_obat->satuan_obat}}</td>
            </tr>
            <tr>
                <th>Bobot</th>
                <td>: {{$obat->bobot_obat->bobot_obat}}</td>
            </tr>
            <tr>
                <th>Sediaan</th>
                <td>: {{$obat->sediaan_obat->singkatan}}</td>
            </tr>
            <tr>
                <th>Komposisi</th>
                <td>: {{$obat->komposisi_obat}}</td>
            </tr>
            <tr>
                <th>Distributor</th>
                <td>: {{$obat->distributor??'-'}}</td>
            </tr>
        </tbody>
    </table>
</div>