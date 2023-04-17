@extends('layouts.dashboard.app')
@section('title', 'Golongan Alat Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golkes', 'active')
{{-- @section('judul', 'Data Golongan Alat Kesehatan') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Golongan Alat Kesehatan</h3>
                    {{ Breadcrumbs::render('golongan_alat_kesehatan') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('obat.addgolonganalkes') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('obat.golonganalkes') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width=70%>Golongan </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($golonganalkes as $alkes)
                        <tr>
                            <td>{{ $alkes['golongan_alkes'] }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/golongan/alkes/{{ $alkes->id }}" class="btn btn-outline-secondary" title="Ubah golongan alkes"><i class="bi bi-pencil-square"></i></a>
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