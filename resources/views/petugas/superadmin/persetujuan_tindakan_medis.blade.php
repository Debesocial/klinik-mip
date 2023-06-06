@extends('layouts.dashboard.app')

@section('title', 'Persetujuan Tindakan Medis')
@section('persetujuanmedis', 'active')
@section('breadcrumb', 'tambah_tindakan_medis')
@section('judul', 'Persetujuan Tindakan Medis')
@section('container')



<div class="card">
<div class="card-content">
    <div class="card-body">
        <form class="form form-horizontal" action="/persetujuan/tindakan/medis" method="post" onsubmit="showLoader()" enctype='multipart/form-data'>
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>ID Rekam Pasien Pasien <b class="color-red">*</b></label>
                        <select name="pasien_id" id="pasien_id" class="form-select" onchange="setPasien(this)">
                            <option disabled selected>Pilih ID Rekam Medis Pasien</option>
                            @foreach ($pasien_id as $pas)
                                <option value="{{$pas->id}}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        {!! detailPasienSurat([
                            'Nama Pasien' => 'nama_pasien',
                            'Tanggal Lahir' => 'tanggal_lahir',
                            'Kategori' => 'kategori_pasien_id',
                            'Pekerjaan' => 'pekerjaan',
                            'Perusahaan' => 'perusahaan_id',
                            'Divisi' => 'divisi_id',
                            'Jabatan' => 'jabatan_id'
                        ]) !!}
                    </div>
                    

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Riwayat Perjalanan Penyakit <b class="color-red">*</b></label>
                        <textarea type="text" id="riwayat" class="form-control" name="riwayat" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Hasil Pernyataan <b class="color-red">*</b></label>
                        <input class="form-check-input" type="radio" name="hasil" id="hasil" value="1"> Setuju
                        <label for="">
                        <input class="form-check-input" type="radio" name="hasil" id="hasil" value="0" checked> Tidak Setuju
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1"><i class="bi bi-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@section('js')
<script>
    $('select').select2({
        theme: "bootstrap-5",
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
    });
    
    let colId = [
                    'nama_pasien',
                    'tanggal_lahir',
                    'kategori_pasien_id',
                    'pekerjaan',
                    'perusahaan_id',
                    'divisi_id',
                    'jabatan_id'
                ];
    let pasien = @json($pasien_id);
    function setPasien(select){
        id = $(select).val()
        let pas = pasien.find(data => data.id == id);
        pas.perusahaan_id = cekNull(pas.perusahaan?.nama_perusahaan_pasien);
        pas.divisi_id = cekNull(pas.divisi?.nama_divisi_pasien);
        pas.jabatan_id = cekNull(pas.jabatan?.nama_jabatan);
        pas.kategori_pasien_id = cekNull(pas.kategori.nama_kategori);

        colId.forEach(col => {
                $('#'+col).text(': '+pas[col]);
        });
    }
</script>
@stop


@endsection