@extends('layouts.dashboard.app')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golongan', 'active')
@section('title', 'Tambah Golongan Obat')
@section('judul', 'Tambah Golongan Obat/Alkes')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/golongan/obat" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_golongan_obat">Golongan Obat <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_golongan_obat" id="nama_golongan_obat" placeholder="Masukkan golongan obat" required>
                                        </div>
                                    </div>
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