@extends('layouts.dashboard.app')

@section('title', 'Permintaan Makanan')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Permintaan Makanan')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
            <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="pasien_id" id="pasien_id" class="form-select">
                                                    <option disabled selected>Pilih ID Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}">{{ $pas['id'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>
                                            <br>
                                            <div class="col-md-2">
                                                <label>ID Rawat Inap</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="search" id="id_rawat_inap" class="form-control"
                                                    name="id_rawat_inap" required disabled>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4 form-group">
                                    
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien"   disabled>
                                            </div>

                                            <div class="col-md-2">               
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="tanggal_lahir" class="form-control"
                                                    name="tanggal_lahir"   disabled>
                                            </div>
                                                <div class="col-md-2">
                                            </div>
                                            <div class="col-md-4 form-group">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Umur</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="umur" class="form-control"
                                                    name="umur"   disabled>
                                            </div>
                                                <div class="col-md-2">
                                            </div>
                                            <div class="col-md-4 form-group">
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
                                                    name="perusahaan" placeholder="Perusahaan"  disabled>
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

                                                        <div class="col-md-2">
                                                            <label>Diagnosa</label>
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <select class="choices form-select" name="nama_penyakit_id" id="nama_penyakit_id">
                                                                <option disabled selected>Pilih Nama Penyakit</option>
                                                                @foreach ($namapenyakit as $nama)
                                                                <option value="{{ $nama->id }}">{{ $nama->primer }}</option>
                                                                @endforeach
                                                        </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label>Permintaan Makanan</label>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <textarea type="text" id="permintaan_makanan" class="form-control"
                                                                    name="permintaan_makanan" placeholder="Permintaan Makanan" ></textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label>Catatan Tambahan</label>
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <textarea type="text" id="catatan_tambahan" class="form-control"
                                                                        name="catatan_tambahan" placeholder="Catatan Tambahan" ></textarea>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <label>Tanggal Mulai Diberikan Makanan</label>
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <input type="date" id="tanggal_mulai" class="form-control"
                                                                            name="tanggal_dimulai"  >
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        </div>   
                                                                        
                                                                        <div class="col-md-2">
                                                                            <label>Tanggal Selesai Diberikan Makanan</label>
                                                                        </div>
                                                                        <div class="col-md-4 form-group">
                                                                            <input type="date" id="tanggal_selesai" class="form-control"
                                                                                name="tanggal_selesai"  >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            </div>   

                                                                            <div class="col-md-2">
                                                                                <label>Total Hari Pemberian</label>
                                                                            </div>
                                                                            <div class="col-md-4 form-group">
                                                                                <input type="date" id="hari_pemberian" class="form-control"
                                                                                    name="hari_pemberian" required disabled >
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                </div> 

                                                                                <div class="col-md-2">
                                                                                    <label>Dokter Yang Memeriksa</label>
                                                                                </div>
                                                                                <div class="col-md-4 form-group">
                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> Tanda Tangan
                                                                                    <label for="">
                                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked> Tanda Tangan Tersimpan
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    </div> 

                                                                                    <div class="col-md-2">
                                                                                        
                                                                                    </div>
                                                                                    <div class="col-md-4 form-group">
                                                                                        <textarea type="text" id="tanda_tangan" class="form-control"
                                                                                            name="tanda_tangan"  style="width: 100%"></textarea>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        </div> 
                                            

                                            <div class="col-sm-12 d-flex justify-content-end">
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