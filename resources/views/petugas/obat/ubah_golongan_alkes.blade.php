@extends('layouts.dashboard.app')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golkes', 'active')
@section('title', 'Ubah Golongan Obat')
@section('judul', 'Ubah Golongan Obat')
@section('breadcrumb', 'ubah_golongan_alat_kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/golongan/alkes/{{ $golonganalkes->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="golongan_alkes">Golongan Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" id="golongan_alkes" name="golongan_alkes" placeholder="Masukkan golongan alat/bahan kesehatan" value="{{ $golonganalkes['golongan_alkes'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12"><br>
                                        <div class="row justify-content-end">
                                            <div class="col-4">
                                                <button type="reset" class="form-control btn btn-outline-secondary me-1 mb-1"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Simpan</button>
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