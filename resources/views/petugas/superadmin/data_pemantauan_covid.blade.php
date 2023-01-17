@extends('layouts.dashboard.app')

@section('title', 'Daftar Pemantauan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('pemantauan', 'active')

@section('judul', 'Daftar Pemantauan Covid-19')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.pemantauancovid') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datapemantauancovid') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
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
                            <td><div class="buttons">
                                <a href="/view/pemantauan/covid/{{ $pantau->id }}" title="View Data" href="#" class="btn btn-light rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/pemantauan/covid/{{ $pantau->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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