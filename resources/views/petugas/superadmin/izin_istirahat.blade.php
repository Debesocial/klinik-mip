@extends('layouts.dashboard.app')

@section('title', 'Izin Istirahat')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Izin Istirahat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 95%">
                                    <a class="list-group-item list-group-item-action active"
                                        id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                        role="tab">Data Pasien</a>
                                    <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list"
                                        data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>
                                        
                                    <a class="list-group-item list-group-item-action" id="list-tindakan-list"
                                        data-bs-toggle="list" href="#list-tindakan" role="tab">Tindakan</a>
                                        <a class="list-group-item list-group-item-action" id="list-resep-list"
                                        data-bs-toggle="list" href="#list-resep" role="tab">Resep Obat</a>
                                        <a class="list-group-item list-group-item-action" id="list-dokter-list"
                                        data-bs-toggle="list" href="#list-dokter" role="tab">Rekomendasi Dokter</a>
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
                                                <input type="seacrh" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="">
                                            </div>
                                            <div class="col-md-6 form-group">
                                            </div>
                                            <br>

                                            <div class="col-md-2">
                                                <label>NIK</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nik" class="form-control"
                                                    name="nik"  placeholder="NIK" required disabled>
                                            </div>
                                            <div class="col-md-6">               
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien"  required disabled>
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
                                                    name="umur"  required disabled>
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
                                                        name="divisi" placeholder="Divisi" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>
                                                
                                                    <div class="col-md-2">
                                                        <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="jabatan" class="form-control"
                                                            name="jabatan" placeholder="Jabatan" required disabled>
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

                                            <div class="col-md-2">
                                                <label>Keluhan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="keluhan" class="form-control"
                                                    name="keluhan" > </textarea>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>ID Rekam Medis</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="search" id="id_rekam_medis" class="form-control"
                                                        name="id_rekam_medis" placeholder="ID Rekam Medis" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>    

                                                    <div class="col-md-2">
                                                        <label>Diagnosa</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="diagnosa" class="form-control"
                                                            name="diagnosa" placeholder="Diagnosa" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Diagnosa Sekunder</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="diagnosa_sekunder" class="form-control"
                                                                name="diagnosa_sekunder" placeholder="Diagnosa Sekunder" required disabled>
                                                        </div>
                                                        <div class="col-md-6">
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
                                                <input type="text" id="tindakan" class="form-control"
                                                    name="tindakan" >
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Nama Alat Kesehatan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="alat_kesehatan" class="form-control"
                                                        name="alat_kesehatan" placeholder="Nama Alat Kesehatan" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>    

                                                    <div class="col-md-2">
                                                        <label>Jumlah Pengguna Alat Kesehatan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="jumlah_pengguna" class="form-control"
                                                            name="jumlah_pengguna" placeholder="Jumlah Pengguna Alat Kesehatan" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="diagnosa" class="form-control"
                                                            name="diagnosa" required disabled></textarea>
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
                                                <input type="text" id="nama_obat" class="form-control"
                                                    name="nama_obat" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Jumlah Obat</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="jumlah_obat" class="form-control"
                                                        name="jumlah_obat" placeholder="Jumlah Obat" required disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>    

                                                    <div class="col-md-2">
                                                        <label>Aturan Pakai</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="aturan_pakai" class="form-control"
                                                            name="aturan_pakai" placeholder="Aturan Pakai" required disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="diagnosa" class="form-control"
                                                            name="diagnosa" required disabled></textarea>
                                                    </div>
                                                    <div class="col-md-6">
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
                                                                    <th>Nama Obat</th>
                                                                    <th>Jumlah Obat</th>
                                                                    <th>Aturan Pakai</th>
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

        <div class="tab-pane fade" id="list-dokter" role="tabpanel"
                                        aria-labelledby="list-dokter-list">
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
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Dapat Bekerja Seperti Biasa
                                                <label for="">
                                            </div>
                                            <div class="col-md-6">
                                                </div> 

                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Dapat Bekerja dengan Catatan
                                                    <label for="">
                                                </div>
                                                <div class="col-md-6">
                                                    </div> 

                                                    <div class="col-md-2">
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="nama_obat" class="form-control"
                                                            name="nama_obat">Catatan</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>   

                                                        <div class="col-md-2">
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Istirahat di MESS Karyawan
                                                            <label for="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" id="waktu" class="form-control"
                                                            name="waktu">
                                                            </div> 
                                                            <div class="col-md-4">
                                                            </div> 

                                                            <div class="col-md-2">
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <label for="">Dari tanggal</label>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="date" id="tanggal_dari" class="form-control"
                                                            name="tanggal_dari">
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div> 

                                                                <div class="col-md-2">
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <label for="">Sampai tanggal</label>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input type="date" id="tanggal_sampai" class="form-control"
                                                                name="tanggal_sampai">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div> 

                                                                    <div class="col-md-2">
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Rujukan ke Tarakan
                                                                        <label for="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div> 

                                                                        <div class="col-md-2">
                                                                        </div>
                                                                        <div class="col-md-2 form-group">
                                                                           <label for="">Dokter Spesialis Rujukan</label>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <select class="choices form-select">
                                                                                <option value="others">Others</option>
                                                                                <option value="jantung"></option>
                                                                                <option value="hati"></option>
                                                                        </select>
                                                                            </div>   
                                                                            <div class="col-md-4">
                                                                                </div> 

                                                                                <div class="col-md-2">
                                                                                </div>
                                                                                <div class="col-md-2 form-group">
                                                                                   <label for="">Rumah Sakit Rujukan</label>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <select class="choices form-select">
                                                                                        <option value="others">Others</option>
                                                                                        <option value="jantung"></option>
                                                                                        <option value="hati"></option>
                                                                                </select>
                                                                                    </div>   
                                                                                    <div class="col-md-4">
                                                                                        </div> 

                                                                                        <div class="col-md-2">
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <label>Dokter Yang Memeriksa</label>
                                                                                        </div>
                                                                                        <div class="col-md-4 form-group">
                                                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Tanda Tangan
                                                                                            <label for="">
                                                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked> Tanda Tangan Tersimpan
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                            </div>
                                                                                            <div class="col-md-4 form-group">
                                                                                                <textarea type="text" id="ttd" class="form-control"
                                                                                                    name="ttd"></textarea>
                                                                                            </div>
                                                                                            <div class="col-md-6">
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