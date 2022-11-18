@extends('layouts.dashboard.app')

@section('title', 'Satuan Obat')
@section('obalkes', 'active')
@section('obat', 'active')
@section('satuan', 'active')

@section('judul', 'Data Satuan Obat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addsatuanobat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Satuan Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satuanobat as $satuan)
                    <tr>
                        <td>{{ $satuan['satuan_obat'] }}</td>
                        <td><div class="buttons">
                                <a href="/ubah/satuan/obat/{{ $satuan->id }}" class="btn btn-success rounded-pill" title="Ubah satuan obat/alkes"><i class="fa fa-edit"></i></a>
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