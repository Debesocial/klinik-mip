@extends('layouts.dashboard.app')

@section('title', 'Data Keterangan Berobat')
@section('berobat', 'active')
{{-- @section('judul', 'Data Keterangan Berobat') --}}

{{-- <style>
    td {
        width: auto;
  min-width: 0;
  max-width: 50px;
  text-overflow: ellipsis;
  white-space: normal;
    }
</style> --}}

@section('container')

    <section class="section">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-heading">
                    <h3>Data Keterangan Berobat</h3>
                    {{ Breadcrumbs::render('keterangan_berobat') }}
                </div>
            </div>
            <div class="col">
                <div class="buttons text-end">
                    <a href="{{ route('superadmin.addketeranganberobat') }}" class="btn btn-success rounded-pill">
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
                                window.location.href = "{{ route('superadmin.dataketeranganberobat') }}"
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
                                <th>Klinik </th>
                                <th>Resep</th>
                                <th>Saran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keterangan->sortByDesc('created_at') as $ket)
                                <tr>
                                    <td>{{tanggal($ket->created_at)}}</td>
                                    <td style="width: 110px">{{ $ket->pasien->nama_pasien }}</td>
                                    <td>{{ $ket->rumahsakitrujukan->nama_RS_rujukan }}</td>

                                    <td
                                        style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">
                                        {{ $ket->resep }}</td>
                                    <td
                                        style="width: auto; min-width: 0; max-width: 200px; text-overflow: ellipsis; white-space: normal;">
                                        {{ $ket->saran }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="/ubah/ket/berobat/{{ $ket->id }}"
                                                class="btn btn-outline-secondary" title="Edit"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <a href="/print/keterangan-berobat/{{ $ket->id }}" title="print Data"
                                                href="#" target="_blank" class="btn btn-outline-secondary"><i
                                                    class="bi bi-printer-fill"></i></a>
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
