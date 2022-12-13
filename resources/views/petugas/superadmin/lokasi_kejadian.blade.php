@extends('layouts.dashboard.app')

@section('title', 'Lokasi Kejadian')
@section('md', 'active')
@section('periksa', 'active')
@section('lok', 'active')

@section('judul', 'Lokasi Kejadian')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.addlokasikejadian') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.lokasikejadian') }}" }})
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
                    @foreach ($lokasi_kejadians as $lokasikejadian)
                    <tr>
                        <td>{{ $lokasikejadian['nama_lokasi'] }}</td>
                        <td><div class="buttons">
                            <a href="/ubah/lokasi/kejadian/{{ $lokasikejadian['id'] }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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