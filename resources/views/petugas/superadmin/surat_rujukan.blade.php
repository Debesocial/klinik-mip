@extends('layouts.dashboard.app')

@section('title', 'Surat Rujukan')
@section('suratrujukan', 'active')
@section('breadcrumb', 'tambah_surat_rujukan')
@section('judul', 'Surat Rujukan')
@section('container')

<div class="card">
    <div class="card-body">
        <form class="form" id="surat-rujukan" action="/surat/rujukan" onsubmit="showLoader()" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="last-name-column">Pasien <b class="color-red">*</b></label>
                        <select name="pasien_id" id="pasien_id" class="form-select" onchange="setPasien(this)" {{($id_pasien)?'readonly':''}} required>
                            <option value="" disabled>Pilih ID Rekam Medis Pasien</option>
                            @foreach ($pasien_id as $pas)
                                <option value="{{ $pas['id'] }}" {{$id_pasien == $pas['id']?'selected':''}} >{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }} </option>
                            @endforeach
                        </select>
                        {!! detailPasienSurat([
                            'Nama Pasien' => 'nama_pasien',
                            'Kategori' => 'kategori_pasien_id',
                            'Pekerjaan' => 'pekerjaan',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        <label for="">Tempat Pemeriksaan <b class="color-red">*</b></label>
                        <input type="text" id="tempat" class="form-control" name="tempat" placeholder="Masukkan Tempat Pemeriksaan" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Tanggal Pemeriksaan <b class="color-red">*</b></label>
                        <input type="date" id="tanggal" class="form-control" placeholder="Tanggal Pemeriksaan" name="tanggal" max="{{date('Y-m-d')}}" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="">File Pendukung </label>
                        <input class="form-control" type="file" id="ttd" name="ttd" multiple >
                    </div> --}}
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dokter_rujukan">Dokter Spesialis Rujukan <b class="color-red">*</b></label>
                        <select name="spesialis_rujukan_id" id="spesialis_rujukan_id" class="choices form-select" required>
                            <option disabled selected>Pilih nama dokter spesialis rujukan</option>
                            @foreach ($spesialisrujukan as $spesialis)
                                <option value="{{ $spesialis['id'] }}">{{ $spesialis['nama_spesialis_rujukan'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="umur">Obat yang diberikan <b class="color-red">*</b></label>
                        <textarea type="text" id="obat_diberikan" class="form-control" placeholder="Masukkan Nama Obat" name="obat_diberikan" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rumah_sakit_rujukan">Rumah Sakit Rujukan <b class="color-red">*</b></label>
                        <select name="rumah_sakit_rujukan_id" id="rumah_sakit_rujukan_id" class="choices form-select" required>
                            <option disabled selected>Pilih nama rumah sakit rujukan</option>
                            @foreach ($rsrujukan as $rs)
                                <option value="{{ $rs['id'] }}">{{ $rs['nama_RS_rujukan'] }}</option>
                            @endforeach
                        </select>
                        <textarea name="rs_lain" id="rs_lain"  rows="3" class="form-control mt-1" placeholder="Masukkan nama rumah sakit" hidden></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="riwayat">Riwayat Perjalanan Penyakit <b class="color-red">*</b></label>
                        <textarea type="text" id="riwayat" class="form-control" placeholder="Masukkan Riwayat Penyakit" name="riwayat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="umur">Hasil Pengobatan Pasien <b class="color-red">*</b></label>
                        <textarea type="text" id="hasil_pengobatan" class="form-control" placeholder="Masukkan Hasil Pengobatan" name="hasil_pengobatan" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <button type="submit" class="btn btn-primary btn-form">Simpan <i class="bi bi-save"></i></button>
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
        const selectedPasien = "{{$id_pasien}}";

        $(document).ready(function () {
            $('#rumah_sakit_rujukan_id').change(function () { 
                    value = $(this).val();
                    if (value==10) {
                        $('#rs_lain').attr('required', 'required');
                        $('#rs_lain').removeAttr('hidden');
                    }else{
                        $('#rs_lain').removeAttr('required');
                        $('#rs_lain').attr('hidden', 'hidden');
                        $('#rs_lain').val('');
                    }
                    
                });
                if (selectedPasien!=''||selectedPasien!=null) {
                    $('#pasien_id').val(selectedPasien).trigger('change');
                    setPasien($('#pasien_id'));
                }
        });
        
        let colId = ['pekerjaan','kategori_pasien_id','nama_pasien'];
        let pasien = @json($pasien_id);
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
    <script>
        // $('[max]').bind('input', function() {
        //     var to_confirm = $(this);
        //     var now = new Date();

        //     if(to_confirm.val() > now)
        //         this.setCustomValidity('Tanggal tidak maksimal hari ini');
        //     else
        //         this.setCustomValidity('');
        // });
    </script>
@stop

    
@endsection