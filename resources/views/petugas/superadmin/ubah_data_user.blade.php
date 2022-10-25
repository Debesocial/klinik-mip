@extends('layouts.dashboard.app')

@section('title', 'Ubah Data Petugas')


@section('judul', 'Ubah Data Petugas')
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
                            <form class="form" action="/ubah/data/user/{{ $user->id }}" method="post">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Petugas Nama</label>
                                            <input type="text" id="name" class="form-control"
                                                 name="name" placeholder="Nama Petugas" value="{{ $user['name'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Petugas Email</label>
                                            <input type="email" id="email" class="form-control"
                                                 name="email" value="{{ $user['email'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    

                            
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jadwal_id">Petugas Jadwal</label>
                                            <select class="choices form-select" name="jadwal_id" id="jadwal_id">
                                                @foreach ($jadwal as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $user->jadwal->id ? 'selected' : '' }}>{{ $item->hari }} shift {{ $item->shift }}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 col-12">
                                        
                                    </div>
                                    
                                    

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon</label>
                                            <input type="text" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                name="telp" value="{{ $user['telp'] }}" maxlength="13">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="level_id">Petugas Level</label>
                                            <select class="choices form-select" name="level_id" id="level_id">
                                                @foreach ($level as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $user->level->id ? 'selected' : '' }}>{{ $item->nama_level }}</option>
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
