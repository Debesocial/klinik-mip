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
        .yearpicker-container {
            z-index: 12 !important;
        }
        
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/yearpicker.css')}}">
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
    <div class="border p-3">
        <h5>Statistik</h5>
        <div class="row row-cols-md-4 mb-2">
            <div class="col">
                <label for="" class="form-label">Jenis Laporan: </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan" value="bulanan" checked>
                    <label class="form-check-label" for="jenis_laporan">Bulanan</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan2" value="harian">
                    <label class="form-check-label" for="jenis_laporan2">Harian</label>
                  </div>
            </div>
            <div class="col" id="tahun">
                <input type="text" readonly class="btn btn-outline-success" name="statistik_tahun" id="statistik_tahun" style="cursor: pointer">
            </div>
            <div class="col" id="dari-sampai" style="display:none;">
                <label for="" class="">Dari</label>
                <input type="date" class="form-control" name="statistik_dari" id="statistik_dari">
            </div>
            <div class="col" id="dari-sampai" style="display:none;">
                <label for="" class="">Sampai</label>
                <input type="date" class="form-control" name="statistik_sampai" id="statistik_sampai">
            </div>
        </div>  
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
</div>
<!-- Modal -->
<div class="modal fade" id="laporanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="laporanModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
  </div>

  @section('js')
    <script src="{{asset('assets/js/yearpicker.js')}}"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.4/dataRender/datetime.js"></script>
    <script>
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });
        $(document).ready(function () {
            $("#statistik_tahun").change(function () { 
                selected_year = $(this).val();
            });
            $('input[name="jenis_laporan"]').click(function(){
                jenisLaporanStatistik = $(this).val();
                if (jenisLaporanStatistik == 'bulanan') {
                    $('#tahun').show();
                    $('[id="dari-sampai"]').hide()
                }else if(jenisLaporanStatistik =='harian'){
                    $('#tahun').hide();
                    $('[id="dari-sampai"]').show()

                }
            })
            $('#statistik_sampai').val(today.toDateInputValue())
            seminggusebelum = new Date (today.setDate(today.getDate()-7));
            $('#statistik_dari').val(seminggusebelum.toDateInputValue())
        });
    </script>
    <script>
        $(function() {
            $("#statistik_tahun" ).yearpicker({
                year: selected_year
            });
        });
        today = new Date();
        jenisLaporanStatistik = $('input[name = jenis_laporan]:checked').val();
        selected_year = today.getFullYear();
        function showModal(id,color) {
            // showLoader();
            url = "{{url('/laporan')}}/"+id;

            if (id=='pekerja-sakit') {
                $('.modal-title').text('Laporan Jumlah Pekerja Sakit Akibat Penyakit Tahun '+selected_year);
            }
            
            $.ajax({
                type: "get",
                url: url,
                data: {
                    color:color,
                    jenis:jenisLaporanStatistik,
                    year : selected_year
                },
                success: function (response) {
                    $('.modal-body').html(response);
                    $('#laporanModal').modal('show');
                    hideLoader();
                }
            });
         }
    </script>
      
  @stop

@endsection