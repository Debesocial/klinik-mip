@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Jalan')
@section('rekam', 'active')
@section('rawat', 'active')
@section('jalan', 'active')

@section('judul', 'Daftar Pasien Rawat Jalan')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                <a href="" class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>ID Rekam Medis </th>
                        <th>Nomor Induk Karyawan</th>
                        <th>Nama Pasien</th>
                        <td>Perusahaan</td>
                        <td>Diagnosa</td>
                        <td>AKsi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RM2212001</td>
                        <td>121328201822</td>
                        <td>Martuani</td>
                        <td>MIP</td>
                        <td>Demam</td>
                        <td><div class="buttons">
                            <a href="" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                            </div></td>
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