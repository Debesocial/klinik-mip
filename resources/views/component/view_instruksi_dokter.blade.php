<ul>
    <div class="container">
        <p class="text-end mb-0">Diperiksa oleh <b>{{ $instruksidokter->user->name }}</b>, pada tanggal:
            <b>{{ tanggal($instruksidokter->created_at) }}</b>
        </p>
        <div class="row">
            <h6>
                <li>Pemeriksaan</li>
            </h6>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Anamnesis</th>
                                <td>: {{ $instruksidokter->anamnesis }}</td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td>: {{ $instruksidokter->tinggi_badan }} Cm</td>
                            </tr>
                            <tr>
                                <th>Suhu Tubuh</th>
                                <td>: {{ $instruksidokter->suhu_tubuh }} &degC</td>
                            </tr>
                            <tr>
                                <th>Tekanan Darah</th>
                                <td>: {{ $instruksidokter->tekanan_darah }} mmHg</td>
                            </tr>
                            <tr>
                                <th>Saturasi Oksigen</th>
                                <td>: {{ $instruksidokter->saturasi_oksigen }} mmHg</td>
                            </tr>
                            <tr>
                                <th>Denyut Nadi</th>
                                <td>: {{ $instruksidokter->denyut_nadi }}/{{ $instruksidokter->denyut_nadi_menit }}
                                    menit
                                </td>
                            </tr>
                            <tr>
                                <th>Laju Pernapasan</th>
                                <td>:
                                    {{ $instruksidokter->laju_pernapasan }}/{{ $instruksidokter->laju_pernapasan_menit }}
                                    menit</td>
                            </tr>
                            <tr>
                                <th>Pemeriksaan Penunjang</th>
                                <td>: {{ $instruksidokter->pemeriksaan_penunjang }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Diagnosa</th>
                                <td>: {{ $instruksidokter->namapenyakit->primer }}
                                    <table>
                                        <tbody>
                                            <tr>
                                                <ul class="mb-0 ps-3">
                                                    <li><b>Subklasifikasi</b>
                                                        {{ $instruksidokter->namapenyakit->sub_klasifikasi->nama_penyakit }}
                                                    </li>
                                                    <li><b>Klasifikasi</b>
                                                        {{ $instruksidokter->namapenyakit->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit }}
                                                    </li>
                                                </ul>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>Diagnosa Sekunder</th>
                                <td>: {{ $instruksidokter->namapenyakit->primer }}
                                    <table>
                                        <tbody>
                                            <tr>
                                                <ul class="mb-0 ps-3">
                                                    <li><b>Subklasifikasi</b>
                                                        {{ $instruksidokter->namapenyakitsekunder->sub_klasifikasi->nama_penyakit }}
                                                    </li>
                                                    <li><b>Klasifikasi</b>
                                                        {{ $instruksidokter->namapenyakitsekunder->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit }}
                                                    </li>
                                                </ul>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6>
                    <li>Tindakan</li>
                </h6>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tindakan</th>
                            <th>Alat Kesehatan</th>
                            <th>Jumlah Pengguna</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (json_decode($instruksidokter->tindakan) as $tindakan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tindakan->nama_tindakan }}</td>
                                <td>{{ $alatkesehatan->find($tindakan->alat_kesehatan)->nama_alkes->nama_alkes }}</td>
                                <td>{{ $tindakan->jumlah_pengguna }}</td>
                                <td>{{ $tindakan->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6>
                    <li>Resep Obat</li>
                </h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Jumlah</th>
                                <th>Aturan Pakai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($instruksidokter->resep_obat) as $resep)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $resep->nama_obat }}</td>
                                    <td>{{ $resep->jumlah_obat }}
                                        {{ $satuanobat->find($resep->satuan_obat)->satuan_obat }}
                                    </td>
                                    <td>{{ $resep->aturan_pakai }}</td>
                                    <td>{{ $resep->keterangan_resep }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</ul>