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
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Second step</span>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-nl-3">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Third step</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form class="form" action="/periksa/narkoba" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pasien_id">
                        <div id="test-nl-1" class="content">
                            <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Silahkan pilih Pasien berdasarkan <b>ID rekam medis</b><b class="color-red"> *</b></label>
                                            <select id="select_pasien_id" class="choices form-select" onchange="pilihPasien(this)">
                                                <option value="" selected>Pasien</option>
                                                @foreach ($pasien_id as $key=>$pas)
                                                    <option value="{{ $key }}" perusahaan="{{ $pas->perusahaan->nama_perusahaan_pasien }}" divisi = {{ $pas->divisi->nama_divisi_pasien }} jabatan={{ $pas->jabatan->nama_jabatan }}> {{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
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
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.next()">Lanjut</button>
                            </div>
                        </div>
                        <div id="test-nl-2" class="content">
                            <p class="text-center">test 4</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()">Sebelumnya</button>
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.next()">Lanjut</button>
                            </div>
                        </div>
                        <div id="test-nl-3" class="content">
                            <p class="text-center">test 6</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()">Sebelumnya</button>
                                <button type="submit" class="btn btn-primary rounded-pill" onclick="stepper2.next()">Simpan</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
            
        </div>
    </div>
   
    @section('js')
        <script>
            $(document).ready(function () {
                $('select#select_pasien_id').selectize({
                    sortField: 'text'
                });
            });
            var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                linear: false,
                animation: true
             })
    
             function pilihPasien(data) {
                var pasien_index = $('#select_pasien_id').val();
                if (pasien_index === '') {
                    $('#detail_pasien').fadeOut('slow')
                }else{
                    var pasien = @json($pasien_id)[pasien_index];
                    $('[name=pasien_id]').val(pasien.id)
                    $('td#nama').text(": "+pasien.nama_pasien);
                    $('td#rekam_medis').text(": "+pasien.id_rekam_medis);
                    $('td#nomor_induk_karyawan').text(": "+pasien.NIK)
                    $('td#ttl').text(": "+pasien.tempat_lahir+', '+pasien.tanggal_lahir)
                    $('td#alamat').text(": "+pasien.alamat)
                    $('td#pekerjaan').text(": "+pasien.pekerjaan)
                    $('td#perusahaan').text(": "+pasien.perusahaan.nama_perusahaan_pasien)
                    $('td#divisi').text(": "+pasien.divisi.nama_divisi_pasien)
                    $('td#jabatan').text(": "+pasien.jabatan.nama_jabatan)
                    $('td#jenis_kelamin').text(": "+pasien.jenis_kelamin)
                    $('td#telepon').text(": "+pasien.telepon)
                    var email = pasien.email ?? '-'
                    $('td#email').text(": "+email);

                    $('#detail_pasien').fadeIn('slow')
                    
                }
             }
        </script>
    @stop
    
</section>
@include('sweetalert::alert') 
@endsection