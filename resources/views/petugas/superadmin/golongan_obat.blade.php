@extends('layouts.dashboard.app')

@section('title', 'Golongan Obat')


@section('judul', 'Golongan Obat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addgolonganobat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Create</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Golongan Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($golonganobat as $golongan)
                    <tr>
                        <td>{{ $golongan['nama_golongan_obat'] }}</td>
                        <td><div class="buttons">
                                <a href="" title="View Data Pasien" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/golongan/obat/{{ $golongan->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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