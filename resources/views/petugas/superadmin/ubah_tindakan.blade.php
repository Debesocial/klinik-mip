@extends('layouts.dashboard.app')
@section('title', 'Ubah Tindakan')
@section('judul', 'Ubah Tindakan')
@section('breadcrumb', 'ubah_tindakan')
@section('md', 'active')
@section('periksa', 'active')
@section('tindakan', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/tindakan/{{$tindakan->id}}"  onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nama_tindakan">Nama Tindakan <b class="color-red">*</b></label>
                                            <input type="text" id="nama_tindakan" class="form-control" name="nama_tindakan" placeholder="Masukkan nama tindakan" required value="{{$tindakan->nama_tindakan}}"> 
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
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