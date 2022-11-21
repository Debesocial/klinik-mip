@extends('layouts.dashboard.app')
@section('title', 'Hasil Pemantauan')
@section('md', 'active')
@section('periksa', 'active')
@section('cov', 'active')

@section('judul', 'Data Kode Hasil Pemantauan Covid')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addhasilpemantauan') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilpemantauan as $hasil)
                    <tr>
                        <td>{{ $hasil['kode'] }}</td>
                        <td>{{ $hasil['nama_pemantauan'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/hasil/pemantauan/{{ $hasil['id'] }}" class="btn btn-success rounded-pill" title="Ubah hasil pemantauan"><i class="fa fa-edit"></i></a>
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