@extends('layouts.dashboard.app')
@section('title', 'Ubah Data Pasien')
@section('kate', 'active')
@section('da', 'active')
@section('pasien', 'active')
@section('breadcrumb', 'ubah_data_pasien')

@section('judul', 'Ubah Data Pasien')
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
                        <form class="form" id="form_pasien" action="/ubah/data/pasien/{{ $pasien->id }}" method="post" onsubmit="showLoader()">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h5 class="mb-4">Data Pasien</h5>
                                    <div class="form-group">
                                        <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                        <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" value="{{ $pasien['nama_pasien'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="NIK">Nomor Induk Kependudukan</label>
                                        <input type="text" id="penduduk" class="form-control" placeholder="Masukkan Nomor Induk Kependudukan" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="penduduk" value="{{ $pasien['penduduk'] }}" maxlength="16">
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori_pasien_id">Kategori Pasien <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="kategori_pasien_id" id="kategori_pasien_id" required>
                                            <option value="{{ $pasien->kategori_pasien_id  }}">{{ $pasien->kategori->nama_kategori }}</option>
                                            @foreach ($kategori as $kate)
                                            <option value="{{ $kate->id }}" {{ $kate->id == $pasien->kategori_pasien_id ? 'selected' : '' }}>{{ $kate->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="data-karyawan" class="p-3 border bg-body" style="{{($pasien->kategori_pasien_id==4)?'display:none':''}}">
                                        <div class="form-group">
                                            <label for="NIK">Nomor Induk Karyawan <b class="color-red">*</b></label>
                                            <input type="text" id="NIK" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="NIK" value="{{ ($pasien->NIK)??'' }}" maxlength="16" />
                                        </div>
                                        <div class="form-group">
                                            <label for="perusahaan_id">Perusahaan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="perusahaan_id" id="perusahaan_id" >
                                                <option value="">Pilih perusahaan</option>
                                                @foreach ($perusahaan as $peru)
                                                    <option value="{{ $peru->id }}" {{ $peru->id == $pasien->perusahaan_id ? 'selected' : '' }}>{{ $peru->nama_perusahaan_pasien }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="_lain" style="{{($pasien->perusahaan_id!=9)?'display: none;':''}}">
                                            <label for="lain">Lain-lain</label>
                                            <input type="text" id="lain" class="form-control" placeholder="Masukkan nama perusahaan" name="lain" value="{{ ($pasien->lain)??'' }}" placeholder="lainnya">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi_id">Divisi <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="divisi_id" id="divisi_id">
                                                <option value="">Pilih divisi</option>
                                                @foreach ($divisi as $div)
                                                <option value="{{ $div->id }}" {{ $div->id == $pasien->divisi_id ? 'selected' : '' }}>{{ $div->nama_divisi_pasien }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan_id">Jabatan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="jabatan_id" id="jabatan_id">
                                                <option value="">Pilih jabatan</option>
                                                @foreach ($jabatan as $jabat)
                                                <option value="{{ $jabat->id }}" {{ $jabat->id == $pasien->jabatan_id ? 'selected' : '' }}>{{ $jabat->nama_jabatan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir <b class="color-red">*</b></label>
                                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" value="{{ $pasien['tempat_lahir'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir <b class="color-red">*</b></label>
                                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="{{ $pasien['tanggal_lahir'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="{{ $pasien->jenis_kelamin }}">{{ $pasien->jenis_kelamin }}</option>
                                            <option value="Laki_laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat <b class="color-red">*</b></label>
                                        <textarea type="text" id="alamat" class="form-control" name="alamat" value="" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')">{{ $pasien['alamat'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_mess">Alamat Mess</label>
                                        <input type="text" id="alamat_mess" class="form-control" placeholder="Masukkan Alamat Mess" name="alamat_mess" {{$pasien['alamat_mess']!=4?'required':''}} value="{{ $pasien['alamat_mess'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan <b class="color-red">*</b></label>
                                        <input type="text" id="pekerjaan" class="form-control" name="pekerjaan" value="{{ $pasien['pekerjaan'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="telepon">Telepon <b class="color-red">*</b></label>
                                        <input type="text" id="telepon" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telepon" value="{{ $pasien['telepon'] }}" maxlength="13" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="Masukkan email" name="email" value="{{ $pasien['email'] }}" >
                                    </div>
                                    <div class="col-md-4">
                                        <label>Alergi Obat</label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-check-input" type="radio" name="alergi_obat" id="alergi_obat" value="0" {{ !$pasien->alergi_obat ? "checked" : "" }}> Tidak
                                        <input class="form-check-input" type="radio" name="alergi_obat" id="alergi_obat" value="1" {{ $pasien->alergi_obat ? "checked" : "" }}> Ya
                                    </div>
                                    <div class="form-group" id="_alergi">
                                        <label for="alamat_mess">Alergi Obat terhadap <b class="color-red">*</b></label>
                                        <select class="form-select" name="alergi" id="alergi">
                                            <option value="">Pilih obat</option>
                                            @foreach ($obat as $ob)
                                                <option value="{{$ob->id}}" {{$ob->id==$pasien->alergi?'selected':''}}>{{$ob->nama_obat}}</option>
                                            @endforeach
                                            <option value=""></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Obat harus diisi apabila pasien memiliki alergi
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Hamil/Menyusui</label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-check-input" type="radio" name="hamil_menyusui" id="hamil_menyusui" value="0" {{ !$pasien->hamil_menyusui ? "checked" : "" }}> Tidak
                                        <label for="">
                                            <input class="form-check-input" type="radio" name="hamil_menyusui" id="hamil_menyusui" value="1" {{ $pasien->hamil_menyusui ? "checked" : "" }}> Ya
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="row mb-4">
                                        <h5>Riwayat Pengobatan</h5>
                                        <div class="col">
                                            <textarea name="riwayat_pengobatan" id="riwayat_pengobatan" class="form-control" placeholder="Masukkan riwayat pengobatan">{{$pasien->riwayat_pengobatan}}</textarea>
                                        </div>
                                    </div>
                                    <h5 class="">Data Keluarga</h5>
                                    <div class="form-group">
                                        <label for="nama_keluarga">Nama Keluarga</label>
                                        <input type="text" id="nama_keluarga" class="form-control" name="nama_keluarga" value="{{ $pasien->keluarga->nama }}" oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="hubungan_keluarga">Hubungan Keluarga</label>
                                        <select class="choices form-select" id="hubungan_keluarga" name="hubungan_keluarga">
                                            <option value="{{ $pasien->keluarga->hubungan }}">{{ $pasien->keluarga->hubungan }}</option>
                                           
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
                                        <textarea type="text" id="alamat_keluarga" class="form-control" name="alamat_keluarga" value="" oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')">{{ $pasien->keluarga->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_keluarga">Pekerjaan</label>
                                        <input type="text" id="pekerjaan_keluarga" class="form-control" name="pekerjaan_keluarga" value="{{ $pasien->keluarga->pekerjaan }}" oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_keluarga">Nomor Telepon</label>
                                        <input type="text" id="telepon_keluarga" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telepon_keluarga" value="{{ $pasien->keluarga->telepon }}" maxlength="13" oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_keluarga">Email </label>
                                        <input type="email_keluarga" id="email_keluarga" placeholder="Masukkan email" class="form-control" name="email_keluarga" value="{{ $pasien->keluarga->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-end"><br>
                                    <button type="submit" class="btn btn-primary "><i class="bi bi-save"></i> Simpan</button>
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
        $('#alergi').select2({
                theme: "bootstrap-5",
                    selectionCssClass: 'select2--small',
                    dropdownCssClass: 'select2--small',
        });
        $(document).ready(function(){
            $('[id*="alergi_obat"]').click(function(){
                var alergi_obat =  $('#alergi_obat:checked').val();
                cekAlergiObat(alergi_obat);
            })
            var alergi_obat =  $('#alergi_obat:checked').val();
            cekAlergiObat(alergi_obat);

            $('#alergi').change(function(){
                $('#alergi').removeClass('is-invalid')
            })

            input_karyawan = ['NIK','perusahaan_id', 'divisi_id', 'jabatan_id'];
            $('#kategori_pasien_id').change(function(){
                id = $(this).val();
                if (id==4) {
                    $('#data-karyawan').hide()
                    input_karyawan.forEach(input => {
                        form = $('#'+input);
                        form.val('');
                        form.removeAttr('required');
                    });
                    $('#alamat_mess').prop('required',false);
                }else{
                    $('#data-karyawan').show();
                    input_karyawan.forEach(input => {
                        form = $('#'+input);
                        form.attr('required', 'required');
                    });
                    $('#alamat_mess').prop('required',true);
                }
            })
            $('#perusahaan_id').change(function(){
                id = $(this).val();
                inputLain = $('#lain');
                if (id==9) {
                    $('#_lain').show();
                    inputLain.attr('required', 'required')
                } else {
                    $('#_lain').hide();
                    inputLain.removeAttr('required')
                    inputLain.val('')
                }
            })
        })

        function cekAlergiObat(status) {
            if (status == '0') {
                $('#_alergi').hide('slow')
                $('#alergi').val('');
                $('#alergi').prop('required',false);
            } else {
                $('#_alergi').show('slow')
                $('#alergi').removeClass('is-invalid');
                $('#alergi').prop('required',true);
            }
        }

        function submitForm() {
            var alergi_obat = $('#alergi_obat:checked')
            var validation = true;
            
            if (alergi_obat.val()=='1') {
                if($('#alergi').val()==''||$('#alergi').val()==null||$('#alergi')==' '){
                    $('#alergi').addClass('is-invalid');
                    $('#alergi').focus();
                    validation = false;
                }
            }
            if (validation == true) {
                $('button[type="submit"]').trigger('click');
            }
        }
    </script>
@stop


@endsection
