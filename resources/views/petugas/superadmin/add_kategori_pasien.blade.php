@extends('layouts.dashboard.app')
@section('title', 'Add Kategori')
@section('judul', 'Tambah Kategori Pasien')
@section('breadcrumb', 'tambah_kategori_pasien')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/kategori/pasien" onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_kategori">Kategori Pasien <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukkan kategori pasien" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                        </div>
                                    </div>
                                    <div class="col text-end"><br>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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