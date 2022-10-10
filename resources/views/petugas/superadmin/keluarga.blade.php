@extends('layouts.dashboard.app')

@section('title', 'Hasil Pemantauan')


@section('judul', 'Hasil Pemantauan')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Masukkan Data</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                        <form class="form" action="/add/data/user" method="post">
                            @csrf 
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama Keluarga</label>
                                        <input type="text" id="nama" class="form-control"
                                             name="nama" placeholder="Nama Keluarga" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="hubungan">Hubungan Keluarga</label>
                                        <input type="text" id="hubungan" class="form-control"
                                             name="hubungan" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" id="alamat" class="form-control"
                                             name="alamat" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                </div>
                                

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" id="pekerjaan" class="form-control"
                                            name="pekerjaan" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input type="text" id="telepon" class="form-control"
                                            name="telepon" required>
                                    </div>
                                </div>

                                
                                <div class="col-md-6 col-12">
                                    
                                </div>
                                
                                

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control"
                                            name="email" required>
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
