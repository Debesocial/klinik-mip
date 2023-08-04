@extends('layouts.dashboard.app')
@section('title', 'Add Data Pasien')
@section('kate', 'active')
@section('da', 'active')
@section('pasien', 'active')
@section('breadcrumb', 'tambah_data_pasien')

@section('judul', 'Tambah Data Pasien')
@section('container')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @error('message')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <form class="form" id="form_pasien" action="{{ route('add.pasien') }}" method="post"  onsubmit="showLoader()" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h5 class="mb-4">Data Pasien</h5>
                                    <div class="form-group">
                                        <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                        <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" placeholder="Masukkan Nama Pasien" required >
                                    </div>
                                    <div class="form-group" id="penduduk" name="penduduk">
                                        <label for="penduduk">Nomor Induk Kependudukan </label>
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="penduduk" class="form-control" name="penduduk" placeholder="Masukkan Nomor Induk Kependudukan" maxlength="16" >
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori_pasien_id">Kategori Pasien <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="kategori_pasien_id" id="kategori_pasien_id"  required >
                                            <option disabled selected value="">Pilih Kategori Pasien</option>
                                            @foreach ($kategori as $kate)
                                            <option value="{{ $kate->id }}">{{ $kate->nama_kategori }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="data-karyawan" class="p-3 border bg-body">
                                        <div class="form-group" id="nik" name="nik"  style="display: block;" >
                                            <label for="NIK">Nomor Induk Karyawan <b class="color-red">*</b></label>
                                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="NIK" class="form-control" name="NIK" placeholder="Masukkan Nomor Induk Karyawan" maxlength="16" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="perusahaan_id">Perusahaan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="perusahaan_id" id="perusahaan_id" required >
                                                <option disabled selected value="">Pilih Perusahaan</option>
                                                <option value="17">Lainnya</option>
                                                @foreach ($perusahaan as $peru)
                                                <option value="{{ $peru->id }}">
                                                    {{ $peru->nama_perusahaan_pasien }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group ps-3" id="_lain" style="display: none;">
                                            <label for="lain">Perusahaan Lain <b class="color-red">*</b></label>
                                            <input type="text" id="lain" class="form-control" name="lain" placeholder="perusahaan lainnya">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi_id">Divisi <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="divisi_id" id="divisi_id"  required >
                                                <option disabled selected value="">Pilih Divisi</option>
                                                {{-- @foreach ($divisi as $divi)
                                                <option value="{{ $divi->id }}">{{ $divi->nama_divisi_pasien }}
                                                </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group ps-3" id="_divisi_lain" style="display: none;">
                                            <label for="lain">Divisi Lain <b class="color-red">*</b></label>
                                            <input type="text" id="divisi_lain" class="form-control" name="divisi_lain" placeholder="divisi lainnya">
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan_id">Jabatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="jabatan_id" id="jabatan_id"  required >
                                                <option disabled selected value="">Pilih Jabatan</option>
                                                {{-- @foreach ($jabatan as $jabat)
                                                <option value="{{ $jabat->id }}">{{ $jabat->nama_jabatan }}
                                                </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group ps-3" id="_jabatan_lain" style="display: none;">
                                            <label for="lain">Jabatan Lain <b class="color-red">*</b></label>
                                            <input type="text" id="jabatan_lain" class="form-control" name="jabatan_lain" placeholder="jabatan lainnya">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir <b class="color-red">*</b></label>
                                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" placeholder="Masukkan tempat lahir" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir <b class="color-red">*</b></label>
                                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan_id">Jenis Kelamin <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="jenis_kelamin" required >
                                            <option disabled selected value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea type="text" id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_mess" id="label_mess">Alamat Mess</label>
                                        <input type="text" id="alamat_mess" class="form-control" name="alamat_mess" placeholder="Masukkan Alamat Mess">
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                        <input type="text" id="pekerjaan" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" required >
                                    </div>

                                    <div class="form-group">
                                        <label for="telepon">Telepon <b class="color-red">*</b></label>
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="telepon" class="form-control" name="telepon" placeholder="Masukkan no telepon" maxlength="13" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email" >
                                    </div>

                                    {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                                    <div class="form-group">
                                        <label for="email">Foto Pasien</label>
                                        <input class="form-control" type="file" id="upload" name="upload">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Alergi Obat <b class="color-red">*</b></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-check-input" type="radio" name="alergi_obat" id="alergi_obat" value="0" checked> Tidak
                                        <input class="form-check-input " type="radio" name="alergi_obat" id="alergi_obat" value="1"> Ya
                                    </div>
                                    <div class="form-group" id="_alergi" style="display: none;">
                                        <label for="alergi">Alergi obat terhadap</label>
                                        <select class="form-select" name="alergi[]" id="alergi" multiple="multiple">
                                            @foreach ($obat as $ob)
                                                <option value="{{$ob->id}}">{{$ob->nama_obat}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Obat harus diisi apabila pasien memiliki alergi
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Hamil/Menyusui <b class="color-red">*</b></label>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <input class="form-check-input" type="radio" name="hamil_menyusui" id="hamil_menyusui" value="0" checked> Tidak
                                        <input class="form-check-input" type="radio" name="hamil_menyusui" id="hamil_menyusui" value="1"> Ya
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    
                                    <div class="row mb-4">
                                        <h5>Riwayat Pengobatan</h5>
                                        <div class="col">
                                            <textarea name="riwayat_pengobatan" id="riwayat_pengobatan" class="form-control" placeholder="Masukkan riwayat pengobatan"></textarea>
                                        </div>
                                    </div>
                                    <h5 class="">Data Keluarga</h5>
                                    <div class="form-group">
                                        <label for="nama_keluarga">Nama Keluarga</label>
                                        <input type="text" id="nama_keluarga" class="form-control" name="nama_keluarga" placeholder="Masukkan Nama Keluarga" >
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_keluarga">Hubungan Keluarga</label>
                                        <select class="choices form-select" name="hubungan_keluarga" >
                                            <option disabled selected value="">Pilih Hubungan Keluarga</option>
                                            <option value="Ayah">Ayah</option>
                                            <option value="Ibu">Ibu</option>
                                            <option value="Adik">Adik</option>
                                            <option value="Abang">Abang</option>
                                            <option value="Kakak">Kakak</option>
                                            <option value="Ayah Mertua">Ayah Mertua</option>
                                            <option value="Ibu Mertua">Ibu Mertua</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_keluarga">Alamat</label>
                                        <textarea type="text" id="alamat_keluarga" class="form-control" name="alamat_keluarga" placeholder="Masukkan Alamat Keluarga" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_keluarga">Pekerjaan</label>
                                        <input type="text" id="pekerjaan_keluarga" class="form-control" name="pekerjaan_keluarga" placeholder="Masukkan Pekerjaan Keluarga" >
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_keluarga">Nomor Telepon</label>
                                        <input type="number" id="telepon_keluarga" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telepon_keluarga" placeholder="Masukkan No Telepon Keluarga" maxlength="13" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email_keluarga">Email</label>
                                        <input type="email_keluarga" id="email_keluarga" class="form-control" name="email_keluarga" placeholder="Masukkan Email Keluarga">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-end"><br>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('js')
    <script type="text/javascript">
        const allDivisi = @json($divisi);
        const allJabatan = @json($jabatan);
        $('#alergi').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
        let jabatanSelect = $('#jabatan_id').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
            disabled:true,

        });
        let divisiSelect = $('#divisi_id').select2({
            theme: "bootstrap-5",
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
            disabled:true,

        });


        $(document).ready(function(){
            $('[id*="alergi_obat"]').click(function(){
                var alergi_obat =  $('#alergi_obat:checked').val();
                cekAlergiObat(alergi_obat);
            })
            $('#alergi').change(function(){
                $('#alergi').removeClass('is-invalid')
            })
            input_karyawan = ['NIK','perusahaan_id', 'divisi_id', 'jabatan_id'];
            $('#kategori_pasien_id').change(function(){
                id = $(this).val();
                //jika yg dipilih penduduk lokal
                if (id==4) {
                    $('#data-karyawan').hide()
                    input_karyawan.forEach(input => {
                        form = $('#'+input);
                        form.val('');
                        form.removeAttr('required');
                    });
                    $('#alamat_mess').prop('required',false);
                    $('#label_mess').html('Alamat Mess');

                }else{
                    $('#data-karyawan').show();
                    input_karyawan.forEach(input => {
                        form = $('#'+input);
                        form.attr('required', 'required');
                    });
                    $('#alamat_mess').prop('required',true);
                    $('#label_mess').html('Alamat Mess <b class="color-red">*</b>');
                }
            })
            $('#perusahaan_id').change(function(){
                id = $(this).val();
                inputLain = $('#lain');
                divisiLain = $('#divisi_lain');
                jabatanLain = $('#jabatan_lain');
                if (id==17) {
                    $('#_lain').show();
                    $('#_divisi_lain').show();
                    $('#_jabatan_lain').show();
                    inputLain.prop('required', true)
                    divisiLain.prop('required', true)
                    jabatanLain.prop('required', true)
                    clearDivisi();
                    clearJabatan();
                } else {
                    $('#_lain').hide();
                    $('#_divisi_lain').hide();
                    $('#_jabatan_lain').hide();
                    inputLain.prop('required', false)
                    divisiLain.prop('required', false)
                    jabatanLain.prop('required', false)
                    inputLain.val('');
                    divisiLain.val('');
                    jabatanLain.val('');
                    
                    setDivisi(id);
                    setJabatan(id);
                }
            })
        })

        function setDivisi(id) {
            let result1 = [{id:'', nama_divisi_pasien:' Pilih divisi'}]
            let result2 = allDivisi.filter((val)=>id == val.perusahaan_id);
            let result = result1.concat(result2);
            
            divisiSelect.select2('destroy');
            divisiSelect.empty();

            result.forEach(val => {
                const newOption = new Option(val.nama_divisi_pasien, val.id, false, false);
                divisiSelect.append(newOption);
            });
            divisiSelect.select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
                disabled:false,
            });
        }
        function setJabatan(id) {
            let result1 = [{id:'', nama_jabatan:' Pilih jabatan'}]
            let result2 = allJabatan.filter((val)=>id == val.perusahaan_id);
            let result = result1.concat(result2);
            jabatanSelect.select2('destroy');
            jabatanSelect.empty();

            result.forEach(val => {
                const newOption = new Option(val.nama_jabatan, val.id, false, false);
                jabatanSelect.append(newOption);
            });
            jabatanSelect.select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
                disabled:false,
            });
        }
        function clearDivisi() {
            let result = [{id:'', nama_divisi_pasien:' Pilih divisi'}];
            divisiSelect.select2('destroy');
            divisiSelect.empty();
            result.forEach(val => {
                const newOption = new Option(val.nama_divisi_pasien, val.id, false, false);
                divisiSelect.append(newOption);
            });
            divisiSelect.select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
                disabled:true,
            });
        }

        function clearJabatan() {
            let result = [{id:'', nama_jabatan:' Pilih jabatan'}]
            jabatanSelect.select2('destroy');
            jabatanSelect.empty();
            result.forEach(val => {
                const newOption = new Option(val.nama_jabatan, val.id, false, false);
                jabatanSelect.append(newOption);
            });
            jabatanSelect.select2({
                theme: "bootstrap-5",
                selectionCssClass: 'select2--small',
                dropdownCssClass: 'select2--small',
                disabled:true,
            });
        }

        function cekAlergiObat(status) {
            if (status == '0') {
                $('#_alergi').hide('slow')
                $('#alergi').val(null).trigger('change')
                $('#alergi').prop('required',false);

            } else {
                $('#_alergi').show('slow')
                $('#alergi').prop('required',true);
            }
        }
        function submitForm() {
            var alergi_obat = $('#alergi_obat:checked')
            var validation = true; 
            if (alergi_obat.val()=='1') {
                if($('#alergi').val()==''||$('#alergi').val()==null||$('#alergi')==' '){
                    validation = false;
                    $('#alergi').addClass('is-invalid');
                    $('#alergi').focus();
                }
            }
            if (validation == true) {
                $('button[type="submit"]').trigger('click');
            }
        }
    </script>
@stop


@endsection