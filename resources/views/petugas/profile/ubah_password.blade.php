@extends('layouts.dashboard.app')

@section('title', 'Ubah Kata Sandi')
@section('izinberobat', 'active')
@section('breadcrumb', 'ubah_password')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Ubah Kata Sandi')
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
                                @if (session('error'))
                                <div class="alert alert-danger">
                                {{ session('error') }}
                                </div>
                                @endif
                                @if (session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                                @endif
                                <form class="form form-horizontal" action="/ubah/password/{{$user->id }}" method="post" >
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                                            <label for="">Kata Sandi Lama <b class="color-red">*</b></label>
                                                            <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Masukkan kata sandi lama" required>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('current_password'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('current_password') }}</strong>
                                                        </span>
                                                    @endif

                                                    <div class="col-md-12">
                                                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                                            <label for="new_password">Kata Sandi Baru <b class="color-red">*</b></label>
                                                            <input type="password" id="new_password" class="form-control" name="new_password"  minlength="12" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Minimum 12 characters, at least one uppercase letter, one lowercase letter and one number (EXAMPLE : Passuser2022)" placeholder="Masukkan kata sandi baru" required>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('new_password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('new_password') }}</strong>
                                                        </span>
                                                    @endif

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Konfirmasi Kata Sandi Baru <b class="color-red">*</b></label>
                                                            <input type="password" id="new_password_confirm" class="form-control" name="new_password_confirma" placeholder="Konfirmasi kata sandi baru"  required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12"><br>
                                                        <div class="row justify-content-end">
                                                            <div class="col-4">
                                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                
                                                    
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
