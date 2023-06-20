@extends('layouts.dashboard.app')
@section('title', 'Ubah Lokasi Kejadian')
@section('judul', 'Ubah Lokasi Kejadian')
@section('breadcrumb', 'ubah_lokasi_kejadian')
@section('md', 'active')
@section('periksa', 'active')
@section('lok', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/lokasi/kejadian/{{ $lokasikejadian->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_lokasi">Nama Lokasi Kejadian<b class="color-red">*</b></label>
                                            <input type="text" id="nama_lokasi" class="form-control" name="nama_lokasi" placeholder="Masukkan nama lokasi kejadian" value="{{ $lokasikejadian['nama_lokasi'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
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

@endsection