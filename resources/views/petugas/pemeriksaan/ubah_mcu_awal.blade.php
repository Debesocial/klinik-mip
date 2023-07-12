@extends('layouts.dashboard.app')

@section('title', 'Ubah MCU Awal')
@section('judul', 'Ubah MCU Awal')
@section('breadcrumb', 'ubah_mcu_awal')
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
                    <form class="form needs-validation" id="form_mcu_awal" action="/ubah_mcu/awal/{{ $mcuawal->id }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="pasien_id" value="{{ $mcuawal->pasien->id }}">
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                <div class="row mt-3" id="detail_pasien">
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
                                                <option disabled>Pilih Pemantauan</option>
                                                @foreach ($hasilrekomendasi as $hasil)
                                                <option value="{{ $hasil->id }}" {{ ($hasil->id==$mcuawal->hasil_rekomendasi)? 'selected':'' }}>
                                                    {{$hasil->nama }}
                                                </option>
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
                                            <textarea type="text" id="anjuran" class="form-control" name="anjuran" required >{{ $mcuawal->anjuran }}</textarea>
                                            <div class="valid-feedback">
                                                Data sudah benar
                                            </div>
                                            <div class="invalid-feedback">
                                                Anjuran harus diisi
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Penyedia/Vendor <b class="text-danger">*</b></label>
                                            <select name="id_jenis_vendor_mcu" id="id_jenis_vendor_mcu" class="form-select">
                                                <option value="">Pilih Vendor</option>
                                                <option value="1" {{$mcuawal->id_jenis_vendor_mcu == 1?'selected':''}}>Rumah Sakit</option>
                                                <option value="2" {{$mcuawal->id_jenis_vendor_mcu == 2?'selected':''}}>Laboratorium</option>
                                                <option value="3" {{$mcuawal->id_jenis_vendor_mcu == 3?'selected':''}}>Perusahaan Jasa K3</option>
                                                <option value="4" {{$mcuawal->id_jenis_vendor_mcu == 4?'selected':''}}>Lain-lain</option>
                                            </select>
                                            <div class="mt-2" id="form-other" style="display:{{$mcuawal->id_jenis_vendor_mcu != 4?'none':''}}">
                                                <textarea type="text" class="form-control" name="others_jenis_vendor_mcu" id="others_jenis_vendor_mcu" placeholder="Masukkan penyedia/vendor lainnya">{{$mcuawal->others_jenis_vendor_mcu??''}}</textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Vendor<b class="text-danger">*</b></label>
                                            <input type="text" name="nama_vendor_mcu" id="nama_vendor_mcu" class="form-control" value="{{$mcuawal->nama_vendor_mcu}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">File Pendukung <small class="text-warning">**File maksimal berukuran 20MB </small></label><br>
                                            @if ($mcuawal->dokumen)
                                                <a href="{{asset('pemeriksaan/mcuAwal/'.$mcuawal->dokumen)}}" target="blank">{{$mcuawal->dokumen}}</a>
                                            @else
                                                <small class="text-warning">Belum ada dokumen</small>
                                            @endif
                                            <input type="file" name="dokumen" id="dokumen" class="form-control">
                                            {!!validasi('Ukuran file', 'terlalu besar')!!}
                                            <input type="hidden" name="old_dokumen" value="{{$mcuawal->dokumen}}">
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
                                                <tr>
                                                    <th>Vendor/Penyedia</th>
                                                    <td id="_id_jenis_vendor_mcu"></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Vendor</th>
                                                    <td id="_nama_vendor_mcu"></td>
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
            $(document).ready(function() {
                setPasien(@json($mcuawal->pasien));
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

                    }
                    if ($(this).attr('id')=='id_jenis_vendor_mcu') {
                        if ($(this).val()==4) {
                            $('#form-other').show()
                        }else{
                            $('#form-other').hide()
                            $('#others_jenis_vendor_mcu').val('');
                        }
                    }
                })

            });

            function lanjut1() {
                stepper2.next()
            }

            function lanjut2() {
                var validated = true;
                var inputs = ['hasil_rekomendasi', 'anjuran', 'id_jenis_vendor_mcu', 'nama_vendor_mcu'];
                if ($('#id_jenis_vendor_mcu').val()==4) {
                    inputs = ['hasil_rekomendasi', 'anjuran', 'id_jenis_vendor_mcu', 'nama_vendor_mcu','others_jenis_vendor_mcu'];
                }
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
                if (id =='id_jenis_vendor_mcu') {
                    val = $('#'+id).children('option:selected').text();
                    if ($('#'+id).children('option:selected').val()==4) {
                        val = $('#others_jenis_vendor_mcu').val();
                    }
                }
                td.text(': '+val);
            }

        </script>
    @stop

</section>
@endsection