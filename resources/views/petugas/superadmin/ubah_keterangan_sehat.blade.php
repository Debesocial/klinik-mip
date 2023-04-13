@extends('layouts.dashboard.app')

@section('title', 'Ubah Keterangan Sehat')
@section('keterangansehat', 'active')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset ('ref/assets/css/bootstrap.css')}}">

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="stylesheet" href="{{asset ('ref/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{asset ('ref/assets/css/app.css')}}">

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/choices.js/choices.min.css')}}" />

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="shortcut icon" href="{{asset ('ref/assets/images/favicon.svg" type="image/x-icon')}}">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Ubah Keterangan Sehat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 50%">
        <a class="list-group-item list-group-item-action active" id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien" role="tab">Data Pasien</a>
        <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list" data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>

    </div>

    <div class="tab-content text-justify">
        <div class="tab-pane fade show active" id="list-datapasien" role="tabpanel" aria-labelledby="list-datapasien-list">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="/ubah/keterangan/sehat/{{  $keterangan->id  }}" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>ID Rekam Medis Pasien</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" class="form-control" name="" id="" value="{{ $keterangan->pasien->id_rekam_medis }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Nama Pasien</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput1" class="form-control" value="{{ $keterangan->pasien->nama_pasien }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Tempat Lahir</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput2" class="form-control" value="{{ $keterangan->pasien->tempat_lahir }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Tanggal Lahir</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="date" id="myInput3" class="form-control" value="{{ $keterangan->pasien->tanggal_lahir }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Pekerjaan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput4" class="form-control" value="{{ $keterangan->pasien->pekerjaan }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Perusahaan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput5" class="form-control" value="{{ $keterangan->pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Divisi</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput6" class="form-control" value="{{ $keterangan->pasien->divisi->nama_divisi_pasien }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Jabatan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput7" class="form-control" value="{{ $keterangan->pasien->jabatan->nama_jabatan }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Jenis Kelamin</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput8" class="form-control" value="{{ $keterangan->pasien->jenis_kelamin }}" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <div class="tab-pane fade" id="list-pemeriksaan" role="tabpanel" aria-labelledby="list-pemeriksaan-list">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                            <div class="card-content">
                                <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Tinggi Badan <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" value="{{ $keterangan->tinggi_badan }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Berat Badan <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="berat_badan" id="berat_badan" value="{{ $keterangan->berat_badan }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">kg</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Suhu Tubuh <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="suhu_tubuh" id="suhu_tubuh" value="{{ $keterangan->suhu_tubuh }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">Celcius</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Tekanan Darah <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="tekanan_darah" id="tekanan_darah" value="{{ $keterangan->tekanan_darah }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">mmHg</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Denyut Nadi <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="denyut_nadi" id="denyut_nadi" value="{{ $keterangan->denyut_nadi }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">/menit</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Laju Pernapasan <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="laju_pernapasan" id="laju_pernapasan" value="{{ $keterangan->laju_pernapasan }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">/menit</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Saturasi Oksigen <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-2 form-group">
                                                            <input type="text" id="saturasi" class="form-control" name="saturasi" value="{{ $keterangan->saturasi }}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Hasil Pemeriksaan <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input class="form-check-input" type="radio" name="hasil" id="hasil" value="0" {{ !$keterangan->hasil ? "checked" : "" }}>Tidak Sehat 
                                                            <input class="form-check-input" type="radio" name="hasil" id="hasil" value="1" {{ $keterangan->hasil ? "checked" : "" }}> Sehat
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-5 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
        </div>
    </div>
</div>

<script src="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset ('ref/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Include Choices JavaScript -->
<script src="{{asset ('ref/assets/vendors/choices.js/choices.min.js')}}"></script>
<script src="{{asset ('ref/assets/js/pages/form-element-select.js')}}"></script>

{{-- <script src="{{asset ('ref/assets/js/mazer.js')}}"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>





@endsection