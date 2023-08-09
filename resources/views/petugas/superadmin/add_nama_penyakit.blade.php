@extends('layouts.dashboard.app')
@section('title', 'Add Nama Penyakit')
@section('judul', 'Tambah Nama Penyakit')
@section('breadcrumb', 'tambah_nama_penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('dia', 'active')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/add/nama/penyakit" onsubmit="showLoader()" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="primer">Nama Penyakit <b class="color-red">*</b></label>
                                            <input type="text" id="primer" class="form-control" name="primer" placeholder="Masukkan nama penyakit" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Sub Klasifikasi<b class="color-red">*</b></label>
                                            <select class="choices form-select" name="sub_klasifikasi_id" id="sub_klasifikasi_id" required>
                                                <option value="">Pilih Sub-Klasifikasi</option>
                                                @foreach ($subklasifikasi as $sub)
                                                <option value="{{ $sub->id }}">{{ $sub->nama_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="klasifikasi_penyakit_id">Category<b class="color-red">*</b></label>
                                            <select class="choices form-select" name="category_id" id="category_id" required>
                                                <option value="">Pilih Category</option>
                                                @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->nama_penyakit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="primer">Pengertian</label>
                                            <textarea type="text" id="pengertian" class="form-control" name="pengertian" placeholder="Masukkan pengertian"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row ">
                                            <div class="col text-end">
                                                <button type="submit" class=" btn btn-primary "><i class="bi bi-save"></i> Simpan</button>
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

@section('js')
<script>
    $('#sub_klasifikasi_id').select2({
        theme: 'bootstrap-5',
        selectionCssClass: "select2--small",
        dropdownCssClass: "select2--small",
    });
    $('#category_id').select2({
        theme: 'bootstrap-5',
        selectionCssClass: "select2--small",
        dropdownCssClass: "select2--small",
    });
</script>
@stop

@endsection