@extends('layouts.dashboard.app')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')

@section('title', 'Pemeriksaan Covid-19')


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
        @section('judul', 'Pemeriksaan Covid-19')
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
                                <form class="form form-horizontal" action="/pemeriksaan/covid" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}|{{ $pas['nama_pasien'] }}|{{ $pas['NIK'] }}|{{ $pas['tempat_lahir'] }}|{{ $pas['tanggal_lahir'] }}|{{   $pas['alamat'] }}|{{ $pas['pekerjaan'] }}| {{  $pas->perusahaan->nama_perusahaan_pasien }}|{{  $pas->divisi->nama_divisi_pasien }}|{{  $pas->jabatan->nama_jabatan }}|{{   $pas['jenis_kelamin'] }}|{{ $pas['telepon'] }}|{{ $pas['email'] }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Kebutuhan Pemeriksaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="pemeriksaan_antigen_id" id="pemeriksaan_antigen_id" class="form-select">
                                                    <option disabled selected>Kebutuhan Pemeriksaan</option>
                                                    @foreach ($pemeriksaanantigen as $antigen)
                                                        <option value="{{ $antigen['id'] }}">{{ $antigen['kebutuhan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>

                                            <input type="text" id="myInput0" class="form-control" name="pasien_id" placeholder="ID Pasien"  hidden>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput1" class="form-control"
                                        name="nama_pasien" placeholder="nama pasien"  disabled>
                                            </div>


                                            <div class="col-md-2">
                                                <label>Hasil Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                            <input class="form-check-input" type="radio" name="hasil_pemeriksaan"
                                                 id="hasil_pemeriksaan" value="0">
                                            <label class="form-check-label" for="negatif">    Negatif
                                            </label>
                                            <input class="form-check-input" type="radio" name="hasil_pemeriksaan"
                                                 id="hasil_pemeriksaan" value="1">
                                            <label class="form-check-label" for="positif"> Positif
                                             </label>  
                                            </div>

                                <div class="col-md-2">
                                    <label>Nomor Induk Karyawan</label>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" id="myInput2" class="form-control"
                                        name="NIK" placeholder="Nomor Induk Karyawan" disabled>
                                </div>

                                <div class="col-md-2">
                                    <label>File Pendukung</label>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input class="form-control" type="file" id="file" name="file">
                                </div>
                            
                            <div class="col-md-2">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput3" class="form-control"
                                    name="tempat_lahir" placeholder="tempat lahir"  disabled>
                            </div>
                            <div class="col-md-6">
                                </div>
                            <div class="col-md-2">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="date" id="myInput4" class="form-control"
                                    name="tanggal_lahir" placeholder="Tanggal Lahir"  disabled>
                            </div>
                            <div class="col-md-6">
                                </div>
                            <div class="col-md-2">
                                <label>Alamat</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput5" class="form-control"
                                    name="alamat" placeholder="alamat" disabled >
                            </div>
                            <div class="col-md-6">
                                </div>
                            <div class="col-md-2">
                                <label>Pekerjaan</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput6" class="form-control"
                                    name="pekerjaan" placeholder="pekerjaan"  disabled>
                            </div>
                            <div class="col-md-6">
                                </div>

                                

                            <div class="col-md-2">
                                <label>Perusahaan</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput7" class="form-control"
                            name="perusahaan" placeholder="perusahaan" disabled>
                            </div>
                            <div class="col-md-6">
                                </div>
                                <div class="col-md-2">
                                <label>Divisi</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="myInput8" class="form-control"
                            name="divisi" placeholder="divisi" disabled>
                            </div>
                            <div class="col-md-6">
                                </div>
                                <div class="col-md-2">
                                    <label>Jabatan</label>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" id="myInput9" class="form-control"
                            name="jabatan" placeholder="jabatan" disabled>
                                </div>
                                <div class="col-md-6">
                                    </div>

                                        <div class="col-md-2">
                                            <label>Jenis kelamin</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" id="myInput10" class="form-control"
                                          name="jenis_kelamin" placeholder="jenis kelamin" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Telepon</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="myInput11" class="form-control"
                                                    name="telepon" placeholder="telepon"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="email" id="myInput12" class="form-control"
                                                        name="email" placeholder="email" disabled >
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                            
                                            <div class="col-sm-6 d-flex justify-content-end">
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
      var input6 = document.getElementById('myInput6');
      var input7 = document.getElementById('myInput7');
      var input8 = document.getElementById('myInput8');
      var input9 = document.getElementById('myInput9');
      var input10 = document.getElementById('myInput10');
      var input11 = document.getElementById('myInput11');
      var input12 = document.getElementById('myInput12');
      input0.value = myArray[0];
      input1.value = myArray[1];
      input2.value = myArray[2];
      input3.value = myArray[3];
      input4.value = myArray[4];
      input5.value = myArray[5];
      input6.value = myArray[6];
      input7.value = myArray[7];
      input8.value = myArray[8];
      input9.value = myArray[9];
      input10.value = myArray[10];
      input11.value = myArray[11];
      input12.value = myArray[12];
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
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#pekerjaan').val(data.pekerjaan);
                $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
                $('#divisi').val(data.divisi.nama_divisi_pasien);
                $('#jabatan').val(data.jabatan.nama_jabatan);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#alamat').val(data.alamat);
                $('#telepon').val(data.telepon);
                $('#email').val(data.email);
            },
            error: function(response) {
                alert(response.responseJSON.message);
            }
            });
        });
        </script>


        @include('sweetalert::alert') 
@endsection