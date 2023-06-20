@extends('layouts.dashboard.app')
@section('title', 'Add Perusahaan')
@section('judul', 'Tambah Perusahaan')
@section('breadcrumb', 'tambah_perusahaan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/perusahaan"  onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_perusahaan_pasien">Nama Perusahaan <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_perusahaan_pasien" id="nama_perusahaan_pasien" placeholder="masukkan nama perusahaan" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/> 
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
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