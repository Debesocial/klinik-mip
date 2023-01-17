@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Jalan')
@section('rekam', 'active')
@section('rawat', 'active')
@section('jalan', 'active')

@section('judul', 'Daftar Pasien Rawat Jalan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('rawatjalan.addrawatjalan') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('rawatjalan.daftarrawatjalan') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
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
                        <td><div class="buttons">
                            <a href="/view/rawat/jalan/{{  $jalan->id  }}" title="Lihat Data" href="#" class="btn btn-light rounded-pill"><i class="fa fa-eye"></i></a>
                            <a href="/ubah/rawat/jalan/{{  $jalan->id  }}" class="btn btn-success rounded-pill" title="Ubah Data"><i class="fa fa-edit"></i></a>
                        </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section

<!-- // Basic multiple Column Form section end -->

</div>
@include('sweetalert::alert') 
@endsection