@extends('layouts.dashboard.app')
@section('title', 'Dosis')
@section('periksa', 'active')
@section('dosis', 'active')
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Dosis</h3>
                    {{ Breadcrumbs::render('dosis') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="/dosis/add" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "/dosis" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width=100%>
                    <thead>
                        <tr>
                            <th width=25%>Singkatan</th>
                            <th width=25%>Kepanjanagan</th>
                            <th width=25%>Arti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosis as $dos)
                        <tr>
                            <td class="text-center lower">{{ $dos->singkatan }}</td>
                            <td class="text-center">{{ $dos->kepanjangan??'-' }}</td>
                            <td class="text-center">{{ $dos->arti??'-' }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/dosis/ubah/{{ $dos->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
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

@endsection