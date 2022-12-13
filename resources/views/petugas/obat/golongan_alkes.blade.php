@extends('layouts.dashboard.app')
@section('title', 'Golongan Alat Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('golkes', 'active')
@section('judul', 'Data Golongan Alat Kesehatan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('obat.addgolonganalkes') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('obat.golonganalkes') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Golongan Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($golonganalkes as $alkes)
                    <tr>
                        <td>{{ $alkes['golongan_alkes'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/golongan/alkes/{{ $alkes->id }}" class="btn btn-success rounded-pill" title="Ubah golongan alkes"><i class="fa fa-edit"></i></a>
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