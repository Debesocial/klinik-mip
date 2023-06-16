@extends('layouts.dashboard.app')
@section('title', 'Tambah Bobot Obat')
@section('judul', 'Tambah Bobot Obat/Alkes')
@section('breadcrumb', 'tambah_bobot_obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/bobot/obat"  onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bobot_obat">Bobot Obat <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="bobot_obat" id="bobot_obat" placeholder="Masukkan bobot obat/alkes" required>
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