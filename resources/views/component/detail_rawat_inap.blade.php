<div class="">
    <ul>
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
                                <td>: {{ $inap->anamnesis }}</td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td>: {{ $inap->tinggi_badan }} Cm</td>
                            </tr>
                            <tr>
                                <th>Berat Badan</th>
                                <td>: {{ $inap->berat_badan }} Kg</td>
                            </tr>
                            <tr>
                                <th>Suhu Tubuh</th>
                                <td>: {{ $inap->suhu_tubuh }} &deg;C</td>
                            </tr>
                            <tr>
                                <th>Tekanan Darah</th>
                                <td>: {{ $inap->tekanan_darah }} mmHg</td>
                            </tr>
                            <tr>
                                <th>Saturasi Oksigen</th>
                                <td>: {{ $inap->saturasi_oksigen }} %</td>
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
                                <th>Denyut Nadi</th>
                                <td>: {{ $inap->denyut_nadi }}x /menit</td>
                            </tr>
                            <tr>
                                <th>Laju Pernapasan</th>
                                <td>: {{ $inap->laju_pernapasan }}x /menit</td>
                            </tr>
                            <tr>
                                <th>Pemeriksaan Penunjang</th>
                                <td>: {{ $inap->pemeriksaan_penunjang }}</td>
                            </tr>
                            <tr>
                                <th>Obat yang dikonsumsi sebelumnya</th>
                                <td>: {{ $inap->obat_konsumsi }}</td>
                            </tr>
                            <tr>
                                <th>Dokumentasi Pendukung</th>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    @if (count(json_decode($inap->dokumen)) != 0)
                                        <ol>
                                            @foreach (json_decode($inap->dokumen) as $dokumen)
                                                <li> <a href="{{ asset('pemeriksaan/rawatinap/' . $dokumen) }}"
                                                        target="blank">{{ $dokumen }}</a></li>
                                            @endforeach

                                        </ol>
                                    @else
                                        <small class="text-warning"> Belum ada dokumen</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status Lokalis</th>
                                <td>: {{ $inap->status_lokalis }}</td>
                            </tr>

                            <tr>
                                <th>Persetujuan Tindakan Medis</th>
                                <td>
                                    @if ($inap->persetujuan_tindakan)
                                        <a href="{{ asset('pemeriksaan/persetujuan_tindakan/' . $inap->persetujuan_tindakan) }}"
                                            target="_blank" rel="noopener noreferrer">:
                                            {{ $inap->persetujuan_tindakan }}</a>
                                    @else
                                        : <small class="text-warning"> Belum ada persetujuan tindakan medis</small>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <h6>
                <li>Tindakan</li>
            </h6>
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tindakan</th>
                                <th>Alat Kesehatan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array(json_decode($inap->tindakan)))
                                @foreach (json_decode($inap->tindakan) as $tin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tindakan->find($tin->nama_tindakan)->nama_tindakan }}</td>
                                        <td>
                                            <ol>
                                                @foreach ($tin->alat_kesehatan as $al)
                                                    <?php
                                                    $alat = $alkes->find($al->id);
                                                    ?>
                                                    <li>
                                                        <a href="javascript:void(0)"
                                                            onclick="tampilModalRawatInap2('/modal/alkes/{{ $al->id }}', 'Detail Alat Kesehatan' )">
                                                            {{ $alat->nama_alkes }}
                                                        </a>
                                                        {{ $al->jlh }}
                                                        {{ $alat->satuan_obat->satuan_obat }}
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>{{ $tin->keterangan }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <h6>
                <li>Resep Obat</li>
            </h6>
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Obat</th>
                                <th>Jumlah</th>
                                <th>Aturan Pakai</th>
                                <th>Dosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_array(json_decode($inap->resep)))
                                @foreach (json_decode($inap->resep) as $resep)
                                    @php
                                        $dataobat = $obat->find($resep->nama_obat);
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="javascript:void(0)"
                                                onclick="tampilModalRawatInap2('/modal/obat/{{ $dataobat->id }}', 'Detail Obat')">{{ $dataobat->nama_obat }}</a>
                                        </td>
                                        <td>{{ $resep->jumlah_obat }} {{ $dataobat->satuan_obat->satuan_obat }}</td>
                                        <td>{{ $aturan->find($resep->aturan_pakai)->singkatan }}</td>
                                        <td>{{ $dosis->find($resep->dosis)->singkatan }}</td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </ul>
</div>
