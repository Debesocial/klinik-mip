@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Jalan')
@section('pemeriksaan', 'active')
@section('rawat', 'active')
@section('jalan', 'active')

{{-- @section('judul', 'Daftar Pasien Rawat Jalan') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Daftar Pasien Rawat Jalan</h3>
                    {{ Breadcrumbs::render('rawat_jalan') }}
            </div>
        </div>
        <div class="col">
            @if (Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "perawat")

            <div class="buttons text-end">
                <a href="{{ route('rawatjalan.addrawatjalan') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
                
            @endif
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
                <table class="table table-hover" id="table1" width="auto">
                    <thead>
                        <tr>
                            <th>ID Rawat Jalan</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Berobat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rawat_jalan->sortByDesc('tanggal_berobat') as $jalan)
                        <tr>
                            <td class="text-center">{{ $jalan->id_rawat_jalan }}</td>
                            <td><a href="#" onclick="tampilModalPasien({{ json_encode($jalan->pasien) }})">{{ $jalan->pasien->nama_pasien }}</a></td>
                            <td class="text-center">{{ tanggal($jalan->tanggal_berobat, false) }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="/view/rawat/jalan/{{  $jalan->id  }}" title="Lihat Data" href="#" class="btn btn-outline-secondary"><i class="bi bi-eye-fill"></i></a>
                                @if (Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                                <a href="/ubah/rawat/jalan/{{  $jalan->id  }}" class="btn btn-outline-secondary" title="Ubah Data"><i class="bi bi-pencil-square"></i></a>
                                @endif
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