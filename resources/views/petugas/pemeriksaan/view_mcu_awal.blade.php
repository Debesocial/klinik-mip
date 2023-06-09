@extends('layouts.dashboard.app')

@section('title', 'MCU Awal')
@section('judul', 'MCU Awal')
@section('breadcrumb', 'view_mcu_awal')
@section('pemeriksaan', 'active')
@section('mcu', 'active')

@section('container')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <h5>Hasil MCU Awal - <b>{{ $mcuawal->id_mcu_awal }}</b></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <p>Tanggal Pemeriksaan <b> {{ date('d-m-Y H:i', strtotime($mcuawal->created_at)) }} </b></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>Biodata Pasien</h6>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Nama Pasien</th>
                                <td id="nama">: {{ $mcuawal->pasien->nama_pasien }}</td>
                            </tr>
                            <tr>
                                <th>ID Rekam Medis</th>
                                <td id="rekam_medis">: {{ $mcuawal->pasien->id_rekam_medis }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Karyawan</th>
                                <td id="nomor_induk_karyawan">: {{ $mcuawal->pasien->NIK }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Tanggal Lahir</th>
                                <td id="ttl">:
                                    {{ $mcuawal->pasien->tempat_lahir . ', ' . $mcuawal->pasien->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td id="alamat">: {{ $mcuawal->pasien->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td id="pekerjaan">: {{ $mcuawal->pasien->pekerjaan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6>Hasil Pemeriksaan</h6>
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Hasil Rekomendasi</th>
                                <td id="_hasil_pemantauan_id">: {{ cekRekomendasi($mcuawal->hasil_rekomendasi) }}</td>
                            </tr>
                            <tr>
                                <th>Anjuran</th>
                                <td id="_anjuran">: {{ $mcuawal->anjuran }}</td>
                            </tr>
                        </tbody>
                    </table>
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
            console.log("Unfortunately, your browser doesn't support this API");
        }
    </script>
@stop

@endsection
