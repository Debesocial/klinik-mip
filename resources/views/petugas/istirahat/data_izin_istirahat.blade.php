@extends('layouts.dashboard.app')

@section('title', 'Data Izin Istirahat')
@section('izinistirahat', 'active')

{{-- @section('judul', 'Data Izin Istirahat') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Izin Istirahat</h3>
                    {{ Breadcrumbs::render('izin_istirahat') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.izinistirahat') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.dataizinistirahat') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <th>Nama Pasien</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinistirahat as $izin)
                        <tr>
                            <td><B>{{ Carbon\Carbon::parse($izin->created_at)->format('d F Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($izin->created_at)->format('H:i:s') }}
                            </td>
                                <td>{{ $izin->pasien->nama_pasien }}</td>
                                <td>{{ $izin->keterangan }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="#" class="btn btn-outline-secondary" title="Edit"><i class="bi-pencil-square   "></i></a>
                                        <a href="#" title="print Data" href="#" class="btn btn-outline-secondary"><i class="bi-printer-fill"></i></a>
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