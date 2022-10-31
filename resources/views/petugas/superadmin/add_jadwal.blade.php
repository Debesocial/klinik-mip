@extends('layouts.dashboard.app')

@section('title', 'Add Jadwal')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Tambah Jadwal')
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
                            <form class="form" action="/add/jadwal" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="hari">Hari</label>
                                            <input type="text"  class="form-control"
                                                 name="hari" id="hari" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="shift">Shift</label>
                                            <input type="number"  class="form-control"
                                                 name="shift" id="shift" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="dari">Dari</label>
                                            <input type="time" step="1"  class="form-control"
                                                 name="dari" id="dari" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sampai">Sampai</label>
                                            <input type="time" step="1" class="form-control"
                                                 name="sampai" id="sampai" required>
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
