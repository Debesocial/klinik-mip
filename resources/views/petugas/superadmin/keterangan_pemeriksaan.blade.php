@extends('layouts.dashboard.app')

@section('title', 'Surat Keterangan Pemeriksaan Kesehatan')
@section('medical', 'active')
@section('cek', 'active')
@section('hasil', 'active')
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
        @section('judul', 'Surat Keterangan Pemeriksaan Kesehatan')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" accept="/keterangan/pemeriksaan" method="post">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID Surat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="" id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}|{{ $pas['nama_pasien'] }}|{{ $pas['tanggal_lahir'] }}|{{ $pas['pekerjaan'] }}|{{  $pas->perusahaan->nama_perusahaan_pasien }}">{{ $pas['id'] }} - {{ $pas['nama_pasien'] }} </option>
                                                    @endforeach
                                                </select>
                                                <input type="seacrh" id="myInput0" class="form-control"
                                                    name="pasien_id" placeholder="ID Pasien" hidden>
                                            </div>
                                            

                                            <div class="col-md-2">
                                                <label>Deskripsi Hasil MCU</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="deskripsi_hasil" class="form-control"
                                                    name="deskripsi_hasil" required > </textarea>
                                            </div>
                                            <div class="col-md-12">
                                            </div>
                                            

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="seacrh" id="myInput1" class="form-control"
                                                    name="myInput1" placeholder="Nama Pasien" disabled>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi Obat/Tindakan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="deskripsi_obat" class="form-control"
                                                    name="deskripsi_obat" required > </textarea>
                                            </div>
                                            <div class="col-md-12">
                                            </div>

                                            

                                            <div class="col-md-2">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput2" class="form-control"
                                                    name="myInput2" placeholder="Tanggal Lahir" disabled>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Rekomendasi untuk Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="rekomendasi" class="form-control"
                                                    name="rekomendasi" required > </textarea>
                                            </div>
                                            <div class="col-md-12">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput3" class="form-control"
                                                    name="myInpu3" placeholder="Pekerjaan"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                            <div class="col-md-2">
                                                <label>Perusahaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput4" class="form-control"
                                                    name="myInput4" placeholder="Perusahaan"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Tanggal Pemeriksaan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="date" id="tanggal_pemeriksaan" class="form-control"
                                                        name="tanggal_pemeriksaan" placeholder="Perusahaan"  >
                                                </div>
                                                <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Jenis Pemeriksaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="jenis_pemeriksaan" id="jenis_pemeriksaan" required>
                                                            <option value="" disabled selected>Pilih Pemeriksaan</option>
                                                                    <option value="Khusus">Khusus</option>
                                                                    <option value="Berkala">Berkala</option>
                                                                    <option value="Akhir">Akhir</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <select class="choices form-select" name="status" id="status" required>
                                                                <option value="" disabled selected>Pilih</option>
                                                                        <option value="Aktif">Aktif</option>
                                                                        <option value="NonAktif">NonAktif</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>
                                                
                                            

                                            <div class="col-sm-12 d-flex justify-content-end">
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
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                    });
                });
                </script>
@endsection