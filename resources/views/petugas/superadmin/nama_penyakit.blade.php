@extends('layouts.dashboard.app')
@section('title', 'Nama Penyakit')
@section('md', 'active')
@section('periksa', 'active')
@section('dia', 'active')

{{-- @section('judul', 'Data Nama Penyakit') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Nama Penyakit</h3>
                    {{ Breadcrumbs::render('nama_penyakit') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                <a href="{{ route('superadmin.addnamapenyakit') }}" class="btn btn-success rounded-pill">
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
                if (result.isConfirmed) { window.location.href = "{{ route('superadmin.namapenyakit') }}" }})
                </script>
            @endif
            <div class="table-responsive">
                <table class="table table-hover" id="table-penyakit" width=100%>
                    <thead>
                        <tr>
                            <th width=22%>Nama Penyakit</th>
                            <th width=22%>Blok</th>
                            <th width=22%>Categories</th>
                            <th width=22%>Chapter</th>
                            <th width=2%>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($namapenyakit as $nama)
                        <tr>
                            <td >{{ $nama->primer }}</td>
                            <td>{{ $nama->sub_klasifikasi->nama_penyakit }}</td>
                            <td>{{ $nama->category->nama_penyakit }}</td>
                            <td>{{$nama->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/nama/penyakit/{{ $nama['id'] }}" class="btn btn-outline-secondary" title="Ubah diagnosa"><i class="bi bi-pencil-square"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@section('js')
<script>
    $('#table-penyakit').DataTable( {
        serverSide: true,
        processing: true,
        ajax: {
            url: "{{url('/get-penyakit')}}",
            type: "GET"
        },
        columns:[
            {data:'primer'},
            {data:'sub'},
            {data:'category'},
            {data:'klasifikasi'},
            {
                data:null, 
                render: function(data){
                    return `<div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/ubah/nama/penyakit/`+data.id+`" class="btn btn-outline-secondary" title="Ubah diagnosa"><i class="bi bi-pencil-square"></i></a>
                                </div>`;
                }
            }
        ],
        "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                "infoEmpty": "Menampikan 0 sampai 0, dari 0 data",
                "zeroRecords": "Tidak ditemukan data yang cocok",
                "infoFiltered": "(Didapatkan dari _MAX_ total seluruh data)",
            },
            scrollY: 400,
            scrollX: true,
            "columnDefs": [ {
                "targets": 4,
                "orderable": false
            } ],
            'autoWidth': true,
            "oLanguage": {
                "sProcessing": `<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="visually-hidden">Memuat...</span>
                                </div>`
            }
    } );
</script>
    
@endsection
@endsection