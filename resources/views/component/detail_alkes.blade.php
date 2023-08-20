<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Kode</th>
                        <td>: {{ $alkes->kod }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $alkes->nama_alkes }}</td>
                    </tr>
                    <tr>
                        <th>Distributor</th>
                        <td>: {{ $alkes->distributor }}</td>
                    </tr>
                    <tr>
                        <th>Golongan</th>
                        <td>: {{ $alkes->golongan_alkes->golongan_alkes }}</td>
                    </tr>
                    <tr>
                        <th>Satuan</th>
                        <td>: {{ $alkes->satuan_obat->satuan_obat }}</td>
                    </tr>
                    <tr>
                        <th>Bobot</th>
                        <td>: {{ $alkes->bobot_obat->bobot_obat }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp {{ uang($alkes->harga) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
