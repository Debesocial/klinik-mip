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
                                <td id="_hasil_pemantauan_id">: {{ cekRekomendasi($mcuawal->hasil_rekomendasi) }} 
                                    @if ($mcuawal->hasil_rekomendasi == 2 || $mcuawal->hasil_rekomendasi == 3)
                                        <a href="/surat/rujukan?id_pasien={{$mcuawal->pasien->id}}" ><br>
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
                                <th>Anjuran</th>
                                <td id="_anjuran">: {{ $mcuawal->anjuran }} 
                                   
                                </td>
                            </tr>
                            <tr>
                                <th>File Pendukung</th>
                                <td>
                                    @if (count(json_decode($mcuawal->dokumen))!=0)
                                    <ol>
                                        @foreach (json_decode($mcuawal->dokumen) as $dokumen)
                                            <li> <a href="{{asset('pemeriksaan/mcuAwal/'.$dokumen)}}" target="blank">{{$dokumen}}</a></li>
                                        @endforeach

                                    </ol>
                                    @else
                                        <small class="text-warning"> Belum ada dokumen</small>
                                    @endif 
                                </td>
                            </tr>
                            <tr>
                                @php
                                    $vendor = [1=>'Rumah Sakit',2=>'Laboratorium',3=>'Perusahaan Jasa K3', 4=>'Lain'];
                                    $id = $mcuawal->id_jenis_vendor_mcu;
                                @endphp
                                <th>Penyedia/Vendor</th>
                                <td>: {{($id!=4?$vendor[$id]:$mcuawal->others_jenis_vendor_mcu)}}</td>
                            </tr>
                            <tr>
                                <th>Nama Vendor</th>
                                <td>: {{$mcuawal->nama_vendor_mcu}}</td>
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
                            window.location.href = "/surat/rujukan?id_pasien={{$mcuawal->pasien->id}}";
                        }
                    })
                    {{ session()->forget('rujuk') }}
                @endif
            }
        } else {
            console.log("Unfortunately, your browser doesn't support this API");
        }
    </script>
@stop

@endsection
