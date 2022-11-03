@extends('layouts.dashboard.app')

@section('title', 'Data Petugas')


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
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jadwal</th>
                        <th>Shift</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                            <td>{{ $user->jadwal->hari }}</td>
                            <td>{{ $user->jadwal->shift }}</td>
                            <td>{{ $user->level->nama_level }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telp }}</td>
                            <td><div class="buttons">
                                <a href="" title="Lihat data petugas" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/data/user/{{ $user->id }}" class="btn btn-success rounded-pill" title="Ubah data petugas"><i class="fa fa-edit"></i></a>
                                </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>

<!-- // Basic multiple Column Form section end -->

</div>
@include('sweetalert::alert') 
@endsection