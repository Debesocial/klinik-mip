<div class="">
    <ul>
        <div class="row">
            <h6><li>Pemeriksaan</li></h6>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Anamnesis</th>
                                <td>: {{$inap->anamnesis}}</td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td>: {{$inap->tinggi_badan}} Cm</td>
                            </tr>
                            <tr>
                                <th>Berat Badan</th>
                                <td>: {{$inap->berat_badan}} Kg</td>
                            </tr>
                            <tr>
                                <th>Suhu Tubuh</th>
                                <td>: {{$inap->suhu_tubuh}} &deg;C</td>
                            </tr>
                            <tr>
                                <th>Tekanan Darah</th>
                                <td>: {{$inap->tekanan_darah}} mmHg</td>
                            </tr>
                            <tr>
                                <th>Saturasi Oksigen</th>
                                <td>: {{$inap->saturasi_oksigen}} mmHg</td>
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
                                <td>: {{$inap->denyut_nadi}} / {{$inap->denyut_nadi_menit}} menit</td>
                            </tr>
                            <tr>
                                <th>Laju Pernapasan</th>
                                <td>: {{$inap->laju_pernapasan}} / {{$inap->laju_pernapasan_menit}} menit</td>
                            </tr>
                            <tr>
                                <th>pemeriksaan_penunjang</th>
                                <td>: {{$inap->pemeriksaan_penunjang}}</td>
                            </tr>
                            <tr>
                                <th>Obat yang dikonsumsi sebelumnya</th>
                                <td>: {{$inap->obat_konsumsi}}</td>
                            </tr>
                            <tr>
                                <th>Dokumentasi Pendukung</th>
                                <td>
                                    @if ($inap->dokumen)
                                        <a href="{{asset('pemeriksaan/rawatinap/'.$inap->dokumen)}}" target="_blank" rel="noopener noreferrer">: {{$inap->dokumen}}</a>
                                    @else
                                        : <small class="text-warning"> Belum ada dokumen</small>
                                    @endif 
                                </td>
                            </tr>
                            <tr>
                                <th>Status Lokalis</th>
                                <td>: {{$inap->status_lokalis}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <h6><li>Tindakan</li></h6>
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tindakan</th>
                                <th>Alat Kesehatan</th>
                                <th>Jumlah Pengguna</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($inap->tindakan) as $tindakan)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$tindakan->nama_tindakan}}</td>
                                    <td>{{$alkes->find($tindakan->alat_kesehatan)->nama_alkes->nama_alkes}}</td>
                                    <td>{{$tindakan->jumlah_pengguna}}</td>
                                    <td>{{$tindakan->keterangan}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <h6><li>Resep Obat</li></h6>
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Obat</th>
                                <th>Jumlah</th>
                                <th>Aturan Pakai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($inap->resep) as $resep)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$resep->nama_obat}}</td>
                                    <td>{{$resep->jumlah_obat}} {{$satuanobat->find($resep->satuan_obat)->satuan_obat}}</td>
                                    <td>{{$resep->aturan_pakai}}</td>
                                    <td>{{$resep->keterangan_resep}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </ul>
</div>