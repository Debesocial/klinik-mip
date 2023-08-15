@extends('layouts.dashboard.app')
@section('title', 'Ubah Data Produk Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('produk', 'active')
@section('judul', 'Ubah Data Produk Kesehatan')
@section('breadcrumb', 'ubah_produk_kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/produk/{{ $produk->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nama Produk Kesehatan <b class="color-red">*</b></label>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="nama_produk" class="form-control" name="nama_produk" placeholder="Masukkan nama produk kesehatan" value="{{ $produk['nama_produk'] }}" required >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Produk Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id">
                                                @foreach ($satuanobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->satuan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bobot_obat_id">Bobot Produk Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id">
                                                @foreach ($bobotobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->bobot_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Ukuran</label>
                                            <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukkan Ukuran" value="{{$produk->ukuran}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="komposisi_obat">Harga</label>
                                            <input type="text" class="form-control" name="harga" id="harga" value="{{$produk->harga}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Distributor</label>
                                            <input type="text" class="form-control" name="distributor" id="distributor" placeholder="Masukkan Distributor" value="{{$produk->distributor}}">
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
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

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
      new AutoNumeric('#harga', {
        digitGroupSeparator: '.',
        decimalCharacter: ',',
        decimalPlaces: 0,
        minimumValue: '0',
      });
    });
  </script>
    
@endsection

@endsection