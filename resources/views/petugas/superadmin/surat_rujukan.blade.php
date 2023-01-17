@extends('layouts.dashboard.app')

@section('title', 'Surat Rujukan')
@section('suratrujukan', 'active')
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
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>

@endsection

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Surat Rujukan')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="/surat/rujukan" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">ID Rekam Pasien pasien <b class="color-red">*</b></label>
                                                <select name="" id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                    <option disabled selected>Pilih ID Rekam Medis Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}|{{ $pas['nama_pasien'] }}|{{  $pas->perusahaan->nama_perusahaan_pasien }}|{{ $pas['pekerjaan'] }}|{{  $pas->divisi->nama_divisi_pasien }}|{{  $pas->jabatan->nama_jabatan }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <input type="text" id="myInput0" class="form-control"
                                                    name="pasien_id"  placeholder="ID Pasien" hidden>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="">Tempat Pemeriksaan <b class="color-red">*</b></label>
                                                            <input type="text" id="tempat" class="form-control"
                                                                name="tempat" placeholder="Masukkan Tempat Pemeriksaan" required>
                                                        </div>
                                                    </div>

                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien </label>
                                                <input type="text" id="myInput1" class="form-control"
                                                    name="myInput1" placeholder="Nama Pasien" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Pemeriksaan <b class="color-red">*</b></label>
                                                <input type="date" id="tanggal" class="form-control"
                                                placeholder="Tanggal Pemeriksaan" name="tanggal" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="perusahaan">Perusahaan </label>
                                                <input type="text" id="myInput2" class="form-control"
                                                    name="myInput2" placeholder="Masukkan Nama Perusahaan" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">File Pendukung <b class="color-red">*</b></label>
                                                <input class="form-control" type="file" id="ttd" name="ttd" multiple >
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan </label>
                                                <input type="text" id="myInput3" class="form-control"
                                                    name="myInput3" placeholder="Masukkan Pekerjaan" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="dokter_rujukan">Dokter Spesialis Rujukan <b class="color-red">*</b></label>
                                                <select name="spesialis_rujukan_id" id="spesialis_rujukan_id" class="choices form-select" required>
                                                    <option disabled selected>Pilih nama dokter spesialis rujukan</option>
                                                    @foreach ($spesialisrujukan as $spesialis)
                                                        <option value="{{ $spesialis['id'] }}">{{ $spesialis['nama_spesialis_rujukan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Obat yang diberikan <b class="color-red">*</b></label>
                                                <textarea type="text" id="obat_diberikan" class="form-control"
                                                placeholder="Masukkan Nama Obat" name="obat_diberikan" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="rumah_sakit_rujukan">Rumah Sakit Rujukan <b class="color-red">*</b></label>
                                                <select name="rumah_sakit_rujukan_id" id="rumah_sakit_rujukan_id" class="choices form-select" required>
                                                    <option disabled selected>Pilih nama rumah sakit rujukan</option>
                                                    @foreach ($rsrujukan as $rs)
                                                        <option value="{{ $rs['id'] }}">{{ $rs['nama_RS_rujukan'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="riwayat">Riwayat Perjalanan Penyakit <b class="color-red">*</b></label>
                                                <textarea type="text" id="riwayat" class="form-control"
                                                placeholder="Masukkan Riwayat Penyakit" name="riwayat" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Hasil Pengobatan Pasien <b class="color-red">*</b></label>
                                                <textarea type="text" id="hasil_pengobatan" class="form-control"
                                                placeholder="Masukkan Hasil Pengobatan" name="hasil_pengobatan" required></textarea>
                                            </div>
                                        </div>

                                        
                                        <div class=" d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1 btn-form">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1 btn-form">Reset</button>
                                            </div>  

                                        </form>
                                            
        </section>
        
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
  input0.value = myArray[0];
  input1.value = myArray[1];
  input2.value = myArray[2];
  input3.value = myArray[3];
  input4.value = myArray[4];
  input5.value = myArray[5];
  input6.value = myArray[6];
  input7.value = myArray[7];
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