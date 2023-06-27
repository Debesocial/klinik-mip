@extends('layouts.dashboard.app')

@section('title', 'Data Izin Istirahat')
@section('izinistirahat', 'active')

{{-- @section('judul', 'Data Izin Istirahat') --}}
@section('container')

<section class="section">
    <div class="row align-items-center">
        <div class="col">
            <div class="page-heading">
                    <h3>Data Izin Istirahat</h3>
                    {{ Breadcrumbs::render('izin_istirahat') }}
            </div>
        </div>
        <div class="col">
            <div class="buttons text-end">
                @if (Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                <a href="/izin_istirahat" class="btn btn-success rounded-pill">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah</span></a>
                    
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('istirahat.dataizinistirahat') }}" }})
                </script>
            @endif
            <div class="table-responsive pt-2 pe-2">
                <table class="table table-hover" id="table1" width=100%>
                    <thead>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <th>Nama Pasien</th>
                            <th>Rekomendasi Dokter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinistirahat->sortByDesc('created_at') as $izin)
                        <tr>
                            <td class="text-center">{{tanggal($izin->created_at)}}</td>
                            <td class="text-center">{{ $izin->pasien->nama_pasien }}</td>
                            <td class="text-center">{{ getRekomendasiDokter($izin->rekomendasi) }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    @if (Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                                    <a href="/ubah/izin_istirahat/{{$izin->id}}" class="btn btn-outline-secondary" title="Edit"><i class="bi-pencil-square   "></i></a>
                                    
                                    @endif
                                    <a href="/print/istirahat/{{{$izin->id}}}" title="print Data" target="_blank" class="btn btn-outline-secondary"><i class="bi-printer-fill"></i></a>
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