@extends('layouts.dashboard.app')
@section('title', 'Add  Produk Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('produk', 'active')
@section('judul', 'Tambah Produk Kesehatan')
@section('breadcrumb', 'tambah_produk_kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/produk" onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Produk Kesehatan <b class="color-red">*</b></label>
                                            <input type="text" id="nama_produk" class="form-control" name="nama_produk" placeholder="Masukkan nama produk kesehatan" required >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Produk Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id" required>
                                                <option value="" disabled selected>Pilih satuan produk kesehatan</option>
                                                @foreach ($satuanobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->satuan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bobot_obat_id">Bobot Produk Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id" required>
                                                <option value="" disabled selected>Pilih bobot produk kesehatan</option>
                                                @foreach ($bobotobat as $bobotobat)
                                                <option value="{{ $bobotobat->id }}">{{ $bobotobat->bobot_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Harga</label>
                                            <input type="number" class="form-control" name="harga" id="harga" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Komposisi Produk Kesehatan</label>
                                            <textarea class="form-control" name="komposisi" id="komposisi" cols="50" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
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