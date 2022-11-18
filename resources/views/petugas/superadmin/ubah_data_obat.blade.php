@extends('layouts.dashboard.app')

@section('title', 'Ubah Data Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('alkes', 'active')

@section('judul', 'Ubah Data Obat')
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
                            <form class="form" action="/ubah/data/obat/{{ $obatalkes->id }}" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_obat_id">Jenis Obat</label>
                                            <select class="choices form-select" name="jenis_obat_id" id="jenis_obat_id">
                                                @foreach ($jenisobat as $jenis)
                                                <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="golongan_obat_id">Golongan Obat</label>
                                            <select class="choices form-select" name="golongan_obat_id" id="golongan_obat_id">
                                                @foreach ($golonganobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_golongan_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_obat_id">Nama Obat</label>
                                            <select class="choices form-select" name="nama_obat_id" id="nama_obat_id">
                                                @foreach ($namaobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Obat</label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id">
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
                                            <label for="bobot_obat_id">Bobot obat</label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id">
                                                @foreach ($bobotobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->bobot_obat }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="komposisi_obat">Komposisi Obat</label>
                                            <input type="text" id="komposisi_obat" class="form-control"
                                                 name="komposisi_obat" value="{{ $obatalkes['komposisi_obat'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
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
