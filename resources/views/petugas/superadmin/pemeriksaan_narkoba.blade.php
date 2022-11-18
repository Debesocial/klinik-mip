@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('narko', 'active')

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
        @section('judul', 'Pemeriksaan Narkoba')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="list-group list-group-horizontal-sm mb-1 text-center"
                                            role="tablist" style="width: 60%">
                                            <a class="list-group-item list-group-item-action active"
                                                id="list-sunday-list" data-bs-toggle="list" href="#list-sunday"
                                                role="tab">Data Pasien</a>
                                            <a class="list-group-item list-group-item-action" id="list-monday-list"
                                                data-bs-toggle="list" href="#list-monday" role="tab"> Riwayat Penggunaan Obat-Obatan</a>
                                        </div>

                                        <div class="tab-content text-justify">
                                            <div class="tab-pane fade show active" id="list-sunday" role="tabpanel"
                                                aria-labelledby="list-sunday-list">                                      
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                    <div class="col-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div> --}}
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="/pemeriksaan/narkoba" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                        
                                                    <div class="col-md-2">
                                                        <label>ID Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select name="pasien_id" id="pasien_id" class="choices form-select" onchange="myChangeFunction(this)">
                                                            <option disabled selected>Pilih ID Pasien</option>
                                                            @foreach ($pasien_id as $pas)
                                                                <option value="{{ $pas['id'] }}|{{ $pas['nama_pasien'] }}|{{ $pas['NIK'] }}|{{ $pas['umur'] }}|{{ $pas['tempat_lahir'] }}|{{ $pas['tanggal_lahir'] }}|{{   $pas['alamat'] }}|{{ $pas['pekerjaan'] }}| {{  $pas->perusahaan->nama_perusahaan_pasien }}|{{  $pas->divisi->nama_divisi_pasien }}|{{  $pas->jabatan->nama_jabatan }}|{{   $pas['jenis_kelamin'] }}|{{ $pas['telepon'] }}|{{ $pas['email'] }}">{{ $pas['id'] }} - {{ $pas['nama_pasien'] }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>ID Pasien</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="myInput0" class="form-control"
                                                                name="myInput0" placeholder="ID Pasien"  disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                        <div class="col-md-2">
                                                            <label>Nama Pasien</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="myInput1" class="form-control"
                                                                name="myInput1" placeholder="Nama Pasien"  disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                    

                                                        <div class="col-md-2">
                                                            <label>Nomor Induk Karyawan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="myInput2" class="form-control"
                                                                name="myInput2" placeholder="Nomor Induk Karyawan" disabled>
                                                        </div>
    
                                                        <div class="col-md-6">
                                                            </div>

                                                    <div class="col-md-2">
                                                        <label>Umur</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput3" class="form-control"
                                                            name="myInput3" placeholder="umur"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    

                                                    <div class="col-md-2">
                                                        <label>Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput4" class="form-control"
                                                            name="myInput4" placeholder="tempat lahir"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="myInput5" class="form-control"
                                                            name="myInput5" placeholder="Tanggal Lahir"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput6" class="form-control"
                                                            name="myInput6" placeholder="alamat" disabled >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput7" class="form-control"
                                                            name="myInput7" placeholder="pekerjaan"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        

                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput8" class="form-control"
                                                    name="myInput8" placeholder="perusahaan" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput9" class="form-control"
                                                    name="myInput9" placeholder="divisi" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Jabatan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="myInput10" class="form-control"
                                                    name="myInput10" placeholder="jabatan" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                                <div class="col-md-2">
                                                                    <label>Jenis kelamin</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <input type="text" id="myInput11" class="form-control"
                                                                  name="myInput11" placeholder="jenis kelamin" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>Telepon</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input type="text" id="myInput12" class="form-control"
                                                                            name="myInput12" placeholder="telepon"  disabled>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <label>Email</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <input type="email" id="myInput13" class="form-control"
                                                                                name="myInput13" placeholder="email" disabled >
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

                <div class="tab-pane fade" id="list-monday" role="tabpanel"
                                                aria-labelledby="list-monday-list">
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
                                                    <div class="col-md-5">
                                                        <label>Penggunaan Obat-obatan dalam seminggu terakhir</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="penggunaan_obat" class="form-control"
                                                            name="penggunaan_obat" placeholder="Masukkan cara penggunaan" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>
                                                    <div class="col-md-5">
                                                        <label>Jenis Obat yang Digunakan</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="jenis_obat" class="form-control"
                                                            name="jenis_obat" placeholder="Masukkan jenis obat" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Asal Obat</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="asal_obat" class="form-control"
                                                            name="asal_obat" placeholder="Masukkan asal obat" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>

                                                    <div class="col-md-5">
                                                        <label>Terakhir Digunakan</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="terakhir_digunakan" class="form-control"
                                                            name="terakhir_digunakan" placeholder="Terakhir Digunakan" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>

                                                        <br><br><br><br>
                                                    <h4>Hasil Test Urin</h4>


                                                    <div class="col-md-5">
                                                        <label>Amphetamine(AMP)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="amp"
                                                        id="amp" value="0"> Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="amp"
                                                          id="amp" value="1">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Methamphetamine(MET)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="met"
                                                        id="met" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="met"
                                                          id="met" value="1">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>
                                                        
                                                        <div class="col-md-5">
                                                        <label>TetraHydroCannibinol(THC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="thc"
                                                        id="thc" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="thc"
                                                          id="thc" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Benzodiazepine(BZO)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="bzo"
                                                        id="bzo" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="bzo"
                                                          id="bzo" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Morphine(MOP)</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <input class="form-check-input" type="radio" name="mop"
                                                        id="mop" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="mop"
                                                          id="mop" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Cocaine(COC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="coc"
                                                        id="coc" value="0">
                                                          <label class="form-check-label" for="no">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="coc"
                                                          id="coc" value="1">
                                                          <label class="form-check-label" for="yes">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <br><br><br>
                                                        

                                                        <div class="col-7 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
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
                      var input10 = document.getElementById('myInput10');
                      var input11 = document.getElementById('myInput11');
                      var input12 = document.getElementById('myInput12');
                      var input13 = document.getElementById('myInput13');
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
                      input13.value = myArray[13];
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
                                $('#umur').val(data.umur);
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