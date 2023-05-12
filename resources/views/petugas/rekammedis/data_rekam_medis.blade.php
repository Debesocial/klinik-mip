@extends('layouts.dashboard.app')

@section('title', 'Data Rekam Medis')
@section('rekam', 'active')
@section('rawat', 'active')
@section('medis', 'active')

@section('container')
@section('css')
<style>
    img{
        /* width: auto;
        height: 50%; */
        aspect-ratio: 1; 
        object-fit: cover; /* use the one you need */
    }
    table.dataTable td{
        padding-top: 0 !important;
    }
</style>
@stop

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Rekam Medis</h3>
                    {{-- {{ Breadcrumbs::render('rekam_medis') }} --}}
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-1" id="container">
        <div class="col-md-8">
            <div class="input-group rounded-pill">
                <span class="input-group-text bg-transparent border-0 rounded-pill" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="cari_pasien" class="form-control rounded-pill" placeholder="Cari pasien" aria-label="Search" aria-describedby="search-addon" />
            </div>
        </div>
    </div>
    <div class="container" >
        <div class="row" id="tbody" style="display: none">
            @if (Session('message'))
            <script>
                Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" })
            </script>
            @endif
            <div class="table-responsive">
                <table class="table table-borderless " id="table2">
                    <thead>
                        <tr style="display: none">
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $pas)
                            <tr >
                                <td>
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="row mx-0">
                                                <div class="col-md-1">
                                                    @php
                                                        $img = ($pas->upload!=''||$pas->upload!=null)?$pas->upload:'default.jpg';
                                                        $tanggal_lahir = $pas->tanggal_lahir;
                                                        $lahir    = new DateTime($tanggal_lahir);
                                                        $today        = new DateTime('today');
                                                        $usia = $today->diff($lahir);
                                                    @endphp
                                                    <img  src="{{ asset('pasien/foto/file/'.$img) }}" class="img-fluid rounded-circle" style="width: auto" alt="">
                                                </div>
                                                <div class="col-md-9">
                                                    <div >
                                                        <div hidden>{{ $pas->perusahaan->nama_perusahaan_pasien }} {{ $pas->jabatan->nama_jabatan }} {{ $pas->divisi->nama_divisi }}{{ $pas->keluarga->nama_keluarga }}</div>
                                                       <a href="/lihat/rekam/medis/{{ $pas->id }}" ><h6 class="mb-0" style="display: inline-block;">{{ $pas->nama_pasien }}</h6> - <i>{{ $pas->id_rekam_medis }}</i></a>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div>{{ $usia->y .' Tahun' }}</div>
                                                            <a href="#" onclick="tampilModalPasien({{ json_encode($pas) }})"><small style="display: inline-block;">NIK.{{ $pas->penduduk }}</small></a>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div>Perusahaan: {{ $pas->perusahaan->nama_perusahaan_pasien }} - {{ $pas->jabatan->nama_jabatan }}</div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div><B>{{ Carbon\Carbon::parse($pas->created_at)->isoFormat('D MMMM Y') }}</B>
                                                                <i>{{ Carbon\Carbon::parse($pas->created_at)->format('H:i') }}</i>
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="tbody1" class="container mt-5">
            <div class="row">
                <div class="col text-center" style="border: none">
                    <i>Silahkan cari Nama, Id, atau Perusahaan Pasien</i>
                </div>
            </div>
        </div>
    </div>
</section>

@section('js')
    <script>
        var table1 = $("table[id*='table2']").DataTable({
            "language": {
                "search": "",
                "lengthMenu": "Tampilkan _MENU_ data",
                "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                "infoEmpty": "Menampikan 0 sampai 0, dari 0 data",
                "zeroRecords": "Tidak ditemukan data yang cocok",
                "infoFiltered": "(Didapatkan dari _MAX_ total seluruh data)",
            },
            paging:false,
            info:false,
            searching:true
        })
        $(document).ready(function(){
            $('#cari_pasien').keyup(function(){
                clearTable($(this).val())
            })
            // $('input[type="search"]').click(function(){
            //     clearTable($(this).val())
            // })
            // $('#table2_filter').parent().removeClass('col-md-6')
            // $('#table2_filter').css('text-align', 'center')
            //  $('input[type="search"]').attr('placeholder', 'Masukkan kata kunci').removeClass('form-control-sm').addClass('form-control-lg').css('margin-left',0);
            // $('#table2_filter').parent().siblings().remove()
            $('#table2_wrapper').children().first().remove()
        })

        function clearTable(param) {
            
            if (param.length<2) {
                $('#tbody1').show();
                $('#tbody').hide(); 
            }else{
                table1.search(param).draw();
                $('#tbody1').hide();    
                $('#tbody').show();
            }
        }

        
    </script>
@stop

@include('sweetalert::alert') 
@endsection