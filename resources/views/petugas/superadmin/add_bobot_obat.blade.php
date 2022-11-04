@extends('layouts.dashboard.app')

@section('title', 'Tambah Bobot Obat')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Tambah Bobot Obat/Alkes')
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
                            <form class="form" action="/add/bobot/obat" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="bobot_obat">Nama Obat/Alkes</label>
                                            <input type="text"  class="form-control"
                                                 name="bobot_obat" id="bobot_obat"  placeholder="Masukkan bobot obat/alkes" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>


                                    <div class="col-sm-6 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                    
                                </form>
                                        
                                </div>

                                    </section>

</div>

@endsection
