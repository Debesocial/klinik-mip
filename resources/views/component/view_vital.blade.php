<div class="container">
    <div class="row">
        <div class="col text-end">
            <p> Tanggal <b>{{tanggal($tandavital->created_at)}}</b></p>
        </div>
    </div>
    <ul>
        <div class="row">
            <li><h6>Pemeriksaan Tanda Vital</h6></li>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Skala Nyeri</th>
                            <td>: {{ $hasilpemantauan->find($tandavital->skala_nyeri)->nama_pemantauan}} <b class="text-primary">({{$hasilpemantauan->find($tandavital->skala_nyeri)->kode}})</b></td>
                        </tr>
                        <tr>
                            <th>HR</th>
                            <td>: {{ $hasilpemantauan->find($tandavital->hr)->nama_pemantauan}} <b class="text-primary">({{$hasilpemantauan->find($tandavital->hr)->kode}})</b></td>
                        </tr>
                        <tr>
                            <th>BP</th>
                            <td>: {{ $hasilpemantauan->find($tandavital->bp)->nama_pemantauan}} <b class="text-primary">({{$hasilpemantauan->find($tandavital->bp)->kode}})</b></td>
                        </tr>
                        <tr>
                            <th>Temp</th>
                            <td>: {{ $hasilpemantauan->find($tandavital->temp)->nama_pemantauan}} <b class="text-primary">({{$hasilpemantauan->find($tandavital->temp)->kode}})</b></td>
                        </tr>
                        <tr>
                            <th>RR</th>
                            <td>: {{ $hasilpemantauan->find($tandavital->rr)->nama_pemantauan}} <b class="text-primary">({{$hasilpemantauan->find($tandavital->rr)->kode}})</b></td>
                        </tr>
                        <tr>
                            <th>Saturasi Oksigen</th>
                            <td>: {{ $hasilpemantauan->find($tandavital->saturasi_oksigen)->nama_pemantauan}} <b class="text-primary">({{$hasilpemantauan->find($tandavital->saturasi_oksigen)->kode}})</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{$tandavital->keterangan}}</td>
                        </tr>
                        <tr>
                            <th>Dokumen Pendukung</th>
                            <td>: 
                                @if ($tandavital->dokumen)
                                    <a href="{{asset('petugas/pemantauan_tandavital/file/'.$tandavital->dokumen)}}" target=”_blank”>{{$tandavital->dokumen}} <i class="bi bi-box-arrow-up-right"></i></a>
                                @else
                                    <span class="text-warning"> Belum ada dokumen </span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <li><h6>Terapi Tambahan</h6></li>
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Jumlah Obat</th>
                            <th>Aturan Pakai</th>
                            <th>Keterangan</th>
                            <th>Tanggal Pemberian</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="body_resep">
                        @foreach (json_decode($tandavital->terapi) as $terapi)
                            <tr>
                                <td>{{$terapi->nama_obat}}</td>
                                <td>{{$terapi->jumlah_obat .' '. $satuanobat->find($terapi->satuan_obat)->satuan_obat}}</td>
                                <td>{{$terapi->aturan_pakai}}</td>
                                <td>{{$terapi->keterangan_resep}}</td>
                                <td>{{tanggal($terapi->tgl_pemberian)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </ul>
</div>