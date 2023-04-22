@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')
@section('breadcrumb', 'tambah_pemeriksaan_narkoba')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('narko', 'active')

@section('judul', 'Data Pemeriksaan Narkoba')
@section('container')

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
                            <div class="btn step-trigger">
                                <span class="bs-stepper-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                        <path
                                            d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                    </svg></span>
                                <span class="bs-stepper-label">Penggunaan Obat</span>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-nl-3">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle"><i class="bi bi-list-check"></i></span>
                                <span class="bs-stepper-label">Hasil Test Urin</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form class="form needs-validation" action="/periksa/narkoba" method="post"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="pasien_id">
                            <div id="test-nl-1" class="content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Silahkan pilih Pasien berdasarkan <b>ID rekam
                                                    medis</b><b class="color-red"> *</b></label>
                                            <select id="select_pasien_id" class="form-select" onchange="pilihPasien(this)"
                                                required>
                                                <option value="" selected>Pasien</option>
                                                @foreach ($pasien_id as $key => $pas)
                                                    <option value="{{ $key }}"
                                                        perusahaan="{{ $pas->perusahaan->nama_perusahaan_pasien }}"
                                                        divisi={{ $pas->divisi->nama_divisi_pasien }}
                                                        jabatan={{ $pas->jabatan->nama_jabatan }}>
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
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
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
                                                                        <th>Nomor Induk Karyawan</th>
                                                                        <td id="nomor_induk_karyawan"></td>
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
                                                        <div class="col-md-6">
                                                            <table>
                                                                <tbody>

                                                                    <tr>
                                                                        <th>Perusahaan</th>
                                                                        <td id="perusahaan"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Divisi</th>
                                                                        <td id="divisi"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Jabatan</th>
                                                                        <td id="jabatan"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Jenis Kelamin</th>
                                                                        <td id="jenis_kelamin"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Telepon</th>
                                                                        <td id="telepon"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <td id="email"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <button type="button" class="btn btn-primary rounded-pill"
                                        onclick="lanjut1()">Selanjutnya</button>
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
                                                        <label class="form-label">Cara Penggunaan Obat <b
                                                                class="color-red"> *</b></label>
                                                        <input type="text" id="penggunaan_obat" class="form-control"
                                                            name="penggunaan_obat" placeholder="Masukkan cara penggunaan">
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
                                                    <div class="mb-3">
                                                        <label class="form-label">File Pendukung</label>
                                                        <input class="form-control" type="file" id="dokumen"
                                                            name="dokumen" multiple>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="form-obatobatan">
                                        <div class="col">

                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary rounded-pill"
                                        onclick="stepper2.previous()">Sebelumnya</button>
                                    <button type="button" class="btn btn-primary rounded-pill"
                                        onclick="lanjut2()">Selanjutnya</button>
                                </div>
                            </div>
                            <div id="test-nl-3" class="content">
                                <p class="text-center">test 6</p>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary rounded-pill"
                                        onclick="stepper2.previous()">Sebelumnya</button>
                                    <button type="submit" class="btn btn-primary rounded-pill"
                                        onclick="stepper2.next()">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    @section('js')
        <script>
            var value_obatobatan = $('input[name="obat-obatan"]:checked').val();

            $(document).ready(function() {
                $('#select_pasien_id').select2({
                    theme: "bootstrap-5",
                    selectionCssClass: 'select2--small',
                    dropdownCssClass: 'select2--small',
                });


                tampilkanFormObat();
                pilihPasien();
                // Obat-obatan
                $('input[name="obat-obatan"]').change(function() {
                    if ($(this).val() === "ya") {
                        $('#pertanyaan-obatobatan').removeClass().addClass('col-md-4');
                        $('#form-obatobatan').fadeIn('slow')
                    } else {
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
                        $(this).removeClass('is-invalid')

                    }
                })
            });
            var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                linear: true,
                animation: true
            })

            function pilihPasien(data) {
                var pasien_index = $('#select_pasien_id').val();
                if (pasien_index === '') {
                    $('#detail_pasien').fadeOut('slow')
                    $('#select_pasien_id').removeClass('is-valid')
                    $('#select_pasien_id').addClass('is-invalid')
                    $('.invalid-feedback').addClass('d-block')
                } else {
                    var pasien = @json($pasien_id)[pasien_index];
                    $('[name=pasien_id]').val(pasien.id)
                    $('td#nama').text(": " + pasien.nama_pasien);
                    $('td#rekam_medis').text(": " + pasien.id_rekam_medis);
                    $('td#nomor_induk_karyawan').text(": " + pasien.NIK)
                    $('td#ttl').text(": " + pasien.tempat_lahir + ', ' + pasien.tanggal_lahir)
                    $('td#alamat').text(": " + pasien.alamat)
                    $('td#pekerjaan').text(": " + pasien.pekerjaan)
                    $('td#perusahaan').text(": " + pasien.perusahaan.nama_perusahaan_pasien)
                    $('td#divisi').text(": " + pasien.divisi.nama_divisi_pasien)
                    $('td#jabatan').text(": " + pasien.jabatan.nama_jabatan)
                    $('td#jenis_kelamin').text(": " + pasien.jenis_kelamin)
                    $('td#telepon').text(": " + pasien.telepon)
                    var email = pasien.email ?? '-'
                    $('td#email').text(": " + email);
                    $('.invalid-feedback').removeClass('d-block')
                    $('#detail_pasien').fadeIn('slow')

                }
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
                        if ($('input[name="' + input + '"]').val() == "") {
                            validated = false
                            $('input[name="' + input + '"]').removeClass('is-valid')
                            $('input[name="' + input + '"]').addClass('is-invalid')
                        } else {
                            $('input[name="' + input + '"]').removeClass('is-invalid')
                            $('input[name="' + input + '"]').addClass('is-valid')
                        }
                    });
                }
                if (validated === true) {
                    stepper2.next()
                }
            }
        </script>
    @stop

</section>
@include('sweetalert::alert')
@endsection