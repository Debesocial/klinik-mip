@extends('layouts.dashboard.app')
@section('title', 'Ubah Dokter Spesialis')
@section('judul', 'Ubah Dokter Spesialis')
@section('breadcrumb', 'ubah_spesialis_rujukan')
@section('md', 'active')
@section('periksa', 'active')
@section('spes', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/spesialis/rujukan/{{ $spesialisrujukan->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_spesialis_rujukan">Nama Spesialis Rujukan <b class="color-red">*</b></label>
                                            <input type="text" id="nama_spesialis_rujukan" class="form-control" name="nama_spesialis_rujukan" placeholder="Masukkan dokter spesialis" value="{{ $spesialisrujukan['nama_spesialis_rujukan'] }}" required>
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