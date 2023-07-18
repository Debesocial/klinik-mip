@extends('layouts.dashboard.app')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('css')
<style>
    .tableFixHead {
        overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
        height: 300px; /* gives an initial height of 200px to the table */
      }
      .tableFixHead thead th {
        position: sticky; /* make the table heads sticky */
        top: 0px; /* table head will be placed from the top of the table and sticks to it */
      }
      table {
        border-collapse: collapse; /* make the table borders collapse to each other */
        width: 100%;
      }
      
</style>
@stop

@section('container')
    <div class="col-12">
        <div class="btn-group mb-1" style=" float: right;">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButtonIcon"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-error-circle me-50"></i> {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                    <a class="dropdown-item" href="/ubah/profile/{{ Auth::user()->id }}"><i class="bi bi-person me-50"></i>
                        Profil</a>
                    <a class="dropdown-item" href="/ubah/password/{{ Auth::user()->id }}"><i class="bi bi-key me-50"></i>
                        Ubah Kata Sandi</a>
                    <a class="dropdown-item" href="#" onclick="logoutConfirm()"><i class="bi bi-box-arrow-right"></i> Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <h4 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h4>
    <div class="page-content">
        @if (Auth::user()->level->nama_level=='superadmin'||Auth::user()->level->nama_level=='apoteker')
        <div class="row">
            <div class="col-md-7">
                <div class="card">  
                    <div class="card-header pb-0">
                        <div class="card-title">Antrian Resep Obat</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-hover" id="resep" width=100%>
                                <thead>
                                    <th class="text-start">ID</th>
                                    <th class="text-start">Nama Pasien</th>
                                    <th class="text-start">Waktu</th>
                                    <th class=""></th>
                                </thead>
                                <tbody>
                                    @foreach ($resep['resep_inap'] as $res)
                                    {{$res->resep}}
                                    @if (is_array(json_decode($res->resep)))
                                    @if (count(json_decode($res->resep))>0)
                                    <tr>
                                        <td >{{$res->id_rawat_inap}} <br><b>Rawat Inap</b></td>
                                        <td>{{$res->pasien->nama_pasien}}</td>
                                        <td data-sort="{{ $res->created_at }}">{{tanggal($res->created_at,null,null,null,true)}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-success btn-sm" onclick='modalResep("{{$res->id}}","{{$res->id_rawat_inap}}","{{$res->pasien->nama_pasien}}",{!!$res->resep!!}, "inap")'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                    <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                        
                                    @endif
                                        
                                    @endif
                                    @endforeach
                                    @foreach ($resep['resep_jalan'] as $res)
                                    @if (is_array(json_decode($res->resep)))
                                    @if (count(json_decode($res->resep))>0)
                                    <tr>
                                        <td >{{$res->id_rawat_jalan}} <br> <b>Rawat Jalan</b></td>
                                        <td>{{$res->pasien->nama_pasien}}</td>
                                        <td data-sort="{{ $res->created_at }}">{{tanggal($res->created_at,null,null,null,true)}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-success btn-sm" onclick='modalResep("{{$res->id}}","{{$res->id_rawat_jalan}}","{{$res->pasien->nama_pasien}}",{!!$res->resep!!}, "jalan")'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                    <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                        
                                    @endif
                                    @endif
                                    @endforeach
                                    @foreach ($resep['resep_instruksi'] as $res)
                                    @if (is_array(json_decode($res->resep)))
                                    @if (count(json_decode($res->resep))>0)
                                        <tr>
                                            <td >{{$res->rawatinap->id_rawat_inap}} <br> <b>Rawat Inap</b> <small class="text-secondary">Instruksi Dokter</small></td>
                                            <td>{{$res->rawatinap->pasien->nama_pasien}}</td>
                                            <td data-sort="{{ $res->created_at }}">{{tanggal($res->created_at,null,null,null,true)}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-success btn-sm" onclick='modalResep("{{$res->id}}","{{$res->rawatinap->id_rawat_inap}}","{{$res->rawatinap->pasien->nama_pasien}}",{!!$res->resep_obat!!} , "instruksi")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                        <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        @endif
                                        @endif
                                    @endforeach
                                    @foreach ($resep['resep_vital'] as $res)
                                    @if (is_array(json_decode($res->resep)))
                                    @if (count(json_decode($res->resep))>0)
                                        <tr>
                                            <td >{{$res->rawatinap->id_rawat_inap}} <br> <b >Rawat Inap</b> <small class="text-secondary">Pem. Tanda Vital</small></td>
                                            <td>{{$res->rawatinap->pasien->nama_pasien}}</td>
                                            <td data-sort="{{ $res->created_at }}">{{tanggal($res->created_at,null,null,null,true)}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-success btn-sm" onclick='modalResep("{{$res->id}}","{{$res->rawatinap->id_rawat_inap}}","{{$res->rawatinap->pasien->nama_pasien}}",{!!$res->terapi!!}, "vital")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                                        <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">  
                    <div class="card-header pb-0">
                        <div class="card-title">Resep Diserahkan Hari Ini</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-hover" id="resep_delivered" width=100%>
                                <thead>
                                    <th class="text-start">Penyerahan Resep</th>
                                    <th class="text-start">Waktu Pemberian</th>
                                    <th class=""></th>
                                </thead>
                                <tbody>
                                    @foreach ($delivered_resep['resep_inap'] as $res)
                                        <tr>
                                            <td >{{$res->id_rawat_inap}} <br><b>Rawat Inap</b><br>{{$res->pasien->nama_pasien}}</td>
                                            <td data-sort="{{ $res->delivered_at }}">{{tanggal($res->delivered_at,null,null,null,true)}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-secondary border-0 btn-sm" onclick='modalResepDelivered("{{$res->id}}","{{$res->id_rawat_inap}}","{{$res->pasien->nama_pasien}}",{!!$res->resep!!}, "inap", "{{$res->catatan_resep}}", "{{$res->need_approve_resep}}")'>
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($delivered_resep['resep_jalan'] as $res)
                                        <tr>
                                            <td >{{$res->id_rawat_jalan}} <br><b>Rawat Jalan</b><br>{{$res->pasien->nama_pasien}}</td>
                                            <td data-sort="{{ $res->delivered_at }}">{{tanggal($res->delivered_at,null,null,null,true)}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-secondary border-0 btn-sm" onclick='modalResepDelivered("{{$res->id}}","{{$res->id_rawat_jalan}}","{{$res->pasien->nama_pasien}}",{!!$res->resep!!}, "jalan", "{{$res->catatan_resep}}", "{{$res->need_approve_resep}}")'>
                                                   <i class="bi bi-eye-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($delivered_resep['resep_instruksi'] as $res)
                                        <tr>
                                            <td >{{$res->rawatinap->id_rawat_inap}} <br> <b>Rawat Inap</b> <small class="text-secondary">Instruksi Dokter</small><br>{{$res->rawatinap->pasien->nama_pasien}}</td>
                                            <td data-sort="{{ $res->delivered_at }}">{{tanggal($res->delivered_at,null,null,null,true)}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-secondary border-0 btn-sm" onclick='modalResepDelivered("{{$res->id}}","{{$res->rawatinap->id_rawat_inap}}","{{$res->rawatinap->pasien->nama_pasien}}",{!!$res->resep_obat!!} , "instruksi", "{{$res->catatan_resep}}", "{{$res->need_approve_resep}}")'>
                                                   <i class="bi bi-eye-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($delivered_resep['resep_vital'] as $res)
                                        <tr>
                                            <td>
                                                {{$res->rawatinap->id_rawat_inap}} <br> 
                                                <b >Rawat Inap</b> 
                                                <small class="text-secondary">Pem. Tanda Vital</small><br>{{$res->rawatinap->pasien->nama_pasien}}</td>
                                            <td data-sort="{{ $res->delivered_at }}">{{tanggal($res->delivered_at,null,null,null,true)}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-secondary border-0 btn-sm" onclick='modalResepDelivered("{{$res->id}}","{{$res->rawatinap->id_rawat_inap}}","{{$res->rawatinap->pasien->nama_pasien}}",{!!$res->terapi!!}, "vital", "{{$res->catatan_resep}}", "{{$res->need_approve_resep}}")'>
                                                   <i class="bi bi-eye-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        @endif
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title">Total Pasien <b>{{ $total_pasien }}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chart-body">
                                <canvas id="pasienChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header pb-0">
                        <div class="card-title">Pasien Rawat Inap <b>{{$pasien_masih_rawat_inap->count()}}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive tableFixHead">
                            <table class="table table-hover">
                                <thead>
                                    <th class="bg-white">#</th>
                                    <th class="bg-white">ID Rawat Inap</th>
                                    <th class="bg-white">Mulai Rawat</th>
                                </thead>
                                <tbody>
                                    @foreach ($pasien_masih_rawat_inap as $inap)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="ps-3">
                                               <a href="/view/rawat/inap/{{$inap->id}}"> 
                                                    <b>{{$inap->id_rawat_inap}} <i class="bi bi-box-arrow-up-right"></i></b><br>
                                                    {{$inap->pasien->nama_pasien}} 
                                                </a>
                                            </td>
                                            <td class="text-center">{{tanggal($inap->mulai_rawat, false)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title">Pemeriksaan Tanda Vital <b>{{tanggal(date('Y-m-d H:i:s'),null,null,true)}}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive tableFixHead">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-white">#</th>
                                        <th class="bg-white">Waktu</th>
                                        <th class="bg-white">ID Rawat Inap</th>
                                        <th class="bg-white">Skala Nyeri</th>
                                        <th class="bg-white">HR</th>
                                        <th class="bg-white">BP</th>
                                        <th class="bg-white">Temp</th>
                                        <th class="bg-white">RR</th>
                                        <th class="bg-white">SPO2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tanda_vital_hari_ini->sortByDesc('created_at') as $vital)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('H:i',strtotime($vital->created_at))}}</td>
                                            <td>
                                                <a href="/view/rawat/inap/{{$vital->rawatinap->id}}/4">
                                                    <b>{{$vital->rawatinap->id_rawat_inap}} <i class="bi bi-box-arrow-up-right"></i></b> <br>
                                                    {{$vital->rawatinap->pasien->nama_pasien}}
                                                </a>
                                            </td>
                                            <td class="text-center">{{$vital->skala_nyeri}}</td>
                                            <td class="text-center">{{$vital->hr}}</td>
                                            <td class="text-center">{{$vital->bp}}</td>
                                            <td class="text-center">{{$vital->temp}}</td>
                                            <td class="text-center">{{$vital->rr}}</td>
                                            <td class="text-center">{{$vital->saturasi_oksigen}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header pb-0">
                        <div class="card-title">Total Rawat Jalan <b>{{$total_rawat_jalan}}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chart-body">
                                <canvas id="jalanChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title">Total Kunjungan <b>{{$total_kunjungan}}</b></div>
                    </div>
                    <div class="card-body">
                        <i><b class="text-primary">**</b> Total kunjungan adalah jumlah pasien pada rawat inap, rawat jalan, MCU, dan pemeriksaan narkotika.</i>
                        <div class="chart">
                            <div class="chart-body">
                                <canvas id="kunjunganChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title">Jadwal Petugas</div>
                        @php
                            $hari = ['senin','selasa','rabu','kamis','jumat','sabtu','minggu']
                        @endphp
                    </div>
                    <div class="card-body">
                        <div class="table-responsive tableFixHead">
                            <table class="table table-hover">
                                <thead>
                                    <tr >
                                        <th class="bg-white"></th>
                                        <th class="bg-white" id="_1">Senin</th>
                                        <th class="bg-white" id="_2">Selasa</th>
                                        <th class="bg-white" id="_3">Rabu</th>
                                        <th class="bg-white" id="_4">Kamis</th>
                                        <th class="bg-white" id="_5">Jumat</th>
                                        <th class="bg-white" id="_6">Sabtu</th>
                                        <th class="bg-white" id="_7">Minggu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="badge bg-success">Shift 1</span><b>06:30 - 18-30</b><br></td>
                                        @foreach ($hari as $h)
                                            <td id="_{{$loop->iteration}}">
                                                <ol>
                                                    @foreach ($jadwal as $j)
                                                        @if (str_contains($j[$h],'Shift 1'))
                                                            <li>{{$j->user->name}}</li>
                                                        @endif
                                                    @endforeach
                                                </ol>
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-primary">Shift 2</span><b>18:30 - 06:30</b><br></td>
                                        @foreach ($hari as $h)
                                        <td id="_{{$loop->iteration}}">
                                            <ol>
                                                @foreach ($jadwal as $j)
                                                    @if (str_contains($j[$h],'Shift 2'))
                                                        <li>{{$j->user->name}}</li>
                                                    @endif
                                                @endforeach
                                            </ol>
                                        </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Resep -->
    <div class="modal fade" id="modalResep" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modalResep_Label" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalResep_title">Resep Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalResep_body">
                    <table>
                        <tbody>
                            <tr>
                                <th style="white-space: nowrap; width:0">Nama Pasien</th>
                                <td id="_nama_pasien"></td>
                            </tr>
                            <tr>
                                <th>ID Pemeriksaan</th>
                                <td id="_id_pemeriksaan"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row mt-3 mx-3">
                        <div class="col-md-6 border pt-2">
                            <h6>Daftar Obat</h6>
                            <div id="list-resep"></div>
                        </div>
                        <div class="col-md-6 py-3 border">
                            <form action="" id="form-serahkan" action="POST">
                                <input type="hidden" name="is_delivered" value="1">
                                <div class="mb-3">
                                    <textarea name="catatan_resep" id="catatan_resep" class="form-control" placeholder="Masukkan catatan penyerahan obat"></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="need_approve_resep" id="need_approve_resep">
                                        <label class="form-check-label" for="need_approve_resep">
                                        Beritahu Dokter
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-success btn-sm" id="button-serahkan" onclick="confirmSerahkan()">Serahkan Obat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Resep Delivered -->
    <div class="modal fade" id="_modalResep" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="_modalResep_Label" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="_modalResep_title">Resep Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="_modalResep_body">
                    <table>
                        <tbody>
                            <tr>
                                <th style="white-space: nowrap; width:0">Nama Pasien</th>
                                <td id="_nama_pasien_delivered"></td>
                            </tr>
                            <tr>
                                <th>ID Pemeriksaan</th>
                                <td id="_id_pemeriksaan_delivered"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row mt-3 mx-3">
                        <div class="col-md-6 border pt-2">
                            <h6>Daftar Obat</h6>
                            <div id="list-resep-delivered"></div>
                        </div>
                        <div class="col-md-6 py-3 border">
                            <form action="" id="form-serahkan" action="POST">
                                <input type="hidden" name="is_delivered" value="1">
                                <div class="mb-3">
                                    <textarea name="_catatan_resep" id="_catatan_resep" class="form-control" placeholder="Tidak Ada Catatan" disabled></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="_need_approve_resep" id="_need_approve_resep" disabled>
                                        <label class="form-check-label" for="_need_approve_resep">Beritahu Dokter</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')

    <script>
        let pasien = @json($pasien_per_bulan);
        let tanggalMax = new Date();
        let tanggalMin = new Date(pasien[0].tanggal);
        const colors = {
            purple: {
                default: "rgba(67,94,190, 1)",
                half: "rgba(67,94,190, 0.5)",
                quarter: "rgba(67,94,190, 0.25)",
                zero: "rgba(67,94,190, 0)"
            },
            indigo: {
                default: "rgba(255,167,182, 1)",
                half: "rgba(255,167,182, 0.5)",
                quarter: "rgba(255,167,182, 0.25)",
                zero: "rgba(255,167,182, 0)"
            }
        };

        let ctx = document.getElementById('pasienChart').getContext('2d');
        gradient = ctx.createLinearGradient(0, 25, 0, 300);
        gradient.addColorStop(0, colors.purple.half);
        gradient.addColorStop(0.35, colors.purple.quarter);
        gradient.addColorStop(1, colors.purple.zero);
        gradient1 = ctx.createLinearGradient(0, 25, 0, 300);
        gradient1.addColorStop(0, colors.indigo.half);
        gradient1.addColorStop(0.35, colors.indigo.quarter);
        gradient1.addColorStop(1, colors.indigo.zero);
        Chart.register(ChartDataLabels); 
        let options = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Pasien'
                    },
                    ticks: {
                        stepSize: 10
                    }
                },
                x: {
                    beginAtZero: true,
                    type: 'time',
                    time: {
                        unit: 'month',
                        tooltipFormat:'MMM yyyy'
                    },
                    grid: {
                        display: false
                    },
                    min: tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()-3),
                    max: tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()+1),
                }
            },
            layout: {
                padding: {
                    top: 30
                }
            },
            plugins: {
                legend: true,
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val.total}`),
                    labels: {
                        value: {
                            color: 'black'
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
        }
        // let pasien = @json($pasien_per_bulan);
        
        // console.log(tanggalMin.getMonth());
        let valTemp = [null, null];
        for (let date = tanggalMin; date <= tanggalMax; date.setMonth(date.getMonth() + 1)){
            const formattedMonth = date.getFullYear()+'-'+ cekSingle(date.getMonth()+1);
            cekTemp = pasien.find(e => e.tanggal === formattedMonth);
            if (cekTemp==undefined){
                temp = {
                    count:0,
                    total:valTemp[1],
                    tanggal: formattedMonth
                }
                pasien.push(temp);
            }else{
                valTemp = [cekTemp.total_bulan, cekTemp.total]
            }
            
        }
        pasien.sort((a, b) => {
            if (a.tanggal < b.tanggal) {
                return -1;
            }
        });
        let datasets = [{
            label: 'Total Pasien',
            data: pasien,
            parsing: {
                yAxisKey: 'total',
                xAxisKey: 'tanggal',
            },
            spanGaps: true,
            fill:true,
            tension: 0.3,
            backgroundColor: gradient,
            
        },{
            label: 'Penambahan Pasien',
            data: pasien,
            parsing: {
                yAxisKey: 'count',
                xAxisKey: 'tanggal',
            },
            spanGaps: true,
            fill:true,
            tension: 0.3,
            backgroundColor: gradient1,
            datalabels: {
                color: 'crimson',
                anchor: 'end', // remove this line to get label in middle of the bar
                align: 'end',
                formatter: function(value, context) {
                    return value.count;
                },
            },
            hidden: true
            
        }
    ]
        let cfg = {
            type: 'line',
            options: options,
            data: {
                datasets: datasets
            },
        }
        const chartPasien =  new Chart(ctx, cfg);

        function scroller(scroll, chart, mindif=3) { 
            mintemp = new Date(chart.config.options.scales.x.min);
            maxtemp = new Date(chart.config.options.scales.x.max)
            minDev = new Date();
            minDev.setMonth(minDev.getMonth()-mindif);
            if (scroll.deltaY > 0){
                if(chart.config.options.scales.x.max<tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()+1)){
                    chart.config.options.scales.x.max = maxtemp.setMonth(maxtemp.getMonth()+1);
                    chart.config.options.scales.x.min = mintemp.setMonth(mintemp.getMonth()+1);
                }else{
                    
                    chart.config.options.scales.x.max = tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()+1);
                    chart.config.options.scales.x.min = minDev.getFullYear()+'-'+ cekSingle(minDev.getMonth());
                }
            }else if (scroll.deltaY < 0){
                chart.config.options.scales.x.min = mintemp.setMonth(mintemp.getMonth()-1);
                chart.config.options.scales.x.max = maxtemp.setMonth(maxtemp.getMonth()-1);
            }
            chart.update();
        }

        chartPasien.canvas.addEventListener('wheel', (e)=>{
            scroller(e, chartPasien);
        });
    </script>

    <script>
        let jalan = @json($rawat_jalan_per_bulan);
        let bulanMinJalan = new Date(jalan[0].bulan);
        let bulanMaxJalan = new Date();
        let ctx2 = document.getElementById('jalanChart').getContext('2d');
        // Chart.register(ChartDataLabels);
        let options2 = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Rawat Jalan'
                    },
                    ticks: {
                        stepSize: 10
                    }
                },
                x: {
                    beginAtZero: true,
                    type: 'time',
                    time: {
                        unit: 'month',
                        tooltipFormat:'MMM yyyy'
                    },
                    grid: {
                        display: false
                    },
                    min: bulanMaxJalan.getFullYear()+'-'+ cekSingle(bulanMaxJalan.getMonth()-3),
                    max: bulanMaxJalan.getFullYear()+'-'+ cekSingle(bulanMaxJalan.getMonth()+1),
                }
            },
            layout: {
                padding: {
                    top: 30
                }
            },
            plugins: {
                legend: false,
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val.total}`),
                    labels: {
                        value: {
                            color: 'black'
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
        }
        for (let date = bulanMinJalan; date <= bulanMaxJalan; date.setMonth(date.getMonth() + 1)){
            const formattedMonthJalan = date.getFullYear()+'-'+ cekSingle(date.getMonth()+1);
            cekTemp = jalan.find(e => e.bulan === formattedMonthJalan);
            if (cekTemp==undefined){
                temp = {
                    total:0,
                    bulan: formattedMonthJalan
                }
                jalan.push(temp);
            }
        }
        jalan.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
        let datasets2 = [{
            label: 'Total Rawat Jalan',
            data: jalan,
            parsing: {
                yAxisKey: 'total',
                xAxisKey: 'bulan',
            },
            spanGaps: true,
            fill:true,
            tension: 0.3,
            backgroundColor: 'pink',
            
        }]
        let cfg2 = {
            type: 'bar',
            options: options2,
            data: {
                datasets: datasets2
            },
        }
        const chartJalan =  new Chart(ctx2, cfg2);
        chartJalan.canvas.addEventListener('wheel', (e)=>{
            scroller(e, chartJalan);
        })


    </script>

    <script>
        let kunjungan = @json($kunjungan_perbulan);
        let bulanMaxKunjungan = new Date();
        let bulanMinKunjungan = new Date();
        bulanMinKunjungan.setMonth(bulanMinKunjungan.getMonth()-3);
        let ctx3 = document.getElementById('kunjunganChart').getContext('2d');
        let options3 = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Kunjungan'
                    },
                    ticks: {
                        stepSize: 10
                    }
                },
                x: {
                    beginAtZero: true,
                    type: 'time',
                    time: {
                        unit: 'month',
                        tooltipFormat:'MMM yyyy'
                    },
                    grid: {
                        display: false
                    },
                    min: bulanMinKunjungan.getFullYear()+'-'+ cekSingle(bulanMinKunjungan.getMonth()),
                    max: bulanMaxKunjungan.getFullYear()+'-'+ cekSingle(bulanMaxKunjungan.getMonth()+1),
                }
            },
            layout: {
                padding: {
                    top: 30
                }
            },
            plugins: {
                legend: false,
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val.total}`),
                    labels: {
                        value: {
                            color: 'black'
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
        }
        for (let date = bulanMinKunjungan; date <= bulanMaxKunjungan; date.setMonth(date.getMonth() + 1)){
            const formattedMonthKunjungan = date.getFullYear()+'-'+ cekSingle(date.getMonth()+1);
            cekTemp = kunjungan.find(e => e.bulan === formattedMonthKunjungan);
            if (cekTemp==undefined){
                temp = {
                    total:0,
                    bulan: formattedMonthKunjungan
                }
                kunjungan.push(temp);
            }
        }
        kunjungan.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
        let datasets3 = [{
            label: 'Total Kunjungan',
            data: kunjungan,
            parsing: {
                yAxisKey: 'total',
                xAxisKey: 'bulan',
            },
            spanGaps: true,
            fill:true,
            backgroundColor: 'greenyellow',
            
        }]
        let cfg3 = {
            type: 'bar',
            options: options3,
            data: {
                datasets: datasets3
            },
        }
        const chartKunjungan =  new Chart(ctx3, cfg3);
        chartKunjungan.canvas.addEventListener('wheel', (e)=>{
            scroller(e, chartKunjungan, 3);
        })
    </script>

    <script>
        $(document).ready(function(){
            tgl = new Date();
            $('[id*="_'+tgl.getDay()+'"]').css('background-color','rgba(30, 81, 123,0.1)').removeClass('bg-white');
        })
    </script>

    <script>
        var url= '';
        var catatan ="";
        function modalResep(id,id_per,nama_pasien,data,jenis) {
            var field_id = $('#_id_pemeriksaan');
            var field_nama = $('#_nama_pasien');
            var modal = $('#modalResep');
            var form = $('#form-serahkan');
            var buttonSerahkan = $('#button-serahkan');
            url = "/serahkan-obat/"+jenis+"/"+id;
            drawTabelResep(data);
            field_id.text(': '+id_per);
            field_nama.text(': '+nama_pasien);

            modal.modal('show');
        }
        function modalResepDelivered(id,id_per,nama_pasien,data,jenis, catatan, approve) {
            var field_id = $('#_id_pemeriksaan_delivered');
            var field_nama = $('#_nama_pasien_delivered');
            var modal = $('#_modalResep');
            
            drawTabelResep(data);
            field_id.text(': '+id_per);
            field_nama.text(': '+nama_pasien);
            $('#_catatan_resep').val(catatan);
            if (approve == 1) {
                $('#_need_approve_resep').prop('checked',true);
            }else{
                $('#_need_approve_resep').prop('checked',false);
            }
            modal.modal('show');
        }
        const obat = @json($obat);
        function drawTabelResep(resep){
            var html = `<ol>`;
            resep.forEach(res => {
                var ob = obat.find(ob => ob.id == res.nama_obat);
                // console.log(ob);
                html += `<li><b>`+ob.nama_obat+`</b> `+res.jumlah_obat+` `+ob.satuan_obat.satuan_obat+`</li>`
            });
            html+=`</ol>`;
            $('#list-resep').html(html);
            $('#list-resep-delivered').html(html);
            
        }
    </script>

    <script>
       table= $('#resep').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                "infoEmpty": "Menampikan 0 sampai 0, dari 0 data",
                "zeroRecords": "Tidak ditemukan data yang cocok",
                "infoFiltered": "(Didapatkan dari _MAX_ total seluruh data)",
            },
            scrollY: 200,
            scrollX: true,
            searching: false,
            paging:false,
            info:false,
            order: [[2, 'desc']],
            'autoWidth': true,
            'colReorder': true,
        })
       table_delivered= $('#resep_delivered').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                "infoEmpty": "Menampikan 0 sampai 0, dari 0 data",
                "zeroRecords": "Tidak ditemukan data yang cocok",
                "infoFiltered": "(Didapatkan dari _MAX_ total seluruh data)",
            },
            scrollY: 200,
            scrollX: true,
            searching: false,
            paging:false,
            info:false,
            order: [[1, 'desc']],
            'autoWidth': true,
            'colReorder': true,
        })
    </script>

    <script>
        function confirmSerahkan() {
            var catatan  = $('#catatan_resep').val();
            var need_approve = 0;
            if($('#need_approve_resep:checked').val()==1){
                need_approve = 1;
            }
            url = url+"?catatan_resep="+catatan+"&need_approve_resep="+need_approve;
            Swal.fire({ 
                icon: "warning", 
                text: "Apakah anda yakin menyerahkan obat ?",
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Serahkan'
            }).then((result) => {
                $('#modalResep').hide();
                showLoader();
                if (result.isConfirmed) { window.location.href = url }
            })
        }
    </script>

    <script>
        $(document).ready(function(){
            $('canvas').hover(function () {
                    $('body').css('overflow','hidden')
                }, function () {
                    $('body').css('overflow','')
                }
            );
        })
    </script>
@endsection
@endsection
