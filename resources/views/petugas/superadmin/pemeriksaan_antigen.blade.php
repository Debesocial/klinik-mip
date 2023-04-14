@extends('layouts.dashboard.app')
@section('title', 'Pemeriksaan Antigen')
@section('md', 'active')
@section('periksa', 'active')
@section('anti', 'active')

{{-- @section('judul', 'Data Pemeriksaan Antigen') --}}
@section('container')

<section class="section">
    <div class="row">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Pemeriksaan Antigen</h3>
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addpemeriksaanantigen') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.pemeriksaanantigen') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width=70%>Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemeriksaanantigen as $pemeriksaaan)
                        <tr>
                            <td>{{ $pemeriksaaan['kebutuhan'] }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/pemeriksaan/antigen/{{ $pemeriksaaan['id'] }}" class="btn btn-outline-secondary" title="Ubah pemeriksaan antigen"><i class="bi bi-pencil-square"></i></a>
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