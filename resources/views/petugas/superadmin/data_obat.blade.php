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
                <a href="{{ route('superadmin.adddataobat') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1" width="100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Golongan</th>
                        <th>Satuan</th>
                        <th>Bobot</th>
                        <th>Komposisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obatalkes as $obat)
                    <tr>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->jenis_obat->nama_jenis_obat }}</td>
                        <td>{{ $obat->golongan_obat->nama_golongan_obat }}</td>
                        <td>{{ $obat->satuan_obat->satuan_obat }}</td>
                        <td>{{ $obat->bobot_obat->bobot_obat }}</td>
                        <td>{{ $obat->komposisi_obat }}</td>
                            <td><div class="buttons">
                                <a href="/ubah/data/obat/{{ $obat->id }}" class="btn btn-success rounded-pill" title="Ubah data obat"><i class="fa fa-edit"></i></a>
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