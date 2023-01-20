@extends('layouts.dashboard.app')

@section('title', 'Data Pemeriksaan Covid-19')
@section('pemeriksaan', 'active')
@section('screen', 'active')
@section('covid', 'active')

@section('judul', 'Data Pemeriksaan Covid-19')
@section('container')

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="buttons" width="100px">
                    <a href="{{ route('superadmin.pemeriksaancovid') }}" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i>
                    <span>Tambah</span></a>
                </div>
        </div>
        <div class="card-body">
            @if (Session('message'))
            <script>Swal.fire({ 
                icon: "success", 
                text: "{{Session('message')}}" }).then((result) => {
                if (result.isConfirmed) { window.location.href = "{{ route('pemeriksaan.datapemeriksaancovid') }}" }})
                </script>
            @endif
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Tanggal dibuat</th>
                        <th>Nama Pasien</th>
                        <th>Pemeriksaan Antigen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($covid as $cov)
                    <tr>
                        <td><B>{{ Carbon\Carbon::parse($cov->created_at)->isoFormat('D MMMM Y') }}</B>
                            <br>{{ Carbon\Carbon::parse($cov->created_at)->format('H:i:s') }}
                        </td>
                            <td>{{ $cov->pasien->nama_pasien }}</td>
                            <td>{{ $cov->pemeriksaan->kebutuhan }}</td>
                            <td><div class="buttons">
                                <a href="/view/pemeriksaan/covid/{{ $cov->id }}" title="print Data" href="#" class="btn btn-light rounded-pill"><i class="fa fa-eye"></i></a>
                                <a href="/ubah/pemeriksaan/covid/{{ $cov->id }}" class="btn btn-success rounded-pill" title="Edit"><i class="fa fa-edit"></i></a>
                                </div></td>
                    </tr>
                    @endforeach
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