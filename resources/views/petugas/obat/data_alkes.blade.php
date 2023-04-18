@extends('layouts.dashboard.app')
@section('title', 'Data Alat Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('al', 'active')
{{-- @section('judul', 'Data Alat/Bahan Kesehatan') --}}

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
                    <h3>Data Alat/Bahan Kesehatan</h3>
                    {{ Breadcrumbs::render('alat_kesehatan') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('obat.addalkes') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('obat.dataalkes') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            {{-- <th>Tanggal dibuat</th> --}}
                            <th>Golongan </th>
                            <th>Nama </th>
                            <th>Satuan </th>
                            <th>Bobot </th>
                            <th>Komposisi </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alkes as $al)
                        <tr>
                            {{-- <td><B>{{ Carbon\Carbon::parse($al->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($al->created_at)->format('H:i:s') }}
                            </td> --}}
                            <td>{{ $al->golongan_alkes->golongan_alkes }}</td>
                            <td>{{ $al->nama_alkes->nama_alkes }}</td>
                            <td>{{ $al->satuan_obat->satuan_obat }}</td>
                            <td>{{ $al->bobot_obat->bobot_obat }}</td>
                            <td>{{ $al->komposisis }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/alkes/{{ $al->id }}" class="btn btn-outline-secondary" title="Ubah data alkes"><i class="bi bi-pencil-square"></i></a>
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