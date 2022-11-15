@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

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
                                                        <select name="pasien_id" id="pasien_id" class="form-select">
                                                            <option disabled selected>Pilih ID Pasien</option>
                                                            @foreach ($pasien_id as $pas)
                                                                <option value="{{ $pas['id'] }}">{{ $pas['id'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Nama Pasien</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="nama_pasien" class="form-control"
                                                                name="nama_pasien" placeholder="Nama Pasien"  disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                    

                                                        <div class="col-md-2">
                                                            <label>NIK</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="NIK" class="form-control"
                                                                name="NIK" placeholder="NIK" disabled>
                                                        </div>
    
                                                        <div class="col-md-6">
                                                            </div>

                                                    <div class="col-md-2">
                                                        <label>Umur</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="umur" class="form-control"
                                                            name="umur" placeholder="umur"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    

                                                    <div class="col-md-2">
                                                        <label>Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="tempat_lahir" class="form-control"
                                                            name="tempat_lahir" placeholder="tempat lahir"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="tanggal_lahir" class="form-control"
                                                            name="tanggal_lahir" placeholder="Tanggal Lahir"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="alamat" class="form-control"
                                                            name="alamat" placeholder="alamat" disabled >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="pekerjaan" class="form-control"
                                                            name="pekerjaan" placeholder="pekerjaan"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        

                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="perusahaan" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="divisi" class="form-control"
                                                    name="divisi" placeholder="divisi" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Jabatan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="jabatan" class="form-control"
                                                    name="jabatan" placeholder="jabatan" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                                <div class="col-md-2">
                                                                    <label>Jenis kelamin</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <input type="text" id="jenis_kelamin" class="form-control"
                                                                  name="jenis_kelamin" placeholder="jenis kelamin" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>Telepon</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input type="text" id="telepon" class="form-control"
                                                                            name="telepon" placeholder="telepon"  disabled>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <label>Email</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <input type="email" id="email" class="form-control"
                                                                                name="email" placeholder="email" disabled >
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
            $('#tempat_lahir').val(data.tempat_lahir);
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

    <script>
         $(".form-select").select2();
     </script>
@include('sweetalert::alert') 
    @endsection