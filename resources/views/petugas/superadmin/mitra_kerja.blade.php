@extends('layouts.dashboard.app')

@section('title', 'Data Mitra Kerja')
@section('data', 'active')
@section('mitra', 'active')
@section('side', 'active')

<div class="page-heading">
    <div class="page-title">
        @section('judul', 'Data Petugas Mitra Kerja')
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
                        <a href="{{ route('superadmin.addmitrakerja') }}" class="btn btn-success rounded-pill">
                            <i class="fa fa-plus"></i>
                        <span>Tambah</span></a>
                    </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            
                             <th>Nama</th>
                             <th>Email</th>
                             <th>Status</th>
                             <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['status'] }}</td>
                            <td><div class="buttons" width="100px">
                                <a href="" title="View Data Pasien" href="#"
                                class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                    <a href="/ubah/mitra/kerja/{{ $user->id }}" class="btn btn-success rounded-pill" title="Ubah data mitra kerja" 
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