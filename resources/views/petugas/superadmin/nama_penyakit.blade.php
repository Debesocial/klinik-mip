@extends('layouts.dashboard.app')
@section('title', 'Nama Penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('dia', 'active')

{{-- @section('judul', 'Data Nama Penyakit') --}}
@section('container')

<section class="section">
    <div class="row">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Nama Penyakit</h3>
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addnamapenyakit') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.namapenyakit') }}" }})
                </script>
            @endif
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Penyakit</th>
                            <th>Penyakit Sekunder</th>
                            <th>Sub Klasifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($namapenyakit as $nama)
                        <tr>
                            <td class="text-center">{{ $nama->primer }}</td>
                            <td>{{ $nama->sekunder }}</td>
                            <td>{{ $nama->sub_klasifikasi->nama_penyakit }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/nama/penyakit/{{ $nama['id'] }}" class="btn btn-outline-secondary" title="Ubah diagnosa"><i class="bi bi-pencil-square"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('sweetalert::alert')
@endsection