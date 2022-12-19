@extends('layouts.dashboard.app')
@section('title', 'Data Alat Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('al', 'active')
@section('judul', 'Data Alat/Bahan Kesehatan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('obat.addalkes') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('obat.dataalkes') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal dibuat</th>
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
                        <td><B>{{ Carbon\Carbon::parse($al->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($al->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $al->golongan_alkes->golongan_alkes }}</td>
                        <td>{{ $al->nama_alkes->nama_alkes }}</td>
                        <td>{{ $al->satuan_obat->satuan_obat }}</td>
                        <td>{{ $al->bobot_obat->bobot_obat }}</td>
                        <td>{{ $al->komposisis }}</td>
                            <td><div class="buttons">
                                <a href="/ubah/alkes/{{ $al->id }}" class="btn btn-success rounded-pill" title="Ubah data alkes"><i class="fa fa-edit"></i></a>
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