@extends('layouts.dashboard.app')

@section('title', 'Data Rawat Inap')
@section('pemeriksaan', 'active')
@section('inap', 'active')
@section('breadcrumb', 'tambah_rawat_inap')
@section('judul', 'Data Rawap Inap')
@section('container')


@section('css')
    <style>
        input[type=radio] {
            transform: scale(1.5);
            margin-right: 0.3rem;
        }
        
        th{
            white-space: nowrap;
            vertical-align: top;
        }
        .glass {
            width: 150px;
            height: 150px;
            position: absolute;
            border-radius: 50%;
            cursor: crosshair;
            z-index: 99;
            
            /* Multiple box shadows to achieve the glass effect */
            box-shadow:
                0 0 0 7px rgba(255, 255, 255, 0.85),
                0 0 7px 7px rgba(0, 0, 0, 0.25), 
                inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
            
            /* hide the glass by default */
            display: none;
        }
    </style>
@stop

<section>
    <div class="card">
        <div class="card-body">
            <div id="stepper2" class="bs-stepper">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#test-nl-1">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-person-fill"></i></span>
                            <span class="bs-stepper-label">Pilih Pasien</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-2">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                    <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Pemeriksaan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
                                    <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Tindakan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-4">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                    <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Resep Obat</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-5">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-check-circle"></i></i></span>
                            <span class="bs-stepper-label">Simpan Data</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form id="form-add-jalan" class="form needs-validation" action="/add/rawat/inap" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id">
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Silahkan pilih Pasien berdasarkan <b>ID rekam
                                                medis</b><b class="color-red"> *</b></label>
                                        <select id="select_pasien_id" class="form-select" required>
                                            <option value="">Pasien</option>
                                            @foreach ($pasien_id as $key => $pas)
                                                <option value="{{ $key }}" {{$pas->id == $selected_pasien?'selected':''}}>
                                                    {{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Silahkan pilih salah satu pasien.
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3" id="detail_pasien" style="display: none">
                                    <div class="col">
                                        {!! detailPasienPemeriksaan() !!}
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <div></div>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut1()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-2" class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Mulai Dirawat <b class="text-danger">*</b></label>
                                            <input type="date" class="form-control" name="mulai_rawat" id="mulai_rawat">
                                            {!!validasi('Mulai dirawat')!!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Berakhir Dirawat</label>
                                            <input type="date" class="form-control" name="berakhir_rawat" id="berakhir_rawat" min="{{date('Y-m-d')}}">
                                            {!!validasi('Tanggal berakhir dirawat', 'harus sebelum atau sama dengan tanggal mulai rawat')!!}
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Anamnesis <b class="text-danger">*</b></label>
                                        <input type="text" name="anamnesis" id="anamnesis" class="form-control">
                                        {!!validasi('Anamnesis')!!}
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <label for="" class="form-label">Tinggi Badan <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">Cm</span>
                                                {!!validasi('Tinggi badan')!!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="" class="form-label">Berat Badan <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="berat_badan" id="berat_badan" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">Kg</span>
                                                {!!validasi('Berat badan')!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <label for="" class="form-label">Suhu Tubuh <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="suhu_tubuh" id="suhu_tubuh" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">&deg;C</span>
                                                {!!validasi('Suhu tubuh')!!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="" class="form-label">Saturasi Oksigen <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="saturasi_oksigen" id="saturasi_oksigen" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">mmHg</span>
                                                {!!validasi('Saturasi oksigen')!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label for="" class="form-label">Tekanan Darah <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="tekanan_darah" id="tekanan_darah" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">/</span>
                                                <input type="number" name="tekanan_darah_per" id="tekanan_darah_per" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">mmHg</span>
                                                {!!validasi('Tekanan darah')!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Denyut Nadi <b class="text-danger">*</b></label>
                                        <div class="input-group">
                                            <input type="number" name="denyut_nadi" id="denyut_nadi" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">/</span>
                                            <input type="number" name="denyut_nadi_menit" id="denyut_nadi_menit" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">menit</span>
                                            {!!validasi('Denyut nadi')!!}
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Laju Pernapasan <b class="text-danger">*</b></label>
                                        <div class="input-group">
                                            <input type="number" name="laju_pernapasan" id="laju_pernapasan" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">/</span>
                                            <input type="number" name="laju_pernapasan_menit" id="laju_pernapasan_menit" class="form-control">
                                            <span class="input-group-text" id="basic-addon1">menit</span>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Pemeriksaan Penunjang</label>
                                        <input type="text" name="pemeriksaan_penunjang" id="pemeriksaan_penunjang" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Obat yang sudah dikonsumsi sebelumnya</label>
                                        <textarea name="obat_konsumsi" id="obat_konsumsi"  rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Dokumentasi Pendukung <b><small class="text-warning">**Ukuran file maksimal 20MB</small></b></label>
                                        <input type="file" name="dokumen" id="dokumen" class="form-control">
                                        {!!validasi('Ukuran file','terlalu besar')!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label for="" class="form-label">Status Lokalis <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <img src="{{asset('assets/images/body.png')}}" width="50%" alt="" class="img-fluid magniflier"> 
                                                <textarea type="number" name="status_lokalis" id="status_lokalis" rows="5" class="form-control" placeholder="Masukkan status lokalis"></textarea>
                                                {!!validasi('Status lokalis')!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="form-label">Nama Penyakit <b class="text-danger">*</b></label>
                                            <select class="js-states form-control"  name="nama_penyakit_id[]" multiple="multiple" id="nama_penyakit_id">
                                                <option value=""></option>
                                                @foreach ($nama_penyakit as $penyakit)
                                                    <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                                @endforeach
                                            </select>
                                            {!!validasi('Nama penyakit')!!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h6>Diagnosa Penyakit</h6>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Penyakit</th>
                                                        <th>Sub-Klasifikasi</th>
                                                        <th>Klasifikasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body-penyakit">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut2()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-3" class="content">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="">Surat Persetujuan Tindakan Medis <small class="text-warning"><b>**File maksimal berukuran 2MB</b></small></label> 
                                    <input type="file" name="persetujuan_tindakan" id="persetujuan_tindakan" class="form-control">
                                    {!! validasi('Ukuran file','terlalu besar')!!}
                                </div>
                            </div>
                            <div class="p-3 mb-3 border">
                                <input type="text" name="tindakan" id="tindakan" hidden>
                                <div class="row">
                                    <div class="col-5">
                                        <div class="row">
                                            <div class="col my-auto">
                                                <div class="mb-2">
                                                    <label for="" class="form-label">Nama Tindakan <b
                                                            class="text-danger">*</b></label>
                                                    <input type="text" name="" id="nama_tindakan" class="form-control">
                                                    {!! validasi('Nama') !!}
                                                </div>
                                                <div class="mb-2">
                                                    <label for="" class="form-label">Nama Alat Kesehatan <b
                                                            class="text-danger">*</b></label>
                                                    <select name="" id="alat_kesehatan" class="form-select">
                                                        <option value="" selected disabled>Pilihi alat kesehatan </option>
                                                        @foreach ($alatkesehatan as $alat)
                                                            <option value="{{ $alat->id }}">{{ $alat->nama_alkes }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {!! validasi('Alat Kesehatan') !!}
                                                </div>
                                                <div class="mb-2">
                                                    <label for="" class="form-label">Jumlah Pengguna Alat Kesehatan <b
                                                            class="text-danger">*</b></label>
                                                    <input type="number" name="" id="jumlah_pengguna" class="form-control">
                                                    {!! validasi('Jumlah Pengguna') !!}
                                                </div>
                                                <div class="mb-2">
                                                    <label for="" class="form-label">Keterangan <b
                                                            class="text-danger">*</b></label>
                                                    <textarea name="" id="keterangan" rows="3" class="form-control"></textarea>
                                                    {!! validasi('Keterangan') !!}
                                                </div>
            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 my-auto">
                                        <div class="mb-3 text-center">
                                            <button type="button" class="btn btn-success" onclick="addTindakan()"><b> <i
                                                        class="bi bi-arrow-right-circle"></i></b></button>
                                        </div>
                                    </div>
                                    <div class="col-6 border">
                                        <div class="row">
                                            <div class="col py-3">
                                                
                                                <div class="table-responsive">
                                                    <span id="tindakan_kosong" class="text-danger" style="display: none">Tindakan tidak
                                                        boleh kosong</span>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Tindakan</th>
                                                                <th>Alat Kesehatan</th>
                                                                <th>Jumlah Pengguna</th>
                                                                <th>Keterangan</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="body_tindakan">
                                                            <tr>
                                                                <td colspan="5" style="height: 300px">
                                                                    <h4 class="text-center" style="color: rgba(0, 0, 0, 0.10)">
                                                                        Isi tabel tindakan dengan memasukkan data di form sebelah kiri.
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()"><i
                                        class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut3()"><b>Selanjutnya</b> <i class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-4" class="content">
                            <input type="text" name="resep" id="resep" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Nama Obat <b
                                                class="text-danger">*</b></label>
                                        <select id="nama_obat" class="form-select">
                                            <option value="">Pilih Obat</option>
                                            @foreach ($obat as $ob)
                                                <option value="{{$ob->id}}">{{$ob->nama_obat}}</option>
                                            @endforeach
                                        </select>
                                        {!! validasi('Nama obat') !!}
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Jumlah Obat <b
                                                class="text-danger">*</b></label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <input type="number" id="jumlah_obat" class="form-control">
                                                        <span class="input-group-text" id="satuan_obat">Satuan</span>
                                                        {!! validasi('Jumlah obat') !!}
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Aturan Pakai <b
                                                class="text-danger">*</b></label>
                                        <input type="text" id="aturan_pakai" class="form-control">
                                        {!! validasi('Aturan pakai') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Keterangan<b
                                                class="text-danger">*</b></label>
                                        <textarea id="keterangan_resep" class="form-control"></textarea>
                                        {!! validasi('Aturan pakai') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col text-center">
                                    <button type="button" class="btn btn-success" onclick="addResep()"><b>Tambah <i
                                                class="bi bi-arrow-down-circle"></i></b></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span id="resep_kosong" class="text-danger" style="display: none">Resep tidak boleh
                                        kosong</span>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Obat</th>
                                                    <th>Obat</th>
                                                    <th>Aturan Pakai</th>
                                                    <th>Keterangan</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_resep">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()"><i
                                        class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill" onclick="lanjut4()"><i
                                        class="bi bi-save"></i> <b>Selanjutnya</b></button>
                            </div>
                        </div>
                        <div id="test-nl-5" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p>Silahkan periksa kembali data yang sudah dimasukan. Apabila data sudah
                                            sesuai, silahkan simpan data.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <h5 class="card-title">Biodata Pasien</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless" >
                                                    <tbody>
                                                        <tr>
                                                            <th>Nama Pasien</th>
                                                            <td id="nama"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>ID Rekam Medis</th>
                                                            <td id="rekam_medis"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tempat Tanggal Lahir</th>
                                                            <td id="ttl"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat</th>
                                                            <td id="alamat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pekerjaan</th>
                                                            <td id="pekerjaan"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Mulai Dirawat</th>
                                                            <td id="_mulai_rawat">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Berakhir Dirawat
                                                            </th>
                                                            <td id="_berakhir_rawat">

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Diagnosa Penyakit</h6>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Penyakit</th>
                                                        <th>Sub-Klasifikasi</th>
                                                        <th>Klasifikasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="_body-penyakit">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="submit" class="btn btn-primary rounded-pill"
                                    onclick="submitform('form-add-jalan')"><b>Simpan</b> <i class="bi bi-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalRawatInap2" data-bs-backdrop="static" data-bs-keyboard="false"
aria-labelledby="modalRawatInap2Label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalRawatInap2_title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalRawatInap2_body">
            ...
        </div>
        
    </div>
</div>
</div>

@section('js')
<script src="{{asset('/assets/js/pilihPasien.js')}}"></script>
    <script>
        var stepper2 = new Stepper(document.querySelector('#stepper2'), {
            linear: true,
            animation: true
        })
        var selectedPasien = "{{$selected_pasien}}";
        let validasiPemeriksaan = true;
        // stepper2.to(3);
        select2_alat = $('select#alat_kesehatan').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        select2_obat =$('select#nama_obat').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        $(document).ready(function() {
            $('select').select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
                tags: true,
            });
            $("select").on("select2:select", function (evt) {
                var element = evt.params.data.element;
                var $element = $(element);
                
                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });
            $('#nama_penyakit_id').select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
            })

            $('input').keyup(function(event) {
                if ($(this).hasClass('is-invalid')) {
                    $(this).removeClass('is-invalid')
                }
            })
            $('input').change(function(event) {
                if ($(this).hasClass('is-invalid')) {
                    $(this).removeClass('is-invalid')
                }
            })
            var pasien = @json($pasien_id);
            $('select').change(function() {
                var id = $(this).val();
                if (id != null || id != '') {
                    $(this).removeClass('is-invalid');
                    if ($(this).attr('id')=='nama_obat') {
                        setSatuan($(this).val());
                    }
                    if ($(this).attr('id')=='select_pasien_id') {
                        index = $(this).val();
                        pilihPasien(pasien[index])
                        
                    }

                }
                drawTableDiagnodsa();
            })
            if (selectedPasien) {
                pas = pasien.filter(val => val.id==parseInt(selectedPasien));
                setPasien(pas[0]);
                drawTableDiagnodsa();
                $('#select_pasien_id').attr('disabled','disabled');
            }

            $('input[class="form-check-input"]').click(function() {
                $(this).siblings('.invalid-feedback').hide()
            })

            $('#mulai_rawat').change(function(){
                $('#berakhir_rawat').attr('min',$(this).val())
            })

            $('#berakhir_rawat').keyup(function(){
                let tgl = $(this).val();
                let min = $(this).attr('min')
                if(tgl!=''){
                    selisih = getDateDiff(tgl, min, false);
                    if (selisih < 0) {
                        $(this).addClass('is-invalid')
                        $(this).removeClass('is-valid')
                        validasiPemeriksaan = false;
                    }else{
                        $(this).addClass('is-valid')
                        $(this).removeClass('is-invalid');
                        validasiPemeriksaan = true;

                    }
                }
            })
            $('#berakhir_rawat').change(function(){
                let tgl = $(this).val();
                let min = $(this).attr('min')
                if(tgl!=''){
                    selisih = getDateDiff(tgl, min, false);
                    if (selisih < 0) {
                        $(this).addClass('is-invalid')
                        $(this).removeClass('is-valid')
                        validasiPemeriksaan = false;
                    }else{
                        $(this).addClass('is-valid')
                        $(this).removeClass('is-invalid');
                        validasiPemeriksaan = true;

                    }
                }else{
                    $(this).removeClass('is-invalid');
                    validasiPemeriksaan = true;
                }
            })
        });

        function lanjut1() {
            var pasien_index = $('#select_pasien_id').val();
            if (pasien_index == "") {
                $('#select_pasien_id').removeClass('is-valid')
                $('#select_pasien_id').addClass('is-invalid')
            } else {
                $('#select_pasien_id').removeClass('is-invalid')
                $('#select_pasien_id').addClass('is-valid')
                stepper2.next()
            }
        }

        function lanjut2() {
            validated = true;
            // console.log($('#nama_penyakit_id').val());
            var inputs = ['mulai_rawat', 'nama_penyakit_id', 'anamnesis', 'tinggi_badan', 'berat_badan', 'suhu_tubuh', 'tekanan_darah', 'tekanan_darah_per', 'saturasi_oksigen', 'denyut_nadi', 'denyut_nadi_menit', 'laju_pernapasan', 'laju_pernapasan_menit', 'status_lokalis'];
            inputs.forEach(input => {
                var value_input = $('[name*="' + input + '"]').val();                    
                var text_input = $('[name*="' + input + '"]').children('option:selected').text();                    

                if (value_input == ""||value_input == ' ') {
                    $('[name*="' + input + '"]').removeClass('is-valid')
                    $('[name*="' + input + '"]').addClass('is-invalid')
                    validated = false;
                } else {
                    $('[name*="' + input + '"]').removeClass('is-invalid')
                    $('[name*="' + input + '"]').addClass('is-valid')
                    setResult(input, text_input);
                    // validasiPemeriksaan = true;
                }
            });
            
            if (validasiPemeriksaan && validasiFile(20000,'dokumen') && validated) {
                stepper2.next()
            }
        }
        function setResult(id, value) {
            if(id=='mulai_rawat'){
                value = tanggal($('[name*="' + id + '"]').val()); 
            }
            $('#_berakhir_rawat').text(': '+($('#berakhir_rawat').val()?tanggal($('#berakhir_rawat').val()):'-'))
            $('#_'+id).text(': '+value);
        }

        var semuaPenyakit = {!! json_encode($nama_penyakit) !!};
        var subKlasifikasi = {!! json_encode($subKlasifikasi) !!};
        var klasifikasi = {!! json_encode($klasifikasi) !!};
        function drawTableDiagnodsa() {
            var value = $('#nama_penyakit_id').val();
            var html = ``;
            var n=1;
            value.forEach(val => {
                penyakit = semuaPenyakit.find(data => data.id == val);
                sub = subKlasifikasi.find(data => data.id == penyakit.sub_klasifikasi_id);
                klas = klasifikasi.find(data => data.id == sub.klasifikasi_penyakit_id);
                // console.log(penyakit);
                html += `<tr>
                    <td>`+n+`</td>
                    <td>`+penyakit.primer+`</td>
                    <td>`+ sub.nama_penyakit +`</td>
                    <td>`+ klas.klasifikasi_penyakit +`</td>
                    </tr>`;
                    n++;
            });
            $('#body-penyakit').html(html);
            $('#_body-penyakit').html(html);
        }
    </script>
    <script>
        function lanjut3() {
            validated3 = true;
            if (tindakan.length != 0) {
                $('#tindakan_kosong').hide();
                
            } else {
                $('#tindakan_kosong').show();
                validated3 = false;
            }

            if (validated3 && validasiFile(2048,'persetujuan_tindakan')) {
                stepper2.next();
            }
        }

        var alkes = @json($alatkesehatan);
        var tindakan = [];
        var id_tindakan = ['nama_tindakan', 'alat_kesehatan', 'jumlah_pengguna', 'keterangan'];

        function addTindakan() {
            var temp = {};
            var validated = true;
            id_tindakan.forEach(id => {
                form = $('#' + id)
                if (form.val() == null || form.val() == '') {
                    form.addClass('is-invalid');
                    form.removeClass('is-valid');
                    validated = false;
                } else {
                    form.addClass('is-valid');
                    form.removeClass('is-invalid');
                    temp[id] = form.val();
                }
            });
            if (validated == true) {
                tindakan.push(temp)
                drawformTindakan();
                tindakanSelected = {};
            }
            return validated;
        }

        function clearformTindakan() {
            id_tindakan.forEach(id => {
                form = $('#' + id);
                if (id == 'alat_kesehatan') {

                    form.val('').trigger('change');
                }
                form.removeClass('is-valid');
                form.val('');
            })
        }

        function drawformTindakan() {
            html = ``;
            tindakan.forEach((data, key) => {
                var namaalkes = alkes.find(nama => nama.id == data.alat_kesehatan);
                html += `<tr> 
                        <td>` + data.nama_tindakan + `</td>
                        <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/alkes/`+namaalkes.id+`', 'Detail Alat Kesehatan')">` + namaalkes.nama_alkes + `</td>
                        <td>` + data.jumlah_pengguna + `</td>
                        <td>` + data.keterangan + `</td>
                        <td><b class="text-warning" style="cursor:pointer" onclick="editTindakan(` + key + `)"><i class="bi bi-pencil-square"></i></b> <b class="text-danger" style="cursor:pointer" onclick="deleteTindakan(` + key + `)"><i class="bi bi-trash"></i></b></td>
                        </tr>`;
            })
            clearformTindakan();
            $('#tindakan').val(JSON.stringify(tindakan));
            $('#body_tindakan').html(html);
        }

        function deleteTindakan(id) {
            delete tindakan[id];
            tindakan = tindakan.filter(function(x) {
                return x !== null
            });
            drawformTindakan();
        }

        tindakanSelected={}
        function editTindakan(id){
            temp = tindakan[id];
            deleteTindakan(id);
            if(Object.keys(tindakanSelected).length !== 0){
                tindakan.push(tindakanSelected);
                drawformTindakan();
            }
            tindakanSelected = temp;
            id_tindakan.forEach(idt => {
                form = $('#'+idt);
                if (idt!='alat_kesehatan') {
                    form.val(temp[idt]);
                } else {
                    form.children().removeAttr('selected');
                    select2_alat.val(temp.alat_kesehatan).trigger('change');
                }
            });
        }

    </script>
    <script>
        function lanjut4() {
            if (resep.length != 0) {
                $('#resep_kosong').hide();
               stepper2.next();
            } else {
                $('#resep_kosong').show();
            }
        }

        id_resep = ['nama_obat', 'jumlah_obat','aturan_pakai', 'keterangan_resep'];
        resep = [];
        var satuanobat = @json($satuanobat);
        var obat = @json($obat);
        let resepSelected = {};
        function addResep() {
            var temp = {};
            var validated = true;
            id_resep.forEach(id => {
                form = $('#' + id)
                if (form.val() == null || form.val() == '') {
                    form.addClass('is-invalid');
                    form.removeClass('is-valid');
                    validated = false;
                } else {
                    form.addClass('is-valid');
                    form.removeClass('is-invalid');
                    temp[id] = form.val();
                }
            });
            if (validated == true) {
                resep.push(temp)
                drawformResep();
                resepSelected = {};
            }
        }

        function drawformResep() {
            html = ``;
            resep.forEach((data, key) => {
                namaobat = obat.find(ob => ob.id == data.nama_obat); 
                satuan = satuanobat.find(st => st.id == namaobat.satuan_obat_id);
                html += `<tr> 
                            <td> <a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/obat/`+namaobat.id+`', 'Detail Obat')">` + namaobat.nama_obat + `</a></td>
                            <td>` + data.jumlah_obat + ` ` + satuan.satuan_obat + `</td>
                            <td>` + data.aturan_pakai + `</td>
                            <td>` + data.keterangan_resep + `</td>
                            <td><b class="text-warning" style="cursor:pointer" onclick="editResep(` + key + `)"><i class="bi bi-pencil-square"></i></b> <b class="text-danger" style="cursor:pointer" onclick="deleteResep(` + key + `)"><i class="bi bi-trash"></i></b></td>
                        </tr>`;
            })
            clearformResep();
            $('#resep').val(JSON.stringify(resep));
            $('#body_resep').html(html);
        }

        function clearformResep() {
            id_resep.forEach(id => {
                form = $('#' + id);
                if (id == 'nama_obat') {
                    select2_obat.val(null).trigger('change');
                }
                form.removeClass('is-valid');
                form.val('');
            })
        }

        function deleteResep(id) {
            delete resep[id];
            resep = resep.filter(function(x) {
                return x !== null
            });
            drawformResep();
        }

        function editResep(id){
            temp = resep[id];
            deleteResep(id);
            if(Object.keys(resepSelected).length !== 0){
                resep.push(resepSelected);
                drawformResep();
            }
            resepSelected = temp;
            id_resep.forEach(idt => {
                form = $('#'+idt);
                if (idt!='nama_obat') {
                    form.val(temp[idt]);
                } else {
                    form.children().removeAttr('selected');
                    select2_obat.val(temp.nama_obat).trigger('change');
                }
            });
        }
        function setSatuan(i) {
            if (i==null || i=='') {
                $('#satuan_obat').text('Satuan');
            }else{
                namaobat = obat.find(ob => ob.id == i);
                satuan = satuanobat.find(st => st.id == namaobat.satuan_obat_id);
                $('#satuan_obat').text(satuan.satuan_obat);
            }
        }
        function tampilModalRawatInap2(url, title) {
            var modal = $('#modalRawatInap2');

            $('#modalRawatInap2_title').text(title);
            var request = $.ajax({
                method: 'GET',
                url: url,
            });
            request.done(function(html) {
                $('#modalRawatInap2_body').html(html);
            })

            modal.modal('show');
        }

        function hideModal(id) {
            var modal = $('#' + id);
            modal.modal('hide');
        }
    </script>
    <script src="{{asset('assets/js/kacaPembesar.js')}}"></script>
@stop
    
@endsection
