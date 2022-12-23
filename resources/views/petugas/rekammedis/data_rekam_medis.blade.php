@extends('layouts.dashboard.app')

@section('title', 'Data Rekam Medis')
@section('medis', 'active')

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
                        <th>Tanggal dibuat</th>
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
                    <tr>
                            <td>22 Desember</td>
                            <td>RM2212001</td>
                            <td>5271571627</td>
                            <td>Martuani</td>
                            <td>19 Tahun</td>
                            <td>MIP</td>
                            <td>Staff</td>
                            <td>Ya</td>
                            <td><div class="buttons">
                                <a href="/lihat/rekam/medis" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                </div>
                            </td>  
                            
                    </tr>
                    
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