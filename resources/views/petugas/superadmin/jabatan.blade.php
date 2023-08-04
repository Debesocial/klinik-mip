@extends('layouts.dashboard.app')
@section('title', 'Data Jabatan')
@section('organisasi', 'active')
@section('jabatan', 'active')
@section('organ', 'active')

{{-- @section('judul', 'Data Jabatan') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Jabatan</h3>
                    {{ Breadcrumbs::render('jabatan') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addjabatan') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.jabatan') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width=100%>
                    <thead>
                        <tr>
                            <th width="60%">Jabatan</th>
                            <th width="30%">Perusahaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan->sortByDesc('created_at') as $jab)
                        <tr>
                            <td>{{ $jab['nama_jabatan'] }}</td>
                            <td>{{ $jab->perusahaan->nama_perusahaan_pasien }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/jabatan/{{ $jab->id }}" class="btn btn-outline-secondary" title="Ubah jabatan"><i class="bi bi-pencil-square"></i></a>
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



{{-- @include('sweetalert::alert') --}}
@endsection