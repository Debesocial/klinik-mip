@extends('layouts.dashboard.app')

@section('title', 'Daftar Pasien Rawat Inap')


@section('judul', 'Daftar Pasien Rawat Inap')
@section('container')

<section class="section">
    <div class="card">
        
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nomor Induk Karyawan</th>
                        <th>Nama</th>
                        <th>Mulai Rawat Inap</th>
                        <th>Berakhir Rawat Inap</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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