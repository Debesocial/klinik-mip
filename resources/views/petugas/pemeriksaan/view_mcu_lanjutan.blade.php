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
                                <th>Jenis Pemeriksaan</th>
                                <td id="_jenis_mcu">: {{ cekMcu($mculanjutan->jenis_mcu) }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td id="_tanggal_pemeriksaan">: {{ tanggal($mculanjutan->tanggal_pemeriksaan, false) }}</td>
                            </tr>
                            {{-- <tr>
                                <th>Jenis Pemeriksaan</th>
                                <td id="_jenis_pemeriksaan">: {{ cekMcu($mculanjutan->jenis_pemeriksaan) }}</td>
                            </tr> --}}
                            <tr>
                                
                                 @php
                                    $vendor = [1=>'Rumah Sakit',2=>'Laboratorium',3=>'Perusahaan Jasa K3', 4=>'Lain'];
                                    $id = $mculanjutan->id_jenis_vendor_mcu;
                                @endphp
                                <th>Penyedia/Vendor</th>
                                <td>: {{($id!=4?$vendor[$id]:$mculanjutan->others_jenis_vendor_mcu)}}</td></td>
                            </tr>
                            <tr>
                                <th>Nama Vendor</th>
                                <td>: {{$mculanjutan->nama_vendor_mcu}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td id="_status">: 
                                    {{ cekRekomendasi($mculanjutan->status) }} <br>
                                    @if ($mculanjutan->status == 2 || $mculanjutan->status == 3)
                                    <a href="/surat/rujukan?id_pasien={{$mculanjutan->pasien->id}}" >
                                        <small>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                                                <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                                <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                                <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                                            </svg>
                                            Buat surat rujukan
                                        </small></a>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <th>File Pendukung</th>
                                <td>
                                    @if ($mculanjutan->dokumen)
                                         <a href="{{asset('pemeriksaan/mcuLanjut/'.$mculanjutan->dokumen)}}" target="_blank" rel="noopener noreferrer">: {{$mculanjutan->dokumen}}</a>
                                    @else
                                        : <small class="text-warning"> Belum ada dokumen</small>
                                    @endif 
                                </td>
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
                @if (session()->exists('rujuk'))
                    Swal.fire({
                        icon: "success",
                        title: "{{ session()->get('rujuk')[0] }}",
                        html: "{!! session()->get('rujuk')[1] !!}",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya',
                        cancelButtonText : 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/surat/rujukan?id_pasien={{$mculanjutan->pasien->id}}";
                        }
                    })
                    {{ session()->forget('rujuk') }}
                @endif
            }
        } else {
            // console.log("Unfortunately, your browser doesn't support this API");
        }
    </script>
@stop
@endsection
