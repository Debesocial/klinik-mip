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
                                                        <table class="table table-borderless">
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
                                                        <table class="table table-borderless">
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
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Mulai Dirawat <b class="text-danger">*</b></label>
                                            <input type="date" class="form-control" name="mulai_rawat" id="mulai_rawat">
                                            {!!validasi('Mulai dirawat')!!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Berakhir Dirawat</label>
                                            <input type="date" class="form-control" name="berakhir_rawat" id="berakhir_rawat">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Anamnesis</label>
                                        <input type="text" name="anamnesis" id="anamnesis" class="form-control">
                                        {!!validasi('Anamnesis')!!}
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <label for="" class="form-label">Tinggi Badan <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">Cm</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="form-label">Berat Badan <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="berat_badan" id="berat_badan" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <label for="" class="form-label">Suhu Tubuh <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="suhu_tubuh" id="suhu_tubuh" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">&deg;C</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="form-label">Tekanan Darah <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="tekanan_darah" id="tekanan_darah" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">mmHg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <label for="" class="form-label">Saturasi Oksigen <b class="text-danger">*</b></label>
                                            <div class="input-group">
                                                <input type="number" name="saturasi_oksigen" id="saturasi_oksigen" class="form-control">
                                                <span class="input-group-text" id="basic-addon1">mmHg</span>
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
                                        <label for="" class="form-label">Dokumentasi Pendukung</label>
                                        <input type="file" name="dokumen" id="dokumen" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-2">
                                        <label for="" class="form-label">Status Lokalis <b class="text-danger">*</b></label>
                                        <div class="input-group">
                                            <img src="{{asset('assets/images/body.png')}}" width="50%" alt="" class="img-fluid magniflier"> 
                                            <textarea type="number" name="status-lokalis" id="status-lokalis" rows="5" class="form-control" placeholder="Masukkan status lokalis"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="form-label">Nama Penyakit <b class="text-danger">*</b></label>
                                        <select class="form-select"  name="nama_penyakit_id[]" multiple="multiple" id="nama_penyakit_id">
                                            @foreach ($nama_penyakit as $penyakit)
                                                <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Nama penyakit harus diisi.
                                        </div>
                                    </div>
                                    <div class="row">
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
                                    onclick="submitform('form-add-jalan')"><b>Simpan</b> <i class="bi bi-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- @dd($nama_penyakit->find(3)); --}}
@section('js')
    <script>
        var stepper2 = new Stepper(document.querySelector('#stepper2'), {
            linear: true,
            animation: true
        })
        stepper2.to(2);
        $(document).ready(function() {
            $('select').select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
                tags: true
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
                    $(this).removeClass('is-invalid')
                }
                drawTableDiagnodsa();
            })

            $('input[class="form-check-input"]').click(function() {
                $(this).siblings('.invalid-feedback').hide()
            })
        });

        
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
            // console.log($('#nama_penyakit_id').val());
            var inputs = ['mulai_rawat', 'nama_penyakit_id'];
            inputs.forEach(input => {
                var value_input = $('[name*="' + input + '"]').val();                    
                var text_input = $('[name*="' + input + '"]').children('option:selected').text();                    

                if (value_input == ""||value_input == ' ') {
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
            if(id=='mulai_rawat'){
                value = $('[name*="' + id + '"]').val(); 
            }
            $('#_berakhir_rawat').text(': '+$('#berakhir_rawat').val())
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
        $(function() {

            var native_width = 0;
            var native_height = 0;
            var mouse = {x: 0, y: 0};
            var magnify;
            var cur_img;

            var ui = {
            magniflier: $('.magniflier')
            };

            // Add the magnifying glass
            if (ui.magniflier.length) {
            var div = document.createElement('div');
            div.setAttribute('class', 'glass');
            ui.glass = $(div);

            $('body').append(div);
            }


            // All the magnifying will happen on "mousemove"

            var mouseMove = function(e) {
            var $el = $(this);

            // Container offset relative to document
            var magnify_offset = cur_img.offset();

            // Mouse position relative to container
            // pageX/pageY - container's offsetLeft/offetTop
            mouse.x = e.pageX - magnify_offset.left;
            mouse.y = e.pageY - magnify_offset.top;
            
            // The Magnifying glass should only show up when the mouse is inside
            // It is important to note that attaching mouseout and then hiding
            // the glass wont work cuz mouse will never be out due to the glass
            // being inside the parent and having a higher z-index (positioned above)
            if (
                mouse.x < cur_img.width() &&
                mouse.y < cur_img.height() &&
                mouse.x > 0 &&
                mouse.y > 0
                ) {

                magnify(e);
            }
            else {
                ui.glass.fadeOut(100);
            }

            return;
            };

            var magnify = function(e) {

            // The background position of div.glass will be
            // changed according to the position
            // of the mouse over the img.magniflier
            //
            // So we will get the ratio of the pixel
            // under the mouse with respect
            // to the image and use that to position the
            // large image inside the magnifying glass

            var rx = Math.round(mouse.x/cur_img.width()*native_width - ui.glass.width()/2)*-1;
            var ry = Math.round(mouse.y/cur_img.height()*native_height - ui.glass.height()/2)*-1;
            var bg_pos = rx + "px " + ry + "px";
            
            // Calculate pos for magnifying glass
            //
            // Easy Logic: Deduct half of width/height
            // from mouse pos.

            // var glass_left = mouse.x - ui.glass.width() / 2;
            // var glass_top  = mouse.y - ui.glass.height() / 2;
            var glass_left = e.pageX - ui.glass.width() / 2;
            var glass_top  = e.pageY - ui.glass.height() / 2;
            //console.log(glass_left, glass_top, bg_pos)
            // Now, if you hover on the image, you should
            // see the magnifying glass in action
            ui.glass.css({
                left: glass_left,
                top: glass_top,
                backgroundPosition: bg_pos
            });

            return;
            };

            $('.magniflier').on('mousemove', function() {
            ui.glass.fadeIn(200);
            
            cur_img = $(this);

            var large_img_loaded = cur_img.data('large-img-loaded');
            var src = cur_img.data('large') || cur_img.attr('src');

            // Set large-img-loaded to true
            // cur_img.data('large-img-loaded', true)

            if (src) {
                ui.glass.css({
                'background-image': 'url(' + src + ')',
                'background-repeat': 'no-repeat'
                });
            }

            // When the user hovers on the image, the script will first calculate
            // the native dimensions if they don't exist. Only after the native dimensions
            // are available, the script will show the zoomed version.
            //if(!native_width && !native_height) {

                if (!cur_img.data('native_width')) {
                // This will create a new image object with the same image as that in .small
                // We cannot directly get the dimensions from .small because of the 
                // width specified to 200px in the html. To get the actual dimensions we have
                // created this image object.
                var image_object = new Image();

                image_object.onload = function() {
                    // This code is wrapped in the .load function which is important.
                    // width and height of the object would return 0 if accessed before 
                    // the image gets loaded.
                    native_width = image_object.width;
                    native_height = image_object.height;

                    cur_img.data('native_width', native_width);
                    cur_img.data('native_height', native_height);

                    //console.log(native_width, native_height);

                    mouseMove.apply(this, arguments);

                    ui.glass.on('mousemove', mouseMove);
                };


                image_object.src = src;
                
                return;
                } else {

                native_width = cur_img.data('native_width');
                native_height = cur_img.data('native_height');
                }
            //}
            //console.log(native_width, native_height);

            mouseMove.apply(this, arguments);

            ui.glass.on('mousemove', mouseMove);
            });

            ui.glass.on('mouseout', function() {
            ui.glass.off('mousemove', mouseMove);
            });

        });
    </script>
@stop
    
@endsection
