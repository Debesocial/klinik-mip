@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Inap')
@section('rawat', 'active')
@section('inap', 'active')
@section('daftar', 'active')

@section('judul', 'Daftar Pasien Rawat Inap')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Pasien Rawat Inap</h4>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>ID Rekam Medis </th>
                        <th>ID Rawat Inap</th>
                        <th>Nomor Induk Karyawan</th>
                        <th>Nama Pasien</th>
                        <th>Mulai Rawat Inap</th>
                        <th>Umur</th>
                        <td>Perusahaan</td>
                        <td>Diagnosa</td>
                        <td>Status</td>
                        <td>AKsi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RM2212001</td>
                        <td>RI22120001</td>
                        <td>121u328201822</td>
                        <td>Martuani</td>
                        <td>02 Desember 2022</td>
                        <td>03 Desember 2022</td>
                        <td>21 tahun</td>
                        <td>Demam</td>
                        <td>Non-aktif</td>
                        <td><div class="buttons">
                            <a href="/lihat/rekam/medis" title="Lihat Data" class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
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