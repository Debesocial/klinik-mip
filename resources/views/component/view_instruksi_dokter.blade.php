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
                                <td>: {{ $instruksidokter->tekanan_darah }} / {{ $instruksidokter->tekanan_darah_per }} mmHg</td>
                            </tr>
                            <tr>
                                <th>Saturasi Oksigen</th>
                                <td>: {{ $instruksidokter->saturasi_oksigen }} %</td>
                            </tr>
                            <tr>
                                <th>Denyut Nadi</th>
                                <td>: {{ $instruksidokter->denyut_nadi }}x /menit
                                </td>
                            </tr>
                            <tr>
                                <th>Laju Pernapasan</th>
                                <td>:
                                    {{ $instruksidokter->laju_pernapasan }}x /menit</td>
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
                        @if (is_array(json_decode($instruksidokter->tindakan)))
                        @foreach (json_decode($instruksidokter->tindakan) as $tin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tindakan->find($tin->nama_tindakan)->nama_tindakan }}</td>
                                <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/alkes/{{$tin->alat_kesehatan}}', 'Detail Alat Kesehatan' )">{{$alatkesehatan->find($tin->alat_kesehatan)->nama_alkes}}</td>
                                <td>{{ $tin->jumlah_pengguna }}</td>
                                <td>{{ $tin->keterangan }}</td>

                            </tr>
                        @endforeach
                            
                        @endif
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
                            @if (is_array(json_decode($instruksidokter->resep_obat)))
                            @foreach (json_decode($instruksidokter->resep_obat) as $resep)
                                @php
                                    $data_obat = $obat->find($resep->nama_obat); 
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/obat/{{$resep->nama_obat}}', 'Detail Obat' )">{{$data_obat->nama_obat}}</td>
                                    <td>{{ $resep->jumlah_obat }}
                                        {{ $data_obat->satuan_obat->satuan_obat }}
                                    </td>
                                    <td>{{ $resep->aturan_pakai }}</td>
                                    <td>{{ $resep->keterangan_resep }}</td>
                                </tr>
                            @endforeach
                                
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</ul>
