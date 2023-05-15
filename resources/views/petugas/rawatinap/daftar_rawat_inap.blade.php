@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Inap')
@section('pemeriksaan', 'active')
@section('rawat', 'active')
@section('inap', 'active')

{{-- @section('judul', 'Daftar Pasien Rawat Inap') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Daftar Pasien Rawat Inap</h3>
                    {{ Breadcrumbs::render('rawat_inap') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('rawatinap.addrawatinap') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.daftarrawatinap') }}" }})
                </script>
            @endif
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
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
                        <tr class="">
                            <td class="text-center">{{ $inap->id_rawat_inap }}</td>
                            <div hidden>{{ $inap->pasien->perusahaan->nama_perusahaan_pasien . $inap->pasien->divisi->nama_divisi_pasien . $inap->pasien->jabatan->nama_jabatan . $inap->pasien->keluarga}}</div>
                            <td><a href="#" onclick="tampilModalPasien({{ json_encode($inap->pasien) }})">{{ $inap->pasien->nama_pasien }}</a></td>
                            <td class="text-center">{{ tanggal($inap->mulai_rawat) }}</td>
                            <td class="text-center">{!! $inap->berakhir_rawat? tanggal($inap->berakhir_rawat, false): '<span class="badge bg-primary">Masih dirawat</span>' !!}</td>
                            <td class="text-center" class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/view/rawat/inap/{{  $inap->id  }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                    <a href="/ubah/rawat/inap/{{  $inap->id  }}" class="btn btn-outline-secondary" title="Ubah Data"><i class="bi bi-pencil-square"></i></a>
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

@include('sweetalert::alert') 
@endsection