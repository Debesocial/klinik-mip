@extends('layouts.dashboard.app')
@section('title', 'Tambah Satuan Obat')
@section('judul', 'Tambah Satuan Obat/Alkes')
@section('breadcrumb', 'tambah_satuan_obat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/satuan/obat"  onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="satuan_obat">Satuan Obat <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="satuan_obat" id="satuan_obat" placeholder="Masukkan satuan obat/alkes" required>
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