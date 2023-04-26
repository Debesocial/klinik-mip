@extends('layouts.dashboard.app')

@section('title', 'Data Pemeriksaan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')
{{-- @section('judul', 'Data Pemeriksaan Covid-19') --}}
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
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
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-heading head-1">
                            <h3>Data Pemeriksaan Covid-19</h3>
                            {{ Breadcrumbs::render('pemeriksaan_covid') }}
                    </div>
                </div>
                <div class="col">
                    <div class="buttons text-end">
                        <a href="{{ route('superadmin.pemeriksaancovid') }}" class="btn btn-success rounded-pill">
                            <i class="bi bi-plus-circle"></i>
                            <span>Tambah</span></a>
                    </div>
                </div>
            </div>
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('pemeriksaan.datapemeriksaancovid') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal dibuat</th>
                            <th>Nama Pasien</th>
                            <th>Pemeriksaan Antigen</th>
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
                                <td>{{ $cov->pemeriksaan->kebutuhan }}</td>
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
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-heading head-2">
                            <h3>Data Pemantauan Covid-19</h3>
                            {{ Breadcrumbs::render('pemantauan_covid') }}
                    </div>
                </div>
                <div class="col">
                    <div class="buttons text-end">
                        <a href="{{ route('superadmin.pemantauancovid') }}" class="btn btn-success rounded-pill">
                            <i class="bi bi-plus-circle"></i>
                            <span>Tambah</span></a>
                    </div>
                </div>
            </div>
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datapemantauancovid') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal Pemeriksaan</th>
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
                                <td>{{ $pantau->asal }}/{{ $pantau->kota_tujuan }}</td>
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
        var navPosition = '1'
        $(document).ready(function(){
            $('.body-'+navPosition).show();
            $('a[class*="nav-link"]').click(function(){
                var clickPosition = $(this).attr('position');
                $('.body-'+navPosition).hide();
                navPosition = clickPosition;
                $('.body-'+navPosition).show();
                $('a[class*="nav-link"]').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>
@stop
@include('sweetalert::alert') 
@endsection