@extends('layouts.dashboard.app')
@section('title', 'Add Data Mitra Kerja')
@section('data', 'active')
@section('mitra', 'active')
@section('side', 'active')

@section('judul', 'Tambah Data Mitra Kerja')
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
                        <form class="form" action="/add/mitra/kerja" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Mitra Kerja <b class="color-red">*</b></label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Masukkan Nama" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nik">Nomor Induk Karyawan<b class="color-red">*</b></label>
                                            <input type="number" id="nik" class="form-control" name="nik" placeholder="Masukkan Nomor Induk Karyawan" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email<b class="color-red">*</b></label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan Email" required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password <b class="color-red">*</b></label>
                                            <input type="password" name="password" id="password" class="form-control form-control" minlength="12" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Minimum 12 characters, at least one uppercase letter, one lowercase letter and one number (EXAMPLE : Passuser2022)" placeholder="Masukkan Password" required>
                                            <input type="checkbox" onclick="myFunction()">Show Password
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="level_id">Level Petugas <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="level_id" id="level_id" required>
                                                 @foreach ($level as $lev)
                                                <option value="{{ $lev->id }}">{{ $lev->nama_level }} </option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Perusahaan <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="perusahaan_id" id="perusahaan_id" required>
                                                <option disabled selected value="">Pilih Perusahaan</option>
                                                 @foreach ($perusahaan as $peru)
                                                <option value="{{ $peru->id }}">{{ $peru->nama_perusahaan_pasien }} </option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="divisi_id">Divisi <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="divisi_id" id="divisi_id" required>
                                                
                                                <option disabled selected value="">Pilih Divisi</option>
                                                @foreach ($divisi as $div)
                                                <option value="{{ $div->id }}">{{ $div->nama_divisi_pasien }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="telp">No Telepon <b class="color-red">*</b></label>
                                            <input type="number" id="telp" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telp" placeholder="Masukkan no telepon" maxlength="13" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status <b class="color-red">*</b></label>
                                            <select class="choices form-select" name="status" id="status" required>
                                                <option disabled selected value="">Pilih Status</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="NonAktif">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12"><br>
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

<script>
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
    $(".form-select").select2();
</script>