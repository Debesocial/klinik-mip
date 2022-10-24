@extends('layouts.dashboard.app')

@section('title', 'Ubah Pemeriksaan Antigen')


@section('judul', 'Ubah Pemeriksaan Antigen')
@section('container')    
<div class="page-heading">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            {{-- @error("message")
                    <p class="text-danger">{{$message}}</p>
                @enderror --}}
                            <form class="form" action="/ubah/pemeriksaan/antigen/{{ $pemeriksaanantigen->id }}" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kebutuhan">Kebutuhan Antigen</label>
                                            <input type="text" id="kebutuhan" class="form-control"
                                                 name="kebutuhan" placeholder="" value="{{ $pemeriksaanantigen['kebutuhan'] }}" required>
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
