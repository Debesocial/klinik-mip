@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Pemeriksaan Covid')
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
                                <form class="form form-horizontal" action="/pemeriksaan/covid" method="post">
                                    @csrf 
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>No Surat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="no_surat" class="form-control"
                                                    name="no_surat" placeholder="No Surat" required disabled>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Kebutuhan Pemriksaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="pemeriksaan_antigen_id" id="pemeriksaan_antigen_id" class="form-select">
                                                    <option disabled selected>Kebutuhan Pemriksaan</option>
                                                    @foreach ($pemeriksaanantigen as $antigen)
                                                        <option value="{{ $antigen['id'] }}">{{ $antigen['kebutuhan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>

                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="pasien_id" id="pasien_id" class="form-select">
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}">{{ $pas['id'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="col-md-2">
                                                <label>Hasil Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                            <input class="form-check-input" type="radio" name="hasil_pemeriksaan"
                                    id="hasil_pemeriksaan" value="0">
                                <label class="form-check-label" for="negatif">
                                    Negatif
                                </label>
                                <input class="form-check-input" type="radio" name="positif"
                                    id="positif" value="1">
                                <label class="form-check-label" for="positif">
                                    Positif
                                </label>
                                            </div>

                                            

                                            
                                           
                                            
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Submit</button>
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
        @include('sweetalert::alert') 

@endsection