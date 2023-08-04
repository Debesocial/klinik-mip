@extends('layouts.dashboard.app')
@section('title', 'Ubah Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('alkes', 'active')
@section('judul', 'Ubah Obat')
@section('breadcrumb', 'ubah_data_obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/obats/{{ $obat->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_obat">Nama Obat <b class="color-red">*</b></label>
                                            <input class="choices form-control" name="nama_obat" id="nama_obat" placeholder="Masukkan Nama obat" value="{{$obat->nama_obat}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="golongan_obat_id">Golongan Obat <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="golongan_obat_id" id="golongan_obat_id">
                                                @foreach ($golonganobat as $item)
                                                <option value="{{ $item->id }}" {{($item->id==$obat->golongan_obat_id)?'selected':''}}>{{ $item->nama_golongan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat_id">Satuan Obat <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="satuan_obat_id" id="satuan_obat_id">
                                                @foreach ($satuanobat as $item)
                                                <option value="{{ $item->id }}" {{($item->id==$obat->satuan_obat_id)?'selected':''}}>{{ $item->satuan_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bobot_obat_id">Bobot obat <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="bobot_obat_id" id="bobot_obat_id">
                                                @foreach ($bobotobat as $item)
                                                <option value="{{ $item->id }}" {{($item->id==$obat->bobot_obat_id)?'selected':''}}>{{ $item->bobot_obat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" name="harga" id="harga" value="{{ $obat['harga'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="komposisi_obat">Komposisi Obat</label>
                                            <textarea class="form-control" name="komposisi_obat" id="komposisi_obat" cols="50" rows="5">{{ $obat['komposisi_obat'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_antibiotik" name="is_antibiotik" {{$obat->is_antibiotik==1?'checked':''}}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Antibiotik
                                        </label>
                                      </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_sedatif" name="is_sedatif" {{$obat->is_sedatif==1?'checked':''}}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Efek Sedatif
                                        </label>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sediaan">Sediaan</label>
                                            <select name="sediaan" id="sediaan" class="form-select" placeholder="Masukkan sediaan">
                                                @foreach (sediaan() as $sediaan)
                                                    <option value="{{$sediaan['id']}}" {{$sediaan['id']==$obat->sediaan?'selected':''}}>{{$sediaan['singkatan']}} <i>({{$sediaan['kepanjangan']}})</i></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="distributor">Distributor</label>
                                            <input name="distributor" id="distributor" class="form-control" placeholder="Masukkan distributor" value="{{$obat->distributor}}">
                                        </div>
                                    </div>

                                    <div class="col-12 text-end"><br>
                                        <button type="submit" class=" btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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