@extends('layouts.dashboard.app')
@section('title', 'Data Produk Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('produk', 'active')
{{-- @section('judul', 'Data Produk Kesehatan') --}}
{{-- <style>
    td {
        width: auto;
  min-width: 0;
  max-width: 200px;
  text-overflow: ellipsis;
  white-space: normal;
    }
</style> --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Produk Kesehatan</h3>
                    {{ Breadcrumbs::render('produk_kesehatan') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('obat.addproduk') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('obat.dataproduk') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width="100%">
                    <thead>
                        <tr>
                            {{-- <th>Tanggal dibuat</th> --}}
                            <th>Nama </th>
                            <th>Satuan </th>
                            <th>Bobot </th>
                            <th>Komposisi </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $pro)
                        <tr>
                            {{-- <td><B>{{ Carbon\Carbon::parse($pro->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($pro->created_at)->format('H:i:s') }}
                            </td> --}}
                            <td>{{ $pro->nama_produk }}</td>
                            <td>{{ $pro->satuan_obat->satuan_obat }}</td>
                            <td>{{ $pro->bobot_obat->bobot_obat }}</td>
                            <td class="line" style="white-space: normal !important;">{{ $pro->komposisi }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/produk/{{ $pro->id }}" class="btn btn-outline-secondary" title="Ubah data produk kesehatan"><i class="bi bi-pencil-square"></i></a>
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