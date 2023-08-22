<form id="form_permintaan_makanan" action="/permintaan_makanan/tambah" method="post">
    @csrf
    <input type="text" value="{{ $id_rawat_inap }}" name="id_rawat_inap" hidden>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Doiagnosa <b class="text-danger">*</b></label>
                    <select name="nama_penyakit_id" id="nama_penyakit_id" class="form-select">
                        <option value="" selected disabled>Pilih penyakit</option>
                    </select>
                    {!! validasi('Diagnosa') !!}
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Catatan Tambahan <b class="text-danger">*</b></label>
                    <textarea name="catatan" id="catatan" class="form-control"></textarea>
                    {!! validasi('Catatan') !!}
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Permintaan Makanan <b class="text-danger">*</b></label>
                    <textarea name="permintaan_makanan" id="permintaan_makanan" class="form-control"></textarea>
                    {!! validasi('Permintaan Makanan') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Mulai <b class="text-danger">*</b></label>
                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                    {!! validasi('Tanggal Mulai') !!}
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Selesai <b class="text-danger">*</b></label>
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                    {!! validasi('Tanggal Selesai') !!}
                </div>
                <div class="mb-3 row">
                    <label for="" class="form-label">Total Hari Pemberian <b class="text-danger">*</b></label>
                    <div class="col-5">
                        <input type="number" class="form-control" id="total" disabled value="0">
                    </div>
                    <div class="col-1 p-0 my-auto fs-6">
                        Hari
                    </div>

                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jumlah Pemberian <b class="text-danger">*</b></label>
                    <input type="number" class="form-control" name="jumlah_pemberian" id="jumlah_pemberian">
                    {!! validasi('Jumlah Pemberian') !!}
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dokter Yang Memeriksa <b class="text-danger">*</b></label>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="radio" name="ttd" id="ttd1" value="1">
                        <label class="form-check-label" for="ttd1">
                            Tanda Tangan
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="radio" name="ttd" id="ttd2" value="0">
                        <label class="form-check-label" for="ttd2">
                            Tanda Tangan Tersimpan
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button type="button" onclick="simpan()" class="btn btn-primary"><b>Simpan <i
                            class="bi bi-save"></i></b></button>
            </div>
        </div>
    </div>
</form>

<script>
    select2_penyakit =$('select#nama_penyakit_id').select2({
        theme: "bootstrap-5",
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
        ajax: {
            url: '/cari-penyakit-select2',
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data.items
                };
            }
        }
    });

    var tgl_awal = $('#tanggal_mulai').val();
    var tgl_selesai = $('#tanggal_selesai').val();
    $(document).ready(function(){

        $('#tanggal_mulai').change(function(){
            tgl_awal = $(this).val();
            $('#total').val(getDateDiff(tgl_awal, tgl_selesai)) ;
        });
        $('#tanggal_selesai').change(function(){
            var tgl_selesai = $(this).val();
            $('#total').val(getDateDiff(tgl_awal, tgl_selesai)) ;
        });
    })

    var id = ['nama_penyakit_id', 'catatan', 'permintaan_makanan', 'tanggal_mulai', 'tanggal_selesai', 'ttd', 'jumlah_pemberian'];

    function cekValidasi() {
        validated = true;
        id.forEach(id => {
            input = $('[name="' + id + '"]');
            value = input.val();
            if (id == 'ttd') {
                value = $('[name="' + id + '"]:checked').val();
            }

            if (value == null || value == '' || value == undefined) {
                input.addClass('is-invalid');
                input.removeClass('is-valid');
                validated = false;
            } else {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
            }
        });
        return validated;
    }

    function simpan() {
        if (cekValidasi()) {
            hideModal('modalRawatInap');
            $('.preloader').show();
            $('#form_permintaan_makanan').submit();
        }
    }
</script>
