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
                <form class="form needs-validation" id="form-tambah-tandavital" action="/tanda_vital/ubah/{{$tandavital->id}}" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="id_rawat_inap" value="{{$tandavital->id_rawat_inap}}">
                    <div id="test-nl-1" class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Skala Nyeri <b class="color-red">*</b></label>
                                    <input class="form-control" type="number"  name="skala_nyeri" id="skala_nyeri" min="0" max="10" value="{{$tandavital->skala_nyeri}}">
                                    <div class="invalid-feedback">
                                        Skala Nyeri harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">HR <b class="color-red">*</b></label>
                                    <input class="form-control" type="number" name="hr" id="hr" min="0" max="200" value="{{$tandavital->hr}}">
                                    <div class="invalid-feedback">
                                        HR harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">BP <b class="color-red">*</b></label>
                                    <input class="form-control" type="number" name="bp" id="bp" min="0" max="250" value="{{$tandavital->bp}}">
                                    <div class="invalid-feedback">
                                        BP harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Temp <b class="color-red">*</b></label>
                                    <input class="form-control" type="number" name="temp" id="temp" min="31" max="41" value="{{$tandavital->temp}}">
                                    <div class="invalid-feedback">
                                        Temp harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">RR <b class="color-red">*</b></label>
                                    <input class="form-control" type="number" name="rr" id="rr" min="0" max="100" value="{{$tandavital->rr}}">
                                    <div class="invalid-feedback">
                                        RR harus diisi
                                    </div>
                                    <div class="valid-feedback">
                                        Data sudah benar
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Saturasi Oksigen <b class="color-red">*</b></label>
                                    <input class="form-control" type="number" name="saturasi_oksigen"
                                        id="saturasi_oksigen" min="0" max="100" value="{{$tandavital->saturasi_oksigen}}">
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
                                    <textarea name="keterangan" id="keterangan" class="form-control" cols="10"  rows="5">{{$tandavital->keterangan}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Dokumen Pendukung</label>
                                    @if ($tandavital->dokumen)
                                        <a href="{{asset('petugas/pemantauan_tandavital/file/'.$tandavital->dokumen)}}" target=”_blank”>{{$tandavital->dokumen}} <i class="bi bi-box-arrow-up-right"></i></a>
                                    @else
                                        <span class="text-warning"> Belum ada dokumen </span>
                                    @endif
                                    <input type="file" class="form-control" name="dokumen" id="dokumen">
                                    <input type="hidden" class="form-control" name="old_dokumen" id="old_dokumen" value="{{$tandavital->dokumen}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Gejala</label>
                                    <select name="gejala" id="gejala" class="form-select">
                                        <option value="" disabled>Pilih Gejala</option>
                                        @foreach ($hasilpemantauan as $gejala)
                                            <option value="{{$gejala->id}}" {{($gejala->id == $tandavital->gejala)?'selected':''}}>{{$gejala->nama_pemantauan}} - {{$gejala->kode}}</option>
                                        @endforeach
                                    </select>
                                    {!!validasi('Gejala')!!}
                                </div>
                                <div id="form_gejala_lain" class="mb-3" style="{{($tandavital->gejala==6)?'':'display: none'}}">
                                    <label class="form-label">Gejala Lain</label>
                                    <textarea class="form-control" name="gejala_lain" id="gejala_lain">{{$tandavital->gejala_lain}}</textarea>
                                    {!!validasi('Gejala Lain')!!}
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
                                    <select id="nama_obat" class="form-select">
                                        <option value="">Pilih Obat</option>
                                        @foreach ($obat as $ob)
                                            <option value="{{$ob->id}}">{{$ob->nama_obat}}</option>
                                        @endforeach
                                    </select>
                                    {!! validasi('Nama obat') !!}
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Jumlah Obat <b
                                            class="text-danger">*</b></label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="number" id="jumlah_obat" class="form-control">
                                                    <span class="input-group-text" id="satuan_obat">Satuan</span>
                                                    {!! validasi('Jumlah obat') !!}
                                                </div>
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
                                        <input type="datetime-local" id="tgl_pemberian" class="form-control">
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
    select2_obat =$('select#nama_obat').select2({
        theme: "bootstrap-5",
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
    });
    function lanjut1(){
        var formidrequired = ['skala_nyeri','hr','bp','temp','rr','saturasi_oksigen', 'gejala']
        var validated = true;
        formidrequired.forEach(id => {
            var form = $('#'+id);
            if(form.val()==null||form.val()==''){
                form.addClass('is-invalid').removeClass('is-valid');
                form.siblings('.invalid-feedback').text('Tidak boleh kosong');
                validated = false;
            } else{
                min = form.attr('min');
                max = form.attr('max');
                if (min != undefined || max != undefined) {
                    min = parseFloat(min);
                    max = parseFloat(max);
                    nilai = parseFloat(form.val())
                    if ( (nilai<=max && nilai>=min) ) {
                        form.addClass('is-valid').removeClass('is-invalid');
                    }else{
                        form.siblings('.invalid-feedback').text('Nilai harus diantara ' + min +' - '+max);
                        form.addClass('is-invalid').removeClass('is-valid');
                        validated = false;
                    }
                }else{
                    form.addClass('is-valid').removeClass('is-invalid');
                }
                if (id=='gejala' && form.val()== 6) {
                    if ($('#gejala_lain').val()=='') {
                        $('#gejala_lain').addClass('is-invalid').removeClass('is-valid');
                        validated=false;
                    }else{

                        $('#gejala_lain').addClass('is-valid').removeClass('is-invalid');
                    }
                }
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
    id_resep = ['nama_obat', 'jumlah_obat','aturan_pakai', 'keterangan_resep', 'tgl_pemberian'];
    resep = {!! $tandavital->terapi !!};
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
            namaobat = obat.find(ob => ob.id == data.nama_obat); 
            satuan = satuanobat.find(st => st.id == namaobat.satuan_obat_id);
            html += `<tr> 
                        <td> <a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/obat/`+namaobat.id+`', 'Detail Obat')">` + namaobat.nama_obat + `</a></td>
                        <td>` + data.jumlah_obat + ` ` + satuan.satuan_obat + `</td>
                        <td>` + data.aturan_pakai + `</td>
                        <td>` + data.keterangan_resep + `</td>
                        <td>` + tanggal(data.tgl_pemberian) + `</td>
                        <td><b class="text-warning" style="cursor:pointer" onclick="editResep(` + key + `)"><i class="bi bi-pencil-square"></i></b> <b class="text-danger" style="cursor:pointer" onclick="deleteResep(` + key + `)"><i class="bi bi-trash"></i></b></td>
                    </tr>`;
        })
        clearformResep();
        $('#terapi').val(JSON.stringify(resep));
        $('#body_resep').html(html);
    }

    function clearformResep() {
        id_resep.forEach(id => {
            form = $('#' + id);
            if (id == 'nama_obat') {
                select2_obat.val(null).trigger('change');
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

    function editResep(id){
        temp = resep[id];
        deleteResep(id);
        id_resep.forEach(idt => {
            form = $('#'+idt);
            if (idt!='nama_obat') {
                form.val(temp[idt]);
            } else {
                form.children().removeAttr('selected');
                select2_obat.val(temp.nama_obat).trigger('change');
            }
        });
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
                if ($(this).attr('id')=='nama_obat') {
                    setSatuan($(this).val());
                }
            }
            if($(this).attr('id')=='gejala' ){
                if($(this).val()==6){
                    $('#form_gejala_lain').show();
                }else{
                    $('#form_gejala_lain').hide();
                    $('#gejala_lain').val('');
                }
            }
        })
        $('textarea').keyup(function() {
            var id = $(this).val();
            if (id != null || id != '') {
                $(this).removeClass('is-invalid');
            }
        })
        drawformResep();
    });

    function setSatuan(i) {
        if (i==null || i=='') {
            $('#satuan_obat').text('Satuan');
        }else{
            namaobat = obat.find(ob => ob.id == i);
            satuan = satuanobat.find(st => st.id == namaobat.satuan_obat_id);
            $('#satuan_obat').text(satuan.satuan_obat);
        }
    }
    
</script>