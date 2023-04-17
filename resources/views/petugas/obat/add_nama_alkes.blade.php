@extends('layouts.dashboard.app')
@section('obalkes', 'active')
@section('obat', 'active')
@section('namkes', 'active')

@section('title', 'Add Nama Alat/Bahan Kesehatan')
@section('judul', 'Tambah Nama Alat/Bahan Kesehatan')
@section('breadcrumb', 'tambah_nama_alat_kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/nama/alkes" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_alkes">Nama Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_alkes" id="nama_alkes" placeholder="Masukkan nama alat kesehatan" required>
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
                                        <div class="row justify-content-end">
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