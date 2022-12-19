@extends('layouts.dashboard.app')
@section('title', 'Ubah Hasil Pemantauan')
@section('judul', 'Ubah Hasil Pemantauan Covid')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/hasil/pemantauan/{{ $hasilpemantauan->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kode">Kode <b class="color-red">*</b></label>
                                            <input type="text" id="kode" class="form-control" name="kode" placeholder="Masukkan kode" value="{{ $hasilpemantauan['kode'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_pemantauan">Deskirpsi <b class="color-red">*</b></label>
                                            <input type="text" id="nama_pemantauan" class="form-control" name="nama_pemantauan" placeholder="Masukkan deskirpsi" value="{{ $hasilpemantauan['nama_pemantauan'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="reset" class="form-control btn btn-light-secondary me-1 mb-1">Reset</button>
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