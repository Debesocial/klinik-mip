@extends('layouts.dashboard.app')

@section('title', 'Ubah Pemeriksaan Narkotika')
@section('breadcrumb', 'ubah_pemeriksaan_narkoba')
@section('periksa', 'active')
@section('narko', 'active')
 @section('judul', 'Ubah Pemeriksaan Narkotika')
@section('container')
@section('css')
    <style>
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
                            <span class="bs-stepper-label">Pasien</span>
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
                    <form class="form needs-validation" action="/ubah/pemeriksaan/narkoba/{{$narkoba->id}}" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id" value="{{ $narkoba->pasien->id }}">
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
                                                                    <td id="nama">: {{ $narkoba->pasien->nama_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>ID Rekam Medis</th>
                                                                    <td id="rekam_medis">: {{ $narkoba->pasien->id_rekam_medis }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nomor Induk Karyawan</th>
                                                                    <td id="nomor_induk_karyawan">: {{ $narkoba->pasien->NIK }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tempat Tanggal Lahir</th>
                                                                    <td id="ttl">: {{ $narkoba->pasien->tempat_lahir }}, {{ $narkoba->pasien->tanggal_lahir }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td id="alamat">: {{ $narkoba->pasien->alamat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan</th>
                                                                    <td id="pekerjaan">: {{ $narkoba->pasien->pekerjaan }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Perusahaan</th>
                                                                    <td id="perusahaan">: {{ $narkoba->pasien->perusahaan->nama_perusahaan_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Divisi</th>
                                                                    <td id="divisi">: {{ $narkoba->pasien->divisi->nama_divisi_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jabatan</th>
                                                                    <td id="jabatan">: {{ $narkoba->pasien->jabatan->nama_jabatan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Kelamin</th>
                                                                    <td id="jenis_kelamin">: {{ $narkoba->pasien->jenis_kelamin }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Telepon</th>
                                                                    <td id="telepon">: {{ $narkoba->pasien->telepon }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td id="email">: {{ $narkoba->pasien->email }}</td>
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
                                <div class="row mb-3">
                                    <div class="col" id="pertanyaan-obatobatan">
                                        <p class="">Apakah pasien ada menggunakan obat-obatan dalam <b>seminggu
                                                terakhir</b> <b class="color-red"> *</b></p>      
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="obat-obatan"
                                                id="obat-obatan1" value="tidak" {{ ($narkoba->penggunaan_obat==null)? 'checked':'' }}>
                                            <label class="form-check-label" for="obat-obatan1">
                                                Tidak
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="obat-obatan"
                                                id="obat-obatan2" value="ya" {{ ($narkoba->penggunaan_obat!=null)? 'checked':'' }}>
                                            <label class="form-check-label" for="obat-obatan2">
                                                Ya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="form-obatobatan" style="{{ $narkoba->penggunaan_obat ?? 'display:none' }}" >
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Penggunaan obat-obatan seminggu terakhir <b
                                                            class="color-red"> *</b></label>
                                                    <textarea type="text" id="penggunaan_obat" class="form-control"
                                                        name="penggunaan_obat" placeholder="Masukkan penggunaan obat-obatan seminggu terakhir" rows="4">{{ $narkoba->penggunaan_obat }}</textarea>
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
                                                        name="jenis_obat" placeholder="Masukkan jenis obat" value="{{ $narkoba->jenis_obat }}">
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
                                                        name="asal_obat" placeholder="Masukkan asal obat" value="{{ $narkoba->asal_obat }}">
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
                                                        placeholder="Terakhir Digunakan" value="{{ $narkoba->terakhir_digunakan }}">
                                                    <div class="invalid-feedback" id="inval_terakhir_digunakan">
                                                        Terakhir digunakan harus diisi
                                                    </div>
                                                    <div class="valid-feedback" id="val_terakhir_digunakan">
                                                        Data sudah benar
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">File Pendukung :</label>
                                                    <a href="{{ $narkoba->file_pendukung ?? '#' }}">{{ $narkoba->file_pendukung ?? "-" }}</a>
                                                    <input class="form-control" type="file" id="dokumen"
                                                        name="dokumen" multiple>
                                                </div>

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
                                                                name="amp" id="amp" value="0" {{ ($narkoba->amp==0)? 'checked':'' }}>
                                                            Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="amp" id="amp" value="1" {{ ($narkoba->amp==1)? 'checked':'' }}>

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
                                                                name="met" id="met" value="0" {{ ($narkoba->met==0)? 'checked':'' }}>
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="met" id="met" value="1" {{ ($narkoba->met==1)? 'checked':'' }}>

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
                                                                name="thc" id="thc" value="0" {{ ($narkoba->thc==0)? 'checked':'' }}>
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="thc" id="thc" value="1" {{ ($narkoba->thc==1)? 'checked':'' }}>
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
                                                                name="bzo" id="bzo" value="0" {{ ($narkoba->bzo==0)? 'checked':'' }}>
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="bzo" id="bzo" value="1" {{ ($narkoba->bzo==1)? 'checked':'' }}>
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
                                                                name="mop" id="mop" value="0" {{ ($narkoba->mop==0)? 'checked':'' }}>
                                                            <label class="form-check-label" for="tidak">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="mop" id="mop" value="1" {{ ($narkoba->mop==1)? 'checked':'' }}>
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
                                                                name="coc" id="coc" value="0" {{ ($narkoba->coc==0)? 'checked':'' }}>
                                                            <label class="form-check-label" for="no">

                                                                Negatif
                                                            </label>&emsp;
                                                            <input class="form-check-input" type="radio"
                                                                name="coc" id="coc" value="1" {{ ($narkoba->coc==1)? 'checked':'' }}>
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
                                                            <td id="nama">: {{ $narkoba->pasien->nama_pasien }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>ID Rekam Medis</th>
                                                            <td id="rekam_medis">: {{ $narkoba->pasien->id_rekam_medis }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tempat Tanggal Lahir</th>
                                                            <td id="ttl">: {{ $narkoba->pasien->tempat_lahir.', '.$narkoba->pasien->tanggal_lahir }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat</th>
                                                            <td id="alamat">: {{ $narkoba->pasien->alamat }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pekerjaan</th>
                                                            <td id="pekerjaan">: {{ $narkoba->pasien->pekerjaan }}</td>
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
        var value_obatobatan = $('[name="obat-obatan"]:checked').val();
        var dataAwal = @json($narkoba);
        var stepper2 = new Stepper(document.querySelector('#stepper2'), {
            linear: true,
            animation: true
        })
        
        $(document).ready(function(){
            // Obat-obatan
            $('[name="obat-obatan"]').change(function() {
                setObatObatan($(this).val());
                if ($(this).val() === "ya") {
                    resetFormObat();
                    $('#pertanyaan-obatobatan').removeClass().addClass('col-md-4');
                    $('#form-obatobatan').fadeIn('slow')
                } else {
                    clearFormObat();
                    $('#form-obatobatan').hide()
                    $('#pertanyaan-obatobatan').removeClass().addClass('col');
                }
            })
        })
        function setObatObatan(value) {
            value_obatobatan = value;
        }
        function clearFormObat() {
            var inputs = ['penggunaan_obat', 'jenis_obat', 'asal_obat', 'terakhir_digunakan']
            inputs.forEach(input => {
                $('[name="' + input + '"]').val("");
            });
        }
        function resetFormObat(){
            var inputs = ['penggunaan_obat', 'jenis_obat', 'asal_obat', 'terakhir_digunakan']
            inputs.forEach(input => {
                $('[name="' + input + '"]').val(dataAwal[input]);
            });

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
                    if (value_input == "") {
                        validated = false
                        $('[name="' + input + '"]').removeClass('is-valid')
                        $('[name="' + input + '"]').addClass('is-invalid')
                    } else {
                        $('[name="' + input + '"]').removeClass('is-invalid')
                        $('[name="' + input + '"]').addClass('is-valid')
                    }
                });
            }
            if (validated === true) {
                stepper2.next()
            }
        }
        function lanjut3() {
            var tests = ['amp', 'met', 'thc', 'bzo', 'mop', 'coc'];
            var validation_hasil = true;
            tests.forEach(test => {
                var value_test = $('[name="' + test + '"]:checked').val()
                if (value_test === undefined) {
                    $('#invalid-' + test).show();
                    validation_hasil = false;
                }
                setReviewHasilNarkoba(test, value_test);
            });
            setReviewObat();

            if (validation_hasil === true) {
                stepper2.next()
            }
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


@include('sweetalert::alert') 
@endsection