@extends('layouts.dashboard.app')

@section('title', 'Ubah Sub Klasifikasi')


@section('judul', 'Ubah Sub Klasifikasi')
@section('container')    
<div class="page-heading">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            {{-- @error("message")
                    <p class="text-danger">{{$message}}</p>
                @enderror --}}
                            <form class="form" action="/ubah/sub/klasifikasi/{{ $subklasifikasi->id }}" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_penyakit">Sub Klasifikasi</label>
                                            <input type="text" id="nama_penyakit" class="form-control"
                                                 name="nama_penyakit" placeholder="Nama Penyakit" value="{{ $subklasifikasi['nama_penyakit'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        
                                    </div>

                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Klasifikasi Penyakit</label>
                                            <select class="choices form-select" name="klasifikasi_penyakit_id" id="klasifikasi_penyakit_id">
                                                @foreach ($klasifikasipenyakit as $klasifikasi)
                                                <option value="{{ $klasifikasi->id }}" {{ $klasifikasi->id == $subklasifikasi->klasifikasi_penyakit->id ? 'selected' : '' }}>{{ $klasifikasi->klasifikasi_penyakit }}</option>
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
