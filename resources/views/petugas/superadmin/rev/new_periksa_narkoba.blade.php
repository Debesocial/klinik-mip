@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkotika')
@section('breadcrumb', 'tambah_pemeriksaan_narkoba')
@section('pemeriksaan', 'active')
@section('narko', 'active')

@section('judul', 'Tambah Pemeriksaan Narkotika')
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
                            <span class="bs-stepper-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                    <path
                                        d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                </svg></span>
                            <span class="bs-stepper-label">Penggunaan Obat</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-list-check"></i></span>
                            <span class="bs-stepper-label">Hasil Test Urin</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-4">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-check-circle"></i></i></span>
                            <span class="bs-stepper-label">Simpan Data</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form class="form needs-validation" id="form-narkoba" action="/periksa/narkoba" method="post"
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
                                                <option value="{{ $key }}" {{$pas->id == $selected_pasien?'selected':''}}>{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
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
                                <div class="row mb-3">
                                    <div class="col" id="pertanyaan-obatobatan">
                                        <p class="">Apakah pasien ada menggunakan obat-obatan dalam <b>seminggu
                                                terakhir</b> <b class="color-red"> *</b></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="obat-obatan"
                                                id="obat-obatan1" value="tidak" checked>
                                            <label class="form-check-label" for="obat-obatan1">
                                                Tidak
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="obat-obatan"
                                                id="obat-obatan2" value="ya">
                                            <label class="form-check-label" for="obat-obatan2">
                                                Ya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="form-obatobatan" style="display: none;">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Penggunaan obat-obatan seminggu terakhir <b
                                                            class="color-red"> *</b></label>
                                                    <textarea type="text" id="penggunaan_obat" class="form-control"
                                                        name="penggunaan_obat" placeholder="Masukkan obat-obatan seminggu terakhir"></textarea>
                                                    <div class="invalid-feedback" id="inval_penggunaan_obat">
                                                        Cara penggunaan obat harus diisi
                                                    </div>
                                                    <div class="valid-feedback" id="val_penggunaan_obat">
                                                        Data sudah benar
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Obat <b class="color-red">
                                                            *</b></label>
                                                    <input type="text" id="jenis_obat" class="form-control"
                                                        name="jenis_obat" placeholder="Masukkan jenis obat">
                                                    <div class="invalid-feedback" id="inval_jenis_obat">
                                                        Jenis obat harus diisi
                                                    </div>
                                                    <div class="valid-feedback" id="val_jenis_obat">
                                                        Data sudah benar
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Asal Obat <b class="color-red">
                                                            *</b></label>
                                                    <input type="text" id="asal_obat" class="form-control"
                                                        name="asal_obat" placeholder="Masukkan asal obat">
                                                    <div class="invalid-feedback" id="inval_asal_obat">
                                                        Asal obat harus diisi
                                                    </div>
                                                    <div class="valid-feedback" id="val_asal_obat">
                                                        Data sudah benar
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Terakhir Digunakan <b class="color-red">
                                                            *</b></label>
                                                    <input type="text" id="terakhir_digunakan"
                                                        class="form-control" name="terakhir_digunakan"
                                                        placeholder="Terakhir Digunakan">
                                                    <div class="invalid-feedback" id="inval_terakhir_digunakan">
                                                        Terakhir digunakan harus diisi
                                                    </div>
                                                    <div class="valid-feedback" id="val_terakhir_digunakan">
                                                        Data sudah benar
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">File Pendukung <b><small class="text-warning">**Ukuran file maksimal 20MB</small></b></label>
                                        <input class="form-control" type="file" id="dokumen" name="dokumen" multiple>
                                        {!!validasi('Ukuran file', 'terlalu besar')!!}
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
                                    <div class="col-md-8">
                                        <p>Silahkan isi hasil test urin</p>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-borderles">
                                                <tbody>
                                                    <tr>
                                                        <th>Amphetamine(AMP) <b class="text-danger">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="amp" id="amp" value="0">

                                                            Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="amp" id="amp" value="1">

                                                            Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-amp">
                                                                Hasil periksa AMP harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Methamphetamine(MET) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="met" id="met" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="met" id="met" value="1">

                                                            Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-met">
                                                                Hasil periksa MET harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>TetraHydroCannibinol(THC) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="thc" id="thc" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="thc" id="thc" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-thc">
                                                                Hasil periksa THC harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Benzodiazepine(BZO) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="bzo" id="bzo" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="bzo" id="bzo" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-bzo">
                                                                Hasil periksa BZO harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Morphine(MOP) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="mop" id="mop" value="0">
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="mop" id="mop" value="1">
                                                            <label class="form-check-label" for="ya">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-mop">
                                                                Hasil periksa MOP harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Cocaine(COC) <b class="color-red">*</b></th>
                                                        <td>
                                                            <input class="form-check-input" type="radio"
                                                                name="coc" id="coc" value="0">
                                                            <label class="form-check-label" for="no">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="coc" id="coc" value="1">
                                                            <label class="form-check-label" for="yes">

                                                                Positif
                                                            </label>
                                                            <div class="invalid-feedback" id="invalid-coc">
                                                                Hasil periksa COC harus diisi
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Tujuan pembuatan surat <b class="text-danger">*</b></label>
                                        <input class="form-control" type="text" name="tujuan_surat" id="tujuan_surat">
                                        {!!validasi('Tujuan pembuatan surat')!!}

                                    </div>
                                </div>
                            </div>
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
                                                <table>
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
                                        <div class="row">
                                            <h5 class="card-title">Penggunaan Obat</h5>
                                            <div id="review-obat1" style="display: none">
                                                <p>Pasien tidak ada menggunakan obat dalam seminggu terakhir</p>
                                            </div>
                                            <div id="review-obat2" style="display: none">
                                                <p class="mb-0">Penggunaan Obat pasien dalam satu minggu terakhir</p>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Cara penggunaan obat</th>
                                                            <td id="penggunaan_obat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Jenis obat</th>
                                                            <td id="jenis_obat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Asal obat</th>
                                                            <td id="asal_obat"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Terakhir digunakan</th>
                                                            <td id="terakhir_digunakan"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="card-title">Hasil Test Urin</h5>
                                        <table class="table table-striped table-borderless table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Amphetamine(AMP)</th>
                                                    <td id="review-amp">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Methamphetamine(MET)</th>
                                                    <td id="review-met">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>TetraHydroCannibinol(THC)
                                                    </th>
                                                    <td id="review-thc">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Benzodiazepine(BZO)</th>
                                                    <td id="review-bzo">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Morphine(MOP)</th>
                                                    <td id="review-mop">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Cocaine(COC)</th>
                                                    <td id="review-coc">

                                                    </td>
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
                                    onclick="submitform('form-narkoba')"><b>Simpan</b> <i class="bi bi-save"></i></button>
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
            var value_obatobatan = $('input[name="obat-obatan"]:checked').val();
            var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                linear: true,
                animation: true
            })
            var selectedPasien = "{{$selected_pasien}}";
            $(document).ready(function() {
                $('#select_pasien_id').select2({
                    theme: "bootstrap-5",
                    selectionCssClass: 'select2--small',
                    dropdownCssClass: 'select2--small',
                });

                tampilkanFormObat();
                // pilihPasien();

                // Obat-obatan
                $('input[name="obat-obatan"]').change(function() {
                    setObatObatan($(this).val());
                    if ($(this).val() === "ya") {
                        $('#pertanyaan-obatobatan').removeClass().addClass('col-md-4');
                        $('#form-obatobatan').fadeIn('slow')

                    } else {
                        clearFormObat();
                        $('#form-obatobatan').hide()
                        $('#pertanyaan-obatobatan').removeClass().addClass('col');
                    }
                })
                $('input').keyup(function(event) {
                    if ($(this).hasClass('is-invalid')) {
                        $(this).removeClass('is-invalid')
                    }
                })
                $('#select_pasien_id').change(function() {
                    if ($(this).val() !== "") {
                        $(this).removeClass('is-invalid');
                        pilihPasien(@json($pasien_id)[$(this).val()]);
                    }
                })

                if (selectedPasien) {
                    pas = @json($pasien_id).filter(val => val.id==parseInt(selectedPasien));
                    setPasien(pas[0]);
                    // drawTableDiagnodsa();
                    $('#select_pasien_id').attr('disabled','disabled');
                }

                $('input[class="form-check-input"]').click(function() {
                    $(this).siblings('.invalid-feedback').hide()
                })
            });

            function setObatObatan(value) {
                value_obatobatan = value;
            }


            function tampilkanFormObat() {
                if (value_obatobatan === "ya") {
                    $('#pertanyaan-obatobatan').removeClass().addClass('col-md-4');
                    $('#form-obatobatan').fadeIn('slow')
                }
            }

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
                if (value_obatobatan === "tidak") {
                    $('.invalid-feedback').removeClass('d-block')
                    validated = true;
                } else {
                    var inputs = ['penggunaan_obat', 'jenis_obat', 'asal_obat', 'terakhir_digunakan']
                    inputs.forEach(input => {
                        var value_input = $('[name="' + input + '"]').val();
                        if (value_input == ""||value_input == ' ') {
                            validated = false
                            $('[name="' + input + '"]').removeClass('is-valid')
                            $('[name="' + input + '"]').addClass('is-invalid')
                        } else {
                            $('[name="' + input + '"]').removeClass('is-invalid')
                            $('[name="' + input + '"]').addClass('is-valid')
                        }
                    });
                }
                if (validated === true && validasiFile(20000,'dokumen')) {
                    stepper2.next()
                }
            }

            function lanjut3() {
                var tests = ['amp', 'met', 'thc', 'bzo', 'mop', 'coc', 'tujuan_surat'];
                var validation_hasil = true;
                tests.forEach(test => {
                    if (test=='tujuan_surat') {
                        form = $('#'+test);
                        if (form.val()==null||form.val()=='') {
                            form.addClass('is-invalid');
                            form.removeClass('is-valid');
                            validation_hasil = false;
                        }else{
                            form.addClass('is-valid');
                            form.removeClass('is-invalid');
                        }
                    }else{
                        var value_test = $('[name="' + test + '"]:checked').val()
                        if (value_test === undefined) {
                            $('#invalid-' + test).show();
                            validation_hasil = false;
                        }
                        setReviewHasilNarkoba(test, value_test);
                    }
                });
                setReviewObat();

                if (validation_hasil === true) {
                    stepper2.next()
                }
            }

            function clearFormObat() {
                var inputs = ['penggunaan_obat', 'jenis_obat', 'asal_obat', 'terakhir_digunakan']
                inputs.forEach(input => {
                    $('[name="' + input + '"]').val("");
                });
            }

            function setReviewObat() {
                if (value_obatobatan === "tidak") {
                    $('#review-obat2').hide();
                    $('#review-obat1').show();
                } else {
                    $('#review-obat2').show();
                    $('#review-obat1').hide();
                    var inputs = ['penggunaan_obat', 'jenis_obat', 'asal_obat', 'terakhir_digunakan']
                    inputs.forEach(input => {
                        var value_input = $('[name="' + input + '"]').val();
                        $('td#' + input).text(": " + value_input);
                    });
                }
            }

            function setReviewHasilNarkoba(test, val_test) {
                if (val_test == "0")
                    $('#review-' + test).html(': <span class="badge bg-primary">Negatif</span>')
                else
                    $('#review-' + test).html(': <span class="badge bg-danger">Positif</span>')
            }
        </script>
    @stop

</section>
@include('sweetalert::alert')
@endsection
