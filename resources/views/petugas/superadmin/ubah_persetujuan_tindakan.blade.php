@extends('layouts.dashboard.app')

@section('title', 'Persetujuan Tindakan Medis')
@section('persetujuanmedis', 'active')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('ref/assets/css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset ('ref/assets/css/app.css')}}">

    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/choices.js/choices.min.css')}}" />
    
    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="shortcut icon" href="{{asset ('ref/assets/images/favicon.svg" type="image/x-icon')}}">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Persetujuan Tindakan Medis')
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
                                <form class="form form-horizontal" action="/ubah/persetujuan/tindakan/medis/{{ $tindakan->id }}" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text"  class="form-control"
                                                      value="{{ $tindakan->pasien->nama_pasien }}" disabled>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>
                                            <br>

                                            <div class="col-md-2">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="date"  class="form-control"
                                                    value="{{ $tindakan->pasien->tanggal_lahir }}" disabled>
                                            </div>
                                            <div class="col-md-6">               
                                            </div>

                                            <div class="col-md-2">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text"  class="form-control"
                                                    value="{{ $tindakan->pasien->pekerjaan }}" disabled>
                                            </div>
                                            <div class="col-md-6">               
                                            </div>

                                            <div class="col-md-2">
                                                <label>Perusahaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text"  class="form-control"
                                                    value="{{ $tindakan->pasien->perusahaan->nama_perusahaan_pasien }}"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Divisi</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text"  class="form-control"
                                                        value="{{ $tindakan->pasien->divisi->nama_divisi_pasien }}"  disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text"  class="form-control"
                                                            value="{{ $tindakan->pasien->jabatan->nama_jabatan }}"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        

                                                            <div class="col-md-2">
                                                                <label>Riwayat Perjalanan Penyakit</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <textarea type="text" id="riwayat" class="form-control"
                                                                    name="riwayat" >{{ $tindakan->riwayat }}</textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Hasil Pernyataan</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <input class="form-check-input" type="radio" name="hasil" id="hasil" value="0" {{ !$tindakan->hasil ? "checked" : "" }}> Tidak
                                                                <label for="">
                                                                    <input class="form-check-input" type="radio" name="hasil" id="hasil" value="1" {{ $tindakan->hasil ? "checked" : "" }}> Ya
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div> 
                                                                            
                                            

                                            <div class="col-sm-12 d-flex centered-content-end">
                                                <div class="col-md-4">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
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