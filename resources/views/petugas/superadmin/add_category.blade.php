@extends('layouts.dashboard.app')
@section('title', 'Tambah Categories')
@section('judul', 'Tambah Categories')
@section('breadcrumb', 'tambah_category')
@section('md', 'active')
@section('periksa', 'active')
@section('cat', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/category" onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_penyakit">Category<b class="color-red">*</b></label>
                                            <input type="text" id="nama_penyakit" class="form-control" name="nama_penyakit" placeholder="Masukkan Category" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Chapter<b class="color-red">*</b></label>
                                            <select class="choices form-select" name="klasifikasi_penyakit_id" id="klasifikasi_penyakit_id">
                                                <option value="">Pilih Chapter</option>
                                                @foreach ($klasifikasipenyakit as $klasifikasi)
                                                <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->klasifikasi_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row ">
                                            <div class="col text-end">
                                                <button type="submit" class=" btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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