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
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datauser') }}" }})
                </script>
            @endif
            <table class="table" id="table1" width="100%">
                <thead>
                    <tr>
                        <td>Tanggal dibuat</td>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($user->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->level->nama_level }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telp }}</td>
                        <td>
                        @if ($user->status == 'Aktif')
                        <span class="badge bg-primary">Aktif</span>
                        @else 
                        <span class="badge bg-secondary">NonAktif</span>
                        </td>
                        @endif
                        <td>
                            <a href="/view/user/{{ $user->id }}" class="btn btn-outline-secondary rounded-3" title="View data petugas"><i class="bi  bi-eye-fill"></i></a>
                            <a href="/ubah/data/user/{{ $user->id }}/{{ $user->jadwal_id }}" class="btn btn-outline-secondary rounded-3" title="Ubah data petugas"><i class="bi  bi-pencil-square"></i></a>
                            
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