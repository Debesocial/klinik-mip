<div>
    <div class="row border p-3 mb-3">
        <div class="col-md-5">
            <div class="mb-2">
                <label for="" class="form-label">Nama Obat </label>
                <select id="nama_obat" class="form-select">
                    <option value="">Pilih Obat</option>
                    @foreach ($obat as $ob)
                        <option value="{{ $ob->id }}">{{ $ob->nama_obat }} ({{$ob->distributor}}) - {{$ob->sediaan_obat->singkatan}}</option>
                    @endforeach
                </select>
                {!! validasi('Nama obat') !!}
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Jumlah Obat </label>
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="number" id="jumlah_obat" class="form-control"
                                placeholder="Masukkan jumlah penggunaan">
                            <span class="input-group-text" id="satuan_obat">Satuan</span>
                            {!! validasi('Jumlah obat') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Aturan Pakai </label>
                <select type="text" id="aturan_pakai" class="form-select">
                    <option value="">Pilih aturan pakai</option>
                    @foreach ($aturan as $a)
                        <option value="{{ $a->id }}">{{ $a->singkatan }}
                            {{ $a->kepanjangan ? '(' . ucfirst($a->kepanjangan) . ')' : '' }}
                            - {{ ucfirst($a->arti) ?? '' }}
                        </option>
                    @endforeach
                </select>
                {!! validasi('Aturan pakai') !!}
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Dosis</label>
                <select id="dosis" class="form-select">
                    <option value="">Pilih dosis</option>
                    @foreach ($dosis as $d)
                        <option value="{{ $d->id }}">{{ $d->singkatan }}
                            {{ $d->kepanjangan ? '(' . ucfirst($d->kepanjangan) . ')' : '' }}
                            - {{ ucfirst($d->arti) ?? '' }}
                        </option>
                    @endforeach
                </select>
                {!! validasi('Dosis') !!}
            </div>
        </div>
        <div class="col-1 my-auto text-center">
            <button type="button" class="btn btn-success" onclick="addResep()"><b><i
                        class="bi bi-arrow-right-circle"></i></b></button>
        </div>
        <div class="col-md-6 border pt-2">
            <span id="resep_kosong" class="text-danger" style="display: none">Resep tidak
                boleh
                kosong</span>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Jumlah</th>
                            <th>Aturan Pakai</th>
                            <th>Dosis</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="body_resep">
                        <tr>
                            <td colspan="5" style="height: 300px">
                                <h4 class="text-center" style="color: rgba(0, 0, 0, 0.10)">
                                    Isi tabel tindakan dengan memasukkan data di form
                                    sebelah
                                    kiri.
                                </h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="text" name="resep" id="resep" hidden>
</div>

<script>
    id_resep = ['nama_obat', 'jumlah_obat', 'aturan_pakai', 'dosis'];
    resep = {!! $resep !!};
    var satuanobat = @json($satuanobat);
    var obat = @json($obat);
    var aturan = @json($aturan);
    var dosis = @json($dosis);
    var resepSelected = {};
    if (resep.length > 0) {
        drawformResep(true);
    }

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
            resepSelected = {};
        }
    }

    function drawformResep(first=false) {
        html = ``;

        resep.forEach((data, key) => {
            let namaobat = obat.find(ob => ob.id == data.nama_obat);
            let satuan = satuanobat.find(st => st.id == namaobat.satuan_obat_id);
            let atr = aturan.find(a => a.id == data.aturan_pakai);
            let ds = dosis.find(d => d.id == data.dosis);
            html += `<tr> 
                            <td> <a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/obat/` + namaobat
                .id + `', 'Detail Obat')">` + namaobat.nama_obat + ` <i class="bi bi-box-arrow-up-right"></i></a></td>
                            <td>` + data.jumlah_obat + ` ` + satuan.satuan_obat + `</td>
                            <td>` + atr.singkatan + `</td>
                            <td>` + ds.singkatan + `</td>
                            <td><b class="text-warning" style="cursor:pointer" onclick="editResep(` + key +
                `)"><i class="bi bi-pencil-square"></i></b> <b class="text-danger" style="cursor:pointer" onclick="deleteResep(` +
                key + `)"><i class="bi bi-trash"></i></b></td>
                        </tr>`;
        })
        if (!first) {
            clearformResep();
        }
        $('#resep').val(JSON.stringify(resep));
        $('#body_resep').html(html);
    }

    function clearformResep() {
        id_resep.forEach(id => {
            form = $('#' + id);
            if (id == 'nama_obat') {
                select2_obat.val('').trigger('change');
                select2_aturan.val('').trigger('change');
                select2_dosis.val('').trigger('change');
                $('#satuan_obat').text('Satuan');
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

    function editResep(id) {
        temp = resep[id];
        deleteResep(id);
        if (Object.keys(resepSelected).length !== 0) {
            resep.push(resepSelected);
            drawformResep();
        }
        resepSelected = temp;
        id_resep.forEach(idt => {
            form = $('#' + idt);
            if (idt == 'jumlah_obat') {
                form.val(temp[idt]);
            } else {
                form.children().removeAttr('selected');
                form.val(temp[idt]).trigger('change');
            }
        });
    }

    function setSatuan(i) {
        if (i == null || i == '') {
            $('#satuan_obat').text('Satuan');
        } else {
            namaobat = obat.find(ob => ob.id == i);
            satuan = satuanobat.find(st => st.id == namaobat.satuan_obat_id);
            $('#satuan_obat').text(satuan.satuan_obat);
        }
    }
</script>
