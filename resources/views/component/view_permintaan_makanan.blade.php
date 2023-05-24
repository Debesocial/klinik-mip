<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Diagnosa</th>
                        <td>: {{$permintaanmakanan->namapenyakit->primer}}</td>
                    </tr>
                    <tr>
                        <th>Catatan Tambahan</th>
                        <td>: {{$permintaanmakanan->catatan}}</td>
                    </tr>
                    <tr>
                        <th>Permintaan Makanan</th>
                        <td>: {{$permintaanmakanan->permintaan_makanan}}<td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>: {{tanggal($permintaanmakanan->tanggal_mulai, false)}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Selesai</th>
                        <td>: {{tanggal($permintaanmakanan->tanggal_selesai, false)}}</td>
                    </tr>
                    <tr>
                        <th>Total Hari Pemberian</th>
                        <td>: {{diffDay($permintaanmakanan->tanggal_mulai,$permintaanmakanan->tanggal_selesai)}}<td>
                    </tr>
                    <tr>
                        <th>Dokter yang Memeriksa</th>
                        @if ($permintaanmakanan->ttd == 1)
                            <td>: Tanda Tangan</td>
                        @else
                            <td>: Tanda Tangan Tersimpan</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
