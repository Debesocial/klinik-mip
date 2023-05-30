@extends('layouts.dashboard.app')

@section('title', 'Lihat Rekam Medis')
@section('breadcrumb', 'lihat_rekam_medis')
@section('rekam', 'active')
@section('judul', 'Lihat Rekam Medis')
@section('container')



<div hidden>{{ $pasien->perusahaan->nama_perusahaan_pasien }} {{ $pasien->jabatan->nama_jabatan }} {{ $pasien->divisi->nama_divisi }}{{ $pasien->keluarga->nama_keluarga }}</div>

<div class="container">
    <h5 class="text-center">Rekam Medis {{ $pasien->id_rekam_medis }}</h5>
    <div class="row mb-3">
        <div class="col">
            Nama Pasien : <a href="#" onclick="tampilModalPasien({{ json_encode($pasien) }})">{{ $pasien->nama_pasien }} <i class="bi bi-box-arrow-up-right"></i></a> <br>
            Tanggal daftar, <b> {{tanggal($pasien->created_at)}} </b>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-title">
                                Rawat Inap
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('rawatinap.addrawatinap') }}" class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span>
                            </a> 
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" id="tableInap" width="100%">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>ID Rawat Inap</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawatinap as $rawatinap)
                                    <tr>
                                        <td data-order="{{strtotime($rawatinap->mulai_rawat)}}">
                                            <b>{{ tanggal($rawatinap->mulai_rawat, false) }}</b>
                                            <small>
                                                <p class="m-0">
                                                    {!! ($rawatinap->berakhir_rawat)? 'Akhir: '. tanggal($rawatinap->berakhir_rawat, false):'<span class="badge bg-primary">Masih dirawat</span>' !!}
                                                </p>
                                            </small>
                                        </td>
                                        <td>
                                            <b>{{ $rawatinap->id_rawat_inap }}</b>
                                            <small>
                                                <p class="m-0">
                                                    Diagnosa: {{ $namapenyakit->find(json_decode($rawatinap->nama_penyakit_id)[0])->primer }}
                                                </p>
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                                <a href="/view/rawat/inap/{{$rawatinap->id }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                                <a href="/ubah/rawat/inap/{{$rawatinap->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-title">
                                Rawat Jalan
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('rawatjalan.tambahrawatjalan') }}" class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span>
                            </a> 
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" id="tableJalan" width="100%">
                            <thead>
                                <tr>
                                    <th>Tanggal Berobat</th>
                                    <th>ID Rawat Jalan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawatjalan as $rawatjalan)
                                    <tr>
                                        <td data-order="{{strtotime($rawatjalan->tanggal_berobat)}}">
                                            <b>{{ tanggal($rawatjalan->tanggal_berobat, false) }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $rawatjalan->id_rawat_jalan }}</b>
                                            <small>
                                                <p class="m-0">Diagnosa :{{ $namapenyakit->find(json_decode($rawatjalan->nama_penyakit_id)[0])->primer }}</p>
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                                <a href="/view/rawat/jalan/{{$rawatjalan->id }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                                <a href="/ubah/rawat/jalan/{{$rawatjalan->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            </div>
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
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-title">
                                Pemeriksaan Narkoba
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('superadmin.periksanarkoba') }}" class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span>
                            </a> 
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" id="tableNarkoba" width="100%">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Hasil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($test as $test)
                                    <tr>
                                        <td class="text-center">
                                            <b>
                                                {{tanggal($test->created_at, false)}}
                                            </b>
                                        </td>
                                        <td class="text-center">
                                            @if ($test->amp == 0 && $test->met == 0 && $test->thc == 0 && $test->bzo == 0 && $test->mop == 0 && $test->coc == 0)
                                                <span class="badge bg-primary">Tidak Terindikasi</span>
                                            @else
                                                <span class="badge bg-danger">Terindikasi</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                                <a href="/view/pemeriksaan/narkoba/{{$test->id }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                                <a href="/ubah/pemeriksaan/narkoba/{{$test->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-title">
                                MCU
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/add_mcu/awal">- MCU Awal</a></li>
                                    <li><a class="dropdown-item" href="/add_mcu/lanjutan">- MCU Berkala, Khusus & Akhir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" id="tableMcu" width="100%">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>ID MCU</th>
                                    <th>Hasil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mcu_awal as $awal)
                                    <tr>
                                        <td data-sort="{{ $awal->created_at }}" class="text-center"><b>{{ tanggal($awal->created_at, false) }}</b></td>
                                        <td>
                                            <b>{{ $awal->id_mcu_awal }}</b>
                                            <small><p class="m-0">MCU Awal</p></small>
                                        </td>
                                        <td>{{ cekRekomendasi($awal->hasil_rekomendasi) }}</td>
                                        <td> 
                                             <div class="btn-group btn-group-sm" role="group"
                                                aria-label="Basic outlined example">
                                                <a href="/mcu/{{ $awal->id }}" class="btn btn-outline-secondary"
                                                    title="Ubah data alkes"><i class="bi bi-eye-fill"></i></a>
                                                <a href="/ubah_mcu/awal/{{ $awal->id }}"
                                                    class="btn btn-outline-secondary" title="Ubah data alkes"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($mcu_lanjutan as $lanjut)
                                    <tr>
                                        <td data-sort="{{ $lanjut->tanggal_pemeriksaan }}" class="text-center"><b>{{ tanggal($lanjut->tanggal_pemeriksaan, false) }}</b></td>
                                        <td>
                                            <b>{{ $lanjut->id_mcu_lanjutan }}</b>
                                            <small><p class="m-0">MCU {{ cekMcu($lanjut->jenis_mcu) }}</p></small>
                                        </td>
                                        <td>{{ cekrekomendasi($lanjut->status) }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group"
                                                aria-label="Basic outlined example">
                                                <a href="/mcu/lanjutan/{{ $lanjut->id }}"
                                                    class="btn btn-outline-secondary" title="Ubah data alkes"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="/ubah_mcu/lanjutan/{{ $lanjut->id }}"
                                                    class="btn btn-outline-secondary" title="Ubah data alkes"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </div>
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
    
</div>

@section('js')
    <script>
        $(document).ready(function(){
            let jquery_datatable_narkoba = $("#tableNarkoba").DataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [ {
                                'targets': [1,2], /* column index */
                                'orderable': false, /* true or false */
                            }],
                scrollY: 250,
                scrollX:true,
                searching: false,
                paging:false,
                info:false,
                order: [[0, 'desc']],

            })
            let jquery_datatable_mcu = $("#tableMcu").DataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [ {
                                'targets': [1,2,3], /* column index */
                                'orderable': false, /* true or false */
                            }],
                scrollY: 250,
                scrollX:true,
                searching: false,
                paging:false,
                info:false,
                order: [
                    [0, 'desc']
                ]
            })
            let jquery_datatable_inap = $("#tableInap").DataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [ {
                                'targets': [1,2], /* column index */
                                'orderable': false, /* true or false */
                            }],
                order: [[0, 'desc']],
                scrollY: 250,
                scrollX:true,
                searching: false,
                paging:false,
                info:false
            })
            let jquery_datatable_jalan = $("#tableJalan").DataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [ {
                                'targets': [1,2], /* column index */
                                'orderable': false, /* true or false */
                            }],
                order: [[0, 'desc']],
                scrollY: 250,
                scrollX:true,
                searching: false,
                paging:false,
                info:false
            })
            $('#tableNarkoba_wrapper').children().first().remove()
            $('#tableMcu_wrapper').children().first().remove()
            $('#tableInap_wrapper').children().first().remove()
            $('#tableJalan_wrapper').children().first().remove()
        })
    </script>
@stop

@include('sweetalert::alert')
@endsection
