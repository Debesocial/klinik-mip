@extends('layouts.dashboard.app')
@section('title', 'Ubah Data Pasien')
@section('kate', 'active')
@section('da', 'active')
@section('pasien', 'active')

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
                        <form class="form" action="/ubah/data/pasien/{{ $pasien->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h5 class="mb-4">Data Pasien</h5>
                                    <div class="form-group">
                                        <label for="kategori_pasien_id">Kategori Pasien <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="kategori_pasien_id" id="kategori_pasien_id" required>
                                            <option value="{{   $pasien->kategori_pasien_id  }}">{{ $pasien->kategori->nama_kategori }}</option>
                                            @foreach ($kategori as $kate)
                                            <option value="{{ $kate->id }}" {{ $kate->id == $pasien->kategori->id ? 'selected' : '' }}>{{ $kate->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_pasien">Nama Pasien <b class="color-red">*</b></label>
                                        <input type="text" id="nama_pasien" class="form-control" name="nama_pasien" value="{{ $pasien['nama_pasien'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="NIK">Nomor Induk Karyawan <b class="color-red">*</b></label>
                                        <input type="text" id="NIK" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="NIK" value="{{ $pasien['NIK'] }}" maxlength="16" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="NIK">Nomor Induk Kependudukan</label>
                                        <input type="text" id="penduduk" class="form-control" placeholder="Masukkan Nomor Induk Kependudukan" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="penduduk" value="{{ $pasien['penduduk'] }}" maxlength="16">
                                    </div>

                                    <div class="form-group">
                                        <label for="perusahaan_id">Perusahaan <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="perusahaan_id" id="perusahaan_id" onchange="yesnoCheck_lainnya(this);">
                                            
                                            <option value="9">other</option>
                                            @foreach ($perusahaan as $peru)
                                            <option value="{{ $peru->id }}" {{ $peru->id == $pasien->perusahaan->id ? 'selected' : '' }}>{{ $peru->nama_perusahaan_pasien }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="lain" style="display: none;">
                                        <label for="lain">Lain-lain</label>
                                        <input type="text" id="lain" class="form-control" placeholder="Masukkan nama perusahaan" name="lain" value="{{ $pasien['lain'] }}" placeholder="lainnya">
                                    </div>
                                    <div class="form-group">
                                        <label for="divisi_id">Divisi <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="divisi_id" id="divisi_id">
                                            
                                            @foreach ($divisi as $div)
                                            <option value="{{ $div->id }}" {{ $div->id == $pasien->divisi->id ? 'selected' : '' }}>{{ $div->nama_divisi_pasien }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan_id">Jabatan <b class="color-red">*</b></label>
                                        <select class="choices form-select" name="jabatan_id" id="jabatan_id">
                                            
                                            @foreach ($jabatan as $jabat)
                                            <option value="{{ $jabat->id }}" {{ $jabat->id == $pasien->jabatan->id ? 'selected' : '' }}>{{ $jabat->nama_jabatan }}</option>
                                            @endforeach
                                        </select>
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
                                        <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $pasien['alamat'] }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_mess">Alamat Mess</label>
                                        <input type="text" id="alamat_mess" class="form-control" placeholder="Masukkan Alamat Mess" name="alamat_mess" value="{{ $pasien['alamat_mess'] }}">
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
                                    <div class="form-group">
                                        <label for="alamat_mess">Alergi Obat terhadap</label>
                                        <textarea class="form-control" name="alergi" id="alergi">{{ $pasien['alergi'] }}</textarea>
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
                                    <h5 class="mb-4">Data Keluarga</h5>
                                    <div class="form-group">
                                        <label for="nama_keluarga">Nama Keluarga <b class="color-red">*</b></label>
                                        <input type="text" id="nama_keluarga" class="form-control" name="nama_keluarga" value="{{ $pasien->keluarga->nama }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="hubungan_keluarga">Hubungan Keluarga <b class="color-red">*</b></label>
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
                                        <label for="alamat_keluarga">Alamat <b class="color-red">*</b></label>
                                        <input type="text" id="alamat_keluarga" class="form-control" name="alamat_keluarga" value="{{ $pasien->keluarga->alamat }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_keluarga">Pekerjaan <b class="color-red">*</b></label>
                                        <input type="text" id="pekerjaan_keluarga" class="form-control" name="pekerjaan_keluarga" value="{{ $pasien->keluarga->pekerjaan }}" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_keluarga">Nomor Telepon <b class="color-red">*</b></label>
                                        <input type="text" id="telepon_keluarga" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telepon_keluarga" value="{{ $pasien->keluarga->telepon }}" maxlength="13" required oninvalid="this.setCustomValidity('Silahkan isi kolom ini')" oninput="this.setCustomValidity('')"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_keluarga">Email </label>
                                        <input type="email_keluarga" id="email_keluarga" placeholder="Masukkan email" class="form-control" name="email_keluarga" value="{{ $pasien->keluarga->email }}">
                                    </div>
                                    <div class="col-md-12"><br>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" class="form-control btn btn-secondary me-1 mb-1" onclick="javascript:window.history.back();"> Kembali</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="reset" class="form-control btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="form-control btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<script type="text/javascript">
    function yesnoCheck_lainnya(that) {
        if (that.value == "9") {
            document.getElementById("lain").style.display = "block";
        } else {
            document.getElementById("lain").style.display = "none";
        }
    }
</script>