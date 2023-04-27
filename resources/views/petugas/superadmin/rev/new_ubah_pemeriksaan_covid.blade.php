@extends('layouts.dashboard.app')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')
@section('breadcrumb', 'ubah_pemeriksaan_covid')

@section('title', 'Ubah Pemeriksaan Covid-19')
@section('judul', 'Ubah Pemeriksaan Covid-19')
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
                    <form class="form needs-validation" action="/ubah/pemeriksaan/covid/{{ $covid->id }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="text" id="myInput0" class="form-control" name="pasien_id" placeholder="ID Pasien" value="{{ $covid->pasien_id }}"  hidden>
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                <div class="row">
                                </div>
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
                                                                    <td id="nama">: {{ $covid->pasien->nama_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>ID Rekam Medis</th>
                                                                    <td id="rekam_medis">: {{ $covid->pasien->id_rekam_medis }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Nomor Induk Karyawan</th>
                                                                    <td id="nomor_induk_karyawan">: {{ $covid->pasien->NIK }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tempat Tanggal Lahir</th>
                                                                    <td id="ttl">: {{ $covid->pasien->tempat_lahir.', '.$covid->pasien->tanggal_lahir }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td id="alamat">: {{ $covid->pasien->alamat }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pekerjaan</th>
                                                                    <td id="pekerjaan">: {{ $covid->pasien->pekerjaan }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table>
                                                            <tbody>

                                                                <tr>
                                                                    <th>Perusahaan</th>
                                                                    <td id="perusahaan">: {{ $covid->pasien->perusahaan->nama_perusahaan_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Divisi</th>
                                                                    <td id="divisi">: {{ $covid->pasien->divisi->nama_divisi_pasien }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jabatan</th>
                                                                    <td id="jabatan">: {{ $covid->pasien->jabatan->nama_jabatan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Jenis Kelamin</th>
                                                                    <td id="jenis_kelamin">: {{ $covid->pasien->jenis_kelamin }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Telepon</th>
                                                                    <td id="telepon">: {{ $covid->pasien->telepon }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td id="email">: {{ $covid->pasien->email }}</td>
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
                            <div class="container mb-3">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-6">
                                        <label class="form-label">Hasil Pemeriksaan <b class="color-red">*</b></label>
                                        <input class="form-check-input ms-2" type="radio" name="hasil_pemeriksaan"id="hasil_pemeriksaan" value="0" {{ ($covid->hasil_pemeriksaan==0)? 'checked':'' }}>
                                        <label class="form-check-label" for="negatif"> Negatif</label>&emsp;
                                        <input class="form-check-input ms-2" type="radio" name="hasil_pemeriksaan" id="hasil_pemeriksaan" value="1" {{ ($covid->hasil_pemeriksaan==1)? 'checked':'' }}>
                                        <label class="form-check-label" for="positif"> Positif </label> 
                                        <div class="valid-feedback" id="validHasil">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback" id="invalidHasil">
                                            Silahkan pilih hasil pemeriksaan.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Kebutuhan Pemeriksaan <b class="color-red">*</b></label>
                                        <select name="pemeriksaan_antigen_id" id="pemeriksaan_antigen_id" class="form-select">
                                            <option disabled>Kebutuhan Pemeriksaan</option>
                                            @foreach ($pemeriksaanantigen as $antigen)
                                                <option value="{{ $antigen['id'] }}" {{ ($covid->pemeriksaan_antigen_id==$antigen['id'])? 'selected':'' }}>{{ $antigen['kebutuhan'] }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            Data sudah benar
                                        </div>
                                        <div class="invalid-feedback">
                                            Silahkan pilih kebutuhan pemeriksaan.
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
                            <div class="container mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Biodata Pasien</h5>
                                        <div class="table-responsive">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Nama Pasien</th>
                                                        <td id="nama">: {{ $covid->pasien->nama_pasien }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>ID Rekam Medis</th>
                                                        <td id="rekam_medis">: {{ $covid->pasien->id_rekam_medis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor Induk Karyawan</th>
                                                        <td id="nomor_induk_karyawan">: {{ $covid->pasien->NIK }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tempat Tanggal Lahir</th>
                                                        <td id="ttl">: {{ $covid->pasien->tempat_lahir.', '.$covid->pasien->tanggal_lahir }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td id="alamat">: {{ $covid->pasien->alamat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pekerjaan</th>
                                                        <td id="pekerjaan">: {{ $covid->pasien->pekerjaan }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Data Pemeriksaan</h5>
                                        <table class="table table-borderless table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Kebutuhan Pemeriksaan</th>
                                                    <td id="kebutuhan"></td>
                                                </tr>
                                                <tr>
                                                    <th>Hasil Pemeriksaan</th>
                                                    <td id="hasil"></td>
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
                                <button type="submit" class="btn btn-primary rounded-pill"><b>Simpan</b> <i
                                        class="bi bi-save"></i></button>
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
        $(document).ready(function(){
            $('[name=pemeriksaan_antigen_id]').change(function(){
                var value = $(this).val();
                if(value==null){
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                }else{
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }
            })
            $('[name="hasil_pemeriksaan"]').change(function(){
                var input = $('[name="hasil_pemeriksaan"]:checked');
                var invalidHasil = $('#invalidHasil');
                var valid = $('#valid');
                if (input.val == undefined) {
                    invalidHasil.show();
                    valid.hide();
                }else{
                    invalidHasil.hide();
                    valid.show();   
                }
            })
        })
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

        function lanjut2(){
            var kebutuhan = $('[name=pemeriksaan_antigen_id]');
            var hasil = $('[name="hasil_pemeriksaan"]:checked');
            var validated = true;
            if (kebutuhan.val()==null ) {
                validated = false;
                kebutuhan.removeClass('is-valid');
                kebutuhan.addClass('is-invalid');
            }else{
                kebutuhan.addClass('is-valid');
                kebutuhan.removeClass('is-invalid');
            }
            var invalidHasil = $('#invalidHasil');
            var valid = $('#valid');
            if(hasil.val()==undefined){
                validated = false;
                invalidHasil.show();
                valid.hide();
            }else{
                valid.show();
                invalidHasil.hide();
            }

            if(validated == true){
                var textKebutuhan = kebutuhan.children('[value="'+kebutuhan.val()+'"]').text();
                $('#kebutuhan').text(': '+textKebutuhan);
                var textHasil = ""
                if(hasil.val()==0){
                    textHasil = ': <span class="badge bg-primary">Negatif</span>'
                }else{
                    textHasil = ': <span class="badge bg-danger">Positif</span>'
                }
                $('#hasil').html(textHasil);
                stepper2.next();
            }
        }
        
        
    </script>
@stop

@include('sweetalert::alert') 
@endsection