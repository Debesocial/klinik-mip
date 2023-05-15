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
        
        th{
            white-space: nowrap;
            vertical-align: top;
        }
    </style>
@stop
<div hidden>{{ $rawat_inap->pasien->perusahaan->nama_perusahaan_pasien . $rawat_inap->pasien->divisi->nama_divisi_pasien . $rawat_inap->pasien->jabatan->nama_jabatan }}</div>

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
                            <span class="bs-stepper-label">Data Rawat Inap</span>
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
                    <form class="form needs-validation" action="/ubah/rawat/inap/{{ $rawat_inap->id }}" method="post"
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
                                    <div class="mb-3">
                                        <label class="form-label">Mulai Dirawat <b class="text-danger">*</b></label>
                                        <input type="date" class="form-control" name="mulai_rawat" id="mulai_rawat" value="{{ $rawat_inap->mulai_rawat }}">
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Mulai dirawat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Berakhir Dirawat <b class="text-danger">*</b></label>
                                        <input type="date" class="form-control" name="berakhir_rawat" id="berakhir_rawat" value="{{ $rawat_inap->berakhir_rawat }}">
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Berakhir dirawat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Penyakit <b class="text-danger">*</b></label>
                                        <select class="form-select"  name="nama_penyakit_id[]" multiple="multiple" id="nama_penyakit_id">
                                            @foreach ($nama_penyakit as $penyakit)
                                                <option value="{{ $penyakit->id }}" {{ in_array($penyakit->id ,json_decode($rawat_inap->nama_penyakit_id))?'selected':'' }}>{{ $penyakit->primer }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Nama penyakit harus diisi.
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
                                            <tbody id="body-penyakit">
                                                
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
            drawTableDiagnodsa();
            $('select').change(function() {
                if ($(this).val() !== "") {
                    $(this).removeClass('is-invalid')

                }
                drawTableDiagnodsa();
            })

            $('input[class="form-check-input"]').click(function() {
                $(this).siblings('.invalid-feedback').hide()
            })
            setPasien();
        });


        function setPasien() {
                var pasien = @json($rawat_inap->pasien);
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
            
            var inputs = ['mulai_rawat', 'nama_penyakit_id'];
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
            if(id=='mulai_rawat' || id == 'berakhir_rawat'){
                value = $('[name="' + id + '"]').val(); 
            }
            $('#_berakhir_rawat').text(': '+$('#berakhir_rawat').val());
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
@stop

@endsection
