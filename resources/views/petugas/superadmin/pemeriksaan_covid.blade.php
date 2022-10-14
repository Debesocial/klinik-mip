@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Pemeriksaan Narkoba')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Obat dan Alat Kesehatan</h3>
                    <p class="text-subtitle text-muted">Data Mitra</p>
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
                                                <label>No Surat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="no_surat" class="form-control"
                                                    name="no_surat" placeholder="No Surat" required disabled>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Kebutuhan Pemriksaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                            <select class="choices form-select">
                                                <optgroup label="Figures">
                                                    <option value="romboid">IT</option>
                                                    <option value="trapeze">HSE</option>
                                                    <option value="triangle">Triangle</option>
                                                    <option value="polygon">Polygon</option>
                                                </optgroup>
                                            </select>
                                            </div>
                                            <br>
                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="search" id="id_pasien" class="form-control"
                                                    name="id_pasien" placeholder="ID Pasien">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Hasil Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                            <input class="form-check-input" type="radio" name="negatif"
                                    id="negatif">
                                <label class="form-check-label" for="negatif">
                                    Negatif
                                </label>
                                <input class="form-check-input" type="radio" name="positif"
                                    id="positif">
                                <label class="form-check-label" for="positif">
                                    Positif
                                </label>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien" placeholder="Nama Pasien" required disabled>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Petugas Yang Memeriksa</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="search" id="petugas_nama" class="form-control"
                                                    name="petugas_nama" placeholder="Petugas Pemeriksa" required disable>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur" placeholder="Umur" required disabled>
                                            </div>

                                                <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4 form-group">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"  id="flexRadioDefault1">
                                               <label class="form-check-label" for="flexRadioDefault1">
                                                  Tanda Tangan
                                                  </label>
                                              <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                   id="flexRadioDefault1">
                                               <label class="form-check-label" for="flexRadioDefault1">
                                                Tersimpan
                                                </label>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="pasien_jenis_kelamin" class="form-control"
                                                    name="pasien_jenis_kelamin" placeholder="Jenis Kelamin" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                            <div class="col-md-2">
                                                <label>Tempat Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="pasien_tempat_lahir" class="form-control"
                                                    name="pasien_tempat_lahir" placeholder="Tempat Lahir" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                            <div class="col-md-2">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="date" id="pasien_tanggal_lahir" class="form-control"
                                                    name="pasien_tanggal_lahir" placeholder="Tanggal Lahir" required disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>
                                            <div class="col-md-2">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="alamat" class="form-control"
                                                    name="alamat" placeholder="Alamat" required disabled>
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