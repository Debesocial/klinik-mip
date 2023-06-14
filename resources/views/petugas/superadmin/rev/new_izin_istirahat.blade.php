@extends('layouts.dashboard.app')

@section('title', 'Izin Istirahat')
@section('izinistirahat', 'active')
@section('breadcrumb', 'tambah_izin_istirahat')
@section('judul', 'Izin Istirahat')
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
                                <span class="bs-stepper-label">Terapi Tambahan</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-nl-5">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle"><i class="bi bi-check-circle"></i></i></span>
                                <span class="bs-stepper-label">Rekomendasi Dokter</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form id="form-istirahat" class="form needs-validation" action="/izin_istirahat" method="post"
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
                                                <option value="" selected>Pasien</option>
                                                @foreach ($pasien_id as $key => $pas)
                                                    <option value="{{ $key }}">
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
                                        <div class="mb-2">
                                            <label for="" class="form-label">Keluhan<b class="text-danger">*</b></label>
                                            <textarea type="number" name="keluhan" id="keluhan" rows="5" class="form-control" placeholder="Masukkan keluhan"></textarea>
                                            {!!validasi('Keluhan')!!}
                                        </div>
                                        <div class="row mb-2">
                                            <label for="" class="form-label">Diagnosa <b
                                                    class="text-danger">*</b></label>
                                            <div class="col">
                                                <select name="diagnosa" id="diagnosa" class="form-select">
                                                    <option value="" selected disabled>Pilih Penyakit</option>
                                                    @foreach ($nama_penyakit as $penyakit)
                                                        {{-- <div hidden>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->id }}</div> --}}
                                                        <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                                    @endforeach
                                                </select>
                                                {!! validasi('Diagnosa') !!}
                                                <div id="diagnosa_klasifikasi" class="mt-1" style="display: none">
                                                    <ul class="m-0">
                                                        <li><b>Subklasifikasi</b> <span id="diagnosa_sub_kla"></span></li>
                                                        <li><b>Klasifikasi</b> <span id="diagnosa_kla"></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="" class="form-label">Diagnosa Sekunder</label>
                                            <div class="col">
                                                <select name="diagnosa_sekunder" id="diagnosa_sekunder" class="form-select">
                                                    <option value="" selected>Pilih Penyakit</option>
                                                    @foreach ($nama_penyakit as $penyakit)
                                                        {{-- <div hidden>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->id }}</div> --}}
                                                        <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                                    @endforeach
                                                </select>
                                                {!! validasi('Diagnosa sekunder') !!}
                                                <div id="diagnosa_sekunder_klasifikasi" class="mt-1" style="display: none">
                                                    <ul class="m-0">
                                                        <li><b>Subklasifikasi</b> <span id="diagnosa_sekunder_sub_kla"></span></li>
                                                        <li><b>Klasifikasi</b> <span id="diagnosa_sekunder_kla"></span></li>
                                                    </ul>
                                                </div>
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
                                <input type="text" name="tindakan" id="tindakan" hidden>
                                <div class="row">
                                    <div class="col-md-6">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="" class="form-label">Keterangan <b
                                                    class="text-danger">*</b></label>
                                            <textarea name="" id="keterangan" rows="3" class="form-control"></textarea>
                                            {!! validasi('Keterangan') !!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 text-center">
                                            <button type="button" class="btn btn-success" onclick="addTindakan()"><b>Tambah <i
                                                        class="bi bi-arrow-down-circle"></i></b></button>
                                        </div>
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
                                                <tbody id="body_tindakan"></tbody>
                                            </table>
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
                                <input type="text" name="terapi" id="terapi" hidden>
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
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="rekomendasi" id="rekomendasi" value="1" checked> 
                                                <label class="form-check-label" for="rekomendasi">Dapat Bekerja Seperti Biasa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rekomendasi" id="rekomendasi" value="2">
                                                <label class="form-check-label" for="rekomendasi"> Dapat Bekerja dengan Catatan</label>
                                            </div>
                                            <div class="mb-2 ps-4" id="_2" style="display:none">
                                                <textarea type="text" id="dapat_bekerja_catatan" name="dapat_bekerja_catatan" class="form-control" placeholder="catatan"></textarea>
                                                {!!validasi('Catatan')!!}
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rekomendasi" id="rekomendasi" value="3">
                                                <label class="form-check-label" for="rekomendasi">Istirahat di MESS Karyawan <b id="total_hari"></b></label> 
                                            </div>
                                            <div class="mb-2 ps-4" id="_3" style="display:none">
                                                <label for="">Dari Tanggal</label>
                                                <input type="date" id="dari" class="form-control" name="dari" id="dari">
                                                {!!validasi('Tanggal')!!}
                                                <label for="">Sampai tanggal</label>
                                                <input type="date" id="sampai" class="form-control" name="sampai" id="sampai">
                                                {!!validasi('Tanggal')!!}

                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rekomendasi" id="rekomendasi" value="4">
                                                <label class="form-check-label" for="rekomendasi">Rujukan ke Tarakan</label>
                                            </div>
                                            <div class="mb-2 ps-4" id="_4" style="display:none">
                                                <div class="">
                                                    <label for="">Dokter Spesialis Rujukan</label>
                                                    <select name="spesialis_rujukan_id" id="spesialis_rujukan_id" class="choices form-select" required>
                                                        <option disabled selected>Pilih Dokter Spesialis</option>
                                                        @foreach ($spesialisrujukan as $spesialis)
                                                            <option value="{{ $spesialis['id'] }}">{{ $spesialis['nama_spesialis_rujukan'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="">
                                                    <label for="">Rumah Sakit Rujukan</label>
                                                    <select name="rumah_sakit_rujukan_id" id="rumah_sakit_rujukan_id" class="choices form-select" required>
                                                        <option disabled selected>Pilih Rumah Sakit</option>
                                                        @foreach ($rsrujukan as $rs)
                                                            <option value="{{ $rs['id'] }}">{{ $rs['nama_RS_rujukan'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Dokter Yang Memeriksa</label><br>
                                                <input class="form-check-input" type="radio" name="ttd" id="ttd" value="1"> Tanda Tangan
                                                <input class="form-check-input ms-3" type="radio" name="ttd" id="ttd" value="0" checked> Tanda Tangan Tersimpan
                                            </div>
                                            
                                        </div>
                                    </div> 
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary rounded-pill"
                                        onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                        <b>Sebelumnya</b></button>
                                    <button type="button" class="btn btn-primary rounded-pill"
                                        onclick="lanjut5()"><b>Simpan</b> <i class="bi bi-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalRawatInap2" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modalRawatInap2Label" aria-hidden="true">
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
                $('select').change(function() {
                    if ($(this).val() !== "") {
                        $(this).removeClass('is-invalid');
                        if ($(this).attr('id')=='nama_obat') {
                            setSatuan($(this).val());
                        }
                        if ($(this).attr('id')=='select_pasien_id') {
                            index = $(this).val();
                            pilihPasien(@json($pasien_id)[index])
                        }
                    }
                    
                })

                $('input[class="form-check-input"]').click(function() {
                    $(this).siblings('.invalid-feedback').hide()
                })
                var namapenyakit = @json($nama_penyakit);
                $('#diagnosa').change(function() {
                    var id = $(this).val();
                    var penyakit = namapenyakit.find(data => data.id == id);
                    $('#diagnosa_sub_kla').text(penyakit.sub_klasifikasi.nama_penyakit);
                    $('#diagnosa_kla').text(penyakit.sub_klasifikasi.klasifikasi_penyakit.klasifikasi_penyakit);
                    $('#diagnosa_klasifikasi').show();
                })
                $('#diagnosa_sekunder').change(function() {
                    var id = $(this).val();
                    if (id==''||id==null) {
                        $('#diagnosa_sekunder_klasifikasi').hide();
                    }else{
                        var penyakit = namapenyakit.find(data => data.id == id);
                        $('#diagnosa_sekunder_sub_kla').text(penyakit.sub_klasifikasi.nama_penyakit);
                        $('#diagnosa_sekunder_kla').text(penyakit.sub_klasifikasi.klasifikasi_penyakit.klasifikasi_penyakit);
                        $('#diagnosa_sekunder_klasifikasi').show();
                    }
                    
                })

                $('[id*="rekomendasi"]').change(function(){
                    val = $(this).val();
                     for (let i = 2; i <= 4; i++) {
                        $('#_'+i).hide();
                     }
                     cek = ['dapat_bekerja_catatan', 'dari','sampai','spesialis_rujukan_id','rumah_sakit_rujukan_id'];
                     
                     cek.forEach(input => {
                        $('#'+input).val('');
                        if (input == 'dapat_bekerja_catatan') {
                            $('#'+input).text('');
                        }
                     });
                    if(val==2) {
                        $('#_'+val).show();
                    }else if(val==3){
                        $('#_'+val).show();
                    }else if(val==4){
                        $('#_'+val).show();
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
                var validated = true;
                // console.log($('#nama_penyakit_id').val());
                var inputs = ['diagnosa','keluhan'];
                inputs.forEach(input => {
                    var value_input = $('[name*="' + input + '"]').val();                    
                    var text_input = $('[name*="' + input + '"]').children('option:selected').text();                    

                    if (value_input == ""||value_input == ' '||value_input==null) {
                        validated = false
                        $('[name*="' + input + '"]').removeClass('is-valid')
                        $('[name*="' + input + '"]').addClass('is-invalid')
                    } else {
                        $('[name*="' + input + '"]').removeClass('is-invalid')
                        $('[name*="' + input + '"]').addClass('is-valid')
                        setResult(input, text_input);
                    }
                });
                
                if (validated === true) {
                    stepper2.next()
                }
            }

            function setResult(id, value) {
                if (id=='tanggal_berobat') {
                    value = tanggal($('#'+id).val());
                }
                $('#_'+id).text(': '+value);
            }
        </script>
        <script>
            function lanjut3() {
                let validated = true;
                let tindakanval = $('#tindakan').val();
                if (tindakanval==null||tindakanval=='') {
                    $('#tindakan_kosong').show()
                    validated = false;
                }
                if (validated==true) {
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

            id_resep = ['nama_obat', 'jumlah_obat', 'aturan_pakai', 'keterangan_resep'];
            resep = [];
            var satuanobat = @json($satuanobat);
            var obat = @json($obat);
            var resepSelected = {};
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
                $('#terapi').val(JSON.stringify(resep));
                $('#body_resep').html(html);
            }

            function clearformResep() {
                id_resep.forEach(id => {
                    form = $('#' + id);
                    if (id == 'nama_obat') {
                        select2_obat.val('').trigger('change');
                        $('#satuan_obat').text('Satuan');
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
        <script>
            let lanjut5Input=[];
            function lanjut5(){
                val = $('#rekomendasi:checked').val();
                validated = true;
                if (val == 2) {
                    lanjut5Input = ['dapat_bekerja_catatan'];
                }else if(val == 3){
                    lanjut5Input = ['dari', 'sampai'];
                }else if(val == 4){
                    lanjut5Input = ['spesialis_rujukan_id','rumah_sakit_rujukan_id'];
                }
                if (lanjut5Input.length!=0) {
                    lanjut5Input.forEach(input => {
                        form = $('#'+input);
                        if (form.val()==null||form.val()=='') {
                            form.addClass('is-invalid');
                            form.removeClass('is-valid');
                            validated = false;
                        }else{
                            form.addClass('is-valid');
                            form.removeClass('is-invalid');
                        }
                    });
                }
                if(validated==true){
                    submitform('form-istirahat');
                }
            }
        </script>
    @stop

@endsection