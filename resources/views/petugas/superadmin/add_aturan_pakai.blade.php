@extends('layouts.dashboard.app')
@section('title', 'Tambah Aturan Pakai')
@section('judul', 'Tambah Aturan Pakai')
@section('breadcrumb', 'tambah_aturan_pakai')
@section('periksa', 'active')
@section('aturan_pakai', 'active')
@section('container')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="/aturan_pakai/add" onsubmit="showLoader()" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan{!!mandatory()!!}</label>
                        <input type="text" class="form-control" name="singkatan" id="singkatan" placeholder="Masukkan singkatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="kepanjangan" class="form-label">Kepanjangan</label>
                        <input type="text" class="form-control" name="kepanjangan" id="kepanjangan" placeholder="Masukkan kepanjangan">
                    </div>
                    <div class="mb-3">
                        <label for="arti" class="form-label">Arti</label>
                        <input type="text" class="form-control" name="arti" id="arti" placeholder="Masukkan arti">
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Simpan <i class="bi bi-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection