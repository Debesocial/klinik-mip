@extends('layouts.dashboard.app')
@section('title', 'View Data Petugas')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')

@section('judul', 'View Data Petugas')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Jadwal Petugas</h5><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Petugas</label> <b class="color-red">*</b></label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Petugas" value="{{ $user['name'] }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email Petugas</label>
                                            <input type="text" id="email" class="form-control" name="email" value="{{ $user['email'] }}" disabled>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon</label> <b class="color-red">*</b></label>
                                            <input type="text" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telp" value="{{ $user['telp'] }}" maxlength="13" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="level_id">Level Petugas</label> <b class="color-red">*</b></label>
                                            <input type="level_id" id="level_id" class="form-control" name="email" value="{{ $user->level->nama_level }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status</label> <b class="color-red">*</b></label>
                                            <input type="text" id="statsu" class="form-control" name="statsu" value="{{ $user['status'] }}" disabled>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection