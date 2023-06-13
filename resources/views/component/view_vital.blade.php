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
                            <td>: {{$tandavital->skala_nyeri}} </td>
                        </tr>
                        <tr>
                            <th>HR</th>
                            <td>: {{$tandavital->hr}} </td>
                        </tr>
                        <tr>
                            <th>BP</th>
                            <td>: {{$tandavital->bp}} / {{$tandavital->bp_menit}}</td>
                        </tr>
                        <tr>
                            <th>Temp</th>
                            <td>: {{$tandavital->temp}} </td>
                        </tr>
                        <tr>
                            <th>RR</th>
                            <td>: {{$tandavital->rr}} </td>
                        </tr>
                        <tr>
                            <th>Saturasi Oksigen</th>
                            <td>: {{$tandavital->saturasi_oksigen}} </td>
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
                        <tr>
                            <th>Gejala</th>
                            <td>: {{$tandavital->hasilpemantauan->nama_pemantauan}} - {{$tandavital->hasilpemantauan->kode}}</td>
                        </tr>
                        @if ($tandavital->hasilpemantauan->id==6)
                            <th></th>
                            <td>-{{$tandavital->gejala_lain}}</td>
                        @endif
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
                        @if ($tandavital->terapi)
                            @foreach (json_decode($tandavital->terapi) as $terapi)
                                @php
                                    $dataobat = $obat->find($terapi->nama_obat);
                                @endphp
                                <tr>
                                    <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/alkes/{{$dataobat->id}}', 'Detail Alat Kesehatan' )">{{$dataobat->nama_obat}}</td>
                                    <td>{{$dataobat->nama_obat}}</td>
                                    <td>{{$terapi->jumlah_obat .' '. $dataobat->satuan_obat->satuan_obat}}</td>
                                    <td>{{$terapi->aturan_pakai}}</td>
                                    <td>{{$terapi->keterangan_resep}}</td>
                                    <td>{{tanggal($terapi->tgl_pemberian)}}</td>
                                </tr>
                            @endforeach
                            
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </ul>
</div>