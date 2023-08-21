@extends('layouts.dashboard.app')
@section('title', 'Data Pasien')
@section('kate', 'active')
@section('da', 'active')
@section('pasien', 'active')

{{-- @section('judul', 'Data Pasien') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Pasien</h3>
                    <div>{{ Breadcrumbs::render('data_pasien') }}</div>
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end" >
                <a href="{{ route('superadmin.adddatapasien') }}" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datapasien') }}" }})
                </script>
            @endif
           
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width="auto">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Kategori</th>
                            <th>Alergi</th>
                            <th>Hamil/Menyusui</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens->sortByDesc('id_rekam_medis') as $patient)
                        @php
                            $alergi = json_decode($patient->alergi);
                            $showAlergi = "<ul>";
                            if (is_array($alergi)) {
                                foreach ($alergi as $a) {
                                    $showAlergi .= "<li>".$obat->find($a)?->nama_obat."</li>";
                                }
                            }
                            $showAlergi .= "</ul>";
                        @endphp
                        <tr>
                            <td style="white-space: nowrap;">
                                @if (!$patient->id_rekam_medis)
                                <span class="badge bg-warning">Belum Terdaftar</span>
                                @else
                                <B>{{ Carbon\Carbon::parse($patient->created_at)->isoFormat('D MMMM Y') }}</B>
                                <br>{{ Carbon\Carbon::parse($patient->created_at)->format('H:i:s') }}
                                @endif
                            </td>
                            <td>{{ $patient['nama_pasien'] }}</td>
                            <td>{{ umur($patient->tanggal_lahir)}}</td>
                            <td>{{ $patient['jenis_kelamin'] }}</td>
                            <td>{{$patient->kategori->nama_kategori}}</td>
                            <td class="">
                                {!! $patient->alergi_obat == 1 ? '<div class="text-center"><i class="fas fa-check text-primary"></i></div>'.$showAlergi: '<div class="text-center"><i class="fas fa-times text-danger"></i></div>' !!}
                                </td>
                            <td class="text-center"><i class="{{ $patient->hamil_menyusui == 1 ? "fas fa-check text-primary" : "fas fa-times text-danger" }}"></i></td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/view/data/pasien/{{ $patient->id }}" title="View Data Pasien" class="btn btn-outline-secondary"><i class="bi  bi-eye-fill"></i></a>
                                    <a href="/ubah/data/pasien/{{ $patient->id }}" class="btn btn-outline-secondary" title="Ubah data pasien"><i class="bi  bi-pencil-square"></i></a>
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

@include('sweetalert::alert')
@endsection