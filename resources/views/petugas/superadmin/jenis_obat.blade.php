@extends('layouts.dashboard.app')

@section('title', 'Jenis Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('jenis', 'active')
@section('judul', 'Data Jenis Obat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addjenisobat') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Jenis Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisobat as $jenis)
                    <tr>
                        <td>{{ $jenis['nama_jenis_obat'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/jenis/obat/{{ $jenis->id }}" class="btn btn-success rounded-pill" title="Ubah jenis obat/alkes"><i class="fa fa-edit"></i></a>
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