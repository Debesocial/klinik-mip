@extends('layouts.dashboard.app')
@section('title', 'Data Nama Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('nama', 'active')
{{-- @section('judul', 'Nama Obat') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Nama Obat</h3>
                    {{ Breadcrumbs::render('nama_obat') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addnamaobat') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.namaobat') }}" }})
                </script>
            @endif
            <div class="table-responsive pe-2 pt-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width=70%>Nama Obat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($namaobat as $nama)
                        <tr>
                            <td>{{ $nama['nama_obat'] }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/nama/obat/{{ $nama->id }}" class="btn btn-outline-secondary" title="Ubah nama obat/alkes"><i class="bi bi-pencil-square"></i></a>
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