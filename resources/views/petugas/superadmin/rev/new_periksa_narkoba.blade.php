@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')
@section('breadcrumb', 'tambah_pemeriksaan_narkoba')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('narko', 'active')

@section('judul', 'Data Pemeriksaan Narkoba')
@section('container')

<section>
    <div class="card">
        <div class="card-body">
            
            <div id="stepper2" class="bs-stepper">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#test-nl-1">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-person-fill"></i></span>
                            <span class="bs-stepper-label">Pilih Pasien</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-2">
                        <div class="btn step-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Second step</span>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Third step</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form class="form" action="/periksa/narkoba" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Pilih Pasien berdasarkan <b>ID rekam medis</b><b class="color-red"> *</b></label>
                                            <select id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                <option selected>Pilih ID Pasien</option>
                                                @foreach ($pasien_id as $pas)
                                                    <option value="{{ $pas['id'] }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan pilih salah satu pasien.
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>

                            <div class="d-flex justify-content-between">
                                <div></div>
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.next()">Lanjut</button>
                            </div>
                        </div>
                        <div id="test-nl-2" class="content">
                            <p class="text-center">test 4</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()">Sebelumnya</button>
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.next()">Lanjut</button>
                            </div>
                        </div>
                        <div id="test-nl-3" class="content">
                            <p class="text-center">test 6</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()">Sebelumnya</button>
                                <button type="submit" class="btn btn-primary rounded-pill" onclick="stepper2.next()">Simpan</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
            
        </div>
    </div>
   
    @section('js')
        <script>
            var stepper2 = new Stepper(document.querySelector('#stepper2'), {
            linear: false,
            animation: true
        })
        </script>
    @stop
    
</section>
@include('sweetalert::alert') 
@endsection