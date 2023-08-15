@extends('layouts.dashboard.app')
@section('title', 'Add  Alat Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('al', 'active')
@section('judul', 'Tambah Alat Kesehatan/Bahan Kesehatan')
@section('breadcrumb', 'tambah_alat_kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/alkes"  onsubmit="showLoader()" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <input class="choices form-control" name="nama_alkes" id="nama_alkes" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Golongan Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="golongan_alkes_id" id="golongan_alkes_id" required>
                                                <option value="" disabled selected>Pilih golongan alat/bahan kesehatan</option>
                                                @foreach ($golongan as $gol)
                                                <option value="{{ $gol->id }}">{{ $gol->golongan_alkes }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id" required>
                                                <option value="" disabled selected>Pilih satuan alat/bahan kesehatan</option>
                                                @foreach ($satuanobat as $item)
                                                <option value="{{ $item->id }}">{{ $item->satuan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bobot_obat_id">Bobot Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id" required>
                                                <option value="">Pilih bobot alat/bahan kesehatan</option>
                                                @foreach ($bobotobat as $bobotobat)
                                                <option value="{{ $bobotobat->id }}">{{ $bobotobat->bobot_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Ukuran</label>
                                            <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukkan Ukuran">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Harga</label>
                                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Distributor</label>
                                            <input type="text" class="form-control" name="distributor" id="distributor" placeholder="Masukkan Distributor">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Komposisi/Keterangan Alat atau Bahan Kesehatan</label>
                                            <textarea class="form-control" name="komposisis" id="komposisis" cols="50" rows="5"></textarea>
                                            
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