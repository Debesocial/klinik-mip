@extends('layouts.dashboard.app')
@section('title', 'Add Nama Penyakit')
@section('judul', 'Tambah Nama Penyakit')
@section('breadcrumb', 'tambah_nama_penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('dia', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/nama/penyakit" onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="primer">Nama Penyakit <b class="color-red">*</b></label>
                                            <input type="text" id="primer" class="form-control" name="primer" placeholder="Masukkan nama penyakit" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sekunder">Nama Penyakit Sekunder</label>
                                            <input type="text" id="sekunder" class="form-control" name="sekunder" placeholder="Masukkan nama penyakit">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Sub Klasifikasi<b class="color-red">*</b></label>
                                            <select class="choices form-select" name="sub_klasifikasi_id" id="sub_klasifikasi_id">
                                                <option value="">Pilih Sub-Klasifikasi</option>
                                                @foreach ($subklasifikasi as $sub)
                                                <option value="{{ $sub->id }}">{{ $sub->nama_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row ">
                                            <div class="col text-end">
                                                <button type="submit" class=" btn btn-primary "><i class="bi bi-save"></i> Simpan</button>
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