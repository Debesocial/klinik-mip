@extends('layouts.dashboard.app')
@section('title', 'Klasifikasi Penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('klas', 'active')

{{-- @section('judul', 'Data Klasifikasi Penyakit') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Klasifikasi Penyakit</h3>
                    {{ Breadcrumbs::render('klasifikasi_penyakit') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addklasifikasipenyakit') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.klasifikasipenyakit') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width=70%>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($klasifikasipenyakit as $klasifikasi)
                        <tr>
                            <td>{{ $klasifikasi['klasifikasi_penyakit'] }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/klasifikasi/penyakit/{{ $klasifikasi['id'] }}" class="btn btn-outline-secondary" title="Ubah klasifikasi penyakit"><i class="bi bi-pencil-square"></i></a>
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