@extends('layouts.dashboard.app')

@section('title', 'Data Keterangan Berobat')
@section('berobat', 'active')
@section('judul', 'Data Keterangan Berobat')

{{-- <style>
    td {
        width: auto;
  min-width: 0;
  max-width: 50px;
  text-overflow: ellipsis;
  white-space: normal;
    }
</style> --}}

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
            <table class="table" id="table1" width="100%">
                <thead>
                    <tr>
                        <th>Tanggal </th>
                        <th>Nama Pasien</th>
                        <th>Klinik </th>
                        <th>Resep</th>
                        <th>Saran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keterangan as $ket)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($ket->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($ket->created_at)->format('H:i:s') }}
                        </td>
                        <td style="width: 110px">{{ $ket->pasien->nama_pasien }}</td>
                            <td>{{ $ket->rumahsakitrujukan->nama_RS_rujukan }}</td>
                            
                            <td style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">{{ $ket->resep }}</td>
                            <td style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">{{ $ket->saran }}</td>
                            <td><div class="buttons">
                                <a href="/print/ket/berobat/{{ $ket->id }}" title="print Data" href="#" class="btn btn-secondary rounded-pill"><i class="fa fa-print"></i></a>
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