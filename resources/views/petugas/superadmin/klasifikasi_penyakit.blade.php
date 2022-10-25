@extends('layouts.dashboard.app')

@section('title', 'Klasifikasi Penyakit')


@section('judul', 'Klasifikasi Penyakit')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addklasifikasipenyakit') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($klasifikasipenyakit as $klasifikasi)
                    <tr>
                        <td>{{ $klasifikasi['klasifikasi_penyakit'] }}</td>
                        <td><div class="buttons">
                            <a href="" title="View Data Pasien" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                            <a href="/ubah/klasifikasi/penyakit/{{ $klasifikasi['id'] }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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