<div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label" for="">Surat Persetujuan Tindakan Medis
                <small class="text-warning"><b>**File maksimal berukuran
                        2MB</b></small></label>
            <input type="file" name="persetujuan_tindakan" id="persetujuan_tindakan" class="form-control">
            {!! validasi('Ukuran file', 'terlalu besar') !!}
        </div>
    </div>
    <div class="border p-3 mb-3">
        <input type="text" name="tindakan" id="tindakan" hidden>
        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col my-auto">
                        <div class="mb-2">
                            <label for="" class="form-label">Nama Tindakan
                            </label>
                            <select name="" id="nama_tindakan" class="form-select">
                                <option value="">Pilih Tindakan</option>
                                @foreach ($tindakan as $tin)
                                    <option value="{{ $tin->id }}">
                                        {{ $tin->nama_tindakan }}</option>
                                @endforeach
                            </select>
                            {!! validasi('Nama') !!}
                        </div>
                        <div id="temp_alat_kesehatan" hidden>
                            <select name="" class="form-select">
                                <option value="" selected disabled>Pilihi alat
                                    kesehatan
                                </option>
                                @foreach ($alatkesehatan as $alat)
                                    <option value="{{ $alat->id }}">
                                        {{ $alat->nama_alkes }}<small>({{ $alat->distributor }})</small>
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-2" id="alkes">
                            <div class="row" id="field_alkes">
                                <div class="col-7">
                                    <label for="" class="form-label">Nama Alat
                                        Kesehatan </label>
                                    <select name="" id="alat_kesehatan" class="form-select">
                                        <option value="" selected disabled>Pilihi
                                            alat
                                            kesehatan </option>
                                        @foreach ($alatkesehatan as $alat)
                                            <option value="{{ $alat->id }}">
                                                {{ $alat->nama_alkes }}
                                                <small>({{ $alat->distributor }})</small>
                                            </option>
                                        @endforeach
                                    </select>
                                    {!! validasi('Alat Kesehatan') !!}
                                </div>
                                <div class="col-3">
                                    <label for="" class="form-label">Jumlah
                                    </label>
                                    <input type="number" name="" id="jumlah_pengguna" class="form-control"
                                        value=1 min=1>
                                </div>
                                <div class="col-2 d-flex align-items-end pb-2" id="tombol_tambah_alat">
                                    <button type="button" class="btn btn-primary btn-sm py-0 px-1"
                                        onclick="tambahAlat()"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Keterangan </label>
                            <textarea name="" id="keterangan" rows="3" class="form-control"></textarea>
                            {!! validasi('Keterangan') !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-1 my-auto">
                <div class="mb-3 text-center">
                    <button type="button" class="btn btn-success" onclick="addTindakan()"><b> <i
                                class="bi bi-arrow-right-circle"></i></b></button>
                </div>
            </div>
            <div class="col-6 border">
                <div class="row">
                    <div class="col py-3">

                        <div class="table-responsive">
                            <span id="tindakan_kosong" class="text-danger" style="display: none">Tindakan tidak
                                boleh kosong</span>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tindakan</th>
                                        <th>Alat Kesehatan</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="body_tindakan">
                                    <tr>
                                        <td colspan="5" style="height: 300px">
                                            <h4 class="text-center" style="color: rgba(0, 0, 0, 0.10)">
                                                Isi tabel tindakan dengan memasukkan data di
                                                form sebelah kiri.
                                            </h4>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
<script>
    var alkes = @json($alatkesehatan);
    var tindakan = {!! $selectedTindakan !!};
    var allTindakan = @json($tindakan);
    var id_tindakan = ['nama_tindakan', 'alat_kesehatan', 'jumlah_pengguna', 'keterangan'];
    var tindakanSelected = {};

    function addTindakan() {
        var temp = {};
        var validated = true;

        id_tindakan.forEach(id => {
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
        let dataAlkes = $('[id^="alat_kesehatan"]');
        let selectedAlkes = [];
        dataAlkes.each(function() {
            if ($(this).val() != null) {
                selectedAlkes.push({
                    id: $(this).val(),
                    jlh: $(this).parent().siblings('.col-3').children('input').val()
                });
            }
        })
        temp['alat_kesehatan'] = selectedAlkes;
        if (validated == true) {
            tindakan.push(temp)
            drawformTindakan();
            tindakanSelected = {};
        }
    }

    function clearformTindakan() {
        id_tindakan.forEach(id => {
            form = $('#' + id);

            if (id == 'alat_kesehatan' || id == 'nama_tindakan') {
                form.val(null).trigger('change');
            } else if (id == 'jumlah_pengguna') {
                form.val('1').trigger('change');
            } else {
                form.val('');
            }

            form.removeClass('is-valid');
            $('#field_alkes').siblings().remove();
        })
    }

    function drawformTindakan() {
        html = ``;
        // console.log(tindakan);
        tindakan.forEach((data, key) => {
            let listnamaalkes = `<ol class="ps-2">`;
            data.alat_kesehatan.forEach(id_alkes => {
                let namaalkes = alkes.find(nama => nama.id == id_alkes.id);
                listnamaalkes +=
                    `<li><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/alkes/` +
                    namaalkes.id + `', 'Detail Alat Kesehatan')">` + namaalkes.nama_alkes +
                    ` <i class="bi bi-box-arrow-up-right"></i></a> <b>${id_alkes.jlh}</b> ${namaalkes.satuan_obat.satuan_obat}</li>`;
            });
            listnamaalkes += `</ol>`;
            var tin = allTindakan.find(d => d.id == data.nama_tindakan);
            html += `<tr> 
                        <td>` + tin.nama_tindakan + `</td>
                        <td>${listnamaalkes}</td>
                        <td>` + data.keterangan + `</td>
                        <td><b class="text-warning" style="cursor:pointer" onclick="editTindakan(` + key +
                `)"><i class="bi bi-pencil-square"></i></b> <b class="text-danger" style="cursor:pointer" onclick="deleteTindakan(` +
                key + `)"><i class="bi bi-trash"></i></b></td>
                        </tr>`;
        })
        clearformTindakan();
        $('#tindakan').val(JSON.stringify(tindakan));
        $('#body_tindakan').html(html);
    }

    function deleteTindakan(id) {
        delete tindakan[id];
        tindakan = tindakan.filter(function(x) {
            return x !== null
        });
        drawformTindakan();
    }

    function editTindakan(id) {
        temp = tindakan[id];
        deleteTindakan(id);
        if (Object.keys(tindakanSelected).length !== 0) {
            tindakan.push(tindakanSelected);
            drawformTindakan();
        }
        tindakanSelected = temp;
        id_tindakan.forEach(idt => {
            form = $('#' + idt);
            if (idt != 'alat_kesehatan') {
                form.val(temp[idt]);
                if (idt == 'nama_tindakan') {
                    form.trigger('change')
                }
            } else {
                drawAlat(temp.alat_kesehatan);
                // form.children().removeAttr('selected');
                // select2_alat.val(temp.alat_kesehatan).trigger('change');
            }
        });
    }

    countAlkes = 1;

    function tambahAlat(data = null) {
        let newSelect = $('#temp_alat_kesehatan').clone();
        newSelect.removeAttr('hidden');
        newSelect.children('select').attr('id', 'alat_kesehatan_' + countAlkes);
        let deleteButton =
            `<button type="button" class="btn btn-outline-danger btn-sm border-0" onclick="deleteFieldAlkes(this)"><i class="bi bi-trash"></i></button>`;
        html = `<div class="row mt-1">
                <div class="col-7">${newSelect.html()}</div>
                <div class="col-3"><input type="number" name="" id="jumlah_pengguna_${countAlkes}" class="form-control" value=1 min=1></div>
                <div class="col-2">${deleteButton}</div>
                </div>`;
        $('#alkes').append(html);
        $('#alat_kesehatan_' + countAlkes).select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        if (data != null) {
            $('#alat_kesehatan_' + countAlkes).val(data.id).trigger('change');
            $('#jumlah_pengguna_' + countAlkes).val(data.jlh);
        }
        countAlkes++;
    }

    function deleteFieldAlkes(param) {
        let row = $(param).parentsUntil('div.row').parent();
        row.remove();
        // console.log(row);
    }

    function drawAlat(data) {
        data.forEach((d, i) => {
            if (i == 0) {
                $('#alat_kesehatan').val(d.id).trigger('change');
            } else {
                tambahAlat(d);
            }
        });
    }
</script>
