@extends('layouts.dashboard.app')

@section('title', 'Data Divisi')


@section('judul', 'Data Divisi')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.adddivisi') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisi as $div)
                    <tr>
                        <td>{{ $div['nama_divisi_pasien'] }}</td>
                        <td><div class="buttons">
                                <a href="/ubah/divisi/{{ $div->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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