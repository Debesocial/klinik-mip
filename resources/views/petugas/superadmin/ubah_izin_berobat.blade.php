@extends('layouts.dashboard.app')

@section('title', 'Ubah Izin Berobat')
@section('izinberobat', 'active')
@section('breadcrumb', 'ubah_izin_berobat')
@section('judul', 'Ubah Izin Berobat')
@section('container')

<div class="card">
    <div class="card-body">
        <form class="form form-horizontal" id="izin-berobat" action="/ubah/izin/berobat/{{$izin->id }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Pasien <b class="color-red">*</b></label>
                            <select name="pasien_id" id="pasien_id" class="form-select" onchange="setPasien(this)" required>
                                <option value="" disabled selected>Pilih ID Rekam Medis Pasien
                                </option>
                                @foreach ($pasien as $pas)
                                    <option value="{{ $pas->id }}" {{($pas->id==$izin->pasien_id)?'selected':''}}>{{ $pas->id_rekam_medis }} -
                                        {{ $pas->nama_pasien }} </option>
                                @endforeach
                            </select>
                            {!! detailPasienSurat([
                                'Nama Pasien' => 'nama_pasien',
                                'Kategori' => 'kategori_pasien_id',
                                'Pekerjaan' => 'pekerjaan',])
                            !!}
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Pemeriksaan <b class="color-red">*</b></label>
                            <input type="text" id="tempat" class="form-control" name="tempat" placeholder="tempat pemeriksaan" required value="{{$izin->tempat}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal keluar <b class="color-red">*</b></label>
                            <input type="date" id="tanggal_keluar" class="form-control" name="tanggal_keluar" placeholder="tanggal keluar" required value="{{$izin->tanggal_keluar}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File Pendukung</label>
                            <input class="form-control" type="file" id="ttd" name="ttd" value="{{$izin->ttd}}">
                        </div>
                        <div class="mb-3 text-end">  
                                <button type="reset" class="btn btn-outline-secondary"><i class="bi bi-arrow-repeat"></i> Reset</button>
                                <button type="button" onclick="submitform('izin-berobat')" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@section('js')
    <script>
        $('select').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });

        $(document).ready(function(){
            setPasien($('select#pasien_id'));
        })
        
        let colId = ['pekerjaan','kategori_pasien_id','nama_pasien'];
        let pasien = @json($pasien);
        function setPasien(select){
            id = $(select).val()
            let pas = pasien.find(data => data.id == id);

            colId.forEach(col => {
                if (col==='kategori_pasien_id') {
                    $('#'+col).text(pas.kategori.nama_kategori);
                }else{
                    $('#'+col).text(pas[col]);
                }
            });
        }
    </script>
@stop                 

@endsection
