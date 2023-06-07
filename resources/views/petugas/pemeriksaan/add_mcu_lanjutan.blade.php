@extends('layouts.dashboard.app')

@section('title', 'Tambah MCU')
@section('judul', 'Tambah MCU')
@section('breadcrumb', 'add_mcu_lanjutan')
@section('pemeriksaan', 'active')
@section('mcu', 'active')

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
                            <span class="bs-stepper-circle"><i class="bi bi-journal-medical"></i></span>
                            <span class="bs-stepper-label">Data Pemeriksaan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle"><i class="bi bi-list-check"></i></span>
                            <span class="bs-stepper-label">Hasil Pemeriksaan</span>
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
                {{-- @dd($jenismcu->jenis); --}}
                <div class="bs-stepper-content">
                    <form class="form needs-validation" id="form_mcu_lanjutan" action="/add_mcu/lanjutan" method="post"
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
                                                <option value="{{ $key }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
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
                            <div class="container mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Jenis Pemeriksaan <b
                                                    class="text-danger">*</b></label>
                                            <select name="jenis_mcu" id="jenis_mcu">
                                                <option disabled selected>Pilih Jenis pemeriksaan</option>
                                                @foreach ($jenismcu as $jenis)
                                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Jenis MCU harus diisi.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tanggal Pemeriksaan <b
                                                    class="text-danger">*</b></label>
                                            <input type="date" class="form-control" name="tanggal_pemeriksaan"
                                                id="tanggal_pemeriksaan">
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Tanggal harus diisi.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            {{-- <label for="" class="form-label">Jenis Pemeriksaan <b
                                                    class="text-danger">*</b></label> --}}
                                            <input type="hidden" name="jenis_pemeriksaan" id="jenis_pemeriksaan" value="1" >
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Jenis pemeriksaan harus diisi.
                                            </div>
                                        </div>
                                        <label for="" class="form-label">Status <b
                                                class="text-danger">*</b></label>
                                        <select name="status" id="status">
                                            <option disabled selected>Pilih Status</option>
                                            @foreach (hasilRekomendasi() as $item)
                                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Status harus diisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b>
                                </button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut2()"><b>Selanjutnya</b> <i class="bi bi-arrow-right-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div id="test-nl-3" class="content">
                            <div class="container">
                                <p>Silahkan masukkan hasil pemeriksaan</p>
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for=""class="form-label">Deskripsi Hasil MCU <b
                                                    class="text-danger">*</b></label>
                                            <textarea type="text" id="deskripsi_hasil" class="form-control" name="deskripsi_hasil" required> </textarea>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Deskripsi hasil MCU harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Deskripsi Obat/Tindakan <b
                                                    class="text-danger">*</b></label>
                                            <textarea name="deskripsi_obat" id="deskripsi_obat" class="form-control"></textarea>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Deskripsi obat/tindakan harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Rekomendasi Untuk Pasien <b
                                                    class="text-danger">*</b></label>
                                            <textarea name="rekomendasi" id="rekomendasi" class="form-control"></textarea>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Rekomendasi untuk pasien harus diisi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b>
                                </button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut3()"><b>Selanjutnya</b> <i class="bi bi-arrow-right-circle"></i>
                                </button>
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
                                        <h5 class="card-title">Data Pemeriksaan</h5>
                                        <table class="table table-borderless table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Jenis Pemeriksaan</th>
                                                    <td id="_jenis_mcu"></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <td id="_tanggal_pemeriksaan"></td>
                                                </tr>
                                                {{-- <tr>
                                                    <th>Jenis Pemeriksaan</th>
                                                    <td id="_jenis_pemeriksaan"></td>
                                                </tr> --}}
                                                <tr>
                                                    <th>Status</th>
                                                    <td id="_status"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="text-center">
                                        <h5>Hasil Pemeriksaan</h5>
                                    </div>
                                    <div class="col-md-10 align-self-center">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th>Deskripsi Hasil MCU</th>
                                                        <td id="_deskripsi_hasil"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Deskripsi Obat/Tindakan</th>
                                                        <td id="_deskripsi_obat"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Rekomendasi Untuk Pasien</th>
                                                        <td id="_rekomendasi"></td>
                                                    </tr>
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
                                    onclick="submitform('form_mcu_lanjutan')"><b>Simpan</b> <i
                                        class="bi bi-save"></i></button>
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
                $('input').change(function() {
                    if ($(this).val() !== "") {
                        $(this).removeClass('is-invalid')

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
                var idinput = ['jenis_mcu', 'tanggal_pemeriksaan', 'jenis_pemeriksaan', 'status'];
                idinput.forEach(id => {
                    var input = $('#' + id);
                    if (input.val() == null || input.val() == '') {
                        input.addClass('is-invalid');
                        input.removeClass('is-valid');
                        validated = false;
                    } else {
                        input.addClass('is-valid');
                        input.removeClass('is-invalid');
                        var review = $('#_' + id);
                        if (id == 'tanggal_pemeriksaan') {
                            review.text(': ' + input.val());
                        } else {
                            review.text(': ' + input.children('option:selected').text());
                        }
                    }
                });
                if (validated == true) {
                    stepper2.next();
                }
            }

            function lanjut3() {
                var validated = true;
                var inputs = ['rekomendasi', 'deskripsi_obat', 'deskripsi_hasil'];
                inputs.forEach(input => {
                    var value_input = $('[name="' + input + '"]').val();
                    if (value_input == "" || value_input == ' ' || value_input == null) {
                        validated = false
                        $('[name="' + input + '"]').removeClass('is-valid')
                        $('[name="' + input + '"]').addClass('is-invalid')
                    } else {
                        $('[name="' + input + '"]').removeClass('is-invalid')
                        $('[name="' + input + '"]').addClass('is-valid')
                        setReview(input, value_input);
                    }
                });

                if (validated === true) {
                    stepper2.next()
                }
            }

            function setReview(id, val) {
                var td = $('#_' + id);
                td.text(': ' + val);
            }
        </script>
    @stop

</section>

@endsection
