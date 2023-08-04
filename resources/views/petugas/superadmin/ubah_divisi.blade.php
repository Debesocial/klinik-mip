@extends('layouts.dashboard.app')
@section('title', 'Ubah Divisi')
@section('judul', 'Ubah Divisi')
@section('breadcrumb', 'ubah_divisi')
@section('organisasi', 'active')
@section('divisi', 'active')
@section('organ', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/divisi/{{ $divisi->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_divisi_pasien">Nama Divisi <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_divisi_pasien" value="{{ $divisi['nama_divisi_pasien'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="perusahaan_id">Nama Perusahaan {!!mandatory()!!}</label>
                                                <select name="perusahaan_id" id="perusahaan_id" class="form-select" required>
                                                    <option value="">Pilih Perusahaan</option>
                                                    @foreach ($perusahaan as $p)
                                                        <option value="{{$p->id}}" {{$p->id==$divisi->perusahaan_id?'selected':''}} >{{$p->nama_perusahaan_pasien}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
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

@endsection