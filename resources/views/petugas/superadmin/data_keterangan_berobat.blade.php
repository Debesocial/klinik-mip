@extends('layouts.dashboard.app')

@section('title', 'Data Keterangan Berobat')
@section('izinberobat', 'active')

@section('judul', 'Data Keterangan Berobat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.keteranganberobat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Kliniks</th>
                        <th>Nama Penyakit</th>
                        <th>Resep</th>
                        <th>Saran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keterangan as $ket)
                    <tr>
                        <td>{{ $ket->pasien->nama_pasien }}</td>
                            <td>{{ $ket->klinik }}</td>
                            <td>{{ $ket->namapenyakit->primer }}</td>
                            <td>{{ $ket->resep }}</td>
                            <td>{{ $ket->saran }}</td>
                            <td><div class="buttons">
                                <a href="" title="print Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-print"></i></a>
                                <a href="" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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