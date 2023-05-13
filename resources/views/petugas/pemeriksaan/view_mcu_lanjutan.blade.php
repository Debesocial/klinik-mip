@extends('layouts.dashboard.app')

@section('title', 'MCU')
@section('judul', 'MCU')
@section('breadcrumb', 'view_mcu_lanjutan')
@section('pemeriksaan', 'active')
@section('mcu', 'active')

@section('container')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <h5>Hasil MCU - <b>{{ $mculanjutan->id_mcu_lanjutan }}</b></h5>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <button class="btn btn-primary">Print <i class="bi bi-printer"></i></button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-7">
                    <div class="row mb-2">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <td id="nama">: {{ $mculanjutan->pasien->nama_pasien }}</td>
                                    </tr>
                                    <tr>
                                        <th>ID Rekam Medis</th>
                                        <td id="rekam_medis">: {{ $mculanjutan->pasien->id_rekam_medis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Tanggal Lahir</th>
                                        <td id="ttl">:
                                            {{ $mculanjutan->pasien->tempat_lahir . ', ' . tanggal($mculanjutan->pasien->tanggal_lahir, false) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td id="alamat">: {{ $mculanjutan->pasien->nama_pasien }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td id="pekerjaan">: {{ $mculanjutan->pasien->nama_pasien }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Jenis MCU</th>
                                <td id="_jenis_mcu">: {{ cekMcu($mculanjutan->jenis_mcu) }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td id="_tanggal_pemeriksaan">: {{ tanggal($mculanjutan->tanggal_pemeriksaan, false) }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Pemeriksaan</th>
                                <td id="_jenis_pemeriksaan">: {{ cekMcu($mculanjutan->jenis_pemeriksaan) }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td id="_status">: {{ $mculanjutan->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="text-center">
                    <h6>Hasil Pemeriksaan</h6>
                </div>
                <div class="col-md-10 align-self-center">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <th>Deskripsi Hasil MCU</th>
                                    <td id="_deskripsi_hasil">: {{ $mculanjutan->deskripsi_hasil }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi Obat/Tindakan</th>
                                    <td id="_deskripsi_obat">: {{ $mculanjutan->deskripsi_obat }}</td>
                                </tr>
                                <tr>
                                    <th>Rekomendasi Untuk Pasien</th>
                                    <td id="_rekomendasi">: {{ $mculanjutan->rekomendasi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script>
        if (window.performance) {
            var navEntries = window.performance.getEntriesByType('navigation');
            if (navEntries.length > 0 && navEntries[0].type === 'back_forward') {
                // console.log('As per API lv2, this page is load from back/forward'); 
            } else
            if (window.performance.navigation && window.performance.navigation.type == window.performance.navigation
                .TYPE_BACK_FORWARD) {
                // console.log('As per API lv1, this page is load from back/forward'); 
            } else {
                // console.log('This is normal page load'); 
                @if (session()->exists('message'))
                    Swal.fire({
                        icon: "success",
                        text: "{{ session()->get('message') }}"
                    })
                    {{ session()->forget('message') }}
                @endif
            }
        } else {
            // console.log("Unfortunately, your browser doesn't support this API");
        }
    </script>
@stop
@endsection
