@extends('layouts.dashboard.app')
@section('title', 'Data Perusahaan')
@section('organisasi', 'active')
@section('perusahaan', 'active')
@section('organ', 'active')

{{-- @section('judul', 'Data Perusahaan') --}}
@section('container')

<section class="section">
    <div class="row">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Perusahaan</h3>
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addperusahaan') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        @if (Session('message'))
        <script>Swal.fire({ 
            icon: "success", 
            text: "{{Session('message')}}" }).then((result) => {
            if (result.isConfirmed) { window.location.href = "{{ route('superadmin.perusahaan') }}" }})
            </script>
        @endif
        <div class="card-body">
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width=70%>Perusahaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perusahaan as $peru)
                        <tr>
                            <td>{{ $peru['nama_perusahaan_pasien'] }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/perusahaan/{{ $peru->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
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