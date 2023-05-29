@extends('layouts.dashboard.app')
@section('title', 'Add  Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('alkes', 'active')
@section('judul', 'Tambah Obat')
@section('breadcrumb', 'tambah_data_obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/obats" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_obat">Nama Obat <b class="color-red">*</b></label>
                                            <input class="form-control" name="nama_obat" id="nama_obat" placeholder="Masukkan nama obat" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="golongan_obat_id">Golongan Obat <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="golongan_obat_id" id="golongan_obat_id" required>
                                                <option value="">Pilih golongan obat</option>
                                                @foreach ($golonganobat as $golonganobat)
                                                <option value="{{ $golonganobat->id }}">{{ $golonganobat->nama_golongan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Obat <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id" required>
                                                <option value="">Pilih satuan obat</option>
                                                @foreach ($satuanobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->satuan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bobot_obat_id">Bobot Obat <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id" required>
                                                <option value="">Pilih bobot obat</option>
                                                @foreach ($bobotobat as $bobotobat)
                                                <option value="{{ $bobotobat->id }}">{{ $bobotobat->bobot_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_obat_id">Komposisi Obat</label>
                                            <textarea class="form-control" name="komposisi_obat" id="komposisi_obat" cols="50" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
                                        <div class="row justify-content-end">
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