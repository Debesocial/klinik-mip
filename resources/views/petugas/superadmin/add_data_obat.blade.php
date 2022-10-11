@extends('layouts.dashboard.app')

@section('title', 'Add Data Obat')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Add Data Obat')
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
                            <form class="form" action="/add/data/obat" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_obat_id">Jenis Obat <b>*</b></label>
                                            <select class="choices form-select" name="jenis_obat_id" id="jenis_obat_id">
                                                <option value="">Pilih</option>
                                                @foreach ($jenisobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_jenis_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="golongan_obat_id">Golongan Obat <b>*</b></label>
                                            <select class="choices form-select" name="golongan_obat_id" id="golongan_obat_id">
                                                <option value="">Pilih</option>
                                                @foreach ($golonganobat as $golonganobat)
                                                <option value="{{ $golonganobat->id }}">{{ $golonganobat->nama_golongan_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_obat_id">Nama Obat <b>*</b></label>
                                            <select class="choices form-select" name="nama_obat_id" id="nama_obat_id">
                                                <option value="">Pilih </option>
                                                @foreach ($namaobat as $namaobat)
                                                <option value="{{ $namaobat->id }}">{{ $namaobat->nama_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Obat <b>*</b></label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id">
                                                <option value="">Pilih </option>
                                                @foreach ($satuanobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->satuan_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="bobot_obat_id">Bobot Obat <b>*</b></label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id">
                                                <option value="">Pilih </option>
                                                @foreach ($bobotobat as $bobotobat)
                                                <option value="{{ $bobotobat->id }}">{{ $bobotobat->bobot_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_obat_id">Komposisi Obat</label>
                                            <input type="text" id="komposisi_obat" class="form-control"
                                                 name="komposisi_obat" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>
                                    
                                    

                                    
                                    <div class="col-sm-6 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                    
                                </form>
                                        
                                </div>

                                    </section>

</div>

@endsection
