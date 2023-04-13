@extends('layouts.dashboard.app')

@section('title', 'Ubah Surat Rujukan')
@section('suratrujukan', 'active')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

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
        @section('judul', 'Ubah Surat Rujukan')
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
                                <form class="form" action="/ubah/surat/rujukan/{{ $surat->id }}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="riwayat">Riwayat Perjalanan Penyakit <b class="color-red">*</b></label>
                                                <textarea type="text" id="riwayat" class="form-control"
                                                 name="riwayat" required>{{$surat->riwayat}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_pasien">Nama Pasien </label>
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien" value="{{$surat->pasien->nama_pasien}}" disabled>
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Obat yang diberikan <b class="color-red">*</b></label>
                                                <textarea type="text" id="obat_diberikan" class="form-control"
                                                 name="obat_diberikan" required>{{$surat->obat_diberikan}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Tempat Pemeriksaan <b class="color-red">*</b></label>
                                                <input type="text" id="tempat" class="form-control"
                                                    name="tempat" value="{{$surat->tempat}}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="perusahaan">Perusahaan </label>
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" value="{{$surat->pasien->perusahaan->nama_perusahaan_pasien}}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="umur">Hasil Pengobatan Pasien <b class="color-red">*</b></label>
                                                <textarea type="text" id="hasil_pengobatan" class="form-control"
                                                 name="hasil_pengobatan" required>{{$surat->hasil_pengobatan}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan </label>
                                                <input type="text" id="pekerjaan" class="form-control"
                                                    name="pekerjaan" value="{{$surat->pasien->pekerjaan}}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="dokter_rujukan">Dokter Spesialis Rujukan <b class="color-red">*</b></label>
                                                <select name="spesialis_rujukan_id" id="spesialis_rujukan_id" class="choices form-select" required>
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($spesialisrujukan as $spesialis)
                                                        <option value="{{ $spesialis->id }}" {{ $spesialis->id == $surat->spesialisrujukan->id ? 'selected' : '' }}>{{ $spesialis->nama_spesialis_rujukan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal Pemeriksaan <b class="color-red">*</b></label>
                                                <input type="date" id="tanggal" class="form-control"
                                                value="{{$surat->tanggal}}" name="tanggal" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="rumah_sakit_rujukan">Rumah Sakit Rujukan <b class="color-red">*</b></label>
                                                <select name="rumah_sakit_rujukan_id" id="rumah_sakit_rujukan_id" class="choices form-select" required>
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($rsrujukan as $rujukan)
                                                        <option value="{{ $rujukan->id }}" {{ $rujukan->id == $surat->rumahsakitrujukan->id ? 'selected' : '' }}>{{ $rujukan->nama_RS_rujukan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class=" d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1 btn-form">Simpan</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1 btn-form">Reset</button>
                                            </div>  

                                        </form>
                                            
        </section>
        
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script
  src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
  integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
    $("#pasien_id").click(function(e) {
        var pasien = $(this).val();

        console.log(pasien);
        
        $.ajax({
            type: "GET",
            url: "{{route('superadmin.datapasien.id')}}",
            data: {'pasien': pasien},
            dataType: 'json',
            success:  function(data) {
                console.log(data);
            $('#nama_pasien').val(data.nama_pasien);
            $('#tanggal_lahir').val(data.tanggal_lahir);
            $('#umur').val(data.umur);
            $('#pekerjaan').val(data.pekerjaan);
            $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
            $('#divisi').val(data.divisi.nama_divisi_pasien);
            $('#jabatan').val(data.jabatan.nama_jabatan);
            $('#jenis_kelamin').val(data.jenis_kelamin);
            $('#alamat').val(data.alamat);
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
        });
    });
  </script>

    <script>
        $(".form-select").select2();
    </script>
@endsection