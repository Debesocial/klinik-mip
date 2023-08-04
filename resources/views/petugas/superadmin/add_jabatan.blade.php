@extends('layouts.dashboard.app')
@section('title', 'Add Jabatan')
@section('judul', 'Tambah Jabatan')
@section('breadcrumb', 'tambah_jabatan')
@section('organisasi', 'active')
@section('jabatan', 'active')
@section('organ', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/jabatan" onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_jabatan">Nama Jabatan <b class="color-red">*</b></label>
                                            <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="Masukkan jabatan" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="perusahaan_id">Nama Perusahaan {!!mandatory()!!}</label>
                                            <select name="perusahaan_id" id="perusahaan_id" class="form-select" required>
                                                <option value="">Pilih Perusahaan</option>
                                                @foreach ($perusahaan as $p)
                                                    <option value="{{$p->id}}">{{$p->nama_perusahaan_pasien}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col text-end"><br>
                                        <button type="submit" class=" btn btn-primary "><i class="bi bi-save"></i> Simpan</button>
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