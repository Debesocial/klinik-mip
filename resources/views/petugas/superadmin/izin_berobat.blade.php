@extends('layouts.dashboard.app')

@section('title', 'Izin Berobat')
@section('izinberobat', 'active')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Izin Berobat')
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
                                <form class="form form-horizontal" action="/izin/berobat" method="post" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">


                                            <div class="col-md-2">
                                                <label>ID Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <select name="pasien_id" id="pasien_id" data-live-search="true" class="choices form-select" required>
                                                    <option disabled selected>Pilih ID Rekam Medis Pasien</option>
                                                    @foreach ($pasien_id as $pas)
                                                        <option value="{{ $pas['id'] }}">{{ $pas['id_rekam_medis'] }} - {{ $pas['nama_pasien'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                            </div>
                                            <br>

                                            <div class="col-md-2">
                                                <label>Tempat Pemeriksaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input id="pasienmart" type="text" id="tempat" class="form-control"
                                                    name="tempat"  required >
                                            </div>
                                            <div class="col-md-6">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Pasien</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="nama_pasien" class="form-control"
                                                    name="nama_pasien" disabled>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="pekerjaan" class="form-control"
                                                    name="pekerjaan" placeholder="Pekerjaan" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                            <div class="col-md-2">
                                                <label>Perusahaan</label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" id="perusahaan" class="form-control"
                                                    name="perusahaan" placeholder="Perusahaan" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Divisi</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input type="text" id="divisi" class="form-control"
                                                        name="divisi" placeholder="Divisi" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    </div>

                                                 {{-- TODO: Remember this must can upload multiple file and save to db with format (fileone, filetwo, filethree) include the paht  --}}
                                                <div class="col-md-2">
                                                    <label>Tanda Tangan</label>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <input class="form-control" type="file" id="ttd" name="ttd">
                                                </div>
                                                <div class="col-md-6">
                                                    </div>


                                            <div class="col-sm-4 d-flex justify-content-end">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Simpan</button>
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


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="{{asset ('ref/assets/vendors/jquery/jquery-1.12.4.min.js')}}"></script> --}}
<script
  src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
  integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA="
  crossorigin="anonymous"></script>

{{-- <script type="text/javascript">
    function myChangeFunction(nama_pasien) {
      let text = nama_pasien.value;
      const myArray = text.split("|");
      var nama_pasien = document.getElementById('nama_pasien');
      var umur = document.getElementById('umur');
      var pekerjaan = document.getElementById('pekerjaan');
      nama_pasien.value = myArray[0];
      umur.value = myArray[1];
      pekerjaan.value = myArray[2];
    }
  </script> --}}

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
            $('#umur').val(data.umur);
            $('#pekerjaan').val(data.pekerjaan);
            $('#perusahaan').val(data.perusahaan.nama_perusahaan_pasien);
            $('#divisi').val(data.divisi.nama_divisi_pasien);
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
        });
    });
  </script>

{{-- <script>
    $(".form-select").select2();
</script> --}}

@endsection
