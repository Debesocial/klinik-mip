@extends('layouts.dashboard.app')

@section('title', 'Data Pemeriksaan Narkoba')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('narko', 'active')

{{-- @section('judul', 'Data Pemeriksaan Narkoba') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Pemeriksaan Narkoba</h3>
                    {{ Breadcrumbs::render('pemeriksaan_narkoba') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.periksanarkoba') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('pemeriksaan.datapemeriksaannarkoba') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal dibuat</th>
                            <th>Nama Pasien</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>riwayat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($narkoba as $narko)
                        <tr>
                            <td><B>{{ Carbon\Carbon::parse($narko->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($narko->created_at)->format('H:i:s') }}
                            </td>
                                <td>{{ $narko->pasien->nama_pasien }}</td>
                                <td>{{ $narko->penggunaan_obat }}</td>
                                <td>{{ $narko->asal_obat }}</td>
                                <td>{{ $narko->terakhir_digunakan }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/view/pemeriksaan/narkoba/{{$narko->id }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                        <a href="/ubah/pemeriksaan/narkoba/{{$narko->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        <a href="/print/pemeriksaan/narkoba/{{ $narko->id }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i></a>
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