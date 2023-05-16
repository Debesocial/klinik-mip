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

<div id="stepper2" class="bs-stepper">
    <div class="bs-stepper-header">
        <div class="step" data-target="#test-nl-1">
            <button type="button" class="btn step-trigger">
                <span class="bs-stepper-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                        <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                        <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                        <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
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
                <span class="bs-stepper-label">Tindakan</span>
            </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#test-nl-3">
            <button type="button" class="btn step-trigger">
                <span class="bs-stepper-circle">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                        <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                    </svg>
                </span>
                <span class="bs-stepper-label">Resep Obat</span>
            </button>
        </div>
    </div>
    <div class="bs-stepper-content">
        <form action="{{ $url }}" method="POST" id="formInstruksi">
            @csrf
            <input type="hidden" name="id_rawat_inap" value="{{ $rawat_inap }}">
            <div id="test-nl-1" class="content">
                <div class="row">
                    <div class="col-md-5">
                        
                        <div class="mb-3 row">
                            <label for="" class="form-label">Anamnesis <b class="text-danger">*</b></label>
                            <div class="col-10">
                                <input type="text" name="anamnesis" id="anamnesis" class="form-control">
                                {!! validasi('Anamenesis') !!}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="form-label">Tinggi Badan <b class="text-danger">*</b></label>
                            <div class="col-8">
                                <input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control">
                                {!! validasi('Tinggi badan') !!}
                            </div>
                            <div class="col-2 p-0 my-auto fs-6">Cm</div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="form-label">Berat Badan <b class="text-danger">*</b></label>
                            <div class="col-8">
                                <input type="number" name="berat_badan" id="berat_badan" class="form-control">
                                {!! validasi('Berat badan') !!}
                            </div>
                            <div class="col-2 p-0 my-auto fs-6">Kg</div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="form-label">Suhu Tubuh <b class="text-danger">*</b></label>
                            <div class="col-8">
                                <input type="number" name="suhu_tubuh" id="suhu_tubuh" class="form-control">
                                {!! validasi('Suhu tubuh') !!}
                            </div>
                            <div class="col-2 p-0 my-auto fs-6">&deg;C</div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="form-label">Tekanan Darah <b class="text-danger">*</b></label>
                            <div class="col-8">
                                <input type="number" name="tekanan_darah" id="tekanan_darah" class="form-control">
                                {!! validasi('Tekanan darah') !!}
                            </div>
                            <div class="col-2 p-0 my-auto fs-6">mmHg</div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="form-label">Saturasi Oksigen <b class="text-danger">*</b></label>
                            <div class="col-8">
                                <input type="number" name="saturasi_oksigen" id="saturasi_oksigen" class="form-control">
                                {!! validasi('Saturasi Oksigen') !!}
                            </div>
                            <div class="col-2 p-0 my-auto fs-6">mmHg</div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row mb-3">
                            <label for="" class="form-label">Denyut Nadi <b class="text-danger">*</b></label>
                            <div class="col-4">
                                <input type="number" name="denyut_nadi" id="denyut_nadi" class="form-control">
                                {!! validasi('Denyut nadi') !!}
                            </div>
                            <div class="col-1 p-0 my-auto text-center fs-5">/</div>
                            <div class="col-4">
                                <input type="number" name="denyut_nadi_menit" id="denyut_nadi_menit" class="form-control">
                                {!! validasi('Denyut nadi') !!}
                            </div>
                            <div class="col-1 p-0 my-auto fs-6">Menit</div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="form-label">Laju Pernapasan <b class="text-danger">*</b></label>
                            <div class="col-4">
                                <input type="number" name="laju_pernapasan" id="laju_pernapasan" class="form-control">
                                {!! validasi('Laju pernapasan') !!}
                            </div>
                            <div class="col-1 p-0 my-auto text-center fs-5">/</div>
                            <div class="col-4">
                                <input type="number" name="laju_pernapasan_menit" id="laju_pernapasan_menit" class="form-control">
                                {!! validasi('Laju pernapasan') !!}
                            </div>
                            <div class="col-1 p-0 my-auto fs-6">Menit</div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="form-label">Pemeriksaan Penunjang<b class="text-danger">*</b></label>
                            <div class="row">
                                <div class="col-10">
                                    <input type="text" name="pemeriksaan_penunjang" id="pemeriksaan_penunjang" class="form-control">
                                    {!! validasi('Pemeriksaan penunjang') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="form-label">Diagnosa</label>
                            <div class="col-md-7 pe-0">
                                <select name="diagnosa" id="diagnosa" class="form-select">
                                    <option value="" selected disabled>Pilih Penyakit</option>
                                    @foreach ($namapenyakit as $penyakit)
                                        <div hidden>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->id }}</div>
                                        <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                    @endforeach
                                </select>
                                {!! validasi('Diagnosa') !!}
                            </div>
                            <div class="col-md-5 p-0">
                                <ul>
                                    <li><b>Subklasifikasi</b> <span id="diagnosa_sub_kla"></span></li>
                                    <li><b>Klasifikasi</b> <span id="diagnosa_kla"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="form-label">Diagnosa Sekunder</label>
                            <div class="col-7 pe-0">
                                <select name="diagnosa_sekunder" id="diagnosa_sekunder" class="form-select">
                                    <option value="" selected disabled>Pilih Penyakit</option>
                                    @foreach ($namapenyakit as $penyakit)
                                        <div hidden>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->id }}</div>
                                        <option value="{{ $penyakit->id }}">{{ $penyakit->primer }}</option>
                                    @endforeach
                                </select>
                                {!! validasi('Diagnosa sekunder') !!}
                            </div>
                            <div class="col-md-5 p-0">
                                <ul>
                                    <li><b>Subklasifikasi</b> <span id="diagnosa_sekunder_sub_kla"></span></li>
                                    <li><b>Klasifikasi</b> <span id="diagnosa_sekunder_kla"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div></div>
                    <button type="button" class="btn btn-primary rounded-pill"
                        onclick="lanjut1()"><b>Selanjutnya</b> <i
                            class="bi bi-arrow-right-circle"></i></button>
                </div>
            </div>
            <div id="test-nl-2" class="content">
                
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary rounded-pill"
                        onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                        <b>Sebelumnya</b></button>
                    <button type="button" class="btn btn-primary rounded-pill"
                        onclick="lanjut2()"><b>Selanjutnya</b> <i
                            class="bi bi-arrow-right-circle"></i></button>
                </div>
            </div>
            <div id="test-nl-3" class="content">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary rounded-pill"
                        onclick="stepper2.previous()"><i class="bi bi-arrow-left-circle"></i>
                        <b>Sebelumnya</b></button>
                    <button type="button" class="btn btn-primary rounded-pill"
                        onclick="submitForm()"><i class="bi bi-save"></i> <b>Simpan</b> <i
                            class="bi bi-arrow-right-circle"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var stepper2 = new Stepper(document.querySelector('#stepper2'), {
            linear: true,
            animation: true
        })
        $(document).ready(function(){
            $('select').select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
            });
            var namapenyakit = @json($namapenyakit);
            $('#diagnosa').change(function(){
                var id = $(this).val();
                var penyakit =namapenyakit.find(data=>data.id == id);
                $('#diagnosa_sub_kla').text(penyakit.sub_klasifikasi.nama_penyakit);
                $('#diagnosa_kla').text(penyakit.sub_klasifikasi.klasifikasi_penyakit.klasifikasi_penyakit);
            })
            $('#diagnosa_sekunder').change(function(){
                var id = $(this).val();
                var penyakit =namapenyakit.find(data=>data.id == id);
                $('#diagnosa_sekunder_sub_kla').text(penyakit.sub_klasifikasi.nama_penyakit);
                $('#diagnosa_sekunder_kla').text(penyakit.sub_klasifikasi.klasifikasi_penyakit.klasifikasi_penyakit);
            })
        })
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

    function lanjut1() {
        var required = ['anamnesis', 'tinggi_badan', 'berat_badan', 'suhu_tubuh', 'tekanan_darah', 'saturasi_oksigen', 'denyut_nadi', 'denyut_nadi_menit', 'laju_pernapasan', 'laju_pernapasan_menit', 'pemeriksaan_penunjang', 'diagnosa', 'diagnosa_sekunder'];
        var validated = true;
        required.forEach(req => {
            var input = $('#'+req);
            if (input.val()==null||input.val()=='') {
                input.addClass('is-invalid');
                input.removeClass('is-valid');
                validated = false;
            }else{
                input.addClass('is-valid');
                input.removeClass('is-invalid');
            }

            if (validated == true) {
                stepper2.next();
            }
        });
    }
    function lanjut2() {
        var validated = true;

        if (validated == true) {
            stepper2.next();
        }
    }

    
</script>