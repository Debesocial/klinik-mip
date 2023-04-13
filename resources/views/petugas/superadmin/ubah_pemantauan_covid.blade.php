@extends('layouts.dashboard.app')

@section('title', 'Ubah Pemantauan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('pemantauan', 'active')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset ('ref/assets/css/bootstrap.css')}}">

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="stylesheet" href="{{asset ('ref/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{asset ('ref/assets/css/app.css')}}">

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/choices.js/choices.min.css')}}" />

<link rel="stylesheet" href="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="shortcut icon" href="{{asset ('ref/assets/images/favicon.svg" type="image/x-icon')}}">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Ubah Pemantauan Covid')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">

        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 95%">
            <a class="list-group-item list-group-item-action active" id="list-datapasien-list" data-bs-toggle="list"
                href="#list-datapasien" role="tab">Data Pasien</a>
            <a class="list-group-item list-group-item-action" id="list-pemantauan-list" data-bs-toggle="list"
                href="#list-pemantauan" role="tab">Hasil Pemantauan</a>

            <a class="list-group-item list-group-item-action" id="list-penunjangan-list" data-bs-toggle="list"
                href="#list-penunjangan" role="tab">Pemeriksaan Penunjangan</a>
            <a class="list-group-item list-group-item-action" id="list-perjalanan-list" data-bs-toggle="list"
                href="#list-perjalanan" role="tab">Riwayat Perjalanan</a>
        </div>

        <form class="form form-horizontal" action="/ubah/pemantauan/covid/{{  $pemantauan->id  }}" method="post" enctype='multipart/form-data'>
            @csrf
        <div class="tab-content text-justify">
            <div class="tab-pane fade show active" id="list-datapasien" role="tabpanel"
            aria-labelledby="list-datapasien-list">
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">

                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-md-2">
                                                        <label>No Rekam Medis</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput1" class="form-control"
                                                            name="no_rekam_medis" value="{{ $pemantauan->pasien->id_rekam_medis }}" disabled>
                                                    </div>

                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Nama Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput2" class="form-control"
                                                            name="nama_pasien" value="{{ $pemantauan->pasien->nama_pasien }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="myInput3" class="form-control"
                                                            name="tanggal_lahir" value="{{ $pemantauan->pasien->tanggal_lahir }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput4" class="form-control"
                                                            name="pekerjaan" value="{{ $pemantauan->pasien->pekerjaan }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput5" class="form-control"
                                                            name="perusahaan" value="{{ $pemantauan->pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="myInput6" class="form-control"
                                                            name="divisi" value="{{ $pemantauan->pasien->divisi->nama_divisi_pasien }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Nomor Kamar <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="no_kamar" class="form-control"
                                                            name="no_kamar" value="{{ $pemantauan->no_kamar }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>

                <div class="tab-pane fade" id="list-pemantauan" role="tabpanel" aria-labelledby="list-pemantauan-list">
                    <section id="basic-horizontal-layouts">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h4 class="card-title"></h4>
                                    </div> --}}
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Suhu Pagi <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="suhu_pagi" id="suhu_pagi" required>
                                                            <option value="{{   $pemantauan->suhu_pagi  }}">{{ $pemantauan->suhu_pagi }}</option>
                                                            @foreach ($hasilpemantauan as $hasil)
                                                            <option value="{{ $hasil->nama_pemantauan }}" {{ $hasil->nama_pemantauan == $pemantauan->nama_pemantauan ? 'selected' : '' }}>{{ $hasil->nama_pemantauan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>TD <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="td" id="td" required>
                                                            <option value="{{   $pemantauan->td  }}">{{ $pemantauan->td }}</option>
                                                            @foreach ($hasilpemantauan as $hasil)
                                                            <option value="{{ $hasil->nama_pemantauan }}" {{ $hasil->nama_pemantauan == $pemantauan->nama_pemantauan ? 'selected' : '' }}>{{ $hasil->nama_pemantauan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>HR <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="hr" id="hr" required>
                                                            <option value="{{   $pemantauan->hr  }}">{{ $pemantauan->hr }}</option>
                                                            @foreach ($hasilpemantauan as $hasil)
                                                            <option value="{{ $hasil->nama_pemantauan }}" {{ $hasil->nama_pemantauan == $pemantauan->nama_pemantauan ? 'selected' : '' }}>{{ $hasil->nama_pemantauan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>SPO2 <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="spo" id="spo" required>
                                                            <option value="{{   $pemantauan->spo  }}">{{ $pemantauan->spo }}</option>
                                                            @foreach ($hasilpemantauan as $hasil)
                                                            <option value="{{ $hasil->nama_pemantauan }}" {{ $hasil->nama_pemantauan == $pemantauan->nama_pemantauan ? 'selected' : '' }}>{{ $hasil->nama_pemantauan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Gejala <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="gejala" class="form-control"
                                                            name="gejala" required>{{ $pemantauan->gejala }}</textarea>
                                                    </div>
                                                    <div class="col-md-5">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Jenis Pemeriksaan </label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="jenis_pemeriksaan"
                                                            class="form-control" name="jenis_pemeriksaan" required>{{ $pemantauan->jenis_pemeriksaan }}</textarea>
                                                    </div>
                                                    <div class="col-md-5">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Tanggal Pemeriksaan <b class="color-red">*</b></label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="date" id="tanggal_pemeriksaan" class="form-control"
                                                            name="tanggal_pemeriksaan" value="{{ $pemantauan->tanggal_pemeriksaan }}" required>
                                                    </div>
                                                    <div class="col-md-7">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

                <div class="tab-pane fade" id="list-penunjangan" role="tabpanel"
                    aria-labelledby="list-penunjangan-list">
                    <section id="basic-horizontal-layouts">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h4 class="card-title"></h4>
                                    </div> --}}
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h2>Laboratorium</h2>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    </div>
                                                    <div class="col-md-4">
                                                    </div> <br><br>

                                                    <div class="col-md-2">
                                                        <label>Hasil Laboratorium</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <textarea type="text" id="hasil_laboratorium"
                                                            class="form-control" name="hasil_laboratorium" required>{{ $pemantauan->hasil_laboratorium }}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div>

                                                    {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                                                    <div class="col-md-2">
                                                        <label>Lampiran Hasil Laboratorium</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input class="form-control" type="file"
                                                            id="lampiran_laboratorium" name="lampiran_laboratorium" multiple>
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div>


                                                    <div class="col-md-2">
                                                        <label>Tanggal Pemeriksaan</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="date" id="tanggal_laboratorium"
                                                            class="form-control" name="tanggal_laboratorium" value="{{ $pemantauan->tanggal_pemeriksaan }}" required>
                                                    </div>
                                                    <div class="col-md-8">
                                                    </div> <br><br><br>

                                                    <div class="col-md-4">
                                                        <h2>Rapid Test</h2>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    </div>
                                                    <div class="col-md-4">
                                                    </div> <br><br>

                                                    <div class="col-md-2">
                                                        <label>Hasil Rapid Test</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="checkbox" class="form-check-input" id="checkbox2">
                                                    </div>
                                                    <div class="col-md-7 form-group">
                                                        <textarea type="text" id="hasil_rapid" class="form-control"
                                                            name="hasil_rapid" required>{{ $pemantauan->hasil_rapid }}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div>

                                                    {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                                                    <div class="col-md-2">
                                                        <label>Lampiran Hasil Rapid Test</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input class="form-control" type="file" id="lampiran_rapid"
                                                            name="lampiran_rapid" multiple>
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div>


                                                    <div class="col-md-2">
                                                        <label>Tanggal Pemeriksaan</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="date" id="tanggal_rapid" class="form-control"
                                                            name="tanggal_rapid" value="{{ $pemantauan->tanggal_rapid }}" required>
                                                    </div>
                                                    <div class="col-md-8">
                                                    </div>

                                                    <br><br><br>

                                                    <div class="col-md-4">
                                                        <h2>Rontgen Thorax</h2>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    </div>
                                                    <div class="col-md-4">
                                                    </div> <br><br>

                                                    <div class="col-md-2">
                                                        <label>Hasil Rontgen Thorax</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="checkbox" class="form-check-input" id="checkbox2">
                                                    </div>
                                                    <div class="col-md-7 form-group">
                                                        <textarea type="text" id="hasil_rontgen" class="form-control"
                                                            name="hasil_rontgen" required>{{ $pemantauan->hasil_rontgen }}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div>

                                                    {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                                                    <div class="col-md-2">
                                                        <label>Lampiran Hasil Rontgen Thorax</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input class="form-control" type="file" id="lampiran_rontgen"
                                                            name="lampiran_rontgen" multiple>
                                                    </div>
                                                    <div class="col-md-2">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Tanggal Pemeriksaan</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="date" id="tanggal_rontgen" class="form-control"
                                                            name="tanggal_rontgen" value="{{ $pemantauan->tanggal_pemeriksaan }}" required>
                                                    </div>
                                                    <div class="col-md-8">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Keterangan(Upaya apa yang akan dilakukan tempat rujukan
                                                            kasus)</label>
                                                    </div>

                                                    <div class="col-md-8 form-group">
                                                        <textarea type="text" id="keterangan" class="form-control"
                                                            name="keterangan" required>{{ $pemantauan->keterangan }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


                <div class="tab-pane fade" id="list-perjalanan" role="tabpanel" aria-labelledby="list-perjalanan-list">
                    <section id="basic-horizontal-layouts">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h4 class="card-title"></h4>
                                    </div> --}}
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Tanggal Perjalanan</label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="date" id="perjalanan" class="form-control"
                                                            name="perjalanan" value="{{ $pemantauan->perjalanan }}" required>
                                                    </div>
                                                    <div class="col-md-8">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Kabupaten/Kota Asal</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="asal" class="form-control" name="asal"
                                                            placeholder="Masukkan kabupaten/kota Asal" value="{{ $pemantauan->asal }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                    <div class="col-md-2">
                                                        <label>Kota Tujuan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="kota_tujuan" class="form-control"
                                                            name="kota_tujuan" value="{{ $pemantauan->kota_tujuan }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-sm-5 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>

<script src="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset ('ref/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Include Choices JavaScript -->
<script src="{{asset ('ref/assets/vendors/choices.js/choices.min.js')}}"></script>
<script src="{{asset ('ref/assets/js/pages/form-element-select.js')}}"></script>

{{-- <script src="{{asset ('ref/assets/js/mazer.js')}}"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>


<script type="text/javascript">
    function myChangeFunction(input1) {
                      let text = input1.value;
                      const myArray = text.split("|");
                      var input0 = document.getElementById('myInput0');
                      var input1 = document.getElementById('myInput1');
                      var input2 = document.getElementById('myInput2');
                      var input3 = document.getElementById('myInput3');
                      var input4 = document.getElementById('myInput4');
                      var input5 = document.getElementById('myInput5');
                      var input6 = document.getElementById('myInput6');
                      input0.value = myArray[0];
                      input1.value = myArray[1];
                      input2.value = myArray[2];
                      input3.value = myArray[3];
                      input4.value = myArray[4];
                      input5.value = myArray[5];
                      input6.value = myArray[6];
                    }
</script>

<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
    integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $("#pasien_id").click(function(e) {
                            var pasien = $(this).val();
                    
                            console.log(pasien);
                            
                            $.ajax({
                                type: "GET",
                                url: "{{route('superadmin.datapasien.id')}}",
                                data: {'pasien': pasien},
                                dataType: 'json',
                                success:  function(data) {
                                    console.log(data);
                                $('#nama_pasien').val(data.nama_pasien);
                                $('#tempat_lahir').val(data.tempat_lahir);
                                $('#tanggal_lahir').val(data.tanggal_lahir);
                                $('#pekerjaan').val(data.pekerjaan);
                                $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
                                $('#divisi').val(data.divisi.nama_divisi_pasien);
                                $('#jabatan').val(data.jabatan.nama_jabatan);
                                $('#jenis_kelamin').val(data.jenis_kelamin);
                                $('#alamat').val(data.alamat);
                                $('#telepon').val(data.telepon);
                                $('#email').val(data.email);
                            },
                            error: function(response) {
                                alert(response.responseJSON.message);
                            }
                            });
                        });
</script>
@endsection