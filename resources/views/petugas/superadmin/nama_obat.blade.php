@extends('layouts.dashboard.app')
@section('title', 'Data Nama Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('nama', 'active')
@section('judul', 'Nama Obat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addnamaobat') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($namaobat as $nama)
                    <tr>
                        <td>{{ $nama['nama_obat'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/nama/obat/{{ $nama->id }}" class="btn btn-success rounded-pill" title="Ubah nama obat/alkes"><i class="fa fa-edit"></i></a>
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