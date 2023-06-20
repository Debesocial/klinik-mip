@extends('layouts.dashboard.app')

@section('title', 'Data Keterangan Sehat')
@section('keterangansehat', 'active')

{{-- @section('judul', 'Data Keterangan Sehat') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Keterangan Sehat</h3>
                    {{ Breadcrumbs::render('keterangan_sehat') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.keterangansehat') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.dataketerangansehat') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width=100%>
                    <thead>
                        <tr>
                            <th>Tanggal Pemeriksaan</th>
                            <th>No. Surat</th>
                            <th>ID Rekam Medis</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Hasil Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sehat->sortByDesc('created_at') as $ket)
                        <tr>
                            <td class="text-center">{{tanggal($ket->created_at, false)}}</td>
                            <td class="text-center">{{$ket->no_surat}}</td>
                            <td class="text-center">{{ $ket->pasien->id_rekam_medis }}</td>
                            <td >{{ $ket->pasien->nama_pasien }}</td>
                            <td>{{ $ket->pasien->alamat }}</td>
                            <td class="text-center">{!! $ket->hasil == 1 ? '<span class="badge bg-primary">Sehat</span>' : '<span class="badge bg-danger">Tidak Sehat</span>' !!}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/keterangan/sehat/{{$ket->id}}" class="btn btn-outline-secondary" title="Ubah data pasien"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/print/sehat/{{$ket->id}}" target="_blank" title="Print Data " class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i></a>
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