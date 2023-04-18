@extends('layouts.dashboard.app')

@section('title', 'Data Pemantauan Tanda Vital')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('tandavital', 'active')

{{-- @section('judul', 'Data Pemantauan Tanda Vital') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Pemantauan Tanda Vital</h3>
                    {{ Breadcrumbs::render('pemantauan_tanda_vital') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.pemantauantandavital') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datapemantauantandavital') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1">
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
                                <td class="text-center">
                                   <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/view/pemantauan/tandavital/{{$pantau->id}}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                        <a href="/ubah/pemantauan/tandavital/{{$pantau->id}}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                </td>
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