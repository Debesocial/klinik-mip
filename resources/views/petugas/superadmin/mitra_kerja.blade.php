@extends('layouts.dashboard.app')
@section('title', 'Data Mitra Kerja')
@section('data', 'active')
@section('mitra', 'active')
@section('side', 'active')
{{-- @section('judul', 'Data Petugas Mitra Kerja') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Petugas Mitra Kerja</h3>
            </div>
            <div>
                {{ Breadcrumbs::render('mitra_kerja') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end" width="100px">
                <a href="{{ route('superadmin.addmitrakerja') }}" class="btn btn-success rounded-pill">
                     <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.mitrakerja') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal dibuat</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Perusahaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td><B>{{ Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($user->created_at)->format('H:i:s') }}
                            </td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user->divisi->nama_divisi_pasien }}</td>
                            <td>{{ $user->perusahaan->nama_perusahaan_pasien }}</td>
                            <td class="text-center">
                                @if ($user['status'] == 'Aktif')
                                <span class="badge bg-primary">Aktif</span>
                                @else   
                                <span class="badge bg-danger">Tidak Aktif</span>
                                </td>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" >
                                    <a href="/view/mitra/kerja/{{ $user->id }}" class="btn btn-outline-secondary"   title="Lihat detail petugas mitra kerja"><i class="bi bi-eye-fill"></i></a>
                                    <a href="/ubah/mitra/kerja/{{ $user->id }}" class="btn btn-outline-secondary"   title="Ubah petugas mitra kerja"><i class="bi bi-pencil-square"></i></a>
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