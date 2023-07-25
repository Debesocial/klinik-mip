@php
    
    $url = '/instruksi_dokter/tambah';
    $rawat_inap = $id_rawat_inap;
    
@endphp

<div id="stepper2" class="bs-stepper">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-heart-pulse" viewBox="0 0 16 16">
                        <path
                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z" />
                        <path
                            d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z" />
                    </svg>
                </span>
                <span class="bs-stepper-label">Tindakan</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#test-nl-3">
            <button type="button" class="btn step-trigger">
                <span class="bs-stepper-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-capsule" viewBox="0 0 16 16">
                        <path
                            d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                    </svg>
                </span>
                <span class="bs-stepper-label">Resep Obat</span>
            </button>
        </div>
    </div>
    <div class="bs-stepper-content">
        <div class="container">
            <form action="{{ $url }}" method="POST" id="formInstruksi">
                @csrf
                <input type="hidden" name="id_rawat_inap" value="{{ $rawat_inap }}">
                <div id="test-nl-1" class="content">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <div class="mb-2 row">
                                <label for="" class="form-label">Anamnesis <b class="text-danger">*</b></label>
                                <div class="col-10">
                                    <input type="text" name="anamnesis" id="anamnesis"
                                        class="form-control form-control-sm">
                                    {!! validasi('Anamenesis') !!}
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="" class="form-label">Tinggi Badan <b
                                        class="text-danger">*</b></label>
                                <div class="col-8">
                                    <input type="number" name="tinggi_badan" id="tinggi_badan"
                                        class="form-control form-control-sm">
                                    {!! validasi('Tinggi badan') !!}
                                </div>
                                <div class="col-2 p-0 my-auto fs-6">Cm</div>
                            </div>
                            <div class="mb-2 row">
                                <label for="" class="form-label">Berat Badan <b
                                        class="text-danger">*</b></label>
                                <div class="col-8">
                                    <input type="number" name="berat_badan" id="berat_badan"
                                        class="form-control form-control-sm">
                                    {!! validasi('Berat badan') !!}
                                </div>
                                <div class="col-2 p-0 my-auto fs-6">Kg</div>
                            </div>
                            <div class="mb-2 row">
                                <label for="" class="form-label">Suhu Tubuh <b class="text-danger">*</b></label>
                                <div class="col-8">
                                    <input type="number" name="suhu_tubuh" id="suhu_tubuh"
                                        class="form-control form-control-sm">
                                    {!! validasi('Suhu tubuh') !!}
                                </div>
                                <div class="col-2 p-0 my-auto fs-6">&deg;C</div>
                            </div>
                            <div class="mb-2 row">
                                <label for="" class="form-label">Tekanan Darah <b
                                        class="text-danger">*</b></label>
                                <div class="col-4">
                                    <input type="number" name="tekanan_darah" id="tekanan_darah"
                                        class="form-control form-control-sm">
                                    {!! validasi('Tekanan darah') !!}
                                </div>
                                <div class="col-1 p-0 my-auto fs-5 text-center">/</div>
                                <div class="col-4">
                                    <input type="number" name="tekanan_darah_per" id="tekanan_darah_per"
                                        class="form-control form-control-sm">
                                    {!! validasi('Tekanan darah') !!}
                                </div>
                                <div class="col-1 p-0 my-auto fs-6">mmHg</div>
                            </div>
                            <div class="mb-2 row">
                                <label for="" class="form-label">Saturasi Oksigen <b
                                        class="text-danger">*</b></label>
                                <div class="col-8">
                                    <input type="number" name="saturasi_oksigen" id="saturasi_oksigen"
                                        class="form-control form-control-sm">
                                    {!! validasi('Saturasi Oksigen') !!}
                                </div>
                                <div class="col-1 p-0 my-auto fs-6">%</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Denyut Nadi <b class="text-danger">*</b></label>
                                    <div class="input-group">
                                        <input type="number" name="denyut_nadi" id="denyut_nadi" class="form-control">
                                        <span class="input-group-text" id="basic-addon1">x /menit</span>
                                        {!!validasi('Denyut nadi')!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Laju Pernapasan <b class="text-danger">*</b></label>
                                    <div class="input-group">
                                        <input type="number" name="laju_pernapasan" id="laju_pernapasan" class="form-control">
                                        
                                        <span class="input-group-text" id="basic-addon1">x /menit</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-2">
                                <label for="" class="form-label">Pemeriksaan Penunjang<b
                                        class="text-danger">*</b></label>
                                <div class="row">
                                    <div class="col-10">
                                        <input type="text" name="pemeriksaan_penunjang" id="pemeriksaan_penunjang"
                                            class="form-control form-control-sm">
                                        {!! validasi('Pemeriksaan penunjang') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="" class="form-label">Diagnosa <b
                                        class="text-danger">*</b></label>
                                <div class="col">
                                    <select name="diagnosa" id="diagnosa" class="form-select">
                                        <option value="" selected disabled>Pilih Penyakit</option>
                                        @foreach ($namapenyakit as $penyakit)
                                            {{-- <div hidden>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->id }}</div> --}}
                                            <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                        @endforeach
                                    </select>
                                    {!! validasi('Diagnosa') !!}
                                    <div id="diagnosa_klasifikasi" class="mt-1" style="display: none">
                                        <ul class="m-0">
                                            <li><b>Subklasifikasi</b> <span id="diagnosa_sub_kla"></span></li>
                                            <li><b>Klasifikasi</b> <span id="diagnosa_kla"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="" class="form-label">Diagnosa Sekunder <b
                                        class="text-danger">*</b></label>
                                <div class="col">
                                    <select name="diagnosa_sekunder" id="diagnosa_sekunder" class="form-select">
                                        <option value="" selected disabled>Pilih Penyakit</option>
                                        @foreach ($namapenyakit as $penyakit)
                                            {{-- <div hidden>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->id }}</div> --}}
                                            <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                        @endforeach
                                    </select>
                                    {!! validasi('Diagnosa sekunder', 'harus diisi dan tidak boleh sama dengan diagnosa primer') !!}
                                    <div id="diagnosa_sekunder_klasifikasi" class="mt-1" style="display: none">
                                        <ul class="m-0">
                                            <li><b>Subklasifikasi</b> <span id="diagnosa_sekunder_sub_kla"></span></li>
                                            <li><b>Klasifikasi</b> <span id="diagnosa_sekunder_kla"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div></div>
                        <button type="button" class="btn btn-primary rounded-pill"
                            onclick="lanjut1()"><b>Selanjutnya</b> <i class="bi bi-arrow-right-circle"></i></button>
                    </div>
                </div>
                <div id="test-nl-2" class="content">
                    <input type="text" name="tindakan" id="tindakan" hidden>
                    <div class="row">
                        <div class="col-5">
                            <div class="row">
                                <div class="col my-auto">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Nama Tindakan </label>
                                        <select name="" id="nama_tindakan" class="form-select">
                                            <option value="">Pilih Tindakan</option>
                                            @foreach ($tindakan as $tin)
                                                <option value="{{$tin->id}}">{{$tin->nama_tindakan}}</option>
                                            @endforeach
                                        </select>
                                        {!! validasi('Nama') !!}
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Nama Alat Kesehatan </label>
                                        <select name="" id="alat_kesehatan" class="form-select">
                                            <option value="" selected disabled>Pilihi alat kesehatan </option>
                                            @foreach ($alatkesehatan as $alat)
                                                <option value="{{ $alat->id }}">{{ $alat->nama_alkes }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {!! validasi('Alat Kesehatan') !!}
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="form-label">Jumlah Penggunaan Alat Kesehatan </label>
                                        <input type="number" name="" id="jumlah_pengguna" class="form-control">
                                        {!! validasi('Jumlah Penggunaan') !!}
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
                                                    <th>Jumlah Penggunaan</th>
                                                    <th>Keterangan</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_tindakan">
                                                <tr>
                                                    <td colspan="5" style="height: 300px">
                                                        <h4 class="text-center" style="color: rgba(0, 0, 0, 0.10)">
                                                            Isi tabel tindakan dengan memasukkan data di form sebelah kiri.
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
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()"><i
                                class="bi bi-arrow-left-circle"></i>
                            <b>Sebelumnya</b></button>
                        <button type="button" class="btn btn-primary rounded-pill"
                            onclick="lanjut2()"><b>Selanjutnya</b> <i class="bi bi-arrow-right-circle"></i></button>
                    </div>
                </div>
                <div id="test-nl-3" class="content">
                    <input type="text" name="resep_obat" id="resep_obat" hidden>
                    <div class="row border p-3 mb-3">
                        <div class="col-md-5">
                            <div class="mb-2">
                                <label for="" class="form-label">Nama Obat </label>
                                <select id="nama_obat" class="form-select">
                                    <option value="">Pilih Obat</option>
                                    @foreach ($obat as $ob)
                                        <option value="{{$ob->id}}">{{$ob->nama_obat}}</option>
                                    @endforeach
                                </select>
                                {!! validasi('Nama obat') !!}
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jumlah Obat </label>
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
                                <label for="" class="form-label">Aturan Pakai </label>
                                <input type="text" id="aturan_pakai" class="form-control">
                                {!! validasi('Aturan pakai') !!}
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Keterangan</label>
                                <textarea id="keterangan_resep" class="form-control"></textarea>
                                {!! validasi('Aturan pakai') !!}
                            </div>
                        </div>
                        <div class="col-1 my-auto text-center">
                            <button type="button" class="btn btn-success" onclick="addResep()"><b><i
                                        class="bi bi-arrow-right-circle"></i></b></button>
                        </div>
                        <div class="col-md-6 border pt-2">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="body_resep">
                                        <tr>
                                            <td colspan="5" style="height: 300px">
                                                <h4 class="text-center" style="color: rgba(0, 0, 0, 0.10)">
                                                    Isi tabel resep dengan memasukkan data di form sebelah kiri.
                                                </h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary rounded-pill" onclick="stepper2.previous()"><i
                                class="bi bi-arrow-left-circle"></i>
                            <b>Sebelumnya</b></button>
                        <button type="button" class="btn btn-primary rounded-pill" onclick="lanjut3()"><i
                                class="bi bi-save"></i> <b>Simpan</b></button>
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

    select2_alat =$('select#alat_kesehatan').select2({
        theme: "bootstrap-5",
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
    });
    select2_obat =$('select#nama_obat').select2({
        theme: "bootstrap-5",
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
    });
    $(document).ready(function() {
        $('select').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        var namapenyakit = @json($namapenyakit);
        $('#diagnosa').change(function() {
            var id = $(this).val();
            var penyakit = namapenyakit.find(data => data.id == id);
            $('#diagnosa_sub_kla').text(penyakit.sub_klasifikasi.nama_penyakit);
            $('#diagnosa_kla').text(penyakit.sub_klasifikasi.klasifikasi_penyakit.klasifikasi_penyakit);
            $('#diagnosa_klasifikasi').show();
        })
        $('#diagnosa_sekunder').change(function() {
            var id = $(this).val();
            if (id == $('#diagnosa').val()) {
                console.log('sama');
                $('#diagnosa_sekunder').addClass('is-invalid');
                $('#diagnosa_sekunder').removeClass('is-valid');
            }else{
                $('#diagnosa_sekunder').removeClass('is-invalid');
            }
            var penyakit = namapenyakit.find(data => data.id == id);
            $('#diagnosa_sekunder_sub_kla').text(penyakit.sub_klasifikasi.nama_penyakit);
            $('#diagnosa_sekunder_kla').text(penyakit.sub_klasifikasi.klasifikasi_penyakit
                .klasifikasi_penyakit);
            $('#diagnosa_sekunder_klasifikasi').show();

            
        })
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
        })
        $('textarea').keyup(function() {
            var id = $(this).val();
            if (id != null || id != '') {
                $(this).removeClass('is-invalid');
            }
        })
    })
    

    function submitForm() {
        var inputs = ['tanggal', 'jam', 'hasil_pemeriksaan', 'instruksi_pengobatan'];
        var validated = true;

        inputs.forEach(input => {
            var form = $('#' + input);
            if (form.val() == null || form.val() == '') {
                validated = false;
                form.addClass('is-invalid');
                form.removeClass('is-valid');
            } else {
                form.addClass('is-valid');
                form.removeClass('is-invalid');
            }
        });

        
        if (validated == true) {
            $('#formInstruksi').submit();
        }
    }

    function lanjut1() {
        var required = ['anamnesis', 'tinggi_badan', 'berat_badan', 'suhu_tubuh', 'tekanan_darah', 'tekanan_darah_per', 'saturasi_oksigen',
            'denyut_nadi', 'laju_pernapasan', 'pemeriksaan_penunjang',
            'diagnosa', 'diagnosa_sekunder'
        ];
        var validated = true;
        required.forEach(req => {
            var input = $('#' + req);
            if (input.val() == null || input.val() == '' || input.val()==' ') {
                input.addClass('is-invalid');
                input.removeClass('is-valid');
                validated = false;
            } else {
                input.addClass('is-valid');
                input.removeClass('is-invalid');
            }

        });
        if ($('#diagnosa_sekunder').val() == $('#diagnosa').val()) {
            $('#diagnosa_sekunder').addClass('is-invalid');
            $('#diagnosa_sekunder').removeClass('is-valid');
            validated  =false;
        }else{
            $('#diagnosa_sekunder').removeClass('is-invalid');
        }
        if (validated == true) {
            stepper2.next();
        }
    }

    function lanjut2() {
        stepper2.next();
        // if (tindakan.length != 0) {
        //     $('#tindakan_kosong').hide();
        //     stepper2.next();
        // } else {
        //     $('#tindakan_kosong').show();
        // }
    }

    var alkes = @json($alatkesehatan);
    var tindakan = [];
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
        if (validated == true) {
            tindakan.push(temp)
            drawformTindakan();
            tindakanSelected = {};
        }
    }

    function clearformTindakan() {
        id_tindakan.forEach(id => {
            form = $('#' + id);
            if (id == 'alat_kesehatan'|| id == 'nama_tindakan') {

                form.val('').trigger('change');
            }
            form.removeClass('is-valid');
            form.val('');
        })
    }

    function drawformTindakan() {
        html = ``;
        tindakan.forEach((data, key) => {
            var namaalkes = alkes.find(nama => nama.id == data.alat_kesehatan);
            var tin = allTindakan.find(d => d.id == data.nama_tindakan);
            html += `<tr> 
                    <td>` + tin.nama_tindakan + `</td>
                    <td><a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/alkes/`+namaalkes.id+`', 'Detail Alat Kesehatan')">` + namaalkes.nama_alkes + `</td>
                    <td>` + data.jumlah_pengguna + `</td>
                    <td>` + data.keterangan + `</td>
                    <td><b class="text-warning" style="cursor:pointer" onclick="editTindakan(` + key + `)"><i class="bi bi-pencil-square"></i></b> <b class="text-danger" style="cursor:pointer" onclick="deleteTindakan(` + key + `)"><i class="bi bi-trash"></i></b></td>
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

    function editTindakan(id){
        temp = tindakan[id];
        deleteTindakan(id);
        if(Object.keys(tindakanSelected).length !== 0){
            tindakan.push(tindakanSelected);
            drawformTindakan();
        }
        tindakanSelected = temp;
        id_tindakan.forEach(idt => {
            form = $('#'+idt);
            if (idt!='alat_kesehatan') {
                form.val(temp[idt]);
            } else {
                form.children().removeAttr('selected');
                select2_alat.val(temp.alat_kesehatan).trigger('change');
            }
        });
    }

    function lanjut3() {
        hideModal('modalRawatInap');
        submitform('formInstruksi');
        // if (resep.length != 0) {
        //     $('#resep_kosong').hide();
        //     hideModal('modalRawatInap');
        //     submitform('formInstruksi');
        // } else {
        //     $('#resep_kosong').show();
        // }
    }

    id_resep = ['nama_obat', 'jumlah_obat', 'aturan_pakai', 'keterangan_resep'];
    resep = [];
    var satuanobat = @json($satuanobat);
    var obat = @json($obat);
    var resepSelected = {};
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
    function drawformResep() {
        html = ``;
        resep.forEach((data, key) => {
            namaobat = obat.find(ob => ob.id == data.nama_obat);
            satuan = satuanobat.find(st => st.id == namaobat.satuan_obat_id)
            html += `<tr> 
                        <td> <a href="javascript:void(0)" onclick="tampilModalRawatInap2('/modal/obat/`+namaobat.id+`', 'Detail Obat')">` + namaobat.nama_obat + `</a></td>
                        <td>` + data.jumlah_obat + ` ` + satuan.satuan_obat + `</td>
                        <td>` + data.aturan_pakai + `</td>
                        <td>` + data.keterangan_resep + `</td>
                        <td><b class="text-warning" style="cursor:pointer" onclick="editResep(` + key + `)"><i class="bi bi-pencil-square"></i></b> <b class="text-danger" style="cursor:pointer" onclick="deleteResep(` + key + `)"><i class="bi bi-trash"></i></b></td>
                    </tr>`;
        })
        clearformResep();
        $('#resep_obat').val(JSON.stringify(resep));
        $('#body_resep').html(html);
    }

    function clearformResep() {
        id_resep.forEach(id => {
            form = $('#' + id);
            if (id == 'nama_obat') {
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
    function editResep(id){
        temp = resep[id];
        deleteResep(id);
        if(Object.keys(resepSelected).length !== 0){
            resep.push(resepSelected);
            drawformResep();
        }
        resepSelected = temp;
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
