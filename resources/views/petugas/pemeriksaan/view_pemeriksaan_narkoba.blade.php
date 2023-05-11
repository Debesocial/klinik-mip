@extends('layouts.dashboard.app')

@section('title', 'Lihat Pemeriksaan Narkotika')
@section('breadcrumb', 'lihat_pemeriksaan_narkoba')
@section('pemeriksaan', 'active')
@section('narko', 'active')
@section('judul', 'Lihat Pemeriksaan Narkotika')
@section('container')
@section('css')
    <style>
        th{
            white-space: nowrap;
            vertical-align: top;
        }
    </style>
@stop

<section>
    <div class="card">
        <div class="card-body">
            <p>Tanggal Pemeriksaan :<b>{{ $narkoba->created_at }}</b></p>
            <div class="row mb-3">
                <div class="col-md-7">
                    <div class="row mb-2">
                        <h5 class="card-title">Biodata Pasien</h5>
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <td id="nama">: {{ $narkoba->pasien->nama_pasien }}</td>
                                    </tr>
                                    <tr>
                                        <th>ID Rekam Medis</th>
                                        <td id="rekam_medis">: {{ $narkoba->pasien->id_rekam_medis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Tanggal Lahir</th>
                                        <td id="ttl">: {{ $narkoba->pasien->tempat_lahir.', '.$narkoba->pasien->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td id="alamat">: {{ $narkoba->pasien->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td id="pekerjaan">: {{ $narkoba->pasien->pekerjaan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Penggunaan Obat</h5>
                            @if ($narkoba->penggunaan_obat==null)
                                <p>Pasien tidak ada menggunakan obat dalam seminggu terakhir</p>
                            @else
                                <p class="mb-0">Penggunaan Obat pasien dalam satu minggu terakhir</p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Cara penggunaan obat</th>
                                            <td id="penggunaan_obat">: {{ $narkoba->penggunaan_obat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis obat</th>
                                            <td id="jenis_obat">: {{ $narkoba->jenis_obat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Asal obat</th>
                                            <td id="asal_obat">: {{ $narkoba->asal_obat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Terakhir digunakan</th>
                                            <td id="terakhir_digunakan">: {{  $narkoba->terakhir_digunakan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h5 class="card-title">Hasil Test Urin</h5>
                    <table class="table table-striped table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>Amphetamine(AMP)</th>
                                <td id="review-amp">
                                    <span class="badge bg-{{ ($narkoba->amp==0)? 'primary':'danger' }}">{{ ($narkoba->amp==0) ? 'Negatif':'Positif' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Methamphetamine(MET)</th>
                                <td id="review-met">
                                    <span class="badge bg-{{ ($narkoba->met==0)? 'primary':'danger' }}">{{ ($narkoba->met==0) ? 'Negatif':'Positif' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>TetraHydroCannibinol(THC)
                                </th>
                                <td id="review-thc">
                                    <span class="badge bg-{{ ($narkoba->thc==0)? 'primary':'danger' }}">{{ ($narkoba->thc==0) ? 'Negatif':'Positif' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Benzodiazepine(BZO)</th>
                                <td id="review-bzo">
                                    <span class="badge bg-{{ ($narkoba->bzo==0)? 'primary':'danger' }}">{{ ($narkoba->bzo==0) ? 'Negatif':'Positif' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Morphine(MOP)</th>
                                <td id="review-mop">
                                    <span class="badge bg-{{ ($narkoba->mop==0)? 'primary':'danger' }}">{{ ($narkoba->mop==0) ? 'Negatif':'Positif' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Cocaine(COC)</th>
                                <td id="review-coc">
                                    <span class="badge bg-{{ ($narkoba->coc==0)? 'primary':'danger' }}">{{ ($narkoba->coc==0) ? 'Negatif':'Positif' }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

@include('sweetalert::alert') 
@endsection