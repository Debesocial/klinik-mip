@extends('layouts.dashboard.app')

@section('title', 'Data Persetujuan Tindakan Medis')
@section('persetujuanmedis', 'active')

{{-- @section('judul', 'Data Persetujuan Tindakan Medis') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Persetujuan Tindakan Medis</h3>
                    {{ Breadcrumbs::render('tindakan_medis') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                @if (Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")
                <a href="{{ route('superadmin.persetujuantindakanmedis') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
                    
                @endif
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datatindakanmedis') }}" }})
                </script>
            @endif
            <div class="table-responsive pe-2 pt-2">
                <table class="table table-hover" id="table1" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal </th>
                            <th>Nama Pasien</th>
                            <th>Riwayat</th>
                            <th>Hasil Pernyataan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tindakan as $tin)
                        <tr>
                            <td class="text-center">{{tanggal($tin->created_at)}}</td>
                            <td>{{ $tin->pasien->nama_pasien }}</td>
                                <td style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">{{ $tin->riwayat }}</td>
                                <td class="text-center">
                                    {!! $tin->hasil == 1 ? '<span class="badge bg-success">Setuju</span>' : '<span class="badge bg-danger">Tidak Setuju</span>'!!}
                                    
                                    </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        @if (Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")
                                        <a href="/ubah/persetujuan/tindakan/medis/{{ $tin->id }}" class="btn btn-outline-secondary" title="Ubah"><i class="bi bi-pencil-square"></i></a>
                                            
                                        @endif
                                        <a href="/print/tindakan/{{ $tin->id }}" title="print Data" target="_blank" class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i></a>
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
</section>

<!-- // Basic multiple Column Form section end -->

</div>
@include('sweetalert::alert') 
@endsection