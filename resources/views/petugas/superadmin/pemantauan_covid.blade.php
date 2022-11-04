@extends('layouts.dashboard.app')

@section('title', 'Pemantauan Covid-19')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Pemantauan Covid')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">
        
        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 95%">
                                    <a class="list-group-item list-group-item-action active"
                                        id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                        role="tab">Data Pasien</a>
                                    <a class="list-group-item list-group-item-action" id="list-pemantauan-list"
                                        data-bs-toggle="list" href="#list-pemantauan" role="tab">Hasil Pemantauan</a>
                                        
                                    <a class="list-group-item list-group-item-action" id="list-penunjangan-list"
                                        data-bs-toggle="list" href="#list-penunjangan" role="tab">Pemeriksaan Penunjangan</a>
                                    <a class="list-group-item list-group-item-action" id="list-perjalanan-list"
                                        data-bs-toggle="list" href="#list-perjalanan" role="tab">Riwayat Perjalanan</a>
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
                                                <input type="search" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="ID Pasien">
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>No Rekam Medis</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="no_rekam_medis" class="form-control"
                                                        name="no_rekam_medis" placeholder="No Rekam Medis" required disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    </div>

                                                <div class="col-md-2">
                                                    <label>Nama Pasien</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="nama_pasien" class="form-control"
                                                        name="nama_pasien" placeholder="Nama Pasien" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="tanggal_lahir" class="form-control"
                                                            name="tanggal_lahir"  required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Umur</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="umur" class="form-control"
                                                                name="umur" placeholder="Umur" required disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label>Pekerjaan</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" id="pekerjaan" class="form-control"
                                                                    name="pekerjaan" placeholder="Pekerjaan" required disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>
                                                
                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="perusahaan" class="form-control"
                                                            name="perusahaan" placeholder="Perusahaan" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                        
                                                <div class="col-md-2">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="divisi" class="form-control"
                                                    name="divisi" placeholder="Perusahaan" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                                    <div class="col-md-2">
                                                                        <label>Nomor Kamar</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input type="text" id="no_kamar" class="form-control"
                                                                            name="no_kamar" placeholder="Nomor Kamar">
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

        <div class="tab-pane fade" id="list-pemantauan" role="tabpanel"
                                        aria-labelledby="list-pemantauan-list">
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
                                                    <label>Suhu Pagi</label>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" id="suhu_pagi" class="form-control"
                                                        name="suhu_pagi" placeholder="suhu pagi" >
                                                </div> 
                                                <div class="col-md-7">
                                                    </div>
                                            
                                                    <div class="col-md-2">
                                                        <label>TD</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" id="td" class="form-control"
                                                            name="td" placeholder="TD">
                                                    </div>
                                                    <div class="col-md-7">
                                                        </div>

                                                    <div class="col-md-2">
                                                            <label>HR</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" id="hr" class="form-control"
                                                                name="hr" placeholder="HR">
                                                    </div>
                                                    <div class="col-md-7">
                                                     </div>    
                                            
                                                     <div class="col-md-2">
                                                        <label>SPO2</label>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" id="spo2" class="form-control"
                                                            name="spo2" placeholder="SPO2" >
                                                </div>
                                                <div class="col-md-7">
                                                 </div> 

                                                 <div class="col-md-2">
                                                    <label>Gejala</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="spo2" class="form-control"
                                                        name="spo2" > </textarea>
                                            </div>
                                            <div class="col-md-5">
                                             </div> 

                                             <div class="col-md-2">
                                                <label>Jenis Pemeriksaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <textarea type="text" id="spo2" class="form-control"
                                                    name="spo2" > </textarea>
                                        </div>
                                        <div class="col-md-5">
                                         </div> 

                                         <div class="col-md-2">
                                            <label>SPO2</label>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <input type="date" id="tanggal_pemeriksaan" class="form-control"
                                                name="tanggal_pemeriksaan"  >
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

        <div class="tab-pane fade" id="list-penunjangan" role="tabpanel"
                                        aria-labelledby="list-penunjangan-list">
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
                                            <div class="col-md-4">
                                                <h2>Laboratorium</h2>
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>
                                            <div class="col-md-4">
                                                </div>    <br><br>
                                                
                                            <div class="col-md-2">
                                                <label>Hasil Laboratorium</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea type="text" id="nama_tindakan" class="form-control"
                                                    name="nama_tindakan" > </textarea>
                                            </div>
                                            <div class="col-md-2">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Lampiran Hasil Laboratorium</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input class="form-control" type="file" id="dokumen" multiple>
                                                </div>
                                                <div class="col-md-2">
                                                    </div>
                                                
                                                
                                                    <div class="col-md-2">
                                                        <label>Tanggal Pemeriksaan</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="date" id="pengguna_alat" class="form-control"
                                                            name="pengguna_alat" >
                                                    </div>
                                                    <div class="col-md-8">
                                                    </div> <br><br><br>
                                                    
                                                    <div class="col-md-4">
                                                        <h2>Rapid Test</h2>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    </div>
                                                    <div class="col-md-4">
                                                        </div>    <br><br>

                                                        <div class="col-md-2">
                                                            <label>Hasil Rontgen Thorax</label>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                                        </div>
                                                        <div class="col-md-7 form-group">
                                                            <textarea type="text" id="nama_tindakan" class="form-control"
                                                                name="nama_tindakan" > </textarea>
                                                        </div>
                                                        <div class="col-md-2">
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label>Lampiran Hasil Rontgen Thorax</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="file" id="dokumen" multiple>
                                                            </div>
                                                            <div class="col-md-2">
                                                                </div>


                                                                <div class="col-md-2">
                                                                    <label>Tanggal Pemeriksaan</label>
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <input type="date" id="pengguna_alat" class="form-control"
                                                                        name="pengguna_alat" >
                                                                </div>
                                                                <div class="col-md-8">
                                                                </div> 
                                                                
                                                                <div class="col-md-2">
                                                                    <label>Keterangan(Upaya apa yang akan dilakukan tempat rujukan kasus)</label>
                                                                </div>
                                                                
                                                                <div class="col-md-8 form-group">
                                                                    <textarea type="text" id="nama_tindakan" class="form-control"
                                                                        name="nama_tindakan" > </textarea>
                                                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        </div>


        <div class="tab-pane fade" id="list-perjalanan" role="tabpanel"
                                        aria-labelledby="list-perjalanan-list">
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
                                                <label>Tanggal Perjalanan</label>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <input type="date" id="tanggal_perjalanan" class="form-control"
                                                    name="tanggal_perjalanan" >
                                            </div>
                                            <div class="col-md-8">
                                                </div>
                                                    <div class="col-md-2">
                                                        <label>Kabupaten/Kota Asal</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="kota_asal" class="form-control"
                                                            name="kota_asal" placeholder="Masukkan kabupaten/kota Asal">
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Kota Tujuan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="kota_tujuan" class="form-control"
                                                                name="kota_tujuan" placeholder="Masukkan kota tujuan">
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>
                                                        <div class="col-md-6">
                                                            </div>
                                                            <div class="col-sm-5 d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 mb-1">Simpan</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
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