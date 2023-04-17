@extends('layouts.dashboard.app')
@section('title', 'Data Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('alkes', 'active')
{{-- @section('judul', 'Data Obat') --}}

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
                    <h3>Data Obat</h3>
                    {{ Breadcrumbs::render('data_obat') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('obat.addobats') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('obat.dataobats') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal dibuat</th>
                            <th>Golongan Obat</th>
                            <th>Nama Obat</th>
                            <th>Satuan Obat</th>
                            <th>Bobot Obat</th>
                            <th>Komposisi obat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $ob)
                        <tr>
                            <td><B>{{ Carbon\Carbon::parse($ob->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($ob->created_at)->format('H:i:s') }}
                            </td>
                            <td>{{ $ob->golongan_obat->nama_golongan_obat }}</td>
                            <td>{{ $ob->nama_obat->nama_obat }}</td>
                            <td>{{ $ob->satuan_obat->satuan_obat }}</td>
                            <td>{{ $ob->bobot_obat->bobot_obat }}</td>
                            <td>{{ $ob->komposisi_obat }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/obats/{{ $ob->id }}" class="btn btn-outline-secondary" title="Ubah data obat/alkes"><i class="bi bi-pencil-square"></i></a>
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