@extends('layouts.dashboard.app')

@section('title', 'Data Keterangan Berobat')
@section('berobat', 'active')

@section('judul', 'Data Keterangan Berobat')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.keteranganberobat') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.dataketeranganberobat') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal dibuat</th>
                        <th>Nama Pasien</th>
                        <th>Kliniks</th>
                        
                        <th>Resep</th>
                        <th>Saran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keterangan as $ket)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($ket->created_at)->format('d F Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($ket->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $ket->pasien->nama_pasien }}</td>
                            <td>{{ $ket->klinik }}</td>
                            
                            <td>{{ $ket->resep }}</td>
                            <td>{{ $ket->saran }}</td>
                            <td><div class="buttons">
                                <a href="/print/ket/berobat/{{ $ket->id }}" title="print Data" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-print"></i></a>
                                <a href="/ubah/ket/berobat/{{ $ket->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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