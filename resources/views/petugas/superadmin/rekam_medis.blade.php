@extends('layouts.dashboard.app')

@section('title', 'Rekam Medis')
@section('medis', 'active')
@section('breadcrumb', 'tambah_rekam_medis')

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

    

@section('css')
<style>
    ::placeholder {
        color: red;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: red;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: red;
    }
</style>

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Rekam Medis')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">

        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 50%">
            <a class="list-group-item list-group-item-action active" id="list-datapasien-list" data-bs-toggle="list"
                href="#list-datapasien" role="tab">Data Pasien</a>
            <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list" data-bs-toggle="list"
                href="#list-pemeriksaan" role="tab">Pemeriksaan</a>

            <a class="list-group-item list-group-item-action" id="list-tindakan-list" data-bs-toggle="list"
                href="#list-tindakan" role="tab">Tindakan</a>
            <a class="list-group-item list-group-item-action" id="list-resep-list" data-bs-toggle="list"
                href="#list-resep" role="tab">Resep Obat</a>
        </div>

        <div class="tab-content text-justify">
            <div class="tab-pane fade show active" id="list-datapasien" role="tabpanel"
                aria-labelledby="list-datapasien-list">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>No Rekam Medis</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                            <select name="pasien_id" id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                    <option disabled selected>Pilih No Rekam Medis</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}|{{ $pas['nama_pasien'] }}|{{ $pas['tanggal_lahir'] }}|{{ $pas['umur'] }}|{{  $pas->perusahaan->nama_perusahaan_pasien }}|{{  $pas->divisi->nama_divisi_pasien }}|{{  $pas->jabatan->nama_jabatan }}|{{   $pas['jenis_kelamin'] }}|{{   $pas['alamat'] }}">{{ $pas['no_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                                    @endforeach
                                                </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                        </div>
                                                        {{-- <div class="col-md-2">
                                                            <label>ID Pasien</label>
                                                        </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput0" class="form-control"
                                                            name="myInput0" placeholder="" disabled> --}}
                                                            
                                                    {{-- </div> --}}
{{--                                                     
                                                    <div class="col-md-6">
                                                        
                                                    </div> --}}
                                                    <div class="col-md-2">
                                                        <label>Nama Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput0" class="form-control"
                                                            name="myInput0" placeholder="ID Pasien" hidden>
                                                        <input type="text" id="myInput1" class="form-control"
                                                            name="myInput1" placeholder="nama pasien" disabled>
                                                    </div>

                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="myInput2" class="form-control"
                                                            name="myInput2" placeholder="tanggal lahir" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>


                                                    <div class="col-md-2">
                                                        <label>Umur</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput3" class="form-control" name="umur"
                                                            placeholder="umur" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput4" class="form-control"
                                                            name="myInput4" placeholder="perusahaan" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput5" class="form-control"
                                                            name="myInput5" placeholder="divisi" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput6" class="form-control"
                                                            name="myInput6" placeholder="jabatan" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput7" class="form-control"
                                                            name="myInput7" placeholder="Jenis Kelamin" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="myInput8" class="form-control"
                                                            name="myInput8" disabled>alamat</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Pemeriksaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="tanggal_pemeriksaan" class="form-control"
                                                            name="tanggal_pemeriksaan" placeholder="Tanggal Pemeriksaan"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Kembali Kontrol</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="tanggal_kembali" class="form-control"
                                                            name="tanggal_kembali" placeholder="Tanggal Kembali Kontrol"
                                                            required>
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

            <div class="tab-pane fade" id="list-pemeriksaan" role="tabpanel" aria-labelledby="list-pemeriksaan-list">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>ID Rekam Medis</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="search" id="id_pasien" class="form-control"
                                                                    name="id_pasien" placeholder="ID Rekam Medis">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Anamnesis/Kronologi</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <textarea name="kronologi" id="kronologi" cols="36" rows="3 "></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Pemeriksa Fisik*</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Tinggi Badan</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="" aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">cm</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Berat Badan</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="" aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">kg</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Suhu Tubuh</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="" aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">Celcius</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Tekanan Darah</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="" aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">mmHg</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Denyut Nadi</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="" aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">/menit</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Laju Pernapasan</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="" aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">/menit</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Saturasi Oksigen</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <input type="text" id="saturasi_oksigen"
                                                                    class="form-control" name="saturasi_oksigen"
                                                                    placeholder="" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Status Lokalis</label>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <textarea type="text" id="status_lokasi"
                                                                    class="form-control"
                                                                    name="status_lokasi">Status Lokalis</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Klasifikasi Penyakit</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <select class="choices form-select" name="klasifikasi_penyakit_id" id="klasi">
                                                                    {{-- <option disabled selected>Pilih Klasifikasi Penyakit</option> --}}
                                                                    @foreach ($klasifikasi as $klasi)
                                                                    <option value="{{ $klasi->id }}">{{$klasi->id}}</option>
                                                                    @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Sub-Klasifikasi Penyakit</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <select class="choices form-select" name="klasifikasi_penyakit_id" id="sub">
                                                                    {{-- <option >Pilih Sub-Klasifikasi Penyakit</option> --}}
                                                                    @foreach ($subklasifikasi as $sub)
                                                                    <option value="{{ $sub->klasifikasi_penyakit_id }}-{{ $sub->id }}">{{ $sub->klasifikasi_penyakit_id }}-{{ $sub->id }}</option>
                                                                    @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                                    <script type="text/javascript">
                                                        $(function() {
                                                          var interval = $('#sub option').clone();
                                                          $('#klasi').on('change', function() {
                                                            var val = this.value;
                                                            $("#sub option").show(); 
                                
                                                            if(val!="")
                                                              $('#sub').html( 
                                                                interval.filter(function() { 
                                                                  return this.value.indexOf( val + '-' ) === 0; 
                                                                })
                                                                );
                                                          })
                                                          .change();
                                                        });
                                                      </script>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">

                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" id="" class="form-control" name=""
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Diagnosa</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <select class="choices form-select" name="nama_penyakit_id" id="nama_penyakit_id">
                                                                    <option disabled selected>Pilih Nama Penyakit</option>
                                                                    @foreach ($namapenyakit as $nama)
                                                                    <option value="{{ $nama->id }}">{{ $nama->primer }}</option>
                                                                    @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Diagnosa Sekunder</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" id="sekunder" class="form-control" name="sekunder"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Obat Yang Dikonsumsi</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <textarea type="text" id="obat_sebelumnya"
                                                                    class="form-control"
                                                                    name="obat_sebelumnya"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Dokumen Pendukung</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-control" type="file" id="dokumen" multiple>
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

            <div class="tab-pane fade" id="list-tindakan" role="tabpanel" aria-labelledby="list-tindakan-list">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Nama Tindakan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="tindakan_id" id="tindakan_id">
                                                            <option disabled selected>Pilih Tindakan</option>
                                                            @foreach ($tindakan as $tindak)
                                                            <option value="{{ $tindak->id }}">{{ $tindak->nama_tindakan }}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Nama Alat Kesehatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="jenis_obat_id" id="jenis_obat_id">
                                                            <option disabled selected>Pilih Alat Kesehatan</option>
                                                            @foreach ($namaobat as $nama)
                                                            <option value="{{ $nama->id }}">{{ $nama->nama_obat }}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Jumlah Pengguna Alat Kesehatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="jumlah_pengguna"
                                                            class="history form-control" name="jumlah_pengguna"
                                                            placeholder="Jumlah Pengguna Alat">
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="keterangan"
                                                            class="history form-control"
                                                            name="keterangan">Keterangan</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-sm-5 d-flex justify-content-end">
                                                        <button class="addListBtn">Click</button>

                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>

                                                </div>
                                                <div class="row" id="table-hover-row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Hoverable rows</h4>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table class="table table-hover mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nama Tindakan</th>
                                                                            <th>Nama Alat Kesehatan</th>
                                                                            <th>Jumlah Pengguna Alat Kesehatan</th>
                                                                            <th>Keterangan</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="name-list">
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
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


            <div class="tab-pane fade" id="list-resep" role="tabpanel" aria-labelledby="list-resep-list">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Nama Obat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="nama_obat_id" id="nama_obat_id">
                                                            <option disabled selected>Pilih Nama Obat</option>
                                                            @foreach ($namaobat as $nama)
                                                            <option value="{{ $nama->id }}">{{ $nama->nama_obat }}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Jumlah Obat</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" id="nama_pasien" class="form-control"
                                                            name="nama_pasien" placeholder="Nama Pasien">
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <select class="choices form-select">
                                                            <optgroup label="klasifikasi">
                                                                <option value="romboid">nama_penyakit</option>
                                                                <option value="trapeze">Batuk</option>
                                                                <option value="triangle">Flu</option>
                                                                <option value="polygon">Demam</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Aturan Obat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="aturan_obat" class="form-control"
                                                            name="aturan_obat" placeholder="Aturan Pakai" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="keterangan" class="form-control"
                                                            name="keterangan">Keterangan</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-sm-5 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                                <div class="row" id="table-hover-row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Hoverable rows</h4>
                                                            </div>

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
            $('#tanggal_lahir').val(data.tanggal_lahir);
            $('#umur').val(data.umur);
            $('#pekerjaan').val(data.pekerjaan);
            $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
            $('#divisi').val(data.divisi.nama_divisi_pasien);
            $('#jabatan').val(data.jabatan.nama_jabatan);
            $('#jenis_kelamin').val(data.jenis_kelamin);
            $('#alamat').val(data.alamat);
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
        });
    });
    </script>




    @include('sweetalert::alert')
    @endsection