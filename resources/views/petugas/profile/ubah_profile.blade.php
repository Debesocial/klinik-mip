@extends('layouts.dashboard.app')
@section('title', 'Ubah Profile User')
@section('user', 'active')
@section('data', 'active')
@section('side', 'active')

@section('judul', 'Ubah Profile User')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if (session('error'))
                                <div class="alert alert-danger">
                                {{ session('error') }}
                                </div>
                                @endif
                                @if (session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                                @endif
                        <form class="form" action="/ubah/profile/{{$user->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Data Petugas</h5><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label> <b class="color-red">*</b></label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama" value="{{ $user['name'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email</label> <b class="color-red">*</b>
                                            <input type="email" id="email" class="form-control" name="email" value="{{ $user['email'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon</label> <b class="color-red">*</b></label>
                                            <input type="number" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telp" value="{{ $user['telp'] }}" maxlength="13" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
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

                                
                                    <div class="col-12"><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" class="form-control btn btn-secondary me-1 mb-1" onclick="javascript:window.history.back();"> Kembali</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="reset" class="form-control btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1">Simpan</button>
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