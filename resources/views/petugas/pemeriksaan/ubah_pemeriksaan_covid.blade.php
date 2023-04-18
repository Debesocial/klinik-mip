@extends('layouts.dashboard.app')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')
@section('breadcrumb', 'ubah_pemeriksaan_covid')

@section('title', 'Ubah Pemeriksaan Covid-19')


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
        @section('judul', 'Ubah Pemeriksaan Covid-19')
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
                                <form class="form form-horizontal" action="/ubah/pemeriksaan/covid/{{   $covid->id  }}" method="post">
                                    @csrf 
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" class="form-control" name="pasien_id" value="{{ $covid->pasien->id_rekam_medis }}" disabled> 
                                            </div>
                                            <div class="col-md-2">
                                                <label>Kebutuhan Pemeriksaan <b class="color-red">*</b></label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select class="choices form-select" name="pemeriksaan_antigen_id" id="pemeriksaan_antigen_id" required>
                                                    <option value="{{   $covid->pemeriksaan_antigen_id  }}">{{ $covid->pemeriksaan->kebutuhan }}</option>
                                                    @foreach ($pemeriksaan as $pem)
                                                    <option value="{{ $pem->id }}" {{ $pem->id == $covid->pemeriksaan->id ? 'selected' : '' }}>{{ $pem->kebutuhan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>

                                            <input type="text" id="myInput0" class="form-control" name="pasien_id" value="{{ $covid->pasien->id_pasien }}" placeholder="ID Pasien"  hidden>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" class="form-control" value="{{ $covid->pasien->nama_pasien }}"  disabled>
                                            </div>


                                            <div class="col-md-2">
                                                <label>Hasil Pasien <b class="color-red">*</b></label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                            <input class="form-check-input" type="radio" name="hasil_pemeriksaan" id="hasil_pemeriksaan" value="0" {{ !$covid->hasil_pemeriksaan ? "checked" : "" }}> Negatif
                                                        <input class="form-check-input" type="radio" name="hasil_pemeriksaan" id="hasil_pemeriksaan" value="1" {{ $covid->hasil_pemeriksaan ? "checked" : "" }}> Positif
                                            </div>
                                            <div class="col-md-2">
                                                <label>Nomor Induk Karyawan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text"  class="form-control" value="{{ $covid->pasien->NIK }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                        
                                        <div class="col-md-2">
                                            <label>Tempat Lahir</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text"  class="form-control" value="{{ $covid->pasien->tempat_lahir }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>
                                        <div class="col-md-2">
                                            <label>Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="date" id="myInput4" class="form-control" value="{{ $covid->pasien->tanggal_lahir }}"  disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>
            
                                        <div class="col-md-2">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput5" class="form-control" value="{{ $covid->pasien->alamat }}" disabled >
                                        </div>
                                        <div class="col-md-6">
                                            </div>
            
                                        <div class="col-md-2">
                                            <label>Pekerjaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput6" class="form-control" value="{{ $covid->pasien->pekerjaan }}"  disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>
            
                                            
            
                                        <div class="col-md-2">
                                            <label>Perusahaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput7" class="form-control" value="{{ $covid->pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>
                                            <div class="col-md-2">
                                            <label>Divisi</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput8" class="form-control" value="{{ $covid->pasien->divisi->nama_divisi_pasien }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Jabatan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput9" class="form-control" value="{{ $covid->pasien->jabatan->nama_jabatan }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
            
                                                    <div class="col-md-2">
                                                        <label>Jenis kelamin</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput10" class="form-control" value="{{ $covid->pasien->jenis_kelamin }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
            
                                                        <div class="col-md-2">
                                                            <label>Telepon</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="myInput11" class="form-control" value="{{ $covid->pasien->telepon }}" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>
            
                                                            <div class="col-md-2">
                                                                <label>Email</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="email" id="myInput12" class="form-control" value="{{ $covid->pasien->email }}" disabled >
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>
                                            
                                            <div class="col-sm-6 d-flex justify-content-end">
                                                <button type="reset"
                                                class="btn btn-outline-secondary me-1 mb-1"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Simpan</button>
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
    
        
    
        {{-- <script src="assets/js/mazer.js"></script> --}}
    
        {{-- <script>
             $(document).ready(function () {
            $('#pasien_id').select2();
            $('#pasien_id').on('change', function (e) {
                var data = $('#pasien_id').select2("val");
                @this.set('pasien_id', data);
            });
        });
        </script> --}}
    
    
        @include('sweetalert::alert') 
@endsection