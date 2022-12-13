@extends('layouts.dashboard.app')
@section('title', 'Data Nama Alat/Bahan Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('namkes', 'active')
@section('judul', 'Nama Alat/Bahan Kesehatan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('obat.addnamaalkes') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('obat.namaalkes') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama Alat/Bahan Kesehatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nama as $nam)
                    <tr>
                        <td>{{ $nam['nama_alkes'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/nama/alkes/{{ $nam->id }}" class="btn btn-success rounded-pill" title="Ubah nama alkes"><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@include('sweetalert::alert')
@endsection