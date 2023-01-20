@extends('layouts.dashboard.app')

@section('title', 'Data Pemeriksaan Narkoba')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('narko', 'active')

@section('judul', 'Data Pemeriksaan Narkoba')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.periksanarkoba') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('pemeriksaan.datapemeriksaannarkoba') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal dibuat</th>
                        <th>Nama Pasien</th>
                        <th>Tempat</th>
                        <th>Tanggal</th>
                        <th>riwayat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($narkoba as $narko)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($narko->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($narko->created_at)->format('H:i:s') }}
                        </td>
                            <td>{{ $narko->pasien->nama_pasien }}</td>
                            <td>{{ $narko->penggunaan_obat }}</td>
                            <td>{{ $narko->asal_obat }}</td>
                            <td>{{ $narko->terakhir_digunakan }}</td>
                            <td><div class="buttons">
                                <a href="/view/pemeriksaan/narkoba/{{$narko->id }}" title="Lihat Data" href="#" class="btn btn-light rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/print/pemeriksaan/narkoba/{{ $narko->id }}" title="Lihat Data" href="#" class="btn btn-secondary rounded-pill"><i class="fa fa-print"></i></a>
                                <a href="/ubah/pemeriksaan/narkoba/{{$narko->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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