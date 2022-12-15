@extends('layouts.dashboard.app')

@section('title', 'Data Persetujuan Tindakan Medis')
@section('persetujuanmedis', 'active')

@section('judul', 'Data Persetujuan Tindakan Medis')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.persetujuantindakanmedis') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datatindakanmedis') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal dibuat</th>
                        <th>Nama Pasien</th>
                        <th>Riwayat</th>
                        <th>Hasil Pernyataan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tindakan as $tin)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($tin->created_at)->format('d F Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($tin->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $tin->pasien->nama_pasien }}</td>
                            <td>{{ $tin->riwayat }}</td>
                            <td>
                                <i class="{{ $tin->hasil == 1 ? "fas fa-check" : "fas fa-times" }}"></i>
                                </td>
                            <td><div class="buttons">
                                <a href="/print/persetujuan/tindakan/medis/{{ $tin->id }}" title="print Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-print"></i></a>
                                <a href="/ubah/persetujuan/tindakan/medis/{{ $tin->id }}" class="btn btn-success rounded-pill" title="Ubah"><i class="fa fa-edit"></i></a>
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