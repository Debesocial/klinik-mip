@extends('layouts.dashboard.app')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')
@section('breadcrumb', 'tambah_pemeriksaan_covid')
@section('title', 'Pemeriksaan Covid-19')
@section('judul', 'Pemeriksaan Covid-19')
@section('container')
@section('css')
    <style>
        input[type=radio] {
            transform: scale(1.5);
            margin-right: 0.3rem;
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Pemeriksaan</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button class="btn step-trigger">
                            <span class="bs-stepper-circle">
                                <i class="bi bi-check-circle"></i>
                            </span>
                            <span class="bs-stepper-label">Simpan</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form class="form needs-validation" action="/pemeriksaan/covid" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="text" id="myInput0" class="form-control" name="pasien_id" placeholder="ID Pasien"  hidden>
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
                                    onclick="lanjut1()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-2" class="content">
                            <div class="container mb-3">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Kebutuhan Pemeriksaan <b class="color-red">*</b></label>
                                        <select name="pemeriksaan_antigen_id" id="pemeriksaan_antigen_id" class="form-select">
                                            <option disabled selected>Kebutuhan Pemeriksaan</option>
                                            @foreach ($pemeriksaanantigen as $antigen)
                                                <option value="{{ $antigen['id'] }}">{{ $antigen['kebutuhan'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th>Hasil Pemeriksaan <b class="color-red">*</b></th>
                                                    <td>: 
                                                        <input class="form-check-input ms-2" type="radio" name="hasil_pemeriksaan"id="hasil_pemeriksaan" value="0">
                                                        <label class="form-check-label" for="negatif"> Negatif</label>
                                                        <input class="form-check-input ms-2" type="radio" name="hasil_pemeriksaan" id="hasil_pemeriksaan" value="1">
                                                        <label class="form-check-label" for="positif"> Positif </label> 
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
                                    onclick="stepper2.next()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-3" class="content">
                            <h1>Hallo3</h1>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b></button>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.next()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@section('js')
    <script>
        var stepper2 = new Stepper(document.querySelector('#stepper2'),{
            linear: true,
            animation: true
        });
        $('#select_pasien_id').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
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
        function pilihPasien(data) {
            var pasien_index = $('#select_pasien_id').val();
            if (pasien_index === '') {
                $('#detail_pasien').fadeOut('slow')
                $('#select_pasien_id').removeClass('is-valid')
                $('#select_pasien_id').addClass('is-invalid')
                $('.invalid-feedback').addClass('d-block')
            } else {
                var pasien = @json($pasien_id)[pasien_index];
                $('#select_pasien_id').removeClass('is-invalid')
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
    </script>
@stop

@include('sweetalert::alert') 
@endsection