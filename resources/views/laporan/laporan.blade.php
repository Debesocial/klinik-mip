@extends('layouts.dashboard.app')

@section('title', 'Laporan')
@section('laporan', 'active')
@section('css')
    <style>
        #card-laporan:hover{
            transform: scale(1.1);
            cursor: pointer;
            z-index: 11;
        }
        #card-laporan{
            transition: transform .2s;
            z-index: 10;
        }
        
    </style>
@stop

@section('container')
<div class="row">
    <div class="col">
        <div class="page-heading">
                <h3>Laporan</h3>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-evenly">
        <div class="col mb-3">
            {!! cardLaporan([
                'title'=> 'Jumlah Pekerja Sakit',
                'sub_title' => 'Pekerja yang sakit karena penyakit, bukan karena kecelakaan kerja.',
                'color'=>'crimson',
                'id'=> 'pekerja-sakit'
            ]) !!}
        </div>
        <div class="col mb-3">
            {!! cardLaporan([
                'title'=> 'Jumlah Absen Karena Sakit',
                'sub_title' => 'Total absen karyawan karena sakit, bukan karena kecelakaan kerja.',
                'color'=>'darkcyan',
                'id'=> 'absen-sakit'
            ]) !!}
        </div>
        <div class="col mb-3">
            {!! cardLaporan([
                'title'=> 'Jumlah Kasus PAK',
                'sub_title' => 'Total diagnosa sekunder akibat kerja.',
                'color'=>'orange',
                'id'=> 'pak'
            ]) !!}
        </div>
        
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="laporanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="laporanModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  @section('js')
    <script>
        function showModal(id,color) {
            showLoader();
            url = "{{url('/laporan')}}/"+id;
            
            $.ajax({
                type: "get",
                url: url,
                data: {color:color},
                success: function (response) {
                    console.log(response);
                    $('#laporanModal').modal('show');
                    hideLoader();
                }
            });
         }
    </script>
      
  @stop

@endsection