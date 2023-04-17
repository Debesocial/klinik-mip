@extends('layouts.dashboard.app')
@section('title', 'Add Klasifikasi Penyakit')
@section('judul', 'Tambah Klasifikasi Penyakit')
@section('breadcrumb', 'tambah_klasifikasi_penyakit')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/klasifikasi/penyakit" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit">Klasifikasi Penyakit <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="klasifikasi_penyakit" placeholder="Masukkan klasifikasi penyakit" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
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