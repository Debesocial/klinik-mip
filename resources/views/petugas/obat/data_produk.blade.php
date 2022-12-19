@extends('layouts.dashboard.app')
@section('title', 'Data Produk Kesehatan')
@section('obalkes', 'active')
@section('obat', 'active')
@section('produk', 'active')
@section('judul', 'Data Produk Kesehatan')
<style>
    td {
        width: auto;
  min-width: 0;
  max-width: 200px;
  text-overflow: ellipsis;
  white-space: normal;
    }
</style>
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('obat.addproduk') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('obat.dataproduk') }}" }})
                </script>
            @endif
            <table class="table" id="table1" width="100%">
                <thead>
                    <tr>
                        <td>Tanggal dibuat</td>
                        <th>Nama </th>
                        <th>Satuan </th>
                        <th>Bobot </th>
                        <th>Komposisi </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $pro)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($pro->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($pro->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $pro->nama_produk }}</td>
                        <td>{{ $pro->satuan_obat->satuan_obat }}</td>
                        <td>{{ $pro->bobot_obat->bobot_obat }}</td>
                        <td class="line" style="white-space: normal !important;">{{ $pro->komposisi }}</td>
                            <td><div class="buttons">
                                <a href="/ubah/produk/{{ $pro->id }}" class="btn btn-success rounded-pill" title="Ubah data produk kesehatan"><i class="fa fa-edit"></i></a>
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