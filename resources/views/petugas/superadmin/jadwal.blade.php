@extends('layouts.dashboard.app')

@section('title', 'Data Jadwal Petugas')
@section('data', 'active')
@section('jadwal', 'active')
@section('side', 'active')

@section('judul', 'Data Jadwal Petugas')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addjadwal') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Shift</th>
                        <th>dari</th>
                        <th>sampai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $jad)
                    <tr>
                        <td>{{ $jad['hari'] }}</td>
                        <td>{{ $jad['shift'] }}</td>
                        <td>{{ $jad['dari'] }}</td>
                        <td>{{ $jad['sampai'] }}</td>
                        <td><div class="buttons">
                                <a href="/ubah/jadwal/{{ $jad->id }}" class="btn btn-success rounded-pill" title="Ubah jadwal petugas"><i class="fa fa-edit"></i></a>
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