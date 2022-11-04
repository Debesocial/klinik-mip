@extends('layouts.dashboard.app')

@section('title', 'Bobbot Obat')


@section('judul', 'Data Bobot Obat/Alkes')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addbobotobat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bobotobat as $bobot)
                    <tr>
                        <td>{{ $bobot['bobot_obat'] }}</td>
                        <td><div class="buttons">
                                <a href="/ubah/bobot/obat/{{ $bobot->id }}" class="btn btn-success rounded-pill" title="Ubah bobot obat/alkes"><i class="fa fa-edit"></i></a>
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