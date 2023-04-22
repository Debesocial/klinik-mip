@extends('layouts.dashboard.app')
@section('title', 'Lihat Data Mitra Kerja')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')
@section('breadcrumb', 'lihat_mitra_kerja')


@section('judul', 'Lihat Data Mitra Kerja')
@section('container')

    <section id="multiple-column-form">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Mitra Kerja</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <th width=30%>Nama Mitra Kerja</th>
                                                <td>: {{ ucwords($user['name']) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Induk Karyawan</th>
                                                <td>: {{ $user['nik'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>: {{ $user['email'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>No. Telepon</th>
                                                <td>: {{ $user['telp'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>Level</th>
                                                <td>: {{ ucwords($user->level->nama_level) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Perusahaan</th>
                                                <td>: {{ $user['perusahaan']->nama_perusahaan_pasien }}</td>
                                            </tr>
                                            <tr>
                                                <th>Divisi</th>
                                                <td>: {{ $user->divisi->nama_divisi_pasien }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:
                                                    @if ($user->status == 'Aktif')
                                                        <span class="badge bg-primary">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
