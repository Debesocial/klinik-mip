@extends('layouts.dashboard.app')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golkes', 'active')
@section('title', 'Tambah Golongan Alat/bahan Kesehatan')
@section('judul', 'Tambah Golongan Alat/bahan Kesehatan')
@section('breadcrumb', 'tambah_golongan_alat_kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/golongan/alkes" onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="golongan_alkes">Golongan Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="golongan_alkes" id="golongan_alkes" placeholder="Masukkan golongan alat/bahan kesehatan" required>
                                        </div>
                                    </div>
                                    <div class="col-12"><br>
                                        <div class="row ">
                                            <div class="col text-end">
                                                <button type="submit" class=" btn btn-primary "><i class="bi bi-save"></i> Simpan</button>
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