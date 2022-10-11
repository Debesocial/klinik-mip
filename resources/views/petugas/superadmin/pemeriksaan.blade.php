@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Pemeriksaan')
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
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>No Surat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="no_surat" class="form-control"
                                                            name="no_surat" placeholder="No Surat" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>ID Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="search" id="id_pasien" class="form-control"
                                                            name="id_pasien" placeholder="ID Pasien">
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Nama Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="nama_pasien" class="form-control"
                                                            name="nama_pasien" placeholder="Nama Pasien" required >
                                                    </div>

                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Umur</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="umur" class="form-control"
                                                            name="umur" placeholder="Umur" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="pasien_jenis_kelamin" class="form-control"
                                                            name="pasien_jenis_kelamin" placeholder="Jenis Kelamin" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="pasien_tempat_lahir" class="form-control"
                                                            name="pasien_tempat_lahir" placeholder="Tempat Lahir" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="pasien_tanggal_lahir" class="form-control"
                                                            name="pasien_tanggal_lahir" placeholder="Tanggal Lahir" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="alamat" class="form-control"
                                                            name="alamat" placeholder="Alamat" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="pekerjaan" class="form-control"
                                                            name="pekerjaan" placeholder="Pekerjaan" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="perusahaan" class="form-control"
                                                            name="perusahaan" placeholder="Perusahaan" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="divisi" class="form-control"
                                                            name="divisi" placeholder="Perusahaan" required >
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

                <div class="tab-pane fade" id="list-monday" role="tabpanel"
                                                aria-labelledby="list-monday-list">
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
                                                        <label>Penggunaan Obat-obatan dalam seminggu terakhir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="penggunaan_obat" class="form-control"
                                                            name="penggunaan_obat" placeholder="Penggunaan Obat-obatan" >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Jenis Obat yang Digunakan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="jenis_obat" class="form-control"
                                                            name="jenis_obat" placeholder="Jenis Obat yang Digunakan">
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>Asal Obat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="asal_obat" class="form-control"
                                                            name="asal_obat" placeholder="Asal Obat" >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Terakhir Digunakan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="terakhir_digunakan" class="form-control"
                                                            name="terakhir_digunakan" placeholder="Terakhir Digunakan" >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <br><br><br><br>
                                                    <h4>Hasil Test Urin</h4>


                                                    <div class="col-md-3">
                                                        <label>Amphetamine(AMP)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="tidak"  id="negatif">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                     <input class="form-check-input" type="radio" name="ya" id="ya">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Methamphetamine(MET)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="tidak"  id="negatif">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                     <input class="form-check-input" type="radio" name="ya" id="ya">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                        <label>TetraHydroCannibinol(THC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="tidak"  id="negatif">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                     <input class="form-check-input" type="radio" name="ya" id="ya">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Benzodiazepine(BZO)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="tidak"  id="negatif">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                     <input class="form-check-input" type="radio" name="ya" id="ya">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Morphine(MOP)</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                    <input class="form-check-input" type="radio" name="tidak"  id="negatif">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                     <input class="form-check-input" type="radio" name="ya" id="ya">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Cocaine(COC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="no"  id="negatif">
                                                          <label class="form-check-label" for="no">
                                                              Tidak
                                                          </label>&emsp;
                                                     <input class="form-check-input" type="radio" name="yes" id="ya">
                                                          <label class="form-check-label" for="yes">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Petugas Pemeriksa</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="petugas_nama" class="form-control"
                                                            name="petugas_nama" placeholder="Petugas Pemeriksa" required disabled>
                                                    </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                    </div>                                                        
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="tanda"  id="negatif">
                                                          <label class="form-check-label" for="tanda">
                                                              Tanda Tangan
                                                          </label>&emsp;
                                                        </div>
                                                          <div class="col-md-4 form-group">
                                                     <input class="form-check-input" type="radio" name="tangan" id="ya">
                                                          <label class="form-check-label" for="tangan">
                                                          Tanda Tangan Tersimpan
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-6 d-flex justify-content-end">
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


    @endsection