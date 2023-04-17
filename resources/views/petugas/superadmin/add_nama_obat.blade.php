@extends('layouts.dashboard.app')
@section('title', 'Add Nama Obat')

@section('obalkes', 'active')
@section('obat', 'active')
@section('nama', 'active')
@section('judul', 'Tambah Nama Obat')
@section('breadcrumb', 'tambah_nama_obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/nama/obat" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_obat">Nama Obat <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_obat" id="nama_obat" placeholder="Masukkan nama obat" required>
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
                                        <div class="row justify-content-end">
                                            {{-- <div class="col-4">
                                                <button type="reset" class="form-control btn btn-outline-secondary me-1 mb-1"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                            </div> --}}
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