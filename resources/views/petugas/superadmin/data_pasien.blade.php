@extends('layouts.dashboard.app')
@section('title', 'Data Pasien')
@section('kate', 'active')
@section('da', 'active')
@section('pasien', 'active')

@section('judul', 'Data Pasien')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="{{ route('superadmin.adddatapasien') }}" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.datapasien') }}" }})
                </script>
            @endif
            <table class="table" id="table1" width="100%">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Alergi</th>
                        <th>Hamil/Menyusui</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $patient)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($patient->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($patient->created_at)->format('H:i:s') }}
                        </td>
                        <td style="width: 80px;">{{ $patient['nama_pasien'] }}</td>
                        <td><?php
                            $tanggal_lahir = $patient->tanggal_lahir;
                            $lahir    = new DateTime($tanggal_lahir);
                            $today        = new DateTime('today');
                            $usia = $today->diff($lahir);
                            echo $usia->y;
                            echo " Tahun ";
                            ?></td>
                        <td>{{ $patient['jenis_kelamin'] }}</td>
                        <td>{{ $patient->perusahaan->nama_perusahaan_pasien }}</td>
                        <td>{{ $patient->jabatan->nama_jabatan }}</td>
                        <td>
                            <i class="{{ $patient->alergi_obat == 1 ? "fas fa-check" : "fas fa-times" }}"></i>
                            </td>
                        <td style="width: 50px"><i class="{{ $patient->hamil_menyusui == 1 ? "fas fa-check" : "fas fa-times" }}"></i></td>
                        <td>
                            <div class="buttons" width="100px">
                                <a href="/ubah/data/pasien/{{ $patient->id }}" class="btn btn-success rounded-pill" title="Ubah data pasien"><i class="fa fa-edit"></i></a>
                                <a href="/view/data/pasien/{{ $patient->id }}" title="View Data Pasien" href="#" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@include('sweetalert::alert')
@endsection