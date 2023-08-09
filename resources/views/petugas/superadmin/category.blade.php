@extends('layouts.dashboard.app')
@section('title', 'Categories')
@section('md', 'active')
@section('periksa', 'active')
@section('cat', 'active')

{{-- @section('judul', 'Data Blok') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Categories</h3>
                    {{ Breadcrumbs::render('category') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addcategory') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.category') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width=100%>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Chapter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $cat)
                        <tr>
                            <td>{{ $cat->nama_penyakit }}</td>
                            <td>{{ $cat->klasifikasi_penyakit->klasifikasi_penyakit }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/category/{{ $cat['id'] }}" class="btn btn-outline-secondary" title="Ubah blog"><i class="bi bi-pencil-square"></i></a>
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