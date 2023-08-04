@extends('layouts.dashboard.app')
@section('title', 'Aturan Pakai')
@section('periksa', 'active')
@section('aturan', 'active')
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Aturan Pakai</h3>
                    {{ Breadcrumbs::render('aturan_pakai') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="/aturan_pakai/add" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "/aturan_pakai" }})
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
                        @foreach ($aturan_pakai as $aturan)
                        <tr>
                            <td class="text-center lower">{{ $aturan->singkatan }}</td>
                            <td class="text-center">{{ $aturan->kepanjangan??'-' }}</td>
                            <td class="text-center">{{ $aturan->arti??'-' }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/aturan_pakai/ubah/{{ $aturan->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
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