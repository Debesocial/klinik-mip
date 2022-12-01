@extends('layouts.dashboard.app')
@section('title', 'Data Petugas')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')
@section('judul', 'Data Petugas')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.adddatauser') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1" width="100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->level->nama_level }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telp }}</td>
                        <td>
                            <a href="/view/user/{{ $user->id }}" class="btn btn-danger rounded-pill" title="View data petugas"><i class="fa fa-eye"></i></a>
                            <a href="/ubah/data/user/{{ $user->id }}/{{ $user->jadwal_id }}" class="btn btn-success rounded-pill" title="Ubah data petugas"><i class="fa fa-edit"></i></a>
                            
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