@extends('layouts.dashboard.app')
@section('title', 'Add Pemeriksaan Antigen')
@section('judul', 'Tambah Pemeriksaan Antigen')
@section('breadcrumb', 'tambah_pemeriksaan_antigen')
@section('periksa', 'active')
@section('anti', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/pemeriksaan/antigen"  onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kebutuhan">Kebutuhan Pemeriksaan <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="kebutuhan" placeholder="Masukkan kebutuhan pemeriksaan" required>
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