@extends('layouts.dashboard.app')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golongan', 'active')
@section('title', 'Ubah Golongan Obat')
@section('judul', 'Ubah Golongan Obat')
@section('breadcrumb', 'ubah_golongan_obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/golongan/obat/{{ $golonganobat->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_golongan_obat">Gologan Obat <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_golongan_obat" placeholder="Masukkan golongan obat" value="{{ $golonganobat['nama_golongan_obat'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12"><br>
                                        <div class="row ">
                                            <div class="col text-end">
                                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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