@extends('layouts.dashboard.app')

@section('title', 'Rawat Inap Dokter')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Rawat Inap Dokter')
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
                                                <input type="search" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="Masukkan ID pasien">
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
                                                <label>No Surat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="no_surat" class="form-control"
                                                    name="no_surat" placeholder="Masukkan no surat" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Tempat Lahir</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="pasien_tempat_lahir" class="form-control"
                                                        name="pasien_tempat_lahir" placeholder="Masukkan tempat lahir" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="pasien_tanggal_lahir" class="form-control"
                                                            name="pasien_tanggal_lahir" placeholder="Masukkan tanggal lahir" required disabled>
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
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="Masukkan divisi" required disabled>
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
                                                <input type="text" id="nama_tindakan" class="form-control"
                                                    name="nama_tindakan" placeholder="Nama Tindakan">
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Nama Alat Kesehatan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select class="choices form-select">
                                                        <optgroup label="nama_alat">
                                                            <option value="romboid">IT</option>
                                                            <option value="trapeze">HSE</option>
                                                            <option value="triangle">Triangle</option>
                                                            <option value="polygon">Polygon</option>
                                                        </optgroup>
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
                                                {{-- <div class="card-header">
                                                    <h4 class="card-title">Hoverable rows</h4>
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
                                                <input type="text" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="ID Pasien">
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
                                                            <option value="romboid">IT</option>
                                                            <option value="trapeze">HSE</option>
                                                            <option value="triangle">Triangle</option>
                                                            <option value="polygon">Polygon</option>
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
                                                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                    </div>
                                    <div class="row" id="table-hover-row">
                                        <div class="col-12">
                                            <div class="card">
                                                {{-- <div class="card-header">
                                                    <h4 class="card-title">Hoverable rows</h4>
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

@endsection