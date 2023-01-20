@extends('layouts.dashboard.app')

@section('title', 'Data Pemantauan Tanda Vital')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('tandavital', 'active')

@section('judul', 'Data Pemantauan Tanda Vital')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.pemantauantandavital') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datapemantauantandavital') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal dibuat</th>
                        <th>ID Rekam Medis</th>
                        <th>Nama Pasien</th>
                        <th>Skala Nyeri</th>
                        <th>Saturasi Oksigen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemantauan as $pantau)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($pantau->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($pantau->created_at)->format('H:i:s') }}
                        </td>
                        <td>{{ $pantau->pasien->id_rekam_medis }}</td>
                            <td>{{ $pantau->pasien->nama_pasien }}</td>
                            <td>{{ $pantau->skala_nyeri }}</td>
                            <td>{{ $pantau->saturasi_oksigen }}</td>
                            <td><div class="buttons">
                                <a href="/view/pemantauan/tandavital/{{$pantau->id}}" title="Lihat Data" href="#" class="btn btn-light rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/pemantauan/tandavital/{{$pantau->id}}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
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