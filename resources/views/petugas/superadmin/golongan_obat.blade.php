@extends('layouts.dashboard.app')
@section('title', 'Golongan Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golongan', 'active')
@section('judul', 'Data Golongan Obat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addgolonganobat') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Golongan Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($golonganobat as $golongan)
                    <tr>
                        <td>{{ $golongan['nama_golongan_obat'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/golongan/obat/{{ $golongan->id }}" class="btn btn-success rounded-pill" title="Ubah golongan obat/alkes"><i class="fa fa-edit"></i></a>
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