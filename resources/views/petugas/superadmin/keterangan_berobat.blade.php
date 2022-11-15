@extends('layouts.dashboard.app')

@section('title', 'Keterangan Berobat')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Keterangan Berobat')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <div class="page-heading">

                <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist" style="width: 50%">
                                            <a class="list-group-item list-group-item-action active"
                                                id="list-datapasien-list" data-bs-toggle="list" href="#list-datapasien"
                                                role="tab">Data Pasien</a>
                                            <a class="list-group-item list-group-item-action" id="list-pemeriksaan-list"
                                                data-bs-toggle="list" href="#list-pemeriksaan" role="tab">Pemeriksaan</a>
                                            
                                        </div>

                    <div class="tab-content text-justify">
                     <div class="tab-pane fade show active" id="list-datapasien" role="tabpanel" aria-labelledby="list-datapasien-list">                                      
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                    <div class="col-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div> --}}
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="/keterangan/berobat" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    

                                                    <div class="col-md-2">
                                                        <label>ID Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select name="pasien_id" id="pasien_id" class="choices form-select">
                                                            <option disabled selected>Pilih ID Pasien</option>
                                                            @foreach ($pasien_id as $pas)
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
                                                            <input type="text" id="nama_pasien" class="form-control"
                                                                name="nama_pasien" placeholder="Nama Pasien" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                    <div class="col-md-2">
                                                        <label>Umur</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="umur" class="form-control"
                                                            name="umur" placeholder="Umur"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label>Pekerjaan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="pekerjaan" class="form-control"
                                                                name="pekerjaan" placeholder="Pekerjaan"  disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>
                                                        
                                                            <div class="col-md-2">
                                                                <label>Perusahaan</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" id="perusahaan" class="form-control"
                                                                    name="perusahaan" placeholder="Perusahaan"  disabled    >
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>
                                                
                                                        <div class="col-md-2">
                                                        <label>Divisi</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" id="divisi" class="form-control"
                                                            name="divisi" placeholder="Divisi"  disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Jabatan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="text" id="jabatan" class="form-control"
                                                                name="jabatan" placeholder="Jabatan"  disabled>
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

                <div class="tab-pane fade" id="list-pemeriksaan" role="tabpanel"
                                                aria-labelledby="list-pemeriksaan-list">
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
                                                        <label>Nama Klinik Praktek/Rumah Sakit</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="choices form-select" name="rs_rujukan_id" id="rs_rujukan_id">
                                                            <option disabled selected>Pilih Rumah Sakit Rujukan</option>
                                                            @foreach ($rsrujukan as $rujukan)
                                                            <option value="{{ $rujukan->id }}">{{ $rujukan->nama_RS_rujukan }}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>

                                                        

                                            
                                                <div class="col-md-2">
                                                    <label>Diagnosa</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <select name="nama_penyakit_id" id="nama_penyakit_id" class="form-select">
                                                        <option disabled selected>Pilih Nama Penyakit</option>
                                                        @foreach ($namapenyakit as $nama)
                                                            <option value="{{ $nama['id'] }}">{{ $nama['primer'] }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Diagnosa Sekunder</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <textarea type="text" id="sekunder" class="form-control"
                                                        name="sekunder"> </textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>

                                                

                                                <div class="col-md-2">
                                                    <label>Pasien diresepkan obat</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <textarea type="text" id="resep" class="form-control"
                                                        name="resep"> </textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>

                                                    
                                                    <div class="col-md-2">
                                                        <label>Saran untuk Pasien</label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <textarea type="text" id="saran" class="form-control"
                                                            name="saran"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        </div>


                                                        <div class="col-md-2">
                                                            <label>Pasien Harus Kontrol Kembali</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input class="form-check-input" type="radio" name="kontrol" id="kontrol" value="0" checked> Tidak
                                                            <label for="">
                                                            <input class="form-check-input" type="radio" name="kontrol" id="kontrol" value="1"> Ya
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div> 

                                                        <div class="col-md-2">
                                                            <label>Tanggal Pengembalian Surat Rujukan</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <input type="date" id="tanggal_kembali" class="form-control"
                                                                name="tanggal_kembali">
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>


                                                            <div class=" d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 mb-1 btn-form">Submit</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1 btn-form">Reset</button>
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
                        
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        
                        <script
                          src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
                          integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA="
                          crossorigin="anonymous"></script>
                        
                        
                        
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
                                    $('#NIK').val(data.NIK);
                                    $('#tanggal_lahir').val(data.tanggal_lahir);
                                    $('#tempat_lahir').val(data.tempat_lahir);
                                    $('#umur').val(data.umur);
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
                        
                            <script>
                                 $(".form-select").select2();
                             </script>
@endsection