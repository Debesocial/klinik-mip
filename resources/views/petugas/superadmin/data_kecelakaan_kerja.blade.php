@extends('layouts.dashboard.app')

@section('title', 'Data Kecelakaan Kerja')
@section('kecelakaan', 'active')

@section('container')

    <section class="section">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-heading">
                    <h3>Data Kecelakaan Kerja</h3>
                    {{ Breadcrumbs::render('kecelakaan') }}
                </div>
            </div>
            <div class="col">
                <div class="buttons text-end">
                    <a href="/kecelakaan/kerja" class="btn btn-success rounded-pill">
                        <i class="bi bi-plus-circle"></i>
                        <span>Tambah</span></a>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                @if (Session('message'))
                    <script>
                        Swal.fire({
                            icon: "success",
                            text: "{{ Session('message') }}"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('superadmin.datakecelakaankerja') }}"
                            }
                        })
                    </script>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover" id="table1" width="100%">
                        <thead>
                            <tr>
                                <th>Tanggal </th>
                                <th>Nama Pasien</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecelakaan->sortByDesc('created_at') as $ket)
                                <tr>
                                    <td class="text-center">{{tanggal($ket->created_at)}}</td>
                                    <td style="width: 110px">{{ $ket->pasien->nama_pasien }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="/ubah/kecelakan/{{ $ket->id }}" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            <a href="/print/kecelakaan/{{ $ket->id }}" title="print Data" href="#" target="_blank" class="btn btn-outline-secondary"><i class="bi bi-printer-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- // Basic multiple Column Form section end -->

    </div>
    @include('sweetalert::alert')
@endsection
