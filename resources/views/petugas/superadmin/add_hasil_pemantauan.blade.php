@extends('layouts.dashboard.app')

@section('title', 'Add Lokasi Kejadian')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Add Lokasi Kejadian')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Masukkan Data</h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
                            <form class="form" action="/add/lokasi/kejadian" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kode">Kode</label>
                                            <input type="text" id="kode" class="form-control"
                                                 name="kode">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_pemantauan">Nama Pemantauan</label>
                                                <input type="text" id="nama_pemantauan" class="form-control"
                                                     name="nama_lokasi">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                        </div>

                                    


                                    <div class="col-sm-6 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                    
                                </form>
                                        
                                </div>

                                    </section>

</div>

@endsection





