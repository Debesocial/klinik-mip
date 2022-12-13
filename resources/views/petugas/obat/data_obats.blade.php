@extends('layouts.dashboard.app')
@section('title', 'Data Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('alkes', 'active')
@section('judul', 'Data Obat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('obat.addobats') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('obat.dataobats') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
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
                        <td>{{ $ob->golongan_obat->nama_golongan_obat }}</td>
                        <td>{{ $ob->nama_obat->nama_obat }}</td>
                        <td>{{ $ob->satuan_obat->satuan_obat }}</td>
                        <td>{{ $ob->bobot_obat->bobot_obat }}</td>
                        <td>{{ $ob->komposisi_obat }}</td>
                            <td><div class="buttons">
                                <a href="/ubah/obats/{{ $ob->id }}" class="btn btn-success rounded-pill" title="Ubah data obat/alkes"><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@include('sweetalert::alert')
@endsection