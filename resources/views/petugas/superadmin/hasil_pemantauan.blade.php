@extends('layouts.dashboard.app')

@section('title', 'Hasil Pemantauan')


@section('judul', 'Data Hasil Pemantauan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addhasilpemantauan') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil_pemantauans as $hasilpemantauan)
                    <tr>
                        <td>{{ $hasilpemantauan['kode'] }}</td>
                        <td>{{ $hasilpemantauan['nama_pemantauan'] }}</td>
                        <td><div class="buttons">
                            <a href="/ubah/hasil/pemantauan/{{ $hasilpemantauan['id'] }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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