@extends('layouts.dashboard.app')

@section('title', 'Surat Rujukan')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Surat Rujukan')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_surat">No Surat</label>
                                                <input type="text" id="no_surat" class="form-control"
                                                    name="no_surat" placeholder="No Surat">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Riwayat Perjalanan Penyakit</label>
                                                <textarea type="text" id="riwayat" class="form-control"
                                                    name="riyawat" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">ID pasien</label>
                                                <input type="text" id="id_pasien" class="form-control"
                                                    placeholder="id_pasien" name="id_pasien">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Obat yang Sudah Diberikan pada Pasien</label>
                                                <textarea type="text" id="obat_diberikan" class="form-control"
                                                    name="obat_diberikan" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Tempat Pemeriksaan</label>
                                                <input type="text" id="tempat_pemeriksaan" class="form-control"
                                                    name="tempat_pemeriksaan" placeholder="Tempat Pemeriksaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Hasil Pengibatan Pasien</label>
                                                <textarea type="text" id="hasil_pengobatan" class="form-control"
                                                    name="hasil_pengobatan" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                                <input type="date" id="tanggal_pemeriksaan" class="form-control"
                                                    name="tanggal_pemeriksaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="dokter_rujukan">Dokter Spesialis Rujukan</label>
                                                <select class="choices form-select">
                                                    <option value="romboid">Dokter</option>
                                                    <option value="trapeze"></option>
                                                    <option value="triangle"></option>
                                                    <option value="polygon"></option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien" placeholder="Nama Pasein">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="rumah_sakit_rujukan">Rumah Sakit Rujukan</label>
                                                <select class="choices form-select">
                                                    <option value="romboid">RS Jiwa</option>
                                                    <option value="trapeze"></option>
                                                    <option value="triangle"></option>
                                                    <option value="polygon"></option>
                                            </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur" placeholder="Umur">
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6 col-12">
                                            <label>Dokter Yang Memeriksa</label><br>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Tanda Tangan <br>
                                            <label for="">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked> Tanda Tangan Tersimpan
                                            </label>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" id="pekerjaan" class="form-control"
                                                    name="pekerjaan" placeholder="Pekerjaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ttd"></label>
                                                <textarea type="text" id="ttd" class="form-control"
                                                    name="ttd" ></textarea>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="perusahaan">Perusahaan</label>
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="perusahaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-sm-5 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>      
        </section>
        
    </div>

@endsection