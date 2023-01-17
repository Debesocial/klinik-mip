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
                        <th>Tanggal Pemeriksaan</th>
                        <th>ID Rekam Medis</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                        <th>Hasil Pemeriksaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sehat as $ket)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($ket->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($ket->created_at)->format('H:i:s') }}
                        </td>
                        <td style="width: 80px;">{{ $ket->pasien->id_rekam_medis }}</td>
                        <td style="width: 80px;">{{ $ket->pasien->nama_pasien }}</td>
                        <td>{{ $ket->pasien->alamat }}</td>
                        <td><i class="{{ $ket->hasil == 1 ? "fas fa-check" : "fas fa-times" }}"></i></td>
                        <td>
                            <div class="buttons" width="100px">
                                <a href="" title="Print Data " class="btn btn-light rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/keterangan/sehat/{{$ket->id}}" class="btn btn-success rounded-pill" title="Ubah data pasien"><i class="fa fa-edit"></i></a>
                            </div>
                        </td>
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