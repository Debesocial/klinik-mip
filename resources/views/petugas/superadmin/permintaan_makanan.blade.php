@extends('layouts.dashboard.app')

@section('title', 'Permintaan Makanan')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Permintaan Makanan')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

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
                                                    name="id_pasien" placeholder="No Surat">
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>
                                            <br>
                                            <div class="col-md-2">
                                                <label>ID Rawat Inap</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="search" id="id_rawat_inap" class="form-control"
                                                    name="id_rawat_inap" required disabled>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4 form-group">
                                    
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien"  required disabled>
                                            </div>

                                            <div class="col-md-2">               
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="tanggal_lahir" class="form-control"
                                                    name="tanggal_lahir"  required disabled>
                                            </div>
                                                <div class="col-md-2">
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur"  required disabled>
                                            </div>
                                                <div class="col-md-2">
                                            </div>
                                            <div class="col-md-4 form-group">
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
                                                        <div class="col-md-6">
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label>Permintaan Makanan</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <textarea type="text" id="permintaan_makanan" class="form-control"
                                                                    name="permintaan_makanan" placeholder="Permintaan Makanan" ></textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label>Catatan Tambahan</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <textarea type="text" id="catatan_tambahan" class="form-control"
                                                                        name="catatan_tambahan" placeholder="Catatan Tambahan" ></textarea>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>Tanggal Mulai Diberikan Makanan</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input type="date" id="tanggal_mulai" class="form-control"
                                                                            name="tanggal_dimulai"  >
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div>   
                                                                        
                                                                        <div class="col-md-2">
                                                                            <label>Tanggal Selesai Diberikan Makanan</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <input type="date" id="tanggal_selesai" class="form-control"
                                                                                name="tanggal_selesai"  >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            </div>   

                                                                            <div class="col-md-2">
                                                                                <label>Total Hari Pemberian</label>
                                                                            </div>
                                                                            <div class="col-md-4 form-group">
                                                                                <input type="date" id="hari_pemberian" class="form-control"
                                                                                    name="hari_pemberian" required disabled >
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                                                                <div class="col-md-6">
                                                                                    </div> 

                                                                                    <div class="col-md-2">
                                                                                        
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <textarea type="text" id="tanda_tangan" class="form-control"
                                                                                            name="tanda_tangan"  style="width: 100%"></textarea>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        </div> 
                                            

                                            <div class="col-sm-12 d-flex justify-content-end">
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

@endsection