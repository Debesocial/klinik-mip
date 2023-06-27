@extends('layouts.dashboard.app')

@section('title', 'Data MCU')
@section('judul', 'Data MCU')
@section('breadcrumb', 'add_mcu_awal')
@section('pemeriksaan', 'active')
@section('mcu', 'active')
@section('container')
    <div class="list-group list-group-horizontal-sm mb-3 text-center" role="tablist" style="width: 100%">
        <a class="list-group-item list-group-item-action rounded-end rounded-pill active" id="list-mcu-awal"
            data-bs-toggle="list" href="#mcu-awal" role="tab">MCU Awal
        </a>
        <a class="list-group-item list-group-item-action rounded-start rounded-pill" id="list-mcu-lanjut"
            data-bs-toggle="list" href="#mcu-lanjut" role="tab">MCU Berkala, Khusus & Akhir
        </a>
    </div>
    <div class="tab-content text-justify">
        <div class="tab-pane fade show active" id="mcu-awal" role="tabpanel" aria-labelledby="list-mcu-awal">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>MCU Awal</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            @if (Auth::user()->level->nama_level == "perawat"||Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")

                            <div class="buttons" width="100px">
                                <a href="/add_mcu/awal" class="btn m-0 btn-sm btn-success rounded-pill">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span>
                                </a>
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive pt-3 pe-3">
                                <table class="table" id="TABLE_1">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>ID MCU Awal</th>
                                            <th>Nama</th>
                                            <th>Hasil Rekomendasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mcuawal as $awal)
                                            <tr>
                                                <td data-sort="{{ strtotime($awal->created_at) }}" class="text-center">
                                                    {{ tanggal($awal->created_at) }}</td>
                                                <td class="text-center">{{ $awal->id_mcu_awal }}</td>
                                                <td>{{ $awal->pasien->nama_pasien }}</td>
                                                <td>{{ cekRekomendasi($awal->hasil_rekomendasi) }}</td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <a href="/mcu/{{ $awal->id }}" class="btn btn-outline-secondary"
                                                            title="Ubah data alkes"><i class="bi bi-eye-fill"></i></a>
                                                            @if (Auth::user()->level->nama_level == "perawat"||Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                                                            <a href="/ubah_mcu/awal/{{ $awal->id }}"
                                                                class="btn btn-outline-secondary" title="Ubah data alkes"><i
                                                                    class="bi bi-pencil-square"></i></a>
                                                                
                                                            @endif
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
        <div class="tab-pane fade " id="mcu-lanjut" role="tabpanel" aria-labelledby="list-mcu-lanjut">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>MCU Berkala, Khusus & Akhir</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            @if (Auth::user()->level->nama_level == "perawat"||Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                            <div class="buttons" width="100px">
                                <a href="/add_mcu/lanjutan" class="btn m-0 btn-sm btn-success rounded-pill">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span>
                                </a>
                            </div>
                                
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive pt-3 pe-3">
                                <table class="table" id="TABLE_2" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>ID MCU</th>
                                            <th>Nama</th>
                                            <th>Jenis Pemeriksaan</th>
                                            {{-- <th>Jenis Pemeriksaan</th> --}}
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mculanjutan as $lanjut)
                                            <tr>
                                                <td data-sort="{{ strtotime($lanjut->tanggal_pemeriksaan) }}"
                                                    class="text-center">
                                                    {{ date('d/m/Y', strtotime($lanjut->tanggal_pemeriksaan)) }}</td>
                                                <td class="text-center">{{ $lanjut->id_mcu_lanjutan }}</td>
                                                <td>{{ $lanjut->pasien->nama_pasien }}</td>
                                                <td class="text-center">{{ cekMcu($lanjut->jenis_mcu) }}</td>
                                                {{-- <td class="text-center">{{ cekMcu($lanjut->jenis_pemeriksaan) }}</td> --}}
                                                <td class="text-center">{{ cekRekomendasi($lanjut->status) }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <a href="/mcu/lanjutan/{{ $lanjut->id }}"
                                                            class="btn btn-outline-secondary" title="Ubah data alkes"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                        @if (Auth::user()->level->nama_level == "perawat"||Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                                                        <a href="/ubah_mcu/lanjutan/{{ $lanjut->id }}"
                                                            class="btn btn-outline-secondary" title="Ubah data alkes"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                            
                                                        @endif        
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
    </div>
@section('js')
    <script>
        $(document).ready(function() {
            $("table[id^='TABLE']").DataTable({
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                    "infoEmpty": "Menampikan 0 sampai 0, dari 0 data",
                    "zeroRecords": "Tidak ditemukan data yang cocok",
                    "infoFiltered": "(Didapatkan dari _MAX_ total seluruh data)",
                },
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
@stop
@endsection
