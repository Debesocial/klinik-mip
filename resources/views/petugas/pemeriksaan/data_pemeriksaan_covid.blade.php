@extends('layouts.dashboard.app')

@section('title', 'Data Pemeriksaan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')
{{-- @section('judul', 'Data Pemeriksaan Covid-19') --}}
@section('container')
<div class="row align-items-center">
    <div class="col">
        <div class="page-heading head-1">
                <h3 id="_judul">Data Pemeriksaan Covid-19</h3>
                <div id="_bread">{{ Breadcrumbs::render('pemeriksaan_covid') }}</div>
        </div>
    </div>
    {{-- <div class="col">
        <div class="buttons text-end">
            <a href="{{ route('superadmin.pemeriksaancovid') }}" class="btn btn-success rounded-pill">
                <i class="bi bi-plus-circle"></i>
                <span>Tambah</span></a>
        </div>
    </div> --}}
</div>
<section class="section">
    <div class="card">
        <div class="card-header py-3">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" position=1 aria-current="true" href="#">Pemeriksaan Covid</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " position=2 href="#">Pemantauan Covid</a>
                </li>
            </ul>
        </div>
        <div class="card-body body-1 mt-3" style="display:none;">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result)=>{if (result.isConfirmed) { window.location.href = "{{ route('pemeriksaan.datapemeriksaancovid') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Nama Pasien</th>
                            <th>Hasil Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($covid as $cov)
                        <tr>
                            <td><B>{{ Carbon\Carbon::parse($cov->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($cov->created_at)->format('H:i:s') }}
                            </td>
                                <td>{{ $cov->pasien->nama_pasien }}</td>
                                <td class="text-center">
                                    @if ($cov->hasil_pemeriksaan==1)
                                        <span class="badge bg-danger">Positif</span>
                                    @else
                                        <span class="badge bg-primary">Negatif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/view/pemeriksaan/covid/{{ $cov->id }}" title="print Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                        <a href="/ubah/pemeriksaan/covid/{{ $cov->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body body-2 mt-3" style="display:none">

            <div class="table-responsive pt-2 pe-2 ">
                <table class="table table-hover" id="table2">
                    <thead>
                        <tr>
                            <th>Tanggal Pemantauan</th>
                            <th>Nama Pasien</th>
                            <th>No. Kamar</th>
                            <th>Tanggal Perjalanan</th>
                            <th>Kota Asal/Kota Tujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemantauan as $pantau)
                        <tr>
                                <td><B>{{ Carbon\Carbon::parse($pantau->tanggal_pemeriksaan)->isoFormat('D MMMM Y') }}</B></td>
                                <td>{{ $pantau->pasien->nama_pasien }}</td>
                                <td>{{ $pantau->no_kamar }}</td>
                                <td>{{ $pantau->perjalanan }}</td>
                                <td>{{ ($pantau->asal)??'- ' }}/{{ ($pantau->kota_tujuan)??' -' }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/view/pemantauan/covid/{{ $pantau->id }}" title="View Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                        <a href="/ubah/pemantauan/covid/{{ $pantau->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@section('js')
    <script>
        var navPosition = '1';
        @if(session('position'))
            navPosition = '2';
        @endif
        $(document).ready(function(){
            let jquery_datatable = $("table[id*='table2']").DataTable({
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                    "infoEmpty": "Menampikan 0 sampai 0, dari 0 data",
                    "zeroRecords": "Tidak ditemukan data yang cocok",
                    "infoFiltered": "(Didapatkan dari _MAX_ total seluruh data)",
                }
            })
            if (navPosition!='1') {
                $('#_judul').text('Data Pemantauan Covid-19');
                $('#_bread').html(`{{ Breadcrumbs::render("pemantauan_covid") }}`);
                $('a[class*="nav-link"]').removeClass('active')
                $('a[position=2]').addClass('active')
            }
            $('.body-'+navPosition).show();
            $('a[class*="nav-link"]').click(function(){
                var clickPosition = $(this).attr('position');
                $('.body-'+navPosition).hide();
                navPosition = clickPosition;
                $('.body-'+navPosition).show();
                $('a[class*="nav-link"]').removeClass('active')
                if (navPosition==1) {
                    $('#_judul').text('Data Pemeriksaan Covid-19');
                    $('#_bread').html(`{{ Breadcrumbs::render("pemeriksaan_covid") }}`);
                }else{
                    $('#_judul').text('Data Pemantauan Covid-19');
                    $('#_bread').html(`{{ Breadcrumbs::render("pemantauan_covid") }}`);
                }
                $(this).addClass('active')
            })
            $('[id*="table1_length"]').parent().removeClass('col-md-6').addClass('col-md-4')
            $('[id*="table1_wrapper"]').children().removeClass('mb-3').addClass('mb-0')
            $('[id*="table2_length"]').parent().removeClass('col-md-6').addClass('col-md-4')
            $('[id*="table2_wrapper"]').children().removeClass('mb-3').addClass('mb-0')
            var htmlTambah1 = `<div class="col-md-2 text-end">
                    <div class="buttons">
                        <a href="{{ route('superadmin.pemeriksaancovid') }}" class="btn btn-success rounded-pill">
                            <i class="bi bi-plus-circle"></i>
                            <span>Tambah</span>
                        </a>
                    </div>
                </div>`;
            var htmlTambah2 = `<div class="col-md-2 text-end">
                    <div class="buttons">
                        <a href="{{ route('superadmin.pemantauancovid') }}" class="btn btn-success rounded-pill">
                            <i class="bi bi-plus-circle"></i>
                            <span>Tambah</span>
                        </a>
                    </div>
                </div>`;
            $('[id*="table1_wrapper"]').children().first().append(htmlTambah1)
            $('[id*="table2_wrapper"]').children().first().append(htmlTambah2)
        })
    </script>
@stop
{{-- @include('sweetalert::alert')  --}}
@endsection