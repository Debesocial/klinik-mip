@extends('layouts.dashboard.app')
@section('title', 'Rumah Sakit Rujukan')
@section('judul', 'Rumah Sakit Rujukan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addrsrujukan') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rumah_sakit_rujukans as $rsrujukan)
                    <tr>
                        <td>{{ $rsrujukan['nama_RS_rujukan'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/rs/rujukan/{{ $rsrujukan['id'] }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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