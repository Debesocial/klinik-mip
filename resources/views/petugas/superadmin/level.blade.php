@extends('layouts.dashboard.app')
@section('title', 'Data Level Petugas')
@section('data', 'active')
@section('level', 'active')
@section('side', 'active')


{{-- @section('judul', 'Data Level Petugas') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Level Petugas</h3>
                    <div>{{ Breadcrumbs::render('level_petugas') }}</div>
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end" >
                    <a href="{{ route('superadmin.addlevel') }}" class="btn btn-success rounded-pill">
                        <i class="bi bi-plus-circle"></i>
                        <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width=100%>
                    <thead>
                        <tr>
                            <th style="width: 70%">Level</th>
                            <th style="width: 30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($level as $lev)
                        <tr>
                            <td>{{ $lev['nama_level'] }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" >
                                    <a href="/ubah/level/{{ $lev->id }}" class="btn btn-outline-secondary" title="Ubah level petugas"><i class="bi bi-pencil-square"></i></a>
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

<script>
    @if($message = session('succes_message'))
    Swal.fire(
      'Good job!',
      '{{ $message }}',
      'success'
    )
    function(){ 
       location.reload();
   }
    @endif
    </script>
@endsection