@extends('layouts.dashboard.app')

@section('title', 'Data Rawat Jalan')
@section('periksa', 'active')
@section('jalan', 'active')
@section('breadcrumb', 'ubah_rawat_jalan')
@section('judul', 'Data Rawap Jalan')
@section('container')




{{-- <div class="page-heading">
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-2 order-first">
        </div>
    </div>
</div>



    <section id="basic-horizontal-layouts">
        <div class="row match-height">
        <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/ubah/rawat/jalan/{{ $rawat_jalan->id }}" method="post" enctype='multipart/form-data'>
                                @csrf
                                <div class="form-body">
                                    <div class="row">


                                        <div class="col-md-2">
                                            <label>ID Rekam Medis Pasien</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="" class="form-control"  value="{{ ($rawat_jalan->pasien->id_rekam_medis) }}" disabled>
                                        </div>
                                        <div class="col-md-6 form-group">
                                        </div>
                                        <br>

                                        <input type="text" id="myInput0" class="form-control"
                                                name="pasien_id"  placeholder="ID Pasien" hidden>

                                        <div class="col-md-2">
                                            <label>Nama Pasien</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput1" class="form-control"
                                                name="myInput1" value="{{ ($rawat_jalan->pasien->nama_pasien) }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <label>Pekerjaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput2" class="form-control"
                                                name="myInput2" value="{{ ($rawat_jalan->pasien->pekerjaan) }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>

                                        <div class="col-md-2">
                                            <label>Perusahaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput3" class="form-control"
                                                name="myInput3" value="{{ ($rawat_jalan->pasien->perusahaan->nama_perusahaan_pasien) }}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput4" class="form-control"
                                                    name="myInput4" value="{{ ($rawat_jalan->pasien->divisi->nama_divisi_pasien) }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                        
                                                <div class="col-md-2">
                                                    <label>Tanggal Berobat <b class="color-red">*</b></label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input id="tanggal_berobat" type="date" class="form-control"
                                                        name="tanggal_berobat" value="{{ ($rawat_jalan->tanggal_berobat) }}" required >
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Nama Penyakit <b class="color-red">*</b> </label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select class="choices form-select" name="nama_penyakit_id" id="nama_penyakit_id" required>
                                                        <option value="{{   $rawat_jalan->nama_penyakit_id  }}">{{ $rawat_jalan->namapenyakit->primer }}</option>
                                                        @foreach ($namapenyakit as $penyakit)
                                                        <option value="{{ $penyakit->id }}" {{ $penyakit->id == $rawat_jalan->namapenyakit->id ? 'selected' : '' }}>{{ $penyakit->primer }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Nama Tindakan <b class="color-red">*</b></label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select class="choices form-select" name="tindakan_id" id="tindakan_id" required>
                                                        <option value="{{   $rawat_jalan->tindakan_id  }}">{{ $rawat_jalan->tindakan->nama_tindakan }}</option>
                                                        @foreach ($tindakan as $tin)
                                                        <option value="{{ $tin->id }}" {{ $tin->id == $rawat_jalan->tindakan->id ? 'selected' : '' }}>{{ $tin->nama_tindakan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                </div>



                                        <div class="col-sm-6 d-flex justify-content-end">
                                            <button type="reset"
                                            class="btn btn-outline-secondary me-1 mb-1"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}
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

<div hidden>{{ $rawat_jalan->pasien->perusahaan->nama_perusahaan_pasien . $rawat_jalan->pasien->divisi->nama_divisi_pasien . $rawat_jalan->pasien->jabatan->nama_jabatan }}</div>
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
                            <span class="bs-stepper-label">Data Rawat Jalan</span>
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
                    <form class="form needs-validation" action="/ubah/rawat/jalan/{{ $rawat_jalan->id }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id">
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                <div class="row mt-3" id="detail_pasien">
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
                                                                    <th>Umur</th>
                                                                    <td id="umur"></td>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Berobat <b class="text-danger">*</b></label>
                                        <input type="date" class="form-control" name="tanggal_berobat" id="tanggal_berobat" value="{{ $rawat_jalan->tanggal_berobat}}">
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Tanggal berobat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Penyakit <b class="text-danger">*</b></label>
                                        <select class="form-select"  name="nama_penyakit_id" id="nama_penyakit_id">
                                            @foreach ($nama_penyakit as $penyakit)
                                                <option value="{{ $penyakit->id }}" {{ ($penyakit->id == $rawat_jalan->nama_penyakit_id)? 'selected':'' }} >{{ $penyakit->primer }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Nama penyakit harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tindakan <b class="text-danger">*</b></label>
                                        <select class="form-select"  name="tindakan_id" id="tindakan_id">
                                            <option value="" selected>Tindakan</option>
                                            @foreach ($tindakan as $tindakan)
                                                <option value="{{ $tindakan->id }}" {{ ($tindakan->id == $rawat_jalan->tindakan->id)? 'selected':'' }}>{{ $tindakan->nama_tindakan }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Tindakan harus diisi
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
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="card-title">Data Pemeriksaan</h5>
                                        <table class="table table-striped table-borderless table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Tangga Berobat</th>
                                                    <td id="_tanggal_berobat">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Penyakit</th>
                                                    <td id="_nama_penyakit_id">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tindakan
                                                    </th>
                                                    <td id="_tindakan_id">

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
                                <button type="submit" class="btn btn-primary rounded-pill"
                                    onclick="stepper2.next()"><b>Simpan</b> <i class="bi bi-save"></i></button>
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
                    $(this).removeClass('is-invalid')

                }
            })

            $('input[class="form-check-input"]').click(function() {
                $(this).siblings('.invalid-feedback').hide()
            })

            setPasien();
        });


        function setPasien() {
            var pasien = @json($rawat_jalan->pasien);
            $('[name=pasien_id]').val(pasien.id)
            $('td#nama').text(": " + pasien.nama_pasien);
            $('td#umur').text(": " + getAge(pasien.tanggal_lahir));
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
        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
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
            
            var inputs = ['tanggal_berobat', 'nama_penyakit_id', 'tindakan_id'];
            inputs.forEach(input => {
                var value_input = $('[name="' + input + '"]').val();                    
                var text_input = $('[name="' + input + '"]').children('option:selected').text();                    

                if (value_input == ""||value_input == ' ') {
                    validated = false
                    $('[name="' + input + '"]').removeClass('is-valid')
                    $('[name="' + input + '"]').addClass('is-invalid')
                } else {
                    $('[name="' + input + '"]').removeClass('is-invalid')
                    $('[name="' + input + '"]').addClass('is-valid')
                    setResult(input, text_input);
                }
            });
            
            if (validated === true) {
                stepper2.next()
            }
        }

        function setResult(id, value) {
            if(id=='tanggal_berobat'){
                value = $('[name="' + id + '"]').val(); 
            }
            $('#_'+id).text(': '+value);
        }
    </script>
@stop
    
@endsection
