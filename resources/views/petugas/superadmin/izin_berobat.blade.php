@extends('layouts.dashboard.app')

@section('title', 'Izin Berobat')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Izin Berobat')
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
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>No Surat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="no_surat" class="form-control"
                                                    name="no_surat" placeholder="No Surat" required disabled>
                                            </div> 
                                            <div class="col-md-6">
                                            </div>

                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="seacrh" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="">
                                            </div>
                                            <div class="col-md-6 form-group">
                                            </div>
                                            <br>

                                            <div class="col-md-2">
                                                <label>Tempat Pemeriksaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="tempat_pemeriksaan" class="form-control"
                                                    name="tempat_pemeriksaan"  required disabled>
                                            </div>
                                            <div class="col-md-6">               
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien"  required disabled>
                                            </div>
                                            <div class="col-md-6">               
                                            </div>

                                            <div class="col-md-2">
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur"  required disabled>
                                            </div>
                                                <div class="col-md-6">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="pekerjaan" class="form-control"
                                                    name="pekerjaan" placeholder="Pekerjaan" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                            <div class="col-md-2">
                                                <label>Perusahaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="Perusahaan" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                            <div class="col-md-2">
                                                                <label>Dokter yang Memeriksa</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" id="dokter_pemeriksa" class="form-control"
                                                                    name="dokter_pemeriksa" placeholder="Dokter Pemeriksa">
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>
                                                                
                                                                            

                                                                                <div class="col-md-2">
                                                                                    <label>Dokter Yang Memeriksa</label>
                                                                                </div>
                                                                                <div class="col-md-4 form-group">
                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Tanda Tangan
                                                                                    <label for="">
                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked> Tanda Tangan Tersimpan
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    </div> 

                                                                                    <div class="col-md-2">
                                                                                        
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <textarea type="text" id="tanda_tangan" class="form-control"
                                                                                            name="tanda_tangan"  style="width: 100%"></textarea>
                                                                                    </div>
                                                                                    <div class="col-md-6">
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

@endsection