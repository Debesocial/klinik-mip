@extends('layouts.dashboard.app')

@section('title', 'Data Pemeriksaan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')
{{-- @section('judul', 'Data Pemeriksaan Covid-19') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
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
    <div class="card shadow">
        <div class="card-body">
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
    </div>
</div>
</section>

<!-- // Basic multiple Column Form section end -->

</div>
@include('sweetalert::alert') 
@endsection