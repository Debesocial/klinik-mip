@extends('layouts.dashboard.app')

@section('title', 'Data Izin Berobat')
@section('izinberobat', 'active')

{{-- @section('judul', 'Data Izin Berobat') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Izin Berobat</h3>
                    {{ Breadcrumbs::render('izin_berobat') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.izinberobat') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.dataizinberobat') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width=100%>
                    <thead>
                        <tr>
                            <th>Tanggal </th>
                            <th>Nama Pasien</th>
                            <th>Tempat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izin as $berobat)
                        <tr>
                            <td><B>{{ Carbon\Carbon::parse($berobat->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($berobat->created_at)->format('H:i:s') }}
                            </td>
                            <td>{{ $berobat->pasien->nama_pasien }}</td>
                                <td>{{ $berobat->tempat }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/ubah/izin/berobat/{{$berobat->id }}" class="btn btn-outline-secondary" title="View"><i class="bi bi-pencil-square"></i></a>
                                        <a href="/print/izin/berobat/{{ $berobat->id }}" title="print Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i></a>
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