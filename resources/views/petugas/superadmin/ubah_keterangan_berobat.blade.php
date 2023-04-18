@extends('layouts.dashboard.app')
@section('title', 'Ubah Keterangan Berobat')
@section('berobat', 'active')
@section('breadcrumb', 'ubah_keterangan_berobat')

@section('judul', 'Ubah Keterangan Berobat')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/ubah/ket/berobat/{{$keterangan->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Keterangan Berobat</h5><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Pasien</label> </label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Petugas" value="{{ $keterangan->pasien->nama_pasien }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pekerjaan</label> 
                                            <input type="text"  class="form-control" value="{{ $keterangan->pasien->pekerjaan }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Perusahaan</label> </label>
                                            <input type="text"  class="form-control" value="{{ $keterangan->pasien->perusahaan->nama_perusahaan_pasien }}"  disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="level_id">Divisi</label> </label>
                                            <input type="text"  class="form-control" value="{{ $keterangan->pasien->divisi->nama_divisi_pasien }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Jabatan</label> </label>
                                            <input type="text"  class="form-control" value="{{ $keterangan->pasien->jabatan->nama_jabatan }}" disabled>
                                        </div>
                                    </div>

                                    
                                </div>
                                    <div class="col-md-6">
                                        <h5></h5><br><br>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Klinik Rujukan <b class="color-red">*</b></label>
                                                <select class="choices form-select" name="rumah_sakit_rujukans_id" id="rumah_sakit_rujukans_id">
                                                    @foreach ($rsrujukan as $rujukan)
                                                    <option value="{{ $rujukan->id }}" {{ $rujukan->id == $keterangan->rumahsakitrujukan->id ? 'selected' : '' }}>{{ $rujukan->nama_RS_rujukan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Diagnosa <b class="color-red">*</b></label> 
                                                <select class="choices form-select" name="nama_penyakit_id" id="nama_penyakit_id">
                                                    @foreach ($namapenyakit as $nama)
                                                    <option value="{{ $nama->id }}" {{ $nama->id == $keterangan->namapenyakit->id ? 'selected' : '' }}>{{ $nama->primer }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Pasien diresepkan obat <b class="color-red">*</b></label> </label>
                                                <input type="text" id="resep" name="resep" class="form-control" value="{{ $keterangan->resep}}"  >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Saran untuk pasien <b class="color-red">*</b></label> </label>
                                                <input type="text" id="saran" name="saran" class="form-control" value="{{ $keterangan->saran }}"  >
                                            </div>
                                        </div>
    
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label>Pasien harus kontrol Kembali <b class="color-red">*</b></label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-check-input" type="radio" name="kontrol" id="kontrol" value="0" {{ !$keterangan->kontrol ? "checked" : "" }}> Tidak
                                        <input class="form-check-input" type="radio" name="kontrol" id="kontrol" value="1" {{ $keterangan->kontrol ? "checked" : "" }}> Ya
                                            </div>
                                        </div>
    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Tanggal Pengembalian Surat <b class="color-red">*</b></label> </label>
                                                <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" value="{{ $keterangan->tanggal_kembali }}" >
                                            </div>
                                        </div>
    
                                        <div class="col-md-12">
                                            <div class="row justify-content-end">
                                                <div class="col-4">
                                                    <button type="reset" class="form-control btn btn-outline-secondary me-1 mb-1"> <i class="bi bi-arrow-repeat"></i> Reset</button>
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="form-control btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Simpan</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <br>
                                        
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