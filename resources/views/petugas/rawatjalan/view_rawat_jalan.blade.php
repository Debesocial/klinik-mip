@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rawat Jalan')
@section('pemeriksaan', 'active')
@section('jalan', 'active')
@section('breadcrumb', 'lihat_rawat_jalan')
@section('judul', 'Lihat Data Rawap Jalan')
@section('container')
@section('css')
    <style>
        
        tbody>tr>th{
            white-space: nowrap;
            vertical-align: top;
            width:1%;
        }
    </style>
@stop
<div class="card">
    <div class="card-body">
        <h5>Rawat Jalan {{$jalan->id_rawat_jalan}}</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <div >Nama Pasien : <a href="#" onclick="tampilModalPasien({{ json_encode($jalan->pasien) }})">{{ $jalan->pasien->nama_pasien }} <i class="bi bi-box-arrow-up-right"></i></a></div>
            </div>
            <div class="col-md-6 text-end">
                <div >Tanggal Berobat <b>{{ tanggal($jalan->tanggal_berobat, false) }}</b></div>
            </div>
        </div>

        <ul>
            <div class="row mb-3">
                <h6><li>Pemeriksaan</li></h6>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Anamnesis</th>
                                    <td>: {{$jalan->anamnesis}}</td>
                                </tr>
                                <tr>
                                    <th>Tinggi Badan</th>
                                    <td>: {{$jalan->tinggi_badan}} Cm</td>
                                </tr>
                                <tr>
                                    <th>Berat Badan</th>
                                    <td>: {{$jalan->berat_badan}} Kg</td>
                                </tr>
                                <tr>
                                    <th>Suhu Tubuh</th>
                                    <td>: {{$jalan->suhu_tubuh}} &deg;C</td>
                                </tr>
                                <tr>
                                    <th>Tekanan Darah</th>
                                    <td>: {{$jalan->tekanan_darah}} / {{$jalan->tekanan_darah_per}} mmHg</td>
                                </tr>
                                <tr>
                                    <th>Saturasi Oksigen</th>
                                    <td>: {{$jalan->saturasi_oksigen}} %</td>
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
                                    <td>: {{$jalan->denyut_nadi}}x /menit</td>
                                </tr>
                                <tr>
                                    <th>Laju Pernapasan</th>
                                    <td>: {{$jalan->laju_pernapasan}}x /menit</td>
                                </tr>
                                <tr>
                                    <th>Pemeriksaan Penunjang</th>
                                    <td>: {{$jalan->pemeriksaan_penunjang??'-'}}</td>
                                </tr>
                                <tr>
                                    <th>Obat yang dikonsumsi sebelumnya</th>
                                    <td>: {{$jalan->obat_konsumsi??'-'}}</td>
                                </tr>
                                <tr>
                                    <th>Dokumentasi Pendukung</th>
                                    <td>
                                        @if (is_array(json_decode($jalan->dokumen))&& count(json_decode($jalan->dokumen)))
                                        <ol>
                                            @foreach (json_decode($jalan->dokumen) as $dokumen)
                                                <li> <a href="{{asset('pemeriksaan/rawatjalan/'.$dokumen)}}" target="blank">{{$dokumen}}</a></li>
                                            @endforeach
    
                                        </ol>
                                        @else
                                            : <small class="text-warning"> Belum ada dokumen</small>
                                        @endif 
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Lokalis</th>
                                    <td>: {{$jalan->status_lokalis}}</td>
                                </tr>
                                <tr>
                                    <th>Persetujuan tindakan medis</th>
                                    <td>
                                        @if ($jalan->persetujuan_tindakan)
                                            <a href="{{asset('pemeriksaan/persetujuan_tindakan/'.$jalan->persetujuan_tindakan)}}" target="_blank" rel="noopener noreferrer">: {{$jalan->persetujuan_tindakan}}</a>
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
            <div class="row mb-3">
                <h6><li>Diagnosa</li></h6>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Penyakit</th>
                                    <th>Sub-Klasifikasi</th>
                                    <th>Klasifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($jalan->nama_penyakit_id) as $id_penyakit)
                                    @php
                                        $penyakit = $nama_penyakit->find($id_penyakit);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $penyakit->primer }}</td>
                                        <td>{{ $penyakit->sub_klasifikasi->nama_penyakit }}</td>
                                        <td>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
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
                                @if (is_array(json_decode($jalan->tindakan)))
                                @foreach (json_decode($jalan->tindakan) as $tin)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$tindakan->find($tin->nama_tindakan)->nama_tindakan}}</td>
                                        <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/alkes/{{$tin->alat_kesehatan}}', 'Detail Alat Kesehatan' )">{{$alkes->find($tin->alat_kesehatan)->nama_alkes}}</td>
                                        <td class="text-center">{{$tin->jumlah_pengguna}}</td>
                                        <td>{{$tin->keterangan}}</td>
                                    </tr>
                                @endforeach
                                    
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <h6><li>Resep Obat</li></h6>
                <div class="col">
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
                            @if (is_array(json_decode($jalan->resep)))
                            @foreach (json_decode($jalan->resep) as $resep)
                                @php
                                    $dataobat = $obat->find($resep->nama_obat)
                                @endphp
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/obat/{{$dataobat->id}}', 'Detail Obat')">{{$dataobat->nama_obat}}</a></td>
                                    <td class="text-center">{{$resep->jumlah_obat}} {{$dataobat->satuan_obat->satuan_obat}}</td>
                                    <td>{{$resep->aturan_pakai}}</td>
                                    <td>{{$resep->keterangan_resep}}</td>
                                </tr>
                            @endforeach
                                
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </ul>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalRawatInap2" data-bs-backdrop="static" data-bs-keyboard="false"
aria-labelledby="modalRawatInap2Label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalRawatInap2_title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalRawatInap2_body">
            ...
        </div>
        
    </div>
</div>
</div>

@section('js')
    <script>
        function tampilModalRawatInap2(url, title) {
            var modal = $('#modalRawatInap2');

            $('#modalRawatInap2_title').text(title);
            var request = $.ajax({
                method: 'GET',
                url: url,
            });
            request.done(function(html) {
                $('#modalRawatInap2_body').html(html);
            })

            modal.modal('show');
        }

        function hideModal(id) {
            var modal = $('#' + id);
            modal.modal('hide');
        }
    </script>
@endsection

@endsection
