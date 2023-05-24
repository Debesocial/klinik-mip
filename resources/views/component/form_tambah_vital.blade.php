<div class="bs-stepper" id="stepper2">
    <div class="bs-stepper-header">
        <div class="step" data-target="#test-nl-1">
            <button type="button" class="btn step-trigger">
                <span class="bs-stepper-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                        <path
                            d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                        <path
                            d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                        <path
                            d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z" />
                    </svg>
                </span>
                <span class="bs-stepper-label">Pemeriksaan</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#test-nl-2">
            <button type="button" class="btn step-trigger">
                <span class="bs-stepper-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
                        <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                    </svg>
                </span>
                <span class="bs-stepper-label">Terapi Tambahan</span>
            </button>
        </div>
    </div>
    <div class="bs-stepper-content">
        <div class="container mb-3">
                <form class="form needs-validation" id="form-tambah-tandavital" action="/tanda_vital/tambah" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="id_rawat_inap" value="{{$id_rawat_inap}}">
                    <div id="test-nl-1" class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Skala Nyeri <b class="color-red">*</b></label>
                                    <select class="choices form-select" name="skala_nyeri"
                                        id="skala_nyeri">
                                        <option disabled selected>Pilih Pemantauan </option>
                                        @foreach ($hasilpemantauan as $hasil)
                                        <option value="{{ $hasil->id }}">{{
                                            $hasil->nama_pemantauan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Skala Nyeri harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">HR <b class="color-red">*</b></label>
                                    <select class="choices form-select" name="hr" id="hr">
                                        <option disabled selected>Pilih Pemantauan</option>
                                        @foreach ($hasilpemantauan as $hasil)
                                        <option value="{{ $hasil->id }}">{{
                                            $hasil->nama_pemantauan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        HR harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">BP <b class="color-red">*</b></label>
                                    <select class="choices form-select" name="bp" id="bp">
                                        <option disabled selected>Pilih Pemantauan</option>
                                        @foreach ($hasilpemantauan as $hasil)
                                        <option value="{{ $hasil->id }}">{{
                                            $hasil->nama_pemantauan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        BP harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Temp <b class="color-red">*</b></label>
                                    <select class="choices form-select" name="temp" id="temp">
                                        <option disabled selected>Pilih Pemantauan</option>
                                        @foreach ($hasilpemantauan as $hasil)
                                        <option value="{{ $hasil->id }}">{{
                                            $hasil->nama_pemantauan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Temp harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">RR <b class="color-red">*</b></label>
                                    <select class="choices form-select" name="rr" id="rr">
                                        <option disabled selected>Pilih Pemantauan</option>
                                        @foreach ($hasilpemantauan as $hasil)
                                        <option value="{{ $hasil->id }}">{{
                                            $hasil->nama_pemantauan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        RR harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Saturasi Oksigen <b class="color-red">*</b></label>
                                    <select class="choices form-select" name="saturasi_oksigen"
                                        id="saturasi_oksigen">
                                        <option disabled selected>Pilih Pemantauan</option>
                                        @foreach ($hasilpemantauan as $hasil)
                                        <option value="{{ $hasil->id }}">{{
                                            $hasil->nama_pemantauan }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Staturasi Oksigen harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" cols="10"  rows="5"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Dokumen Pendukung</label>
                                    <input type="file" class="form-control" name="dokumen" id="dokumen">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-end">
                                <div></div>
                                <button type="button" class="btn btn-primary rounded-pill"
                                    onclick="lanjut1()"><b>Selanjutnya</b> <i class="bi bi-arrow-right-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="test-nl-2" class="content">
                        <input type="text" name="terapi" id="terapi" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="" class="form-label">Nama Obat <b
                                            class="text-danger">*</b></label>
                                    <input type="text" id="nama_obat" class="form-control">
                                    {!! validasi('Nama obat') !!}
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Jumlah Obat <b
                                            class="text-danger">*</b></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" id="jumlah_obat" class="form-control">
                                            {!! validasi('Jumlah obat') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <select id="satuan_obat" class="form-select">
                                                <option value="" selected disabled>Pilih satuan</option>
                                                @foreach ($satuanobat as $satuan)
                                                    <option value="{{ $satuan->id }}">{{ $satuan->satuan_obat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {!! validasi('Satuan Obat') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Aturan Pakai <b
                                            class="text-danger">*</b></label>
                                    <input type="text" id="aturan_pakai" class="form-control">
                                    {!! validasi('Aturan pakai') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="" class="form-label">Keterangan<b
                                            class="text-danger">*</b></label>
                                    <textarea id="keterangan_resep" class="form-control"></textarea>
                                    {!! validasi('Aturan pakai') !!}
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Waktu Pemberian Obat<b
                                        class="text-danger">*</b></label>
                                        <input type="datetime-local" name="tgl_pemberian" id="tgl_pemberian" class="form-control">
                                {!! validasi('Waktu Pemberian Obat') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col text-center">
                                <button type="button" class="btn btn-success" onclick="addResep()"><b>Tambah <i
                                            class="bi bi-arrow-down-circle"></i></b></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span id="resep_kosong" class="text-danger" style="display: none">Resep tidak boleh
                                    kosong</span>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Obat</th>
                                                <th>Obat</th>
                                                <th>Aturan Pakai</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Pemberian</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_resep">
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()"><i
                                    class="bi bi-arrow-left-circle"></i>
                                    <b>Sebelumnya</b>
                                </button>
                                <button type="button" onclick="simpan()" class="btn btn-primary"><b><i class="bi bi-save"></i> Simpan</b></button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>


<script>
     var stepper2 = new Stepper(document.querySelector('#stepper2'), {
        linear: true,
        animation: true
    })

    function lanjut1(){
        var formidrequired = ['skala_nyeri','hr','bp','temp','rr','saturasi_oksigen']
        var validated = true;
        formidrequired.forEach(id => {
            var form = $('#'+id);
            if(form.val()==null||form.val()==''){
                form.addClass('is-invalid').removeClass('is-valid');
                validated = false;
            } else{
                form.addClass('is-valid').removeClass('is-invalid');
            }
        });
        if (validated === true) {
           stepper2.next();
        }
    }

    function simpan() {
        
        if (resep.length != 0) {
            $('.preloader').show();
            hideModal('modalRawatInap');
            $('#form-tambah-tandavital').submit();
        }else {
            $('#resep_kosong').show();
        }

    }
    id_resep = ['nama_obat', 'jumlah_obat', 'satuan_obat', 'aturan_pakai', 'keterangan_resep', 'tgl_pemberian'];
    resep = [];
    var satuanobat = @json($satuanobat);
    function addResep() {
        var temp = {};
        var validated = true;
        id_resep.forEach(id => {
            form = $('#' + id)
            if (form.val() == null || form.val() == '') {
                form.addClass('is-invalid');
                form.removeClass('is-valid');
                validated = false;
            } else {
                form.addClass('is-valid');
                form.removeClass('is-invalid');
                temp[id] = form.val();
            }
        });
        if (validated == true) {
            resep.push(temp)
            drawformResep();
        }
    }
    function drawformResep() {
        html = ``;
        resep.forEach((data, key) => {
            satuan = satuanobat.find(st => st.id == data.satuan_obat);
            html += `<tr> 
                        <td>` + data.nama_obat + `</td>
                        <td>` + data.jumlah_obat + ` ` + satuan.satuan_obat + `</td>
                        <td>` + data.aturan_pakai + `</td>
                        <td>` + data.keterangan_resep + `</td>
                        <td>` + tanggal(data.tgl_pemberian) + `</td>
                        <td><b class="text-danger" style="cursor:pointer" onclick="deleteResep(` + key + `)"><i class="bi bi-trash"></i></b></td>
                    </tr>`;
        })
        clearformResep();
        $('#terapi').val(JSON.stringify(resep));
        $('#body_resep').html(html);
    }

    function clearformResep() {
        id_resep.forEach(id => {
            form = $('#' + id);
            if (id == 'satuan_obat') {
                form.val('').trigger('change');
            }
            form.removeClass('is-valid');
            form.val('');
        })
    }

    function deleteResep(id) {
        delete resep[id];
        resep = resep.filter(function(x) {
            return x !== null
        });
        drawformResep();
    }
    function tanggal(stringdate) {
    let date = new Date(Date.parse(stringdate));
    formatDate = cekSingle(date.getDate())+'/'+cekSingle(date.getMonth())+'/'+date.getFullYear() + ' ' + cekSingle(date.getHours()) + ':' + cekSingle(date.getMinutes());
    return formatDate;
}
    $(document).ready(function(){
        $('input').keyup(function() {
            var id = $(this).val();
            if (id != null || id != '') {
                $(this).removeClass('is-invalid');
            }
        })
        $('select').change(function() {
            var id = $(this).val();
            if (id != null || id != '') {
                $(this).removeClass('is-invalid');
            }
        })
        $('textarea').keyup(function() {
            var id = $(this).val();
            if (id != null || id != '') {
                $(this).removeClass('is-invalid');
            }
        })

    })
    
</script>