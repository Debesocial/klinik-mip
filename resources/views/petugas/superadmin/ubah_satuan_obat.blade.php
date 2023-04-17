@extends('layouts.dashboard.app')
@section('title', 'Ubah Satuan Obat')
@section('judul', 'Ubah Satuan Obat')
@section('breadcrumb', 'ubah_satuan_obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/satuan/obat/{{ $satuanobat->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat">Satuan Obat <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="satuan_obat" placeholder="Masukkan satuan obat" value="{{ $satuanobat['satuan_obat'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12"><br>
                                        <div class="row justify-content-end">
                                            <div class="col-4">
                                                <button type="reset" class="form-control btn btn-outline-secondary me-1 mb-1"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                            </div>
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