@extends('layouts.dashboard.app')
@section('title', 'Ubah Data Petugas')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')

@section('judul', 'Ubah Data Petugas')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/data/user/{{$user->id }}/{{ $user->jadwal_id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Jadwal Petugas</h5><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Petugas</label> <b class="color-red">*</b></label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Petugas" value="{{ $user['name'] }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email Petugas</label>
                                            <input type="email" id="email" class="form-control" name="email" value="{{ $user['email'] }}" required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon</label> <b class="color-red">*</b></label>
                                            <input type="number" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telp" value="{{ $user['telp'] }}" maxlength="13">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="level_id">Level Petugas</label> <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="level_id" id="level_id">
                                                @foreach ($level as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $user->level->id ? 'selected' : '' }}>{{ $item->nama_level }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status</label> <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="status" id="status" required>
                                                
                                                <option value="{{ $user->status }}">{{ $user->status }}</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="NonAktif">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12"><br>
                                        <input type="text" id="telp" class="form-control" value="klinikMIP2022!" name="password" hidden>
                                        <div class="form-group"><input type="checkbox" id="cek" name="cek" value="x">
                                            <label for="cek"> <B>Reset Password</B> <I>*klinikMIP2022!</I></label>
                                        </div>
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
                                                    <select class="choices form-select" name="senin" id="senin">
                                                        <option value="{{ $user->jadwal->senin }}">{{ $user->jadwal->senin }}</option>
                                                        <option value="-">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18-30 - 06:30 )">Shift 2 ( 18-30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Selasa</td>
                                                <td>
                                                    <select class="choices form-select" name="selasa">
                                                        <option value="{{ $user->jadwal->selasa }}">{{ $user->jadwal->selasa }}</option>
                                                        <option value="-">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18-30 - 06:30 )">Shift 2 ( 18-30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rabu</td>
                                                <td>
                                                    <select class="choices form-select" name="rabu">
                                                        <option value="{{ $user->jadwal->rabu }}">{{ $user->jadwal->rabu }}</option>
                                                        <option value="-">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18-30 - 06:30 )">Shift 2 ( 18-30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kamis</td>
                                                <td>
                                                    <select class="choices form-select" name="kamis">
                                                        <option value="{{ $user->jadwal->kamis }}">{{ $user->jadwal->kamis }}</option>
                                                        <option value="-">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18-30 - 06:30 )">Shift 2 ( 18-30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jumat</td>
                                                <td>
                                                    <select class="choices form-select" name="jumat">
                                                        <option value="{{ $user->jadwal->jumat }}">{{ $user->jadwal->jumat }}</option>
                                                        <option value="-">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18-30 - 06:30 )">Shift 2 ( 18-30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sabtu</td>
                                                <td>
                                                    <select class="choices form-select" name="sabtu">
                                                        <option value="{{ $user->jadwal->sabtu }}">{{ $user->jadwal->sabtu }}</option>
                                                        <option value="-">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18-30 - 06:30 )">Shift 2 ( 18-30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Minggu</td>
                                                <td>
                                                    <select class="choices form-select" name="minggu">
                                                        <option value="{{ $user->jadwal->minggu }}">{{ $user->jadwal->minggu }}</option>
                                                        <option value="-">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18-30 - 06:30 )">Shift 2 ( 18-30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-12"><br>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="reset" class="form-control btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection