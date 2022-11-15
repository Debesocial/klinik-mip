@extends('layouts.dashboard.app')

@section('title', 'Data Rekam Medis')


@section('judul', 'Data Rekam Medis')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.rekammedis') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Tempat</th>
                        <th>Tanggal</th>
                        <th>riwayat</th>
                        <th>Obat yang Diberikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekammedis as $rekam)
                    <tr>
                            <td>{{ $narko->penggunaan_obat }}</td>
                            <td>{{ $narko->jenis_obat }}</td>
                            <td>{{ $narko->asal_obat }}</td>
                            <td>{{ $narko->terakhir_digunakan }}</td>
                            <td><div class="buttons">
                                <a href="#" title="print Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-print"></i></a>
                                <a href="#" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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