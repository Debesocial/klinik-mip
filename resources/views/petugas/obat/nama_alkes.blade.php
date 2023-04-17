@extends('layouts.dashboard.app')
@section('title', 'Data Nama Alat/Bahan Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('namkes', 'active')
{{-- @section('judul', 'Nama Alat/Bahan Kesehatan') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Nama Alat/Bahan Kesehatan</h3>
                    {{ Breadcrumbs::render('nama_alat_kesehatan') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('obat.addnamaalkes') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('obat.namaalkes') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width=70%>Nama Alat/Bahan Kesehatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nama as $nam)
                        <tr>
                            <td>{{ $nam['nama_alkes'] }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/nama/alkes/{{ $nam->id }}" class="btn btn-outline-secondary" title="Ubah nama alkes"><i class="bi bi-pencil-square"></i></a>
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