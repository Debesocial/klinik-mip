@php
    if(isset($instruksidokter)){
        $url = '/instruksi_dokter/ubah/'.$instruksidokter->id;
        $rawat_inap = $instruksidokter->id_rawat_inap;
        $tanggal= $instruksidokter->tanggal;
        $jam = $instruksidokter->jam;
        $hasil_pemeriksaan = $instruksidokter->hasil_pemeriksaan;
        $instruksi_pengobatan = $instruksidokter->instruksi_pengobatan;
    }else{
        $url = '/instruksi_dokter/tambah';
        $rawat_inap=$id_rawat_inap;
        $tanggal= date('Y-m-d');
        $jam = date('H:i');
        $hasil_pemeriksaan = null;
        $instruksi_pengobatan = null;
    }
@endphp

<form action="{{ $url }}" method="POST" id="formInstruksi">
    @csrf
    <input type="hidden" name="id_rawat_inap" value="{{ $rawat_inap }}">
    <div class="mb-3 row">
        <div class="col-6 col-md-4">
            <label for="tanggal" class="form-label">Tanggal<b class="text-danger">*</b></label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $tanggal }}">
            <div class="invalid-feedback">
                Tanggal harus diisi
            </div>
            <div class="valid-feedback">
                Data sudah benar
            </div>
        </div>
        <div class=" col-6 col-md-4">
            <label for="jam" class="form-label">Jam<b class="text-danger">*</b></label>
            <input type="time" class="form-control" name="jam" id="jam" value="{{ $jam }}">
            <div class="invalid-feedback">
                Jam harus diisi
            </div>
            <div class="valid-feedback">
                Data sudah benar
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-md-10">
            <label for="hasil_pemeriksaan" class="form-label">Hasil Pengkajian/Pemeriksaan <b class="text-danger">*</b></label>
            <textarea name="hasil_pemeriksaan" id="hasil_pemeriksaan" class="form-control" cols="10" rows="5">{{ $hasil_pemeriksaan }}</textarea>
            <div class="invalid-feedback">
                Hasil pengkajian/pemeriksaan harus diisi
            </div>
            <div class="valid-feedback">
                Data sudah benar
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-md-10">
            <label for="instruksi_pengobatan" class="form-label">Instruksi Pengobatan/Tindakan  <b class="text-danger">*</b></label>
            <textarea name="instruksi_pengobatan" id="instruksi_pengobatan" class="form-control" cols="10" rows="5">{{ $instruksi_pengobatan }}</textarea>
            <div class="invalid-feedback">
                Instruksi pengobatan/tindakan harus diisi
            </div>
            <div class="valid-feedback">
                Data sudah benar
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col text-end">
            <button type="button" id="simpan" onclick="submitForm()" class="btn btn-primary rounded-pill"><i class="bi bi-save"></i> <b>Simpan</b></button>
        </div>
    </div>
</form>
<script>
    function submitForm(){
        var inputs = ['tanggal', 'jam', 'hasil_pemeriksaan', 'instruksi_pengobatan'];
        var validated= true;

        inputs.forEach(input => {
            var form = $('#'+input);
            if(form.val() == null || form.val()==''){
                validated = false;
                form.addClass('is-invalid');
                form.removeClass('is-valid');
            }else{
                form.addClass('is-valid');
                form.removeClass('is-invalid');
            }
        });
        if(validated==true){
            $('#formInstruksi').submit();
        }
    }

    
</script>