@extends('layouts.dashboard.app')

@section('title', 'Sub Klasifikasi Penyakit')


@section('judul', 'Sub Klasifikasi Penyakit')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addsubklasifikasi') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Sub Klasifikasi Penyakit</th>
                        <th>Klasifikasi Penyakit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subklasifikasi as $sub)
                    <tr>
                        <td>{{ $sub->nama_penyakit }}</td>
                        <td>{{ $sub->klasifikasi_penyakit->klasifikasi_penyakit }}</td>
                        <td><div class="buttons">
                            <a href="" title="View Data Pasien" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                            <a href="/ubah/sub/klasifikasi/{{ $sub['id'] }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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