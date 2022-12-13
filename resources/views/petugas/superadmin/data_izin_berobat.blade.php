@extends('layouts.dashboard.app')

@section('title', 'Data Izin Berobat')
@section('izinberobat', 'active')

@section('judul', 'Data Izin Berobat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.izinberobat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.dataizinberobat') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <th>Nama Pasien</th>
                        <th>Tempat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($izin as $berobat)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($berobat->created_at)->format('d F Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($berobat->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $berobat->pasien->nama_pasien }}</td>
                            <td>{{ $berobat->tempat }}</td>
                            <td><div class="buttons">
                                <a href="/print/izin/berobat/{{ $berobat->id }}" title="print Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-print"></i></a>
                                <a href="/ubah/izin/berobat/{{$berobat->id }}" class="btn btn-success rounded-pill" title="View"><i class="fa fa-edit"></i></a>
                                </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>

<!-- // Basic multiple Column Form section end -->

</div>
@include('sweetalert::alert') 
@endsection