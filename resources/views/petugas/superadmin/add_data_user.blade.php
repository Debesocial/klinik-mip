@extends('layouts.dashboard.app')
@section('title', 'Tambah Data Petugas')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')

@section('judul', 'Tambah Data Petugas')
@section('container')


<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/data/user" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <h5>Data Petugas</h5><br>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Nama Petugas <b class="color-red">*</b></label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Masukkan nama" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email <b class="color-red">*</b></label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">Password <b class="color-red">*</b></label>
                                            <input type="password" name="password" id="password" class="form-control form-control" minlength="12" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Minimum 12 characters, at least one uppercase letter, one lowercase letter and one number (EXAMPLE : Passuser2022)" placeholder="Masukkan password" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon <b class="color-red">*</b></label>
                                            <input type="number" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telp" placeholder="Masukkan no telepon" maxlength="13" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Level <b class="color-red">*</b></label>
                                            <select required aria-required="true" class="choices form-select" name="level_id" id="level_id" >
                                                <option disabled selected>Pilih level</option>
                                                @foreach ($level as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_level }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status">Status <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="status" id="status" required>
                                                <option disabled selected>Pilih status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="NonAktif">NonAktif</option>
                                            </select>
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
                                                    <select class="choices form-select" name="senin" id="senin" >
                                                        <option value="">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18:30 - 06:30 )">Shift 2 ( 18:30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Selasa</td>
                                                <td>
                                                    <select class="choices form-select" name="selasa" id="selasa" >
                                                        <option value="">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18:30 - 06:30 )">Shift 2 ( 18:30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rabu</td>
                                                <td>
                                                    <select class="choices form-select" name="rabu" id="rabu" >
                                                        <option value="">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18:30 - 06:30 )">Shift 2 ( 18:30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kamis</td>
                                                <td>
                                                    <select class="choices form-select" name="kamis" id="kamis" >
                                                        <option value="">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18:30 - 06:30 )">Shift 2 ( 18:30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jumat</td>
                                                <td>
                                                    <select class="choices form-select" name="jumat" id="jumat" >
                                                        <option value="">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18:30 - 06:30 )">Shift 2 ( 18:30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sabtu</td>
                                                <td>
                                                    <select class="choices form-select" name="sabtu" id="sabtu" >
                                                        <option value="">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18:30 - 06:30 )">Shift 2 ( 18:30 - 06:30 )</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Minggu</td>
                                                <td>
                                                    <select class="choices form-select" name="minggu" id="minggu" >
                                                        <option value="">-</option>
                                                        <option value="Shift 1 ( 06:30 - 18-30 )">Shift 1 ( 06:30 - 18-30 )</option>
                                                        <option value="Shift 2 ( 18:30 - 06:30 )">Shift 2 ( 18:30 - 06:30 )</option>
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