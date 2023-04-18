@extends('layouts.dashboard.app')

@section('title', 'Data Surat Rujukan')
@section('suratrujukan', 'active')

{{-- @section('judul', 'Data Surat Rujukan') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Surat Rujukan</h3>
                    {{ Breadcrumbs::render('surat_rujukan') }}
            </div>
        </div>  
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.suratrujukan') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datasuratrujukan') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal </th>
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
                            <td><B>{{ Carbon\Carbon::parse($surat->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($surat->created_at)->format('H:i:s') }}
                            </td>
                            <td>{{ $surat->pasien->nama_pasien }}</td>
                                <td>{{ $surat->tempat }}</td>
                                <td style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">{{ $surat->riwayat }}</td>
                                <td style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">{{ $surat->obat_diberikan }}</td>
                                <td style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">{{ $surat->hasil_pengobatan }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/ubah/surat/rujukan/{{ $surat->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        <a href="/print/surat/rujukan/{{ $surat->id }}" title="print Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i></a>
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