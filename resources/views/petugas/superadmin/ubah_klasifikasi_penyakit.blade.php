@extends('layouts.dashboard.app')
@section('title', 'Ubah Klasifikasi Penyakit')
@section('judul', 'Ubah Klasifikasi Penyakit')
@section('breadcrumb', 'ubah_klasifikasi_penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('klas', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/klasifikasi/penyakit/{{ $klasifikasipenyakit->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_lokasi">Klasifikasi Penyakit <b class="color-red">*</b></label>
                                            <input type="text" id="klasifikasi_penyakit" class="form-control" name="klasifikasi_penyakit" placeholder="Masukkan klasifikasi penyakit"value="{{ $klasifikasipenyakit['klasifikasi_penyakit'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row ">
                                            <div class="col text-end">
                                                <button type="submit" class="btn btn-primary "><i class="bi bi-save"></i> Simpan</button>
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