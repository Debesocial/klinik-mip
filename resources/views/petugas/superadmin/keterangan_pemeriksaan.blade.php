@extends('layouts.dashboard.app')

@section('title', 'Surat Keterangan Pemeriksaan Kesehatan')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Surat Keterangan Pemeriksaan Kesehatan')
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
                                                <label>ID Surat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="search" id="id_surat" class="form-control"
                                                    name="id_surat" required >
                                            </div>
                                            

                                            <div class="col-md-2">
                                                <label>Deskripsi Hasil MCU</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="anjuran" class="form-control"
                                                    name="anjuran" required > </textarea>
                                            </div>
                                            <div class="col-md-12">
                                            </div>
                                            

                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="seacrh" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="No Surat">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi Obat/Tindakan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="deskripsi" class="form-control"
                                                    name="deskripsi" required > </textarea>
                                            </div>
                                            <div class="col-md-12">
                                            </div>

                                            

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien"  required disabled>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Rekomendasi untuk Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <textarea type="text" id="rekomendasi" class="form-control"
                                                    name="rekomendasi" required > </textarea>
                                            </div>
                                            <div class="col-md-12">
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
                                                    <label>Hasil Rekomendasi</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select class="choices form-select" name="hasil" id="hasil">
                                                        <option value="others">Others</option>
                                                                <option value=""></option>
                                                                <option value=""></option>
                                                    </select>
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