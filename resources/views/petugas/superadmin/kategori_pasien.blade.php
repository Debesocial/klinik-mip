@extends('layouts.dashboard.app')
@section('title', 'Kategori Pasien')
@section('judul', 'Data Kategori Pasien')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addkategoripasien') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoripasien as $kate)
                    <tr>
                        <td>{{ $kate['nama_kategori'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/kategori/pasien/{{ $kate->id }}" class="btn btn-success rounded-pill" title="Ubah kategori pasien"><i class="fa fa-edit"></i></a>
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