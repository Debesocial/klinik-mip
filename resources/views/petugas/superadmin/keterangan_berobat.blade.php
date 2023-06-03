@extends('layouts.dashboard.app')

@section('title', 'Keterangan Berobat')
@section('berobat', 'active')
@section('breadcrumb', 'tambah_keterangan_berobat')

@section('judul', 'Keterangan Berobat')
@section('container')

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="/keterangan/berobat" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Pasien <b class="color-red">*</b></label>
                                    <select name="pasien_id" id="pasien_id" class="form-select" required>
                                        <option value="" disabled selected>Pilih ID Rekam Medis Pasien
                                        </option>
                                        @foreach ($pasien_id as $pas)
                                            <option value="{{ $pas->id }}">{{ $pas->id_rekam_medis }} -
                                                {{ $pas->nama_pasien }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {!! detailPasienSurat([
                                        'Nama Pasien' => 'nama_pasien',
                                        'Kategori' => 'kategori_pasien_id',
                                        'Pekerjaan' => 'pekerjaan',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label class="form-label">Nama Klinik Praktek/Rumah Sakit <b
                                                class="color-red">*</b></label>
                                        <select name="rumah_sakit_rujukans_id" id="rumah_sakit_rujukans_id"
                                            class="form-select" required>
                                            <option value="" disabled selected>Pilih Rumah Sakit Rujukan</option>
                                            @foreach ($rsrujukan as $rs)
                                                <option value="{{ $rs->id }}">{{ $rs->nama_RS_rujukan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Diagnosa <b class="color-red">*</b></label>
                                        <select name="nama_penyakit_id" id="nama_penyakit_id" class="form-select" required>
                                            <option value="" disabled selected>Pilih Nama Penyakit</option>
                                            @foreach ($namapenyakit as $nama)
                                                <option value="{{ $nama->id }}">{{ $nama->primer }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Diagnosa Sekunder <b class="color-red">*</b></label>
                                        <textarea type="text" id="sekunder" class="form-control" name="sekunder" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Pasien diresepkan obat <b class="color-red">*</b></label>
                                <textarea type="text" id="resep" class="form-control" name="resep" required></textarea>
                            </div>
                            <div class="mb-2">
                                <label>Saran untuk Pasien <b class="color-red">*</b></label>
                                <textarea type="text" id="saran" class="form-control" name="saran" required></textarea>
                            </div>
                            <div class="mb-2">
                                <label>Pasien Harus Kontrol Kembali <b class="color-red">*</b></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kontrol" id="kontrol"
                                        value="0" checked>
                                    <label class="form-check-label" for="kontrol">
                                        Tidak
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kontrol" id="kontrol"
                                        value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ya
                                    </label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label>Tanggal Pengembalian Surat Rujukan <b class="color-red">*</b></label>
                                <input type="date" id="tanggal_kembali" class="form-control" name="tanggal_kembali"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <button type="submit" class="btn btn-primary">Simpan <i class="bi bi-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
