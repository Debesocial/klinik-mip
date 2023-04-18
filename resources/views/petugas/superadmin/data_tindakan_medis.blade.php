@extends('layouts.dashboard.app')

@section('title', 'Data Persetujuan Tindakan Medis')
@section('persetujuanmedis', 'active')

{{-- @section('judul', 'Data Persetujuan Tindakan Medis') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Persetujuan Tindakan Medis</h3>
                    {{ Breadcrumbs::render('tindakan_medis') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.persetujuantindakanmedis') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datatindakanmedis') }}" }})
                </script>
            @endif
            <div class="table-responsive pe-2 pt-2">
                <table class="table table-hover" id="table1" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal </th>
                            <th>Nama Pasien</th>
                            <th>Riwayat</th>
                            <th>Hasil Pernyataan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tindakan as $tin)
                        <tr>
                            <td><B>{{ Carbon\Carbon::parse($tin->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($tin->created_at)->format('H:i:s') }}
                            </td>
                            <td>{{ $tin->pasien->nama_pasien }}</td>
                                <td style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">{{ $tin->riwayat }}</td>
                                <td>
                                    <i class="{{ $tin->hasil == 1 ? "fas fa-check" : "fas fa-times" }}"></i>
                                    </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/ubah/persetujuan/tindakan/medis/{{ $tin->id }}" class="btn btn-outline-secondary" title="Ubah"><i class="bi bi-pencil-square"></i></a>
                                        <a href="/print/persetujuan/tindakan/medis/{{ $tin->id }}" title="print Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i></a>
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