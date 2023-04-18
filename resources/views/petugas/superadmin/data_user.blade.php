@extends('layouts.dashboard.app')
@section('title', 'Data Petugas')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')
{{-- @section('judul', 'Data Petugas') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                <h3>Data Petugas</h3>
                {{ Breadcrumbs::render('data_petugas') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.adddatauser') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card">
        {{-- <div class="card-header pb-0">
        </div> --}}
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datauser') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" >
                    <thead>
                        <tr>
                            {{-- <th>Tanggal dibuat</th> --}}
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            {{-- <td><B>{{ Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($user->created_at)->format('H:i:s') }}
                            </td> --}}
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->level->nama_level }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->telp }}</td>
                            <td class="text-center">
                            @if ($user->status == 'Aktif')
                            <span class="badge bg-primary">Aktif</span>
                            @else   
                            <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/view/user/{{ $user->id }}" class="btn btn-outline-secondary" title="Lihat detail data petugas"><i class="bi  bi-eye-fill"></i></a>
                                    <a href="/ubah/data/user/{{ $user->id }}/{{ $user->jadwal_id }}" class="btn btn-outline-secondary " title="Ubah data petugas"><i class="bi  bi-pencil-square"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('sweetalert::alert')

@endsection