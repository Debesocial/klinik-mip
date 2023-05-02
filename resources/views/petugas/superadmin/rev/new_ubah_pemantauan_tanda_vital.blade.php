@extends('layouts.dashboard.app')

@section('title', 'Ubah Pemantauan Tanda vital')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('tandavital', 'active')
@section('breadcrumb', 'ubah_pemantauan_tanda_vital')
@section('judul', 'Ubah Pemantauan Tanda vital')
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                    <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                                </svg>
                            </span>
                            <span class="bs-stepper-label">Pemeriksaan Tanda Vital</span>
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
                    <form class="form needs-validation" action="/ubah/pemantauan/tandavital/{{$pemantauan->id}}" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id" >
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
                                                                    <td id="nama">: {{ $pemantauan->pasien->nama_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>ID Rekam Medis</th>
                                                                    <td id="rekam_medis">: {{ $pemantauan->pasien->id_rekam_medis }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nomor Induk Karyawan</th>
                                                                    <td id="nomor_induk_karyawan">: {{ $pemantauan->pasien->NIK }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tempat Tanggal Lahir</th>
                                                                    <td id="ttl">: {{ $pemantauan->pasien->tempat_lahir.', '.$pemantauan->pasien->tanggal_lahir }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td id="alamat">: {{ $pemantauan->pasien->alamat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan</th>
                                                                    <td id="pekerjaan">: {{ $pemantauan->pasien->pekerjaan }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tbody>

                                                                <tr>
                                                                    <th>Perusahaan</th>
                                                                    <td id="perusahaan">: {{ $pemantauan->pasien->perusahaan->nama_perusahaan_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Divisi</th>
                                                                    <td id="divisi">: {{ $pemantauan->pasien->divisi->nama_divisi_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jabatan</th>
                                                                    <td id="jabatan">: {{ $pemantauan->pasien->jabatan->nama_jabatan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Kelamin</th>
                                                                    <td id="jenis_kelamin">: {{ $pemantauan->pasien->jenis_kelamin }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Telepon</th>
                                                                    <td id="telepon">: {{ $pemantauan->pasien->telepon }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td id="email">: {{ $pemantauan->pasien->email }}</td>
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
                                    onclick="stepper2.next()"><b>Selanjutnya</b> <i
                                        class="bi bi-arrow-right-circle"></i></button>
                            </div>
                        </div>
                        <div id="test-nl-2" class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Skala Nyeri <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="skala_nyeri"
                                                id="skala_nyeri">
                                                <option disabled>Pilih Pemantauan </option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->skala_nyeri)?'selected':'' }}>{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Skala Nyeri harus diisi
                                            </div>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">HR <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="hr" id="hr">
                                                <option disabled>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->hr)?'selected':'' }}>{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                HR harus diisi
                                            </div>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">BP <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="bp" id="bp">
                                                <option disabled>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->bp)?'selected':'' }}>{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                BP harus diisi
                                            </div>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Temp <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="temp" id="temp">
                                                <option disabled>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->temp)?'selected':'' }}>{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Temp harus diisi
                                            </div>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">RR <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="rr" id="rr">
                                                <option disabled>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->rr)?'selected':'' }}>{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                RR harus diisi
                                            </div>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Saturasi Oksigen <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="saturasi_oksigen"
                                                id="saturasi_oksigen">
                                                <option disabled>Pilih Pemantauan</option>
                                                @foreach ($hasilpemantauan as $hasil)
                                                <option value="{{ $hasil->nama_pemantauan }}" {{ ($hasil->nama_pemantauan==$pemantauan->saturasi_oksigen)?'selected':'' }}>{{
                                                    $hasil->nama_pemantauan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Staturasi Oksigen harus diisi
                                            </div>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" class="form-control" cols="10"  rows="5">{{ $pemantauan->keterangan }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Dokumen Pendukung</label>
                                            <input type="file" class="form-control" name="dokumen" id="dokumen" value="{{ $pemantauan->dokumen }}">
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
                                        <h5 class="card-title">Biodata Pasien</h5>
                                        <div class="table-responsive">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Nama Pasien</th>
                                                        <td id="nama">: {{ $pemantauan->pasien->nama_pasien }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>ID Rekam Medis</th>
                                                        <td id="rekam_medis">: {{ $pemantauan->pasien->id_rekam_medis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Induk Karyawan</th>
                                                        <td id="nomor_induk_karyawan">: {{ $pemantauan->pasien->NIK }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tempat Tanggal Lahir</th>
                                                        <td id="ttl">: {{ $pemantauan->pasien->tempat_lahir.', '.$pemantauan->pasien->tanggal_lahir }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td id="alamat">: {{ $pemantauan->pasien->alamat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pekerjaan</th>
                                                        <td id="pekerjaan">: {{ $pemantauan->pasien->pekerjaan }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="card-title">Hasil Pemeriksaan Tanda Vital</h5>
                                        <table class="table table-striped table-borderless table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Skala Nyeri</th>
                                                    <td id="_skala_nyeri">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>HR</th>
                                                    <td id="_hr">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>BP</th>
                                                    <td id="_bp">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Temp</th>
                                                    <td id="_temp">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>RR</th>
                                                    <td id="_rr">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Saturasi Oksigen</th>
                                                    <td id="_saturasi_oksigen">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Ketetangan</th>
                                                    <td id="_keterangan"></td>
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
                                <button type="submit" class="btn btn-primary rounded-pill"><b>Simpan</b> <i class="bi bi-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @section('js')
        <script>
            var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                linear: true,
                animation: true
            })
            $(document).ready(function() {
                $('input').keyup(function(event) {
                    if ($(this).hasClass('is-invalid')) {
                        $(this).removeClass('is-invalid')
                    }
                })
                $('select').change(function() {
                    if ($(this).val() !== "") {
                        $(this).removeClass('is-invalid')

                    }
                })
            });

            function lanjut2() {
                var formidrequired = ['skala_nyeri','hr','bp','temp','rr','saturasi_oksigen']
                var validated = true;
                formidrequired.forEach(id => {
                    var form = $('#'+id);
                    if(form.val()==null||form.val()==''){
                        form.addClass('is-invalid').removeClass('is-valid');
                        validated = false;
                    } else{
                        form.addClass('is-valid').removeClass('is-invalid');
                    }
                });
                if (validated === true) {
                    setReview();
                    stepper2.next()
                }
            }

            function setReview() {
                var idtd = ['skala_nyeri','hr','bp','temp','rr','saturasi_oksigen','keterangan'];
                idtd.forEach(id => {
                    var td = $('#_'+id);
                    var form = $('#'+id);
                    td.text(': '+form.val());
                });
            }
            
        </script>
    @stop

</section>
@include('sweetalert::alert')
@endsection