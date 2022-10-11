@extends('layouts.dashboard.app')

@section('title', 'Add Data Petugas')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Add Data Petugas')
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
                            <form class="form" action="/add/data/user" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Nama Petugas<b>*</b></label>
                                            <input type="text" id="name" class="form-control"
                                                 name="name" placeholder="Masukkan Nama" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email<b>*</b></label>
                                            <input type="email" id="email" class="form-control"
                                                 name="email" placeholder="Masukkan Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Password<b>*</b></label>
                                            <input type="password" name="password" id="password" class="form-control form-control-sm" minlength="12" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Minimum 12 characters, at least one uppercase letter, one lowercase letter and one number (EXAMPLE : Passuser2022)" name="password" placeholder="Masukkan Password" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jadwal_id">Jadwal Petugas<b>*</b></label>
                                            <select class="choices form-select" name="jadwal_id" id="jadwal_id">
                                                <option value="">Pilih jadwal</option>
                                                @foreach ($jadwal as $jadwal)
                                                <option value="{{ $jadwal->id }}">{{ $jadwal->hari }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 col-12">
                                        
                                    </div>
                                    
                                    

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon<b>*</b></label>
                                            <input type="number" id="telp" class="form-control"
                                                name="telp" placeholder="Masukkan No Telepon" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Level<b>*</b></label>
                                            <select class="choices form-select" name="level_id" id="level_id">
                                                <option value="">Pilih Level</option>
                                                @foreach ($level as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_level }}</option>
                                                @endforeach
                                        </select>
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
