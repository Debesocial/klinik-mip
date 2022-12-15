@extends('layouts.dashboard.app')
@section('title', 'Pemeriksaan Antigen')
@section('md', 'active')
@section('periksa', 'active')
@section('anti', 'active')

@section('judul', 'Data Pemeriksaan Antigen')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.addpemeriksaanantigen') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.pemeriksaanantigen') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Pemeriksaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemeriksaanantigen as $pemeriksaaan)
                    <tr>
                        <td>{{ $pemeriksaaan['kebutuhan'] }}</td>
                        <td>
                            <div class="buttons">
                                <a href="/ubah/pemeriksaan/antigen/{{ $pemeriksaaan['id'] }}" class="btn btn-success rounded-pill" title="Ubah pemeriksaan antigen"><i class="fa fa-edit"></i></a>
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