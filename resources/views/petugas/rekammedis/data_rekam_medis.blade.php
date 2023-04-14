@extends('layouts.dashboard.app')

@section('title', 'Data Rekam Medis')
@section('rekam', 'active')
@section('rawat', 'active')
@section('medis', 'active')

{{-- @section('judul', 'Data Rekam Medis') --}}
@section('container')

<section class="section">
    <div class="row">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Rekam Medis</h3>
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.rekammedis') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('rekammedis.datarekammedis') }}" }})
                </script>
            @endif
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal dibuat</th>
                            <th>ID Rekam Medis</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Alergi Obat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $pas)
                        <tr>
                                <td><B>{{ Carbon\Carbon::parse($pas->created_at)->isoFormat('D MMMM Y') }}</B>
                                    <br>{{ Carbon\Carbon::parse($pas->created_at)->format('H:i:s') }}</td>
                                <td>{{ $pas->id_rekam_medis }}</td>
                                <td>{{ $pas->nama_pasien }}</td>
                                <td><?php
                                    $tanggal_lahir = $pas->tanggal_lahir;
                                    $lahir    = new DateTime($tanggal_lahir);
                                    $today        = new DateTime('today');
                                    $usia = $today->diff($lahir);
                                    echo $usia->y;
                                    echo " Tahun ";
                                    ?></td>
                                <td>{{ $pas->perusahaan->nama_perusahaan_pasien }}</td>
                                <td>{{ $pas->jabatan->nama_jabatan }}</td>
                                <td class="text-center"> <i class="{{ $pas->alergi_obat == 1 ? "fas fa-check text-primary" : "fas fa-times text-danger" }}"></i></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="/lihat/rekam/medis/{{ $pas->id }}" title="Lihat Data" class="btn btn-outline-secondary"><i class="bi bi-pencil-square"></i></a>
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