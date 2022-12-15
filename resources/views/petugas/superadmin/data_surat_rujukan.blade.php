@extends('layouts.dashboard.app')

@section('title', 'Data Surat Rujukan')
@section('suratrujukan', 'active')

@section('judul', 'Data Surat Rujukan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.suratrujukan') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datasuratrujukan') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal dibuat</th>
                        <th>Nama Pasien</th>
                        <th>Tempat</th>
                        <th>riwayat</th>
                        <th>Obat yang Diberikan</th>
                        <th>Hasil Pengobatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suratrujukan as $surat)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($surat->created_at)->format('d F Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($surat->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $surat->pasien->nama_pasien }}</td>
                            <td>{{ $surat->tempat }}</td>
                            <td>{{ $surat->riwayat }}</td>
                            <td>{{ $surat->obat_diberikan }}</td>
                            <td>{{ $surat->hasil_pengobatan }}</td>
                            <td><div class="buttons">
                                <a href="/print/surat/rujukan/{{ $surat->id }}" title="print Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-print"></i></a>
                                <a href="/ubah/surat/rujukan/{{ $surat->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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