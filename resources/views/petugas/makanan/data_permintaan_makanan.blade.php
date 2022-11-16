@extends('layouts.dashboard.app')

@section('title', 'Data Permintaan Makanan')


@section('judul', 'Data Permintaan Makanan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.permintaanmakanan') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permintaanmakanan as $makanan)
                    <tr>
                            <td>{{ $makanan->permintaan_makanan }}</td>
                            <td>{{ $makanan->tanggal_mulai }}</td>
                            <td>{{ $makanan->tanggal_selesai }}</td>
                            <td>{{ $makanan->total }}</td>
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