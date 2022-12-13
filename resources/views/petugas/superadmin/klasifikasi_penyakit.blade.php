@extends('layouts.dashboard.app')
@section('title', 'Klasifikasi Penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('klas', 'active')

@section('judul', 'Data Klasifikasi Penyakit')
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
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.klasifikasipenyakit') }}" }})
                </script>
            @endif
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
                        <td>
                            <div class="buttons">
                                <a href="/ubah/klasifikasi/penyakit/{{ $klasifikasi['id'] }}" class="btn btn-success rounded-pill" title="Ubah klasifikasi penyakit"><i class="fa fa-edit"></i></a>
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