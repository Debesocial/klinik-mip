@extends('layouts.dashboard.app')
@section('title', 'Ubah Pemeriksaan Antigen')
@section('judul', 'Ubah Pemeriksaan Antigen')
@section('breadcrumb', 'ubah_pemeriksaan_antigen')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/pemeriksaan/antigen/{{ $pemeriksaanantigen->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kebutuhan">Kebutuhan Antigen <b class="color-red">*</b></label>
                                            <input type="text" id="kebutuhan" class="form-control" name="kebutuhan" placeholder="Masukkan kebutuhan pemeriksaan" value="{{ $pemeriksaanantigen['kebutuhan'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
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