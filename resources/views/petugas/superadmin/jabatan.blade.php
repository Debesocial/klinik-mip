@extends('layouts.dashboard.app')

@section('title', 'Data Jabatan')


@section('judul', 'Data Jabatan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addjabatan') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Create</span></a>
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
                    @foreach ($jabatan as $jab)
                    <tr>
                        <td>{{ $jab['nama_jabatan'] }}</td>
                        <td><div class="buttons">
                                <a href="/ubah/jabatan/{{ $jab->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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