@extends('layouts.dashboard.app')
@section('title', 'Ubah Nama Penyakit')
@section('judul', 'Ubah Nama Penyakit')
@section('breadcrumb', 'ubah_nama_penyakit')
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
                        <form class="form" action="/ubah/nama/penyakit/{{ $namapenyakit->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="primer">Nama Penyakit <b class="color-red">*</b></label>
                                            <input type="text" id="primer" class="form-control" name="primer" placeholder="Masukkan nama penyakit" value="{{ $namapenyakit['primer'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sekunder">Nama Penyakit Sekunder </label>
                                            <input type="text" id="sekunder" class="form-control" name="sekunder" placeholder="Masukkan nama penyakit sekunder" value="{{ $namapenyakit['sekunder'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sub_klasifikasi_id">Sub Klasifikasi Penyakit <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="sub_klasifikasi_id" id="sub_klasifikasi_id">
                                                @foreach ($subklasifikasi as $sub)
                                                <option value="{{ $sub->id }}" {{ $sub->id == $namapenyakit->sub_klasifikasi->id ? 'selected' : '' }}>{{ $sub->nama_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Category<b class="color-red">*</b></label>
                                            <select class="choices form-select" name="category_id" id="category_id" required>
                                                <option value="">Pilih Category</option>
                                                @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $namapenyakit->category_id ? 'selected' : '' }}>{{ $cat->nama_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="primer">Pengertian</label>
                                            <textarea type="text" id="pengertian" class="form-control" name="pengertian" placeholder="Masukkan pengertian">{{$namapenyakit->pengertian}}</textarea>
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