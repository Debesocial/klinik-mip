@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Inap')
@section('rekam', 'active')
@section('rawat', 'active')
@section('inap', 'active')

@section('judul', 'Daftar Pasien Rawat Inap')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('rawatinap.addrawatinap') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.daftarrawatinap') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>ID Rawat Inap</th>
                        <th>Nama Pasien</th>
                        <th>Mulai Rawat Inap</th>
                        <th>Akhir Rawat Inap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rawat_inap as $inap)
                    <tr>
                        <td>{{ $inap->id_rawat_inap }}</td>
                        <td>{{ $inap->pasien->nama_pasien }}</td>
                        <td><B>{{ Carbon\Carbon::parse($inap->mulai_rawat)->isoFormat('D MMMM Y') }}</B></td>
                        <td><B>{{ Carbon\Carbon::parse($inap->berakhir_rawat)->isoFormat('D MMMM Y') }}</B></td>
                        <td><div class="buttons">
                            <a href="/view/rawat/inap/{{  $inap->id  }}" title="Lihat Data" href="#" class="btn btn-light rounded-pill"><i class="fa fa-eye"></i></a>
                            <a href="/ubah/rawat/inap/{{  $inap->id  }}" class="btn btn-success rounded-pill" title="Ubah Data"><i class="fa fa-edit"></i></a>
                        </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>

@include('sweetalert::alert') 
@endsection