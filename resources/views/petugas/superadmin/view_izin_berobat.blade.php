@extends('layouts.dashboard.app')

@section('title', 'View Izin Berobat')
@section('izinberobat', 'active')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'View Izin Berobat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>



        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Nama Pasien</label>
                                                            <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" placeholder="Nama Pasien" value="{{ $izin->pasien->nama_pasien }}" disabled>
                                                        </div>
                                                    </div>
                
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tempat_pemeriksaan">Tempat Pemeriksaan</label>
                                                            <input type="text" id="tempat_pemeriksaan" class="form-control" name="tempat_pemeriksaan" value="{{ $izin['tempat'] }}" disabled>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Perusahaan</label>
                                                            <input type="text" id="perusahaan" class="form-control" name="perusahaan" placeholder="Nama perusahaan" value="{{ $izin->pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Divisi</label>
                                                            <input type="text" id="divisi" class="form-control" name="divisi" placeholder="Nama divisi" value="{{ $izin->pasien->divisi->nama_divisi_pasien }}" disabled>
                                                        </div>
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
