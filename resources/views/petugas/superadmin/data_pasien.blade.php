@extends('layouts.dashboard.app')

@section('title', 'Data Pasien')


<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Data Pasien')
        @section('container')
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="buttons" width="100px">
                        <a href="{{ route('superadmin.adddatapasien') }}" class="btn btn-success rounded-pill">
                            <i class="fa fa-plus"></i>
                        <span>Create</span></a>
                    </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{ $pasien['nama_pasien'] }}</td>
                            <td>{{ $pasien['tempat_lahir'] }}</td>
                            <td>{{ $pasien['tanggal_lahir'] }}</td>
                            <td>{{ $pasien['alamat'] }}</td>
                            <td>{{ $pasien['pekerjaan'] }}</td>
                            <td>{{ $pasien['telepon'] }}</td>
                            <td><div class="buttons" width="100px">
                                <a href="" title="View Data Pasien" href="#"
                                class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-success rounded-pill" title="Edit" 
                                        ><i class="fa fa-edit"></i></a>
                                </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    
    <!-- // Basic multiple Column Form section end -->
    
</div>
@include('sweetalert::alert') 
@endsection