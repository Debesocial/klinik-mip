@extends('layouts.dashboard.app')

@section('title', 'Ubah Nama Penyakit')


@section('judul', 'Ubah Nama Penyakit')
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
                            <form class="form" action="/ubah/nama/penyakit/{{ $namapenyakit->id }}" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="primer">Nama Penyakit</label>
                                            <input type="text" id="primer" class="form-control"
                                                 name="primer" placeholder="Nama Penyakit" value="{{ $namapenyakit['primer'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sekunder">Nama Penyakit Sekunder</label>
                                            <input type="text" id="sekunder" class="form-control"
                                                 name="sekunder" placeholder="Nama Penyakit Sekunder" value="{{ $namapenyakit['sekunder'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sub_klasifikasi_id">Sub Klasifikasi</label>
                                            <select class="choices form-select" name="sub_klasifikasi_id" id="sub_klasifikasi_id">
                                                @foreach ($subklasifikasi as $sub)
                                                <option value="{{ $sub->id }}" {{ $sub->id == $namapenyakit->sub_klasifikasi->id ? 'selected' : '' }}>{{ $sub->nama_penyakit }}</option>
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
