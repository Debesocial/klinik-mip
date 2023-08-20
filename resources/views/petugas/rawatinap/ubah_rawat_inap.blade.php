@extends('layouts.dashboard.app')

@section('title', 'Ubah Data Rawat Inap')
@section('pemeriksaan', 'active')
@section('inap', 'active')
@section('breadcrumb', 'ubah_rawat_inap')
@section('judul', 'Ubah Data Rawap Inap')
@section('container')

@section('css')
    <style>
        input[type=radio] {
            transform: scale(1.5);
            margin-right: 0.3rem;
        }

        th {
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
{{-- <div hidden>{{ $rawat_inap->pasien->perusahaan->nama_perusahaan_pasien . $rawat_inap->pasien->divisi->nama_divisi_pasien . $rawat_inap->pasien->jabatan->nama_jabatan }}</div> --}}
@php
    $rawat_inap->load(['pasien', 'pasien.perusahaan', 'pasien.divisi', 'pasien.jabatan', 'pasien.keluarga', 'pasien.kategori']);
@endphp
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                                    <path
                                        d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                                    <path
                                        d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                                    <path
                                        d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z" />
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Pemeriksaan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z" />
                                    <path
                                        d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z" />
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Tindakan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-4">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                    <path
                                        d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
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
                    <form class="form needs-validation" action="/ubah/rawat/inap/{{ $rawat_inap->id }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id">
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                <div class="row mt-3" id="detail_pasien">
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
                                            <input type="date" class="form-control" name="mulai_rawat"
                                                id="mulai_rawat" max="{{ date('Y-m-d') }}"
                                                value="{{ $rawat_inap->mulai_rawat }}">
                                            {!! validasi('Mulai dirawat', 'harus diisi dan tidak boleh future date') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Berakhir Dirawat</label>
                                            <input type="date" class="form-control" name="berakhir_rawat"
                                                id="berakhir_rawat" min="{{ date('Y-m-d') }}"
                                                value="{{ $rawat_inap->berakhir_rawat }}">
                                            {!! validasi('Tanggal berakhir dirawat', 'harus sebelum atau sama dengan tanggal mulai rawat') !!}
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Anamnesis <b
                                                class="text-danger">*</b></label>
                                        <input type="text" name="anamnesis" id="anamnesis" class="form-control"
                                            value="{{ $rawat_inap->anamnesis }}">
                                        {!! validasi('Anamnesis') !!}
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <label for="" class="form-label">Tinggi Badan <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="tinggi_badan" id="tinggi_badan"
                                                    class="form-control" value="{{ $rawat_inap->tinggi_badan }}">
                                                <span class="input-group-text" id="basic-addon1">Cm</span>
                                                {!! validasi('Tinggi badan') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="" class="form-label">Berat Badan <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="berat_badan" id="berat_badan"
                                                    class="form-control" value="{{ $rawat_inap->berat_badan }}">
                                                <span class="input-group-text" id="basic-addon1">Kg</span>
                                                {!! validasi('Berat badan') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <label for="" class="form-label">Suhu Tubuh <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="suhu_tubuh" id="suhu_tubuh"
                                                    class="form-control" value="{{ $rawat_inap->suhu_tubuh }}">
                                                <span class="input-group-text" id="basic-addon1">&deg;C</span>
                                                {!! validasi('Suhu tubuh') !!}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="" class="form-label">Saturasi Oksigen <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="saturasi_oksigen" id="saturasi_oksigen"
                                                    class="form-control" value="{{ $rawat_inap->saturasi_oksigen }}">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                                {!! validasi('Saturasi oksigen') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <label for="" class="form-label">Tekanan Darah <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="tekanan_darah" id="tekanan_darah"
                                                    class="form-control" value="{{ $rawat_inap->tekanan_darah }}">
                                                <span class="input-group-text" id="basic-addon1">/</span>
                                                <input type="number" name="tekanan_darah_per" id="tekanan_darah_per"
                                                    class="form-control"
                                                    value="{{ $rawat_inap->tekanan_darah_per }}">
                                                <span class="input-group-text" id="basic-addon1">mmHg</span>
                                                {!! validasi('Tekanan darah') !!}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Denyut Nadi <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="denyut_nadi" id="denyut_nadi"
                                                    class="form-control" value="{{ $rawat_inap->denyut_nadi }}">
                                                <span class="input-group-text" id="basic-addon1">x /menit</span>
                                                {!! validasi('Denyut nadi') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Laju Pernapasan <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="laju_pernapasan" id="laju_pernapasan"
                                                    class="form-control" value="{{ $rawat_inap->laju_pernapasan }}">
                                                <span class="input-group-text" id="basic-addon1">x /menit</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Pemeriksaan Penunjang</label>
                                        <input type="text" name="pemeriksaan_penunjang" id="pemeriksaan_penunjang"
                                            class="form-control" value="{{ $rawat_inap->pemeriksaan_penunjang }}">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Obat yang sudah dikonsumsi
                                            sebelumnya</label>
                                        <textarea name="obat_konsumsi" id="obat_konsumsi" rows="3" class="form-control">{{ $rawat_inap->obat_konsumsi }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Dokumentasi Pendukung <b><small
                                                    class="text-warning">**Ukuran file maksimal
                                                    20MB</small></b></label> <br>
                                        @if (count(json_decode($rawat_inap->dokumen)) != 0)
                                            <ol>
                                                @foreach (json_decode($rawat_inap->dokumen) as $dokumen)
                                                    <li> <a href="{{ asset('pemeriksaan/rawatinap/' . $dokumen) }}"
                                                            target="blank">{{ $dokumen }}</a> <button
                                                            onclick="removeItem(this)" type="button"
                                                            class="btn btn-sm btn-outline-danger border-0"><i
                                                                class="bi bi-trash"></i></button></li>
                                                @endforeach

                                            </ol>
                                        @else
                                            <small class="text-warning">Belum ada dokumen</small>
                                        @endif
                                        <div class="row">
                                            <div class="col-10">
                                                <div id="dokumen-input">
                                                    <div class="mb-3" id="dok">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <input type="file" name="dokumen[]" id="dokumen"
                                                                    class="form-control">
                                                                {!! validasi('Ukuran file', 'terlalu besar') !!}
                                                            </div>
                                                            <div class="col-2">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 text-end">
                                                <button type="button" class="btn btn-outline-success btn-sm"
                                                    onclick="tambahDokumen()"><i class="bi bi-plus"></i></button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="old_dokumen" id="old_dokumen"
                                            value="{{ $rawat_inap->dokumen }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label for="" class="form-label">Status Lokalis <b
                                                    class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <img src="{{ asset('assets/images/body.png') }}" width="50%"
                                                    alt="" class="img-fluid magniflier">
                                                <textarea type="number" name="status_lokalis" id="status_lokalis" rows="5" class="form-control"
                                                    placeholder="Masukkan status lokalis">{{ $rawat_inap->status_lokalis }}</textarea>
                                                {!! validasi('Status lokalis') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        {{-- <div class="col">
                                            <label class="form-label">Nama Penyakit <b class="text-danger">*</b></label>
                                            <small class="text-warning"><b>**Penyakit primer adalah penyakit yang dipilih pertama</b></small>
                                            <select class="form-select"  name="nama_penyakit_id[]" multiple="multiple" id="nama_penyakit_id">
                                                
                                                @foreach ($nama_penyakit as $penyakit)
                                                    <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                                @endforeach
                                            </select>
                                            {!!validasi('Nama penyakit')!!}
                                        </div> --}}
                                    </div>
                                    <input type="hidden" name="nama_penyakit_id" id="nama_penyakit_id">
                                    <div class="text-danger" id="penyakit_kosong" hidden>Diagnosa harus diisi</div>
                                    <div class="border p-3" id="tabel_penyakit">
                                        <div class="row">
                                            <div class="col-6">
                                                <h6>Diagnosa Penyakit</h6>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick="modalPilihPenyakit()"><small><i
                                                            class="bi bi-plus-circle"></i> Tambah
                                                        Diagnosa</small></button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Penyakit</th>
                                                        <th>Blog</th>
                                                        <th>Category</th>
                                                        <th>Chapter</th>
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
                            <x-form-tindakan :tindakan="$tindakan" :alatkesehatan="$alatkesehatan" :selectedTindakan="$rawat_inap->tindakan" />
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut3()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-4" class="content">
                            <x-form-resep :obat="$obat" :satuanobat="$satuanobat" :resep="$rawat_inap->resep" />

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
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
                                                <table class="table table-borderless">
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
                                        <h6>Diaknosa Penyakit</h6>
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
                                    onclick="submitform('form-add-jalan')"><b>Simpan</b> <i
                                        class="bi bi-save"></i></button>
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
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
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

@php
    $selectedTindakan = $rawat_inap->tindakan ?? json_encode([]);
    $resep = $rawat_inap->resep ?? json_encode([]);
@endphp

@section('js')
    <script src="{{ asset('/assets/js/pilihPasien.js') }}"></script>
    <script>
        let oldDokumenPendukung = {!! $rawat_inap->dokumen !!};
        var stepper2 = new Stepper(document.querySelector('#stepper2'), {
            linear: true,
            animation: true
        })

        select2_alat = $('select#alat_kesehatan').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        select2_tindakan = $('select#nama_tindakan').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        select2_obat = $('select#nama_obat').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        select2_aturan = $('select#aturan_pakai').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        select2_dosis = $('select#dosis').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });


        let validasiPemeriksaan = true;

        $(document).ready(function() {
            $('select#select_pasien_id').select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
                tags: true,
            });


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
            drawTableDiagnodsa();
            $('select').change(function() {
                if ($(this).val() !== "") {
                    $(this).removeClass('is-invalid')
                    if ($(this).attr('id') == 'nama_obat') {
                        setSatuan($(this).val());
                    }
                }
                drawTableDiagnodsa();
            })

            $('input[class="form-check-input"]').click(function() {
                $(this).siblings('.invalid-feedback').hide()
            })

            $('#mulai_rawat').change(function() {
                $('#berakhir_rawat').attr('min', $(this).val())
            })

            $('#berakhir_rawat').keyup(function() {
                let tgl = $(this).val();
                let min = $(this).attr('min')
                if (tgl != '') {
                    selisih = getDateDiff(tgl, min, false);
                    if (selisih < 0) {
                        $(this).addClass('is-invalid')
                        $(this).removeClass('is-valid')
                        validasiPemeriksaan = false;
                    } else {
                        $(this).addClass('is-valid')
                        $(this).removeClass('is-invalid');
                        validasiPemeriksaan = true;

                    }
                }
            })
            $('#berakhir_rawat').change(function() {
                let tgl = $(this).val();
                let min = $(this).attr('min')
                if (tgl != '') {
                    selisih = getDateDiff(tgl, min, false);
                    if (selisih < 0) {
                        $(this).addClass('is-invalid')
                        $(this).removeClass('is-valid')
                        validasiPemeriksaan = false;
                    } else {
                        $(this).addClass('is-valid')
                        $(this).removeClass('is-invalid');
                        validasiPemeriksaan = true;

                    }
                } else {
                    $(this).removeClass('is-invalid');
                    validasiPemeriksaan = true;
                }
            })

            setPasien(@json($rawat_inap->pasien));
            drawformTindakan();
            drawformResep();
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
            var validated = true;
            var inputs = ['mulai_rawat', 'nama_penyakit_id', 'anamnesis', 'tinggi_badan', 'berat_badan', 'suhu_tubuh',
                'tekanan_darah', 'tekanan_darah_per', 'saturasi_oksigen', 'denyut_nadi', 'laju_pernapasan',
                'status_lokalis'
            ];
            inputs.forEach(input => {
                var value_input = $('[name="' + input + '"]').val();
                var text_input = $('[name="' + input + '"]').children('option:selected').text();

                if (value_input == "" || value_input == ' ') {
                    validated = false
                    $('[name="' + input + '"]').removeClass('is-valid')
                    $('[name="' + input + '"]').addClass('is-invalid')
                } else {
                    $('[name="' + input + '"]').removeClass('is-invalid')
                    $('[name="' + input + '"]').addClass('is-valid')
                    if (input == 'mulai_rawat') {
                        if (validateFutureDate(value_input) == false) {
                            validated = false;
                            $('[name*="' + input + '"]').removeClass('is-valid')
                            $('[name*="' + input + '"]').addClass('is-invalid')
                        }
                    }
                    setResult(input, text_input);
                }
            });
            var files = document.getElementsByName("dokumen[]");
            if (validasiPemeriksaan && validated && validasiManyFile(20000, files)) {
                stepper2.next()
            }
        }

        function setResult(id, value) {
            if (id == 'mulai_rawat' || id == 'berakhir_rawat') {
                value = tanggal($('[name="' + id + '"]').val());
            }
            $('#_berakhir_rawat').text(': ' + tanggal($('#berakhir_rawat').val()));
            $('#_' + id).text(': ' + value);
        }

        var semuaPenyakit = [];

        let selectedPenyakit = {!! json_encode($nama_penyakit) !!};
        let selectedIdPenyakit = {!! $rawat_inap->nama_penyakit_id !!};

        function drawTableDiagnodsa() {
            var n = 1;
            let html = ``;
            if (Array.isArray(selectedPenyakit)) {
                selectedPenyakit.forEach((val, index) => {
                    penyakit = val;
                    sub = val.sub_klasifikasi.nama_penyakit;
                    cat = val.category.nama_penyakit;
                    klas = val.sub_klasifikasi.klasifikasi_penyakit.klasifikasi_penyakit;
                    // console.log(penyakit);
                    html += `<tr>
                        <td>` + n + `</td>
                        <td>` + penyakit.primer;
                    if (index == 0) {
                        html += ` <span class="badge bg-success">Primer</span>`;
                    }
                    html += `</td>
                        <td>` + sub + `</td>
                        <td>` + cat + `</td>
                        <td>` + klas + `</td>
                        <td><b class="text-danger" style="cursor:pointer" onclick="deletePenyakit(${val.id})"><i class="bi bi-trash"></i></b></td>
                        </tr>`;
                    n++;
                });
                $('#nama_penyakit_id').val(JSON.stringify(selectedIdPenyakit));
                $('#body-penyakit').html(html);
                $('#_body-penyakit').html(html);
            }
        }

        function modalPilihPenyakit() {
            let url = '/modal-penyakit';
            let modal = $('#modalRawatInap2');

            tampilModalRawatInap2(url, 'Pilih Penyakit');
        }

        function addPenyakit(data) {
            selectedPenyakit.push(data);
            selectedIdPenyakit.push(data.id);

            drawTableDiagnodsa();
            hideModal('modalRawatInap2');
        }

        function deletePenyakit(id) {
            selectedPenyakit = selectedPenyakit.filter(data => data.id != id);
            selectedIdPenyakit = selectedIdPenyakit.filter(data => data != id);
            drawTableDiagnodsa();
        }
    </script>
    <script>
        function lanjut3() {
            // validated3 = true;   
            // if (tindakan.length != 0) {
            //     $('#tindakan_kosong').hide();

            // } else {
            //     $('#tindakan_kosong').show();
            //     validated3 = false;
            // }

            // if (validated3 && validasiFile(2048,'persetujuan_tindakan')) {
            //     stepper2.next();
            // }
            if (validasiFile(2048, 'persetujuan_tindakan')) {
                stepper2.next();
            }
        }
    </script>
    <script>
        function lanjut4() {
            stepper2.next();
            // if (resep.length != 0) {
            //     $('#resep_kosong').hide();
            //    stepper2.next();
            // } else {
            //     $('#resep_kosong').show();
            // }
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

        function tambahDokumen() {
            let inputDokumen = $('#dok');
            let newInput = inputDokumen.clone();
            html =
                `<button type="button" class="btn btn-outline-danger btn-sm border-0" onclick="deleteField(this)"><i class="bi bi-trash"></i></button>`;
            newInput.children('div').children('div.col-2').html(html);
            newInput.children('div').children('div').children('input').val('').removeClass(['is-valid', 'is-invalid']);
            newInput.appendTo('#dokumen-input');
        }

        function deleteField(params) {
            $(params).parentsUntil('#dok').remove();
        }

        function removeItem(item) {
            $(item).parent().remove();
            var namaDokumen = $(item).siblings('a').text();
            oldDokumenPendukung = oldDokumenPendukung.filter(function(e) {
                return e != namaDokumen
            });
            $('#old_dokumen').val(JSON.stringify(oldDokumenPendukung));
        }
    </script>
    <script src="{{ asset('assets/js/kacaPembesar.js') }}"></script>

@stop

@endsection
