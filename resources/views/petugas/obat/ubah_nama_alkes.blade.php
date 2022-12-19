@extends('layouts.dashboard.app')

@section('obalkes', 'active')
@section('obat', 'active')
@section('namkes', 'active')
@section('title', 'Ubah Nama Alat Kesehatan')
@section('judul', 'Ubah Nama Alat Kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/nama/alkes/{{ $nama->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="hari">Nama Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" id="nama_alkes" name="nama_alkes" placeholder="Masukkan nama alat/bahan kesehatan" value="{{ $nama['nama_alkes'] }}" required>
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