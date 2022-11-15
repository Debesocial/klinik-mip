@extends('layouts.dashboard.app')

@section('title', 'Add Nama Penyakit')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Tambah Nama Penyakit')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Masukkan Data</h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
                            <form class="form" action="/add/nama/penyakit" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="primer">Nama Penyakit <b class="color-red">*</b></label>
                                            <input type="text" id="primer" class="form-control"
                                                 name="primer" placeholder="Masukkan nama penyakit" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sekunder">Nama Penyakit Sekunder</label>
                                            <input type="text" id="sekunder" class="form-control"
                                                 name="sekunder" placeholder="Masukkan nama penyakit">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
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
                                    <div class="col-md-6 col-12">
                                    </div>
                                    
                                    
                                    <div class="col-sm-6 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                    
                                </form>
                                        
                                </div>

                                    </section>

</div>

@endsection
