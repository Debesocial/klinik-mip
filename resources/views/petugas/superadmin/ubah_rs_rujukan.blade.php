@extends('layouts.dashboard.app')
@section('title', 'Ubah RS Rujukan')
@section('judul', 'Ubah RS Rujukan')
@section('breadcrumb', 'ubah_rs_rujukan')
@section('md', 'active')
@section('periksa', 'active')
@section('rs', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/rs/rujukan/{{ $rsrujukan->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_RS_rujukan">Rumah Sakit Rujukan <b class="color-red">*</b></label>
                                            <input type="text" id="nama_RS_rujukan" class="form-control" name="nama_RS_rujukan" placeholder="Masukkan rumah sakit rujukan" value="{{ $rsrujukan['nama_RS_rujukan'] }}" required>
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