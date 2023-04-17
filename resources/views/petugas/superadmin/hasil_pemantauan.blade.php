@extends('layouts.dashboard.app')
@section('title', 'Hasil Pemantauan')
@section('md', 'active')
@section('periksa', 'active')
@section('cov', 'active')

{{-- @section('judul', 'Data Kode Hasil Pemantauan Covid') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Kode Hasil Pemantauan Covid</h3>
                    {{ Breadcrumbs::render('kode_covid') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addhasilpemantauan') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.hasilpemantauan') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilpemantauan as $hasil)
                        <tr class="text-center">
                            <td>{{ $hasil['kode'] }}</td>
                            <td>{{ $hasil['nama_pemantauan'] }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/hasil/pemantauan/{{ $hasil['id'] }}" class="btn btn-outline-secondary" title="Ubah hasil pemantauan"><i class="bi bi-pencil-square"></i></a>
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