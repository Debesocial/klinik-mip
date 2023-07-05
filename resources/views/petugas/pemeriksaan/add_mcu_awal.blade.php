@extends('layouts.dashboard.app')

@section('title', 'Tambah MCU Awal')
@section('judul', 'Tambah MCU Awal')
@section('breadcrumb', 'add_mcu_awal')
@section('pemeriksaan', 'active')
@section('mcu', 'active')

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
                           <span class="bs-stepper-circle"><i class="bi bi-list-check"></i></span>
                           <span class="bs-stepper-label">Hasil Pemeriksaan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-check-circle"></i></i></span>
                            <span class="bs-stepper-label">Simpan Data</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form class="form needs-validation" id="form_mcu_awal" action="/pengesahan/hasil" method="post"
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
                            <div class="container">
                                <p>Silahkan masukkan hasil pemeriksaan</p>
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Hasil Rekomendasi <b class="text-danger">*</b></label>
                                            <select class="choices form-select" name="hasil_rekomendasi" id="hasil_rekomendasi">
                                                <option disabled selected>Pilih rekomendasi</option>
                                                @foreach ($hasilrekomendasi as $hasil)
                                                <option value="{{ $hasil->id }}">{{
                                                    $hasil->nama }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Hasil rekomendasi harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for=""class="form-label">Anjuran <b class="text-danger">*</b></label>
                                            <textarea type="text" id="anjuran" class="form-control" name="anjuran" required > </textarea>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Anjuran harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">File Pendukung <small class="text-warning">**File maksimal berukuran 20MB </small></label>
                                            <input type="file" name="dokumen" id="dokumen" class="form-control">
                                            {!!validasi('Ukuran file', 'terlalu besar')!!}
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
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <p>Silahkan periksa kembali data yang sudah dimasukan. Apabila data sudah
                                            sesuai, silahkan simpan data.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-7">
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
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="card-title">Hasil Pemeriksaan</h5>
                                        <table class="table table-borderless table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Hasil Rekomendasi</th>
                                                    <td id="_hasil_rekomendasi"></td>
                                                </tr>
                                                <tr>
                                                    <th>Anjuran</th>
                                                    <td id="_anjuran"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="submitform('form_mcu_awal')"><b>Simpan</b> <i class="bi bi-save"></i></button>
                            </div>
                        </div>
                    </form>
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
            $(document).ready(function() {
                $('select').select2({
                    theme: "bootstrap-5",
                    selectionCssClass: 'select2--small',
                    dropdownCssClass: 'select2--small',
                });

                $('textarea').keyup(function(event) {
                    if ($(this).hasClass('is-invalid')) {
                        $(this).removeClass('is-invalid')
                    }
                })
                $('select').change(function() {
                    if ($(this).val() !== "") {
                        $(this).removeClass('is-invalid')
                        if ($(this).attr('id')=='select_pasien_id') {
                            index = $(this).val();
                            pilihPasien(@json($pasien_id)[index])
                        }

                    }
                })

                if (selectedPasien) {
                    pas = @json($pasien_id).filter(val => val.id==parseInt(selectedPasien));
                    setPasien(pas[0]);
                    $('#select_pasien_id').attr('disabled','disabled');
                }

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
                var inputs = ['hasil_rekomendasi', 'anjuran'];
                inputs.forEach(input => {
                    var value_input = $('[name="' + input + '"]').val();
                    if (value_input == ""||value_input == ' '||value_input == null) {
                        validated = false
                        $('[name="' + input + '"]').removeClass('is-valid')
                        $('[name="' + input + '"]').addClass('is-invalid')
                    } else {
                        $('[name="' + input + '"]').removeClass('is-invalid')
                        $('[name="' + input + '"]').addClass('is-valid')
                        setReview(input, value_input);
                    }
                });
                
                if (validated === true && validasiFile(20000,'dokumen')) {
                    stepper2.next()
                }
            }

            function setReview(id, val){
                var td = $('#_'+id);
                if (id=='hasil_rekomendasi') {
                    val = $('#select2-hasil_rekomendasi-container').text();
                }
                td.text(': '+val);
            }

        </script>
    @stop

</section>
@endsection