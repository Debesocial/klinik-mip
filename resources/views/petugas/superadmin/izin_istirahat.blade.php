@extends('layouts.dashboard.app')

@section('title', 'Izin Istirahat')
@section('izinistirahat', 'active')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('ref/assets/css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset ('ref/assets/css/app.css')}}">

    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/choices.js/choices.min.css')}}" />
    
    <link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="shortcut icon" href="{{asset ('ref/assets/images/favicon.svg" type="image/x-icon')}}">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Izin Istirahat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 95%">
                                    <a class="list-group-item list-group-item-action active"
                                        id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                        role="tab">Data Pasien</a>
                                    <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list"
                                        data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>
                                        
                                    <a class="list-group-item list-group-item-action" id="list-tindakan-list"
                                        data-bs-toggle="list" href="#list-tindakan" role="tab">Tindakan</a>
                                        <a class="list-group-item list-group-item-action" id="list-resep-list"
                                        data-bs-toggle="list" href="#list-resep" role="tab">Terapi Tambahan</a>
                                        <a class="list-group-item list-group-item-action" id="list-dokter-list"
                                        data-bs-toggle="list" href="#list-dokter" role="tab">Rekomendasi Dokter</a>
                                </div>

            <div class="tab-content text-justify">
             <div class="tab-pane fade show active" id="list-datapasien" role="tabpanel" aria-labelledby="list-datapasien-list">                                      
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID Rekam Medis Pasien <b class="color-red">*</b></label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="pasien_id" id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                    <option disabled selected>Pilih ID Rekam Medis Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}|{{ $pas['NIK'] }}|{{ $pas['nama_pasien'] }}|{{ $pas['tanggal_lahir'] }}|{{ $pas['umur'] }}|{{ $pas['pekerjaan'] }}|{{  $pas->perusahaan->nama_perusahaan_pasien }}|{{  $pas->divisi->nama_divisi_pasien }}|{{  $pas->jabatan->nama_jabatan }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                            </div>
                                            <br>
                                                <input type="text" id="myInput0" class="form-control"
                                                    name="myInput0" placeholder="ID Rekam Medis Pasien"  hidden>
                                            

                                            <div class="col-md-2">
                                                <label>Nomor Induk Karyawan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput1" class="form-control"
                                                    name="myInput1"  placeholder="Nomor Induk Karyawan"  disabled>
                                            </div>
                                            <div class="col-md-6">               
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput2" class="form-control"
                                                    name="myInput2" placeholder="Nama Pasien"  disabled>
                                            </div>
                                            <div class="col-md-6">               
                                            </div>

                                            <div class="col-md-2">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="date" id="myInput3" class="form-control"
                                                    name="myInput3" placeholder="Tanggal Lahir"  disabled>
                                            </div>
                                                <div class="col-md-6">
                                            </div>

                                            {{-- <div class="col-md-2">
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput4" class="form-control"
                                                    name="myInput4" placeholder="Umur"  disabled>
                                            </div>
                                                <div class="col-md-6">
                                            </div> --}}

                                            <div class="col-md-2">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput5" class="form-control"
                                                    name="myInput5" placeholder="Pekerjaan"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                            <div class="col-md-2">
                                                <label>Perusahaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput6" class="form-control"
                                                    name="myInput6" placeholder="Perusahaan"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Divisi</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="myInput7" class="form-control"
                                                        name="myInput7" placeholder="Divisi"  disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                
                                                    <div class="col-md-2">
                                                        <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput8" class="form-control"
                                                            name="myInput8" placeholder="Jabatan"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        </div>

        <div class="tab-pane fade" id="list-pemeriksaan" role="tabpanel"
                                        aria-labelledby="list-pemeriksaan-list">
                                        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label>Keluhan <b class="color-red">*</b></label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="keluhan" class="form-control"
                                                    name="keluhan" > </textarea>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>ID Rekam Medis <b class="color-red">*</b></label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="search" id="id_rekam_medis" class="form-control"
                                                        name="id_rekam_medis" placeholder="ID Rekam Medis" required >
                                                </div>
                                                <div class="col-md-6">
                                                    </div>    

                                                    <div class="col-md-2">
                                                        <label>Diagnosa <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="diagnosa" class="form-control"
                                                            name="diagnosa" placeholder="Diagnosa" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Diagnosa Sekunder <b class="color-red">*</b></label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="diagnosa_sekunder" class="form-control"
                                                                name="diagnosa_sekunder" placeholder="Diagnosa Sekunder" required >
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>
                                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </section>
        </div>

        <div class="tab-pane fade" id="list-tindakan" role="tabpanel"
                                        aria-labelledby="list-tindakan-list">
                                        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label>Nama Tindakan </label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="tindakan" class="form-control"
                                                    name="tindakan" >
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Nama Alat Kesehatan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="alat_kesehatan" class="form-control"
                                                        name="alat_kesehatan" placeholder="Nama Alat Kesehatan" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>    

                                                    <div class="col-md-2">
                                                        <label>Jumlah Pengguna Alat Kesehatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="jumlah_pengguna" class="form-control"
                                                            name="jumlah_pengguna" placeholder="Jumlah Pengguna Alat Kesehatan" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="diagnosa" class="form-control"
                                                            name="diagnosa" required disabled></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        </div>


        <div class="tab-pane fade" id="list-resep" role="tabpanel"
                                        aria-labelledby="list-resep-list">
                                        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label>Nama Obat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_obat" class="form-control"
                                                    name="nama_obat" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Jumlah Obat</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="jumlah_obat" class="form-control"
                                                        name="jumlah_obat" placeholder="Jumlah Obat" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>    

                                                    <div class="col-md-2">
                                                        <label>Aturan Pakai</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="aturan_pakai" class="form-control"
                                                            name="aturan_pakai" placeholder="Aturan Pakai" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="diagnosa" class="form-control"
                                                            name="diagnosa" required disabled></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                    </div>
                                    <div class="row" id="table-hover-row">
                                        <div class="col-12">
                                            <div class="card">
                                                {{-- <div class="card-header">
                                                    <h4 class="card-title">Hoverable rows</h4>
                                                </div> --}}
                                                
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Obat</th>
                                                                    <th>Jumlah Obat</th>
                                                                    <th>Aturan Pakai</th>
                                                                    <th>Keterangan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Martuani</td>
                                                                    <td>Sitohang</td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        </div>

        <div class="tab-pane fade" id="list-dokter" role="tabpanel"
                                        aria-labelledby="list-dokter-list">
                                        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Dapat Bekerja Seperti Biasa
                                                <label for="">
                                            </div>
                                            <div class="col-md-6">
                                                </div> 

                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Dapat Bekerja dengan Catatan
                                                    <label for="">
                                                </div>
                                                <div class="col-md-6">
                                                    </div> 

                                                    <div class="col-md-2">
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="nama_obat" class="form-control"
                                                            name="nama_obat">Catatan</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>   

                                                        <div class="col-md-2">
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Istirahat di MESS Karyawan
                                                            <label for="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" id="waktu" class="form-control"
                                                            name="waktu">
                                                            </div> 
                                                            <div class="col-md-4">
                                                            </div> 

                                                            <div class="col-md-2">
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <label for="">Dari tanggal</label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="date" id="tanggal_dari" class="form-control"
                                                            name="tanggal_dari">
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div> 

                                                                <div class="col-md-2">
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <label for="">Sampai tanggal</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input type="date" id="tanggal_sampai" class="form-control"
                                                                name="tanggal_sampai">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div> 

                                                                    <div class="col-md-2">
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Rujukan ke Tarakan
                                                                        <label for="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div> 

                                                                        <div class="col-md-2">
                                                                        </div>
                                                                        <div class="col-md-2 form-group">
                                                                           <label for="">Dokter Spesialis Rujukan</label>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <select name="spesialis_rujukan_id" id="spesialis_rujukan_id" class="choices form-select" required>
                                                                                <option disabled selected>Pilih Dokter Spesialis</option>
                                                                                @foreach ($spesialisrujukan as $spesialis)
                                                                                    <option value="{{ $spesialis['id'] }}">{{ $spesialis['nama_spesialis_rujukan'] }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            </div>   
                                                                            <div class="col-md-4">
                                                                                </div> 

                                                                                <div class="col-md-2">
                                                                                </div>
                                                                                <div class="col-md-2 form-group">
                                                                                   <label for="">Rumah Sakit Rujukan</label>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <select name="rumah_sakit_rujukan_id" id="rumah_sakit_rujukan_id" class="choices form-select" required>
                                                                                        <option disabled selected>Pilih Rumah Sakit</option>
                                                                                        @foreach ($rsrujukan as $rs)
                                                                                            <option value="{{ $rs['id'] }}">{{ $rs['nama_RS_rujukan'] }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    </div>   
                                                                                    <div class="col-md-4">
                                                                                        </div> 

                                                                                        <div class="col-md-2">
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <label>Dokter Yang Memeriksa</label>
                                                                                        </div>
                                                                                        <div class="col-md-4 form-group">
                                                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Tanda Tangan
                                                                                            <label for="">
                                                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked> Tanda Tangan Tersimpan
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                            </div>
                                                                                            <div class="col-md-4 form-group">
                                                                                                <textarea type="text" id="ttd" class="form-control"
                                                                                                    name="ttd"></textarea>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                </div> 

                                                                                                <div class="col-md-6">
                                                                                                </div>
                                                                                                <div class="col-sm-5 d-flex justify-content-end">
                                                                                                    <button type="submit"
                                                                                                        class="btn btn-primary me-1 mb-1">Simpan</button>
                                                                                                    <button type="reset"
                                                                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                                                </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        </div>

        </div>
                </div>   

                <script src="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
                <script src="{{asset ('ref/assets/js/bootstrap.bundle.min.js')}}"></script>
                
            <!-- Include Choices JavaScript -->
            <script src="{{asset ('ref/assets/vendors/choices.js/choices.min.js')}}"></script>
            <script src="{{asset ('ref/assets/js/pages/form-element-select.js')}}"></script>
            
                {{-- <script src="{{asset ('ref/assets/js/mazer.js')}}"></script> --}}
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
            
                
            
                {{-- <script src="assets/js/mazer.js"></script> --}}
            
                {{-- <script>
                     $(document).ready(function () {
                    $('#pasien_id').select2();
                    $('#pasien_id').on('change', function (e) {
                        var data = $('#pasien_id').select2("val");
                        @this.set('pasien_id', data);
                    });
                });
                </script> --}}
            
            <script type="text/javascript">
                    function myChangeFunction(input1) {
              let text = input1.value;
              const myArray = text.split("|");
              var input0 = document.getElementById('myInput0');
              var input1 = document.getElementById('myInput1');
              var input2 = document.getElementById('myInput2');
              var input3 = document.getElementById('myInput3');
              var input4 = document.getElementById('myInput4');
              var input5 = document.getElementById('myInput5');
              var input6 = document.getElementById('myInput6');
              var input7 = document.getElementById('myInput7');
              var input8 = document.getElementById('myInput8');
              var input9 = document.getElementById('myInput9');
              input0.value = myArray[0];
              input1.value = myArray[1];
              input2.value = myArray[2];
              input3.value = myArray[3];
              input4.value = myArray[4];
              input5.value = myArray[5];
              input6.value = myArray[6];
              input7.value = myArray[7];
              input8.value = myArray[8];
            }
                </script>
            
                {{-- <script>
                    const userList = document.querySelectorAll(".name-list tr");
                const history = document.querySelector(".history");
                const addListBtn = document.querySelector(".addListBtn");
            
                addListBtn.addEventListener('click', function(){
                    const newLi = document.createElement('LI');
                    const liContent = document.createTextNode('sdf');
                    
                    newLi.appendChild(liContent);
                    userList.appendChild(newLi);
                });
                </script> --}}
            
                <script
                src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
                integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA="
                crossorigin="anonymous"></script>
            
                <script type="text/javascript">
                    $("#pasien_id").click(function(e) {
                    var pasien = $(this).val();
            
                    console.log(pasien);
                    
                    $.ajax({
                        type: "GET",
                        url: "{{route('superadmin.datapasien.id')}}",
                        data: {'pasien': pasien},
                        dataType: 'json',
                        success:  function(data) {
                            console.log(data);
                        $('#nama_pasien').val(data.nama_pasien);
                        $('#NIK').val(data.NIK);
                        $('#tanggal_lahir').val(data.tanggal_lahir);
                        $('#umur').val(data.umur);
                        $('#pekerjaan').val(data.pekerjaan);
                        $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
                        $('#divisi').val(data.divisi.nama_divisi_pasien);
                        $('#jabatan').val(data.jabatan.nama_jabatan);
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                    });
                });
                </script>

@endsection