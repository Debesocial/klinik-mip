@extends('layouts.dashboard.app')

@section('title', 'Data Keterangan Sehat')
@section('keterangansehat', 'active')

@section('judul', 'Data Keterangan Sehat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.keterangansehat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.dataketerangansehat') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal </th>
                        <th>Nama Pasien</th>
                        <th>Tempat</th>
                        <th>riwayat</th>
                        <th>Obat yang Diberikan</th>
                        <th>Hasil Pengobatan</th>
                        <th>Dokter Spesialis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
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