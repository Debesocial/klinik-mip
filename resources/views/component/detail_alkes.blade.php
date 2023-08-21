<div class="ps-1">
    <h3>{{ $alkes->nama_alkes }}</h3>
    <h6>{{ $alkes->kod }}</h6>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
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
