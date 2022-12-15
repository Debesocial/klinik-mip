@extends('layouts.dashboard.app')

@section('title', 'Keterangan Berobat')
@section('berobat', 'active')
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
        @section('judul', 'Keterangan Berobat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">

        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 50%">
            <a class="list-group-item list-group-item-action active" id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien" role="tab">Data Pasien</a>
            <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list" data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>

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
                                        <form class="form form-horizontal" action="/keterangan/berobat" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">


                                                    <div class="col-md-2">
                                                        <label>ID Rekam Pasien Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select name="" id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                            <option disabled selected>Pilih ID Rekam Medis Pasien</option>
                                                            @foreach ($pasien_id as $pas)
                                                                <option value="{{ $pas['id'] }}|{{ $pas['nama_pasien'] }}|{{ $pas['pekerjaan'] }}|{{  $pas->perusahaan->nama_perusahaan_pasien }}|{{  $pas->divisi->nama_divisi_pasien }}|{{  $pas->jabatan->nama_jabatan }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <input type="text" id="myInput0" class="form-control"
                                                    name="pasien_id"  placeholder="ID Pasien" hidden>

                                                    <div class="col-md-2">
                                                        <label>Nama Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput1" class="form-control" name="myInput1" placeholder="Masukkan nama pasien" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput2" class="form-control" name="myInput2" placeholder="Masukkan pekerjaan" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput3" class="form-control" name="myInput3" placeholder="Masukkan perusahaan" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput4" class="form-control" name="myInput4" placeholder="Masukkan divisi" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput5" class="form-control" name="myInput5" placeholder="Masukkan jabatan" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>


                                                </div>
                                            </div>

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
                                {{-- <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div> --}}
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Nama Klinik Praktek/Rumah Sakit</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select name="rumah_sakit_rujukans_id" id="rumah_sakit_rujukans_id" class="form-select">
                                                        <option disabled selected>Pilih Rumah Sakit Rujukan</option>
                                                        @foreach ($rsrujukan as $rs)
                                                        <option value="{{ $rs['id'] }}">{{ $rs['nama_RS_rujukan'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                </div>




                                                <div class="col-md-2">
                                                    <label>Diagnosa</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select name="nama_penyakit_id" id="nama_penyakit_id" class="form-select">
                                                        <option disabled selected>Pilih Nama Penyakit</option>
                                                        @foreach ($namapenyakit as $nama)
                                                        <option value="{{ $nama['id'] }}">{{ $nama['primer'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Diagnosa Sekunder</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <textarea type="text" id="sekunder" class="form-control" name="sekunder"> </textarea>
                                                </div>
                                                <div class="col-md-6">
                                                </div>



                                                <div class="col-md-2">
                                                    <label>Pasien diresepkan obat</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <textarea type="text" id="resep" class="form-control" name="resep"> </textarea>
                                                </div>
                                                <div class="col-md-6">
                                                </div>


                                                <div class="col-md-2">
                                                    <label>Saran untuk Pasien</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <textarea type="text" id="saran" class="form-control" name="saran"></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                </div>


                                                <div class="col-md-2">
                                                    <label>Pasien Harus Kontrol Kembali</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="kontrol" id="kontrol" value="0" checked> Tidak
                                                    <label for="">
                                                        <input class="form-check-input" type="radio" name="kontrol" id="kontrol" value="1"> Ya
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Tanggal Pengembalian Surat Rujukan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="date" id="tanggal_kembali" class="form-control" name="tanggal_kembali">
                                                </div>
                                                <div class="col-md-6">
                                                </div>


                                                <div class=" d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1 btn-form">Simpan</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1 btn-form">Reset</button>
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
              input0.value = myArray[0];
              input1.value = myArray[1];
              input2.value = myArray[2];
              input3.value = myArray[3];
              input4.value = myArray[4];
              input5.value = myArray[5];
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
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                    });
                });
                </script>
    
    @endsection