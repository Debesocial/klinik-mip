@extends('layouts.dashboard.app')

@section('title', 'Pemeriksaan Narkoba')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('narko', 'active')

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
        @section('judul', 'Data Pemeriksaan Narkoba')
        @section('breadcrumb', 'tambah_pemeriksaan_narkoba')
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
                                        <form class="form form-horizontal" action="/pemeriksaan/narkotika/{{$pasien->id}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                        
                                                    <div class="col-md-2">
                                                        <label>ID Rekam Medis Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" class="form-control" value="{{ $pasien->id_rekam_medis }}"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <input type="text" id="pasien_id" class="form-control" name="pasien_id" value="{{ $pasien->id }}"  hidden>
                                                        

                                                        <div class="col-md-2">
                                                            <label>Nama Pasien</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" class="form-control" value="{{ $pasien->nama_pasien }}" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                    

                                                        <div class="col-md-2">
                                                            <label>Nomor Induk Karyawan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="myInput2" class="form-control"
                                                                name="myInput2" placeholder="{{ $pasien->NIK }}" disabled>
                                                        </div>
    
                                                        <div class="col-md-6">
                                                            </div>

                                                    <div class="col-md-2">
                                                        <label>Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group"> 
                                                        <input type="text" class="form-control" value="{{ $pasien->tempat_lahir }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="date" class="form-control" value="{{ $pasien->tanggal_lahir }}"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" class="form-control" value="{{ $pasien->alamat }}" disabled >
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                    <div class="col-md-2">
                                                        <label>Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" class="form-control" value="{{ $pasien->pekerjaan }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                    <div class="col-md-2">
                                                        <label>Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" class="form-control" value="{{ $pasien->perusahaan->nama_perusahaan_pasien }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" class="form-control" value="{{ $pasien->divisi->nama_divisi_pasien }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Jabatan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" class="form-control" value="{{ $pasien->jabatan->nama_jabatan }}" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                                <div class="col-md-2">
                                                                    <label>Jenis kelamin</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <input type="text" class="form-control" value="{{ $pasien->jenis_kelamin }}" disabled>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>Telepon</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input type="text" class="form-control" value="{{ $pasien->telepon }}" disabled>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <label>Email</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <input type="email"  class="form-control" value="{{ $pasien->email }}" disabled >
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
                                                    <div class="col-md-5">
                                                        <label>Penggunaan Obat-obatan dalam seminggu terakhir</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="penggunaan_obat" class="form-control"
                                                            name="penggunaan_obat" placeholder="Masukkan cara penggunaan" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>
                                                    <div class="col-md-5">
                                                        <label>Jenis Obat yang Digunakan</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="jenis_obat" class="form-control"
                                                            name="jenis_obat" placeholder="Masukkan jenis obat" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Asal Obat</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="asal_obat" class="form-control"
                                                            name="asal_obat" placeholder="Masukkan asal obat" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>

                                                    <div class="col-md-5">
                                                        <label>Terakhir Digunakan</label>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <input type="text" id="terakhir_digunakan" class="form-control"
                                                            name="terakhir_digunakan" placeholder="Terakhir Digunakan" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        </div>

                                                        {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                                                        <div class="col-md-5">
                                                            <label>File Pendukung</label>
                                                        </div>
                                                        <div class="col-md-5 form-group">
                                                            <input class="form-control" type="file" id="dokumen" name="dokumen" multiple>
                                                        </div>
                                                        <div class="col-md-2">
                                                            </div>

                                                        <br><br><br><br>
                                                    <h4>Hasil Test Urin</h4>


                                                    <div class="col-md-5">
                                                        <label>Amphetamine(AMP)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="amp"
                                                        id="amp" value="0"> Negatif
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="amp"
                                                          id="amp" value="1">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Methamphetamine(MET)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="met"
                                                        id="met" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Negatif
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="met"
                                                          id="met" value="1">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>
                                                        
                                                        <div class="col-md-5">
                                                        <label>TetraHydroCannibinol(THC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="thc"
                                                        id="thc" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Negatif
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="thc"
                                                          id="thc" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Benzodiazepine(BZO)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="bzo"
                                                        id="bzo" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Negatif
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="bzo"
                                                          id="bzo" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Morphine(MOP)</label>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <input class="form-check-input" type="radio" name="mop"
                                                        id="mop" value="0">
                                                          <label class="form-check-label" for="tidak">
                                                              Negatif
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="mop"
                                                          id="mop" value="1">
                                                          <label class="form-check-label" for="ya">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <div class="col-md-5">
                                                        <label>Cocaine(COC)</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input class="form-check-input" type="radio" name="coc"
                                                        id="coc" value="0">
                                                          <label class="form-check-label" for="no">
                                                              Negatif
                                                          </label>&emsp;
                                                          <input class="form-check-input" type="radio" name="coc"
                                                          id="coc" value="1">
                                                          <label class="form-check-label" for="yes">
                                                             Positif
                                                          </label>
                                                  </div>
                                                    <div class="col-md-3">
                                                        </div>

                                                        <br><br><br>
                                                        

                                                        <div class="col-7 d-flex justify-content-end">
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


                        <script src="{{asset ('ref/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
                        <script src="{{asset ('ref/assets/js/bootstrap.bundle.min.js')}}"></script>
                        
                    <!-- Include Choices JavaScript -->
                    <script src="{{asset ('ref/assets/vendors/choices.js/choices.min.js')}}"></script>
                    <script src="{{asset ('ref/assets/js/pages/form-element-select.js')}}"></script>
                    
                        {{-- <script src="{{asset ('ref/assets/js/mazer.js')}}"></script> --}}
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    
@include('sweetalert::alert') 
    @endsection