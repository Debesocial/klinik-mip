<div class="table-responsive">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <th>Kode</th>
                <td>: {{$obat->kode}}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>: {{$obat->nama_obat}}</td>
            </tr>
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
                <th>Komposisi</th>
                <td>: {{$obat->komposisi_obat}}</td>
            </tr>
        </tbody>
    </table>
</div>