@extends('layouts.dashboard.app')

@section('title', 'Surat Rujukan')

@section('css')
<style>
    
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>

@endsection

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
                                                <label for="umur">Riwayat Perjalanan Penyakit <b class="color-red">*</b></label>
                                                <textarea type="text" id="riwayat" class="form-control"
                                                placeholder="Masukkan Riwayat Penyakit" name="riyawat" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">ID pasien <b class="color-red">*</b></label>
                                                <input type="text" id="id_pasien" class="form-control"
                                                    placeholder="Masukkan Id Pasien" name="id_pasien">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Obat yang diberikan <b class="color-red">*</b></label>
                                                <textarea type="text" id="obat_diberikan" class="form-control"
                                                placeholder="Masukkan Nama Obat" name="obat_diberikan" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Tempat Pemeriksaan <b class="color-red">*</b></label>
                                                <input type="text" id="tempat_pemeriksaan" class="form-control"
                                                    name="tempat_pemeriksaan" placeholder="Masukkan Tempat Pemeriksaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Hasil Pengobatan Pasien <b class="color-red">*</b></label>
                                                <textarea type="text" id="hasil_pengobatan" class="form-control"
                                                placeholder="Masukkan Hasil Pengobatan" name="hasil_pengobatan" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                                <input type="date" id="tanggal_pemeriksaan" class="form-control"
                                                placeholder="Tanggal Pemeriksaan" name="tanggal_pemeriksaan">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="dokter_rujukan">Dokter Spesialis Rujukan <b class="color-red">*</b></label>
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
                                                <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien" placeholder="Masukkan Nama Pasein">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="rumah_sakit_rujukan">Rumah Sakit Rujukan <b class="color-red">*</b></label>
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
                                            <label>Dokter Yang Memeriksa <b class="color-red">*</b></label><br>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Tanda Tangan <br>
                                            <label for="">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked> Tanda Tangan Tersimpan
                                            </label>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                                <input type="text" id="pekerjaan" class="form-control"
                                                    name="pekerjaan" placeholder="Masukkan Pekerjaan">
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
                                                <label for="perusahaan">Perusahaan <b class="color-red">*</b></label>
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="Masukkan Nama Perusahaan">
                                            </div>
                                        </div>
                                        <div class=" d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1 btn-form">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1 btn-form">Reset</button>
                                            </div>  
        </section>
        
    </div>

@endsection