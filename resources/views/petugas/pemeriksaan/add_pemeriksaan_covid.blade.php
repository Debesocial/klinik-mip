@extends('layouts.dashboard.app')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')

@section('title', 'Pemeriksaan Covid-19')


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
        @section('judul', 'Pemeriksaan Covid-19')
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
                                <form class="form form-horizontal" action="/add/pemeriksaan/covid/{{$pasien->id}}" method="post">
                                    @csrf 
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID Rekam Medis Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" class="form-control" value="{{ $pasien->id_rekam_medis }}"  disabled>
                                            </div>

                                            <input type="text" id="pasien_id" class="form-control" name="pasien_id" value="{{ $pasien->id }}"  hidden>

                                            <div class="col-md-2">
                                                <label>Kebutuhan Pemeriksaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="pemeriksaan_antigen_id" id="pemeriksaan_antigen_id" class="form-select">
                                                    <option disabled selected>Kebutuhan Pemeriksaan</option>
                                                    @foreach ($pemeriksaan as $antigen)
                                                        <option value="{{ $antigen['id'] }}">{{ $antigen['kebutuhan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" class="form-control" value="{{ $pasien->nama_pasien }}" disabled>
                                            </div>


                                            <div class="col-md-2">
                                                <label>Hasil Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                            <input class="form-check-input" type="radio" name="hasil_pemeriksaan"
                                                 id="hasil_pemeriksaan" value="0">
                                            <label class="form-check-label" for="negatif">    Negatif
                                            </label>
                                            <input class="form-check-input" type="radio" name="positif"
                                                 id="positif" value="1">
                                            <label class="form-check-label" for="positif"> Positif
                                             </label>  
                                            </div>

                                <div class="col-md-2">
                                    <label>Nomor Induk Karyawan</label>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" value="{{ $pasien->NIK }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    </div>
                            
                            <div class="col-md-2">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" class="form-control" value="{{ $pasien->tempat_lahir }}" disabled>
                            </div>
                            <div class="col-md-6">
                                </div>

                            <div class="col-md-2">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="date" class="form-control" value="{{ $pasien->tanggal_lahir }}"  disabled>
                            </div>
                            <div class="col-md-6">
                                </div>

                            <div class="col-md-2">
                                <label>Alamat</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" class="form-control" value="{{ $pasien->alamat }}" disabled >
                            </div>
                            <div class="col-md-6">
                                </div>

                            <div class="col-md-2">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput6" class="form-control" value="{{ $pasien->pekerjaan }}"  disabled>
                            </div>
                            <div class="col-md-6">
                                </div>

                            <div class="col-md-2">
                                <label>Perusahaan</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput7" class="form-control" value="{{ $pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                            </div>
                            <div class="col-md-6">
                                </div>

                                <div class="col-md-2">
                                <label>Divisi</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput8" class="form-control" value="{{ $pasien->divisi->nama_divisi_pasien }}" disabled>
                            </div>
                            <div class="col-md-6">
                                </div>
                                <div class="col-md-2">
                                    <label>Jabatan</label>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" value="{{ $pasien->jabatan->nama_jabatan }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    </div>

                                        <div class="col-md-2">
                                            <label>Jenis kelamin</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput10" class="form-control" value="{{ $pasien->jenis_kelamin }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Telepon</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput11" class="form-control" {{ $pasien->telp }}  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="email" id="myInput12" class="form-control" value="{{ $pasien->email }}" disabled >
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                            
                                            <div class="col-sm-6 d-flex justify-content-end">
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

        @include('sweetalert::alert') 
@endsection