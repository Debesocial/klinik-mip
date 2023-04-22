@extends('layouts.dashboard.app')
@section('title', 'Lihat Data Petugas')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')
@section('breadcrumb', 'lihat_data_petugas')

@section('judul', 'Lihat Data Petugas')
@section('container')

    <section id="multiple-column-form">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <h5>Data Petugas</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    Nama Petugas
                                                </th>
                                                <td>: {{ $user['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Email Petugas
                                                </th>
                                                <td>: {{ $user['email'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    No. Telepon
                                                </th>
                                                <td>: {{ $user['telp'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Level Petugas
                                                </th>
                                                <td>: {{ ucwords($user->level->nama_level) }}</td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Status
                                                </th>
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
                    <div class="col-md-7">
                        <h5>Jadwal Petugas</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="" width="100%">
                                        <tbody>
                                            <tr class="border-bottom">
                                                <th class="text-center">Hari</th>
                                                <th>Shift</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Senin</td>
                                                <td>
                                                    <input type="text" id="senin" class="form-control" name="senin"
                                                        value="{{ $user->jadwal->senin }}" readonly>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Selasa</th>
                                                <td>
                                                    <input type="text" id="selasa" class="form-control" name="selasa"
                                                        value="{{ $user->jadwal->selasa }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Rabu</th>
                                                <td>
                                                    <input type="text" id="rabu" class="form-control" name="rabu"
                                                        value="{{ $user->jadwal->rabu }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Kamis</th>
                                                <td>
                                                    <input type="text" id="kamis" class="form-control" name="kamis"
                                                        value="{{ $user->jadwal->kamis }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Jumat</th>
                                                <td>
                                                    <input type="text" id="jumat" class="form-control" name="jumat"
                                                        value="{{ $user->jadwal->jumat }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Sabtu</th>
                                                <td>
                                                    <input type="text" id="sabtu" class="form-control" name="sabtu"
                                                        value="{{ $user->jadwal->sabtu }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Minggu</td>
                                                <td>
                                                    <input type="text" id="minggu" class="form-control" name="minggu"
                                                        value="{{ $user->jadwal->minggu }}" readonly>
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

        </div>
        {{-- <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Data Petugas</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        Nama Petugas
                                                    </th>
                                                    <td>: {{ $user['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Email Petugas
                                                    </th>
                                                    <td>: {{ $user['email'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        No. Telepon
                                                    </th>
                                                    <td>: {{ $user['telp'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Level Petugas
                                                    </th>
                                                    <td>: {{ $user->level->nama_level }}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Status
                                                    </th>
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

                                <div class="col-6">
                                    <h5>Jadwal Petugas</h5>
                                    <table class="table" id="" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Hari</th>
                                                <th>Shift</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Senin</td>
                                                <td>
                                                        <input type="text" id="senin" class="form-control" name="senin" value="{{ $user->jadwal->senin }}" disabled>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Selasa</td>
                                                <td>
                                                    <input type="text" id="selasa" class="form-control" name="selasa" value="{{ $user->jadwal->selasa }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rabu</td>
                                                <td>
                                                    <input type="text" id="rabu" class="form-control" name="rabu" value="{{ $user->jadwal->rabu }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kamis</td>
                                                <td>
                                                    <input type="text" id="kamis" class="form-control" name="kamis" value="{{ $user->jadwal->kamis }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jumat</td>
                                                <td>
                                                    <input type="text" id="jumat" class="form-control" name="jumat" value="{{ $user->jadwal->jumat }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sabtu</td>
                                                <td>
                                                    <input type="text" id="sabtu" class="form-control" name="sabtu" value="{{ $user->jadwal->sabtu }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Minggu</td>
                                                <td>
                                                    <input type="text" id="minggu" class="form-control" name="minggu" value="{{ $user->jadwal->minggu }}" disabled>
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
    </div> --}}
    </section>

@endsection
