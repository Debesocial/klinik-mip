@extends('layouts.dashboard.app')

@section('title', 'Ubah Surat Rujukan')
@section('suratrujukan', 'active')
@section('breadcrumb', 'ubah_surat_rujukan')
@section('judul', 'Ubah Surat Rujukan')
@section('container')
<div class="card">
    <div class="card-body">
        <form class="form" id="surat-rujukan" action="/ubah/surat/rujukan/{{ $surat->id }}" onsubmit="showLoader()" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        {!! detailPasienSurat([
                            'Nama Pasien' => 'nama_pasien',
                            'Kategori' => 'kategori_pasien_id',
                            'Pekerjaan' => 'pekerjaan',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        <label for="">Tempat Pemeriksaan <b class="color-red">*</b></label>
                        <input type="text" id="tempat" class="form-control" name="tempat" placeholder="Masukkan Tempat Pemeriksaan" value="{{$surat->tempat}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Tanggal Pemeriksaan <b class="color-red">*</b></label>
                        <input type="date" id="tanggal" class="form-control" placeholder="Tanggal Pemeriksaan" name="tanggal" value="{{$surat->tanggal}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">File Pendukung </label>
                        <input class="form-control" type="file" id="ttd" name="ttd" multiple>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dokter_rujukan">Dokter Spesialis Rujukan <b class="color-red">*</b></label>
                        <select name="spesialis_rujukan_id" id="spesialis_rujukan_id" class="choices form-select" required>
                            <option disabled selected>Pilih nama dokter spesialis rujukan</option>
                            @foreach ($spesialisrujukan as $spesialis)
                                <option value="{{ $spesialis['id'] }}" {{($spesialis->id==$surat->spesialis_rujukan_id)?'selected':''}}>{{ $spesialis['nama_spesialis_rujukan'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="umur">Obat yang diberikan <b class="color-red">*</b></label>
                        <textarea type="text" id="obat_diberikan" class="form-control" placeholder="Masukkan Nama Obat" name="obat_diberikan" required>{{$surat->obat_diberikan}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rumah_sakit_rujukan">Rumah Sakit Rujukan <b class="color-red">*</b></label>
                        <select name="rumah_sakit_rujukan_id" id="rumah_sakit_rujukan_id" class="choices form-select" required>
                            <option disabled selected>Pilih nama rumah sakit rujukan</option>
                            @foreach ($rsrujukan as $rs)
                                <option value="{{ $rs['id'] }}" {{($rs->id==$surat->rumah_sakit_rujukan_id)?'selected':''}}>{{ $rs['nama_RS_rujukan'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="riwayat">Riwayat Perjalanan Penyakit <b class="color-red">*</b></label>
                        <textarea type="text" id="riwayat" class="form-control" placeholder="Masukkan Riwayat Penyakit" name="riwayat" required>{{$surat->riwayat}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="umur">Hasil Pengobatan Pasien <b class="color-red">*</b></label>
                        <textarea type="text" id="hasil_pengobatan" class="form-control" placeholder="Masukkan Hasil Pengobatan" name="hasil_pengobatan" required>{{$surat->hasil_pengobatan}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <button type="reset" class="btn btn-outline-secondary me-1 mb-1 btn-form"><i class="bi bi-arrow-repeat"></i> Reset</button>
                    <button type="submit" class="btn btn-primary btn-form">Simpan <i class="bi bi-save"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@php
    $surat->load('pasien.kategori');
@endphp
@section('js')
    <script>
        $('select').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        
        let colId = ['pekerjaan','kategori_pasien_id','nama_pasien'];
        let pasien = @json($surat->pasien);
        function setPasien(){
            let pas = pasien;

            colId.forEach(col => {
                if (col==='kategori_pasien_id') {
                    $('#'+col).text(pas.kategori.nama_kategori);
                }else{
                    $('#'+col).text(pas[col]);
                }
            });
        }
        setPasien();
    </script>
@stop
        
@endsection