@extends('layouts.dashboard.app')
@section('title', 'Ubah Sub Klasifikasi')
@section('judul', 'Ubah Sub Klasifikasi')
@section('breadcrumb', 'ubah_subklasifikasi_penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('sub', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/sub/klasifikasi/{{ $subklasifikasi->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_penyakit">Sub Klasifikasi Penyakit <b class="color-red">*</b></label>
                                            <input type="text" id="nama_penyakit" class="form-control" name="nama_penyakit" placeholder="Masukkan sub klasifikasi" value="{{ $subklasifikasi['nama_penyakit'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Klasifikasi Penyakit <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="klasifikasi_penyakit_id" id="klasifikasi_penyakit_id">
                                                @foreach ($klasifikasipenyakit as $klasifikasi)
                                                <option value="{{ $klasifikasi->id }}" {{ $klasifikasi->id == $subklasifikasi->klasifikasi_penyakit->id ? 'selected' : '' }}>{{ $klasifikasi->klasifikasi_penyakit }}</option>
                                                @endforeach
                                            </select>
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