@extends('layouts.dashboard.app')
@section('title', 'Ubah Alat Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('al', 'active')
@section('judul', 'Ubah Alat Kesehatan')
@section('breadcrumb', 'ubah_alat_kesehatan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/alkes/{{ $alkes->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <input class="choices form-control" name="nama_alkes" id="nama_alkes" placeholder="Masukkan nama Alat Kesehatan" value="{{$alkes->nama_alkes}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="golongan_obat_id">Golongan Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="golongan_alkes_id" id="golongan_alkes_id">
                                                @foreach ($golongan as $gol)
                                                <option value="{{ $gol->id }}" {{($gol->id==$alkes->golongan_alkes_id)?'selected':''}}>{{ $gol->golongan_alkes }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id">
                                                @foreach ($satuanobat as $item)
                                                <option value="{{ $item->id }}" {{($item->id==$alkes->satuan_obat_id)?'selected':''}}>{{ $item->satuan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bobot_obat_id">Bobot Alat/Bahan Kesehatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id">
                                                @foreach ($bobotobat as $item)
                                                <option value="{{ $item->id }}" {{($item->id==$alkes->bobot_obat_id)?'selected':''}}>{{ $item->bobot_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Harga</label>
                                            <input type="text" class="form-control" name="harga" id="harga" value="{{$alkes->harga}}" >
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="komposisi_obat">Komposisi Alat/Bahan Kesehatan</label>
                                            <textarea class="form-control" name="komposisis" id="komposisis" cols="50" rows="5">{{ $alkes['komposisis'] }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
                                       <div class="row ">
                                            <div class="col text-end">
                                                <button type="submit" class="btn btn-primary "><i class="bi bi-save"></i> Simpan</button>
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