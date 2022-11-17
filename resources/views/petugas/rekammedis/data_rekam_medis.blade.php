@extends('layouts.dashboard.app')

@section('title', 'Data Rekam Medis')


@section('judul', 'Data Rekam Medis')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.rekammedis') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        
                        <th>ID Rekam Medis</th>
                        <th>NIK</th>
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
                        
                            <td>{{ $pas['no_rekam_medis'] }}</td>
                            <td>{{ $pas['NIK'] }}</td>
                            <td>{{ $pas['nama_pasien'] }}</td>
                            <td><?php 
                                $tanggal_lahir = $pas->tanggal_lahir;
                                $lahir    =new DateTime($tanggal_lahir);
                                $today        =new DateTime('today');
                                $usia = $today->diff($lahir);
                                echo $usia->y; echo " Tahun ";
                                ?></td>
                            <td>{{ $pas->perusahaan->nama_perusahaan_pasien }}</td>
                            <td>{{ $pas->jabatan->nama_jabatan }}</td>
                            <td><?php
                                $pass = $pas->alergi_obat;
                                switch($pass) {
                                  case 0:
                                    echo "";
                                    break;
                                  case 1:
                                    echo "<i class='fa fa-check'></i>";
                                    break;
                                }
                                ?></td>
                            <td><div class="buttons">
                                <a href="/view/rekam/medis/{{ $pas->id}}" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
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