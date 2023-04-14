@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Jalan')
@section('rekam', 'active')
@section('rawat', 'active')
@section('jalan', 'active')

{{-- @section('judul', 'Daftar Pasien Rawat Jalan') --}}
@section('container')

<section class="section">
    <div class="row">
        <div class="col">
            <div class="page-heading">
                    <h3>Daftar Pasien Rawat Jalan</h3>
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('rawatjalan.addrawatjalan') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('rawatjalan.daftarrawatjalan') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>ID Rawat Inap</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Berobat</th>
                            <th>Nama Penyakit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rawat_jalan as $jalan)
                        <tr>
                            <td>{{ $jalan->id_rawat_jalan }}</td>
                            <td>{{ $jalan->pasien->nama_pasien }}</td>
                            <td>{{ $jalan->tanggal_berobat }}</td>
                            <td>{{ $jalan->namapenyakit->primer }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="/view/rawat/jalan/{{  $jalan->id  }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                <a href="/ubah/rawat/jalan/{{  $jalan->id  }}" class="btn btn-outline-secondary" title="Ubah Data"><i class="bi bi-pencil-square"></i></a>
                            </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>

<!-- // Basic multiple Column Form section end -->

</div>
@include('sweetalert::alert') 
@endsection