@extends('layouts.dashboard.app')

@section('title', 'Keterangan Sehat')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Keterangan Sehat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 50%">
                                    <a class="list-group-item list-group-item-action active"
                                        id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                        role="tab">Data Pasien</a>
                                    <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list"
                                        data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>
                                     
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
                                                    <label>Tempat Lahir</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="tempat_lahir" class="form-control"
                                                        name="tempat_lahir" placeholder="Tempat Lahir"  disabled>
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
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur" placeholder="Umur"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Pekerjaan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="pekerjaan" class="form-control"
                                                        name="pekerjaan" placeholder="Pekerjaan"  disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="perusahaan" class="form-control"
                                                            name="perusahaan" placeholder="Perusahaan"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                        
                                                <div class="col-md-2">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="Perusahaan"  disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Jabatan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="jabatan" class="form-control"
                                                        name="jabatan" placeholder="Jabatan"  disabled>
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
                                                        <input type="text" id="id_pasien" class="form-control"
                                                            name="id_pasien" placeholder="" required >
                                                    </div
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
                                                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                              <span class="input-group-text" id="basic-addon2">cm</span>
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
                                                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                              <span class="input-group-text" id="basic-addon2">kg</span>
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
                                                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                              <span class="input-group-text" id="basic-addon2">Celcius</span>
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
                                                    <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text" id="basic-addon2">mmHg</span>
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
                                                    <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text" id="basic-addon2">/menit</span>
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
                                                    <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text" id="basic-addon2">/menit</span>
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
                                                   <input type="text" id="saturasi_oksigen" class="form-control"
                                                           name="saturasi_oksigen" placeholder="" required >
                                               </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                       <label>Status Lokalis</label>
                                                   </div>
                                                   <div class="col-md-5 form-group">
                                                       <textarea type="text" id="status_lokasi" class="form-control"
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
                                                    <select class="choices form-select">
                                                            <option value="others">Others</option>
                                                            <option value="jantung">Jantung</option>
                                                            <option value="hati">Hati</option>
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
                                                    <select class="choices form-select">
                                                            <option value="others">Others</option>
                                                            <option value="jantung">Jantung</option>
                                                            <option value="hati">Hati</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="" class="form-control"
                                                            name="" placeholder="enter text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Diagnosa</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <select class="choices form-select">
                                                        <option value="others">Others</option>
                                                        <option value="jantung">Jantung</option>
                                                        <option value="hati">Hati</option>
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
                                                    <select class="choices form-select">
                                                        <option value="others">Others</option>
                                                        <option value="jantung">Jantung</option>
                                                        <option value="hati">Hati</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-5 d-flex justify-content-end">
                                                <button type="submit"
                                                       class="btn btn-primary me-1 mb-1">Submit</button>
                                                 <button type="reset"
                                                         class="btn btn-light-secondary me-1 mb-1">Reset</button>
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

@endsection