@extends('layouts.dashboard.app')
@section('title', 'Ubah Keterangan Berobat')
@section('berobat', 'active')
@section('breadcrumb', 'ubah_keterangan_berobat')

@section('judul', 'Ubah Keterangan Berobat')
@section('container')

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="/ubah/ket/berobat/{{$keterangan->id}}" onsubmit="showLoader()" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Pasien <b class="color-red">*</b></label>
                                <select name="pasien_id" id="pasien_id" class="form-select" onchange="setPasien(this)" required>
                                    <option value="" disabled selected>Pilih ID Rekam Medis Pasien
                                    </option>
                                    @foreach ($pasien as $pas)
                                        <option value="{{ $pas->id }}" {{($pas->id == $keterangan->pasien_id)?'selected':''}} >{{ $pas->id_rekam_medis }} -
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
                                            <option value="{{ $rs->id }}" {{($rs->id==$keterangan->rumah_sakit_rujukans_id?'selected':'')}}>{{ $rs->nama_RS_rujukan }}</option>
                                        @endforeach
                                    </select>
                                    <textarea name="rs_lain" id="rs_lain"  rows="3" class="form-control mt-1" placeholder="Masukkan nama rumah sakit" hidden></textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Diagnosa <b class="color-red">*</b></label>
                                    <select name="nama_penyakit_id" id="nama_penyakit_id" class="form-select" required>
                                        <option value="" disabled selected>Pilih Nama Penyakit</option>
                                        @foreach ($namapenyakit as $nama)
                                            <option value="{{ $nama->id }}" {{($nama->id==$keterangan->nama_penyakit_id?'selected':'')}}>{{ $nama->primer }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Diagnosa Sekunder</label>
                                    <select name="sekunder" id="sekunder" class="form-select">
                                        <option value="">Pilih Nama Penyakit</option>
                                        @foreach ($namapenyakit as $nama)
                                            <option value="{{ $nama->id }}" {{($nama->id == $keterangan->sekunder?'selected':'')}}>{{ $nama->primer }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">Pasien diresepkan obat <b class="color-red">*</b></label>
                            <textarea type="text" id="resep" class="form-control" name="resep" required>{{$keterangan->resep}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label>Saran untuk Pasien <b class="color-red">*</b></label>
                            <textarea type="text" id="saran" class="form-control" name="saran" required>{{$keterangan->saran}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label>Pasien Harus Kontrol Kembali <b class="color-red">*</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kontrol" id="kontrol"
                                    value="0" {{(0==$keterangan->kontrol?'checked':'')}}>
                                <label class="form-check-label" for="kontrol">
                                    Tidak
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kontrol" id="kontrol"
                                    value="1" {{(1==$keterangan->kontrol?'checked':'')}}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ya
                                </label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label id="label-kontrol">Tanggal Pengembalian Surat Rujukan <b class="color-red">*</b></label>
                            <input type="date" id="tanggal_kembali" class="form-control" name="tanggal_kembali" value="{{$keterangan->tanggal_kembali}}"
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

@section('js')
    <script>
        $('select').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        $(document).ready(function(){
            setPasien($('select#pasien_id'));
            setRs();
            setKontrol();
            $('#rumah_sakit_rujukans_id').change(function () { 
                setRs();
            });
            $('[id="kontrol"]').click(function () { 
                setKontrol()
            });
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

        function setRs(){
            value = $('#rumah_sakit_rujukans_id').val();
            rs_lain = "{{$keterangan->rs_lain}}";
            if (value==10) {
                $('#rs_lain').attr('required', 'required');
                $('#rs_lain').removeAttr('hidden');
                $('#rs_lain').val(rs_lain)
            }else{
                $('#rs_lain').removeAttr('required');
                $('#rs_lain').attr('hidden', 'hidden');
                $('#rs_lain').val('');
            }
        }
        function setKontrol() {
            val_kontrol = $('[id="kontrol"]:checked').val();
            if (val_kontrol==1) {
                $('#tanggal_kembali').attr('required','required');
                $('#tanggal_kembali').removeAttr('hidden');
                $('#label-kontrol').show();
            }else{
                $('#tanggal_kembali').attr('hidden','hidden');
                $('#tanggal_kembali').removeAttr('required');
                $('#tanggal_kembali').val('');
                $('#label-kontrol').hide();
            }
        }
    </script>
@endsection

@endsection