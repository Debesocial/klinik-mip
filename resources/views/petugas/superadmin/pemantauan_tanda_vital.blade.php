@extends('layouts.dashboard.app')

@section('title', 'Pemantauan Tanda vital')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Pemantauan Tanda vital')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">
        
        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 75%">
                                    <a class="list-group-item list-group-item-action active"
                                        id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                        role="tab">Data Pasien</a>
                                    <a class="list-group-item list-group-item-action" id="list-tandavital-list"
                                        data-bs-toggle="list" href="#list-tandavital" role="tab">Pemeriksaan Tanda Vital</a>
                                        
                                    <a class="list-group-item list-group-item-action" id="list-terapi-list"
                                        data-bs-toggle="list" href="#list-terapi" role="tab">Terapi Tambahan</a>
                                        
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
                                                        name="nama_pasien" placeholder="Masukkan nama pasien" required disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    </div>
                                                <div class="col-md-2">
                                                    <label>Tempat Lahir</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="tempat_lahir" class="form-control"
                                                        name="tempat_lahir" placeholder="Masukkan tempat lahir" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="tanggal_lahir" class="form-control"
                                                            name="tanggal_lahir" placeholder="Masukkan tanggal lahir" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                            <div class="col-md-2">
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur" placeholder="Masukkan umur" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Pekerjaan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="pekerjaan" class="form-control"
                                                        name="pekerjaan" placeholder="Masukkan pekerjaan" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="perusahaan" class="form-control"
                                                            name="perusahaan" placeholder="Masukkan perusahaan" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                        
                                                <div class="col-md-2">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="divisi" class="form-control"
                                                    name="divisi" placeholder="Masukkan divisi" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Jabatan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="jabatan" class="form-control"
                                                        name="jabatan" placeholder="Masukkan jabatan" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="alamat" class="form-control"
                                                            name="alamat" placeholder="Masukkan alamat" required disabled></textarea>
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

        <div class="tab-pane fade" id="list-tandavital" role="tabpanel"
                                        aria-labelledby="list-tandavital-list">
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
                                                        <label>Skala Nyeri</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" id="skala_nyeri" class="form-control"
                                                            name="skala_nyeri" placeholder="Masukkan skala nyeri">
                                                    </div>
                                                    <div class="col-md-7">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>HR</label>
                                                        </div>
                                                        <div class="col-md-2 form-group">
                                                            <input type="text" id="hr" class="form-control"
                                                                name="hr" placeholder="Masukkan HR">
                                                        </div>
                                                        <div class="col-md-7">
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label>BP</label>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <input type="text" id="bp" class="form-control"
                                                                    name="bp" placeholder="Masukkan BP">
                                                            </div>
                                                            <div class="col-md-7">
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label>Temp</label>
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <input type="text" id="temp" class="form-control"
                                                                        name="temp" placeholder="Masukkan suhu">
                                                                </div>
                                                                <div class="col-md-7">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>RR</label>
                                                                    </div>
                                                                    <div class="col-md-2 form-group">
                                                                        <input type="text" id="rr" class="form-control"
                                                                            name="rr" placeholder="Masukkan RR">
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <label>Saturasi Oksigen</label>
                                                                        </div>
                                                                        <div class="col-md-2 form-group">
                                                                            <input type="text" id="saturasi_oksigen" class="form-control"
                                                                                name="saturasi_oksigen" placeholder="Masukkan saturasi oksigen">
                                                                        </div>
                                                                        <div class="col-md-7">
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
        <div class="tab-pane fade" id="list-terapi" role="tabpanel"
                                        aria-labelledby="list-terapi-list">
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
                                                <input type="text" id="nama_obat" class="form-control"
                                                    name="nama_obat" placeholder="Masukkan nama obat">
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Jumlah Obat</label>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" id="nama_obat" class="form-control"
                                                        name="nama_obat" placeholder="Masukkan jumlah obat">
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <select class="choices form-select">
                                                            <option disabled selected>Pilih satuan obat</option>
                                                            <option value="romboid">Paracetamol</option>
                                                            <option value="trapeze">Panadol</option>
                                                            <option value="triangle">Flutamol</option>
                                                            <option value="polygon">Lambuchit</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                
                                                    <div class="col-md-2">
                                                        <label>Aturan Pakai</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="pengguna_alat" class="form-control"
                                                            name="aturan_pakai" placeholder="Masukkan aturan pakai">
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Waktu Pemberian Obat</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="time" id="waktu_pemberian" class="form-control"
                                                                name="waktu_pemberian">
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
                                                    <h4 class="card-title">Data Terapi Tambahan</h4>
                                                </div>
                                                
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode</th>
                                                                    <th>Nama</th>
                                                                    <th>Satuan</th>
                                                                    <th>Bobot</th>
                                                                    <th>Komposisi</th>
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