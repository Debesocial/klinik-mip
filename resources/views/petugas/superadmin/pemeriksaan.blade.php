@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Pemeriksaan Narkoba')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="list-group list-group-horizontal-sm mb-1 text-center"
                                            role="tablist" style="width: 60%">
                                            <a class="list-group-item list-group-item-action active"
                                                id="list-sunday-list" data-bs-toggle="list" href="#list-sunday"
                                                role="tab">Data Pasien</a>
                                            <a class="list-group-item list-group-item-action" id="list-monday-list"
                                                data-bs-toggle="list" href="#list-monday" role="tab"> Riwayat Penggunaan Obat-Obatan</a>
                                        </div>

                                        <div class="tab-content text-justify">
                                            <div class="tab-pane fade show active" id="list-sunday" role="tabpanel"
                                                aria-labelledby="list-sunday-list">                                      
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                    <div class="col-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div> --}}
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="{{ route('superadmin.addpemeriksaan') }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    
                                                        
                                                    <div class="col-md-2">
                                                        <label>ID Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select name="id" id="id" class="form-select">
                                                            <option disabled selected>Pilih ID Pasien</option>
                                                            @foreach ($id as $pas)
                                                                <option value="{{ $pas['id'] }}">{{ $pas['id'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Nama Pasien</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <select name="nama_pasien" id="nama_pasien" class="form-select">
                                                                <option disabled selected>Pilih Nama</option>
                                                                @foreach ($id as $pas)
                                                                    <option value="{{ $pas['nama_pasien'] }}">{{ $pas['nama_pasien'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                    

                                                        <div class="col-md-2">
                                                            <label>NIK</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="NIK" class="form-control"
                                                                name="NIK" placeholder="NIK" required >
                                                        </div>
    
                                                        <div class="col-md-6">
                                                            </div>

                                                    <div class="col-md-2">
                                                        <label>Umur</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="umur" class="form-control"
                                                            name="umur" placeholder="Umur" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    

                                                    <div class="col-md-2">
                                                        <label>Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="tempat_lahir" class="form-control"
                                                            name="tempat_lahir" placeholder="Tempat Lahir" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" id="tanggal_lahir" class="form-control"
                                                            name="tanggal_lahir" placeholder="Tanggal Lahir" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="alamat" class="form-control"
                                                            name="alamat" placeholder="Alamat" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="pekerjaan" class="form-control"
                                                            name="pekerjaan" placeholder="Pekerjaan" required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        

                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="perusahaan_id" id="perusahaan_id" required
                                                    onchange="yesnoCheck_lainnya(this);">
                                                    <option disabled selected>Pilih Perusahaan</option>
                                                    <option value="lainnya">other</option>
                                                    @foreach ($perusahaan as $peru)
                                                        <option value="{{ $peru->id }}">
                                                            {{ $peru->nama_perusahaan_pasien }}</option>
                                                    @endforeach
                                                </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="divisi_id" id="divisi_id">
                                                            <option disabled selected>Pilih Divisi</option>
                                                            @foreach ($divisi as $divi)
                                                                <option value="{{ $divi->id }}">{{ $divi->nama_divisi_pasien }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Jabatan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <select class="choices form-select" name="jabatan_id">
                                                                <option disabled selected>Pilih Jabatan</option>
                                                                @foreach ($jabatan as $jabat)
                                                                    <option value="{{ $jabat->id }}">{{ $jabat->nama_jabatan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>
                                                    
                                                            <div class="col-md-2">
                                                                <label>Kategori</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <select class="choices form-select" name="kategori_pasien_id">
                                                                    <option disabled selected>Pilih Kategori Pasien</option>
                                                                    @foreach ($kategori as $kate)
                                                                        <option value="{{ $kate->id }}">{{ $kate->nama_kategori }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label>Jenis kelamin</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <select class="choices form-select" name="jenis_kelamin" id="jenis_kelamin">
                                                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                                                        <option value="Pria">Laki-laki</option>
                                                                        <option value="Wanita">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>Telepon</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input type="text" id="telepon" class="form-control"
                                                                            name="telepon" placeholder="telepon" required >
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <label>Email</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <input type="email" id="email" class="form-control"
                                                                                name="email" placeholder="email" required >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            </div>

                                                                <div class="col-md-2">
                                                                    <label>Alergi</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <input class="form-check-input" type="radio" name="alergi_obat"
                                                    id="alergi_obat" value="0"> Tidak
                                                    <input class="form-check-input" type="radio" name="alergi_obat"
                                                        id="alergi_obat" value="1"> Ya
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>Hamil</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input class="form-check-input" type="radio" name="hamil_menyusui"
                                                    id="hamil_menyusui" value="0"> Tidak
                                                <label for="">
                                                    <input class="form-check-input ms-5" type="radio" name="hamil_menyusui"
                                                        id="hamil_menyusui" value="1"> Ya
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

                <div class="tab-pane fade" id="list-monday" role="tabpanel"
                                                aria-labelledby="list-monday-list">
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
                                                        <label>Penggunaan Obat-obatan dalam seminggu terakhir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="penggunaan_obat" class="form-control"
                                                            name="penggunaan_obat" placeholder="Penggunaan Obat-obatan" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Jenis Obat yang Digunakan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="jenis_obat" class="form-control"
                                                            name="jenis_obat" placeholder="Jenis Obat yang Digunakan" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>Asal Obat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="asal_obat" class="form-control"
                                                            name="asal_obat" placeholder="Asal Obat" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Terakhir Digunakan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="terakhir_digunakan" class="form-control"
                                                            name="terakhir_digunakan" placeholder="Terakhir Digunakan" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <br><br><br><br>
                                                    <h4>Hasil Test Urin</h4>


                                                    <div class="col-md-3">
                                                        <label>Amphetamine(AMP)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="amp"
                                                        id="amp" value="0"> Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="amp"
                                                          id="amp" value="1">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Methamphetamine(MET)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="met"
                                                        id="met" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="met"
                                                          id="met" value="1">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                        <label>TetraHydroCannibinol(THC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="thc"
                                                        id="thc" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="thc"
                                                          id="thc" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Benzodiazepine(BZO)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="bzo"
                                                        id="bzo" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="bzo"
                                                          id="bzo" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Morphine(MOP)</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <input class="form-check-input" type="radio" name="mop"
                                                        id="mop" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="mop"
                                                          id="mop" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        <div class="col-md-3">
                                                        <label>Cocaine(COC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="coc"
                                                        id="coc" value="0">
                                                          <label class="form-check-label" for="no">
                                                              Tidak
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="coc"
                                                          id="coc" value="1">
                                                          <label class="form-check-label" for="yes">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-5">
                                                        </div>

                                                        

                                                        <div class="col-6 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
                </div>
                </div>
                        </div>   

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<script type="text/javascript">
    function isi_otomatis(){
        var id = $("#id").val();
        $.ajax({
            url: 'ajax.php',
            data:"id="+id,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#email').val(obj.email);
        });
    }
</script>
    <script>
         $(".form-select").select2();
     </script>
@include('sweetalert::alert') 
    @endsection