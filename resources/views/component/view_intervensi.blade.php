<ul>
    <div class="container">
        <p class="text-end mb-0">Diperiksa oleh <b>{{ $intervensi->user->name }}</b>, pada tanggal:
            <b>{{ tanggal($intervensi->created_at) }}</b>
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
                                <td>: {{ $intervensi->anamnesis }}</td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td>: {{ $intervensi->tinggi_badan }} Cm</td>
                            </tr>
                            <tr>
                                <th>Suhu Tubuh</th>
                                <td>: {{ $intervensi->suhu_tubuh }} &degC</td>
                            </tr>
                            <tr>
                                <th>Tekanan Darah</th>
                                <td>: {{ $intervensi->tekanan_darah }} / {{ $intervensi->tekanan_darah_per }} mmHg</td>
                            </tr>
                            <tr>
                                <th>Saturasi Oksigen</th>
                                <td>: {{ $intervensi->saturasi_oksigen }} %</td>
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
                                <td>: {{ $intervensi->denyut_nadi }}x /menit
                                </td>
                            </tr>
                            <tr>
                                <th>Laju Pernapasan</th>
                                <td>:
                                    {{ $intervensi->laju_pernapasan }}x /menit</td>
                            </tr>
                            <tr>
                                <th>Pemeriksaan Penunjang</th>
                                <td>: {{ $intervensi->pemeriksaan_penunjang }} </td>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <td>: {{ $intervensi->catatan_pemeriksaan }} </td>
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
                            <th>Jumlah Penggunaan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array(json_decode($intervensi->tindakan)))
                        @foreach (json_decode($intervensi->tindakan) as $tindakan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tindakan->nama_tindakan }}</td>
                                <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/alkes/{{$tindakan->alat_kesehatan}}', 'Detail Alat Kesehatan' )">{{$alatkesehatan->find($tindakan->alat_kesehatan)->nama_alkes}}</td>
                                {{-- <td>{{ $alatkesehatan->find($tindakan->alat_kesehatan)->nama_alkes }}</td> --}}
                                <td>{{ $tindakan->jumlah_pengguna }}</td>
                                <td>{{ $tindakan->keterangan }}</td>
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
                    <li>Catatan</li>
                </h6>
                <p>{{ $intervensi->catatan }}</p>
            </div>
        </div>

    </div>

</ul>
