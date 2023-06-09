@extends('layouts.dashboard.app')
@section('title', 'Lihat Data Pasien')
@section('judul', 'Lihat Data Pasien')
@section('breadcrumb', 'lihat_data_pasien')
@section('container')

    <section id="multiple-column-form">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Data Pasien</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>Kategori pasien</th>
                                                <td>: {{ $pasien->kategori->nama_kategori }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pasien</th>
                                                <td>: {{ ucwords($pasien->nama_pasien) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Induk Karyawan</th>
                                                <td>: {{ $pasien->NIK ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Induk Kependudukan</th>
                                                <td>: {{ $pasien->penduduk ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Perusahaan</th>
                                                <td>: {{ $pasien->perusahaan->nama_perusahaan_pasien??'-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Divisi</th>
                                                <td>: {{ ($pasien->divisi->nama_divisi_pasien)??'-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td>: {{ $pasien->jabatan->nama_jabatan??'-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tempat/Tanggal Lahir</th>
                                                <td>: {{ $pasien->tempat_lahir . ', ' . $pasien->tanggal_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>: {{ $pasien->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>: {{ $pasien->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat Mess</th>
                                                <td>: {{ $pasien->alamat_mess ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td>: {{ ucfirst($pasien->pekerjaan) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th>
                                                <td>: {{ $pasien->telepon ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>: {{ $pasien->email ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Data Keluarga</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>Nama Keluarga</th>
                                                <td>{{ $pasien->keluarga->nama ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Hubungan Keluarga</th>
                                                <td>{{ $pasien->keluarga->hubungan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $pasien->keluarga->alamat ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pekerjaan</th>
                                                <td>{{ $pasien->keluarga->pekerjaan ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Telepon</th>
                                                <td>{{ $pasien->keluarga->telepon ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $pasien->keluarga->email ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
