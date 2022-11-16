@extends('layouts.dashboard.app')

@section('title', 'Rawat Inap Dokter')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Rawat Inap Instruksi Dokter')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">
        
        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 50%">
                                    <a class="list-group-item list-group-item-action active"
                                        id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                        role="tab">Data Pasien</a>
                                    <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list"
                                        data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>
                                        
                                    <a class="list-group-item list-group-item-action" id="list-tindakan-list"
                                        data-bs-toggle="list" href="#list-tindakan" role="tab">Tindakan</a>
                                        <a class="list-group-item list-group-item-action" id="list-resep-list"
                                        data-bs-toggle="list" href="#list-resep" role="tab">Resep Obat</a>
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
                                                <label>ID pasien</label>
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
                                                        name="tempat_lahir" placeholder="Tempat Lahir" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="tanggal_lahir" class="form-control"
                                                            name="tanggal_lahir" placeholder="Tanggal Lahir" required disabled>
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
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Anamnesis</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="id_pasien" class="form-control"
                                                            name="id_pasien" placeholder="Masukkan anamnesis" required >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4 mb-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h5 class="font-weight-bold" style="font-weight: bold">Pemeriksaan Fisik</h5>
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
                                                            <input type="text" class="form-control" placeholder="Masukkan tinggi badan" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                                            <input type="text" class="form-control" placeholder="Masukkan berat badan" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                                            <input type="text" class="form-control" placeholder="Masukkan suhu tubuh" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                                    <input type="text" class="form-control" placeholder="Masukkan tekanan darah" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                                    <input type="text" class="form-control" placeholder="Masukkan denyut nadi" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                                    <input type="text" class="form-control" placeholder="Masukkan laju pernapasan" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                                           name="saturasi_oksigen" placeholder="Masukkan saturasi oksigen" required >
                                               </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                       <label>Pemeriksaan Penunjang</label>
                                                   </div>
                                                   <div class="col-md-5 form-group">
                                                       <textarea type="text" id="status_lokasi" class="form-control"
                                                           name="status_lokasi">
                                                        </textarea>
                                                   </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Nama Penyakit</label>
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
                                                        <input type="text" id="sekunder" class="form-control"
                                                        name="sekunder" placeholder=""  >
                                                    </select>
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
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" id="pengguna_alat" class="form-control"
                                                            name="pengguna_alat" placeholder="Jumlah Pengguna Alat">
                                                    </div>
                                                    <div class="col-md-8">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Keterangan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <textarea type="text" id="keterangan" class="form-control"
                                                                name="keterangan"></textarea>
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
                                    <div class="row" id="table-hover-row">
                                        <div class="col-12">
                                            <div class="card">
                                                {{-- <div class="card-header">
                                                    <h4 class="card-title">Daftar Tindakan</h4>
                                                </div> --}}
                                                
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
                                                    <label>Jumlah Obat</label>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" id="nama_pasien" class="form-control"
                                                        name="nama_pasien" placeholder="jumlah">
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <select class="choices form-select" name="nama_obat_id" id="nama_obat_id">
                                                        <option disabled selected>Pilih Nama Obat</option>
                                                        @foreach ($namaobat as $nama)
                                                        <option value="{{ $nama->id }}">{{ $nama->nama_obat }}</option>
                                                        @endforeach
                                                </select>
                                                </div>
                                                <div class="col-md-5">
                                                    </div>
                                                
                                                    <div class="col-md-2">
                                                        <label>Aturan Obat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="aturan_obat" class="form-control"
                                                            name="aturan_obat" placeholder="Aturan Pakai">
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
                                                                    class="btn btn-primary me-1 mb-1">Simpan</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                    </div>
                                    <div class="row" id="table-hover-row">
                                        <div class="col-12">
                                            <div class="card">
                                                {{-- <div class="card-header">
                                                    <h4 class="card-title">Daftar Terapi Tambahan</h4>
                                                </div> --}}
                                                
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