@extends('layouts.dashboard.app')

@section('title', 'Data Rawat Jalan')
@section('rekam', 'active')
@section('rawat', 'active')
@section('jalan', 'active')
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
        @section('judul', 'Data Rawap Jalan')
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
                                <form class="form form-horizontal" action="/ubah/rawat/jalan/{{ $rawat_jalan->id }}" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">


                                            <div class="col-md-2">
                                                <label>ID Rekam Medis Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="" class="form-control"  value="{{ ($rawat_jalan->pasien->id_rekam_medis) }}" disabled>
                                            </div>
                                            <div class="col-md-6 form-group">
                                            </div>
                                            <br>

                                            <input type="text" id="myInput0" class="form-control"
                                                    name="pasien_id"  placeholder="ID Pasien" hidden>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput1" class="form-control"
                                                    name="myInput1" value="{{ ($rawat_jalan->pasien->nama_pasien) }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput2" class="form-control"
                                                    name="myInput2" value="{{ ($rawat_jalan->pasien->pekerjaan) }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                            <div class="col-md-2">
                                                <label>Perusahaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput3" class="form-control"
                                                    name="myInput3" value="{{ ($rawat_jalan->pasien->perusahaan->nama_perusahaan_pasien) }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Divisi</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput4" class="form-control"
                                                        name="myInput4" value="{{ ($rawat_jalan->pasien->divisi->nama_divisi_pasien) }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                            
                                                    <div class="col-md-2">
                                                        <label>Tanggal Berobat <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input id="tanggal_berobat" type="date" class="form-control"
                                                            name="tanggal_berobat" value="{{ ($rawat_jalan->tanggal_berobat) }}" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Nama Penyakit <b class="color-red">*</b> </label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="nama_penyakit_id" id="nama_penyakit_id" required>
                                                            <option value="{{   $rawat_jalan->nama_penyakit_id  }}">{{ $rawat_jalan->namapenyakit->primer }}</option>
                                                            @foreach ($namapenyakit as $penyakit)
                                                            <option value="{{ $penyakit->id }}" {{ $penyakit->id == $rawat_jalan->namapenyakit->id ? 'selected' : '' }}>{{ $penyakit->primer }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Nama Tindakan <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="tindakan_id" id="tindakan_id" required>
                                                            <option value="{{   $rawat_jalan->tindakan_id  }}">{{ $rawat_jalan->tindakan->nama_tindakan }}</option>
                                                            @foreach ($tindakan as $tin)
                                                            <option value="{{ $tin->id }}" {{ $tin->id == $rawat_jalan->tindakan->id ? 'selected' : '' }}>{{ $tin->nama_tindakan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                    </div>



                                            <div class="col-sm-4 d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Simpan</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
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


        <script src="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset ('ref/assets/js/bootstrap.bundle.min.js')}}"></script>
        
    <!-- Include Choices JavaScript -->
    <script src="{{asset ('ref/assets/vendors/choices.js/choices.min.js')}}"></script>
    <script src="{{asset ('ref/assets/js/pages/form-element-select.js')}}"></script>
    
        {{-- <script src="{{asset ('ref/assets/js/mazer.js')}}"></script> --}}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    
@endsection
