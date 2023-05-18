@extends('layouts.dashboard.app')

@section('title', 'Lihat Data Rawat Inap')
@section('breadcrumb', 'lihat_rawat_inap')
@section('pemeriksaan', 'active')
@section('inap', 'active')
@section('judul', 'Lihat Rawat Inap')
@section('css')
    <style>
        input[type=radio] {
            transform: scale(1.5);
            margin-right: 0.3rem;
        }

        tbody>tr>th {
            white-space: nowrap;
            vertical-align: top;
        }
    </style>
@stop
@section('container')

    <div class="card mb-3">
        <div class="card-body pb-1  ">
            <div class="row">
                <div class="col-11">
                    <h5>Rawat Inap {{ $rawat_inap->id_rawat_inap }}</h5>
                </div>
                <div class="text-end col-1">
                    <a href="#" class="toogle-show" stat=1 onclick="showDetail()"><button
                            class="btn btn-sm text-primary btn-transpatent" id="badge-toogle"><i
                                class="bi bi-chevron-up"></i></button></a>
                </div>
            </div>
            <div class="row mb-3" id="bio-pasien">
                <div class="col-md-6">
                    <div class="row mb-2">
                        <div class="table-responsive">
                            @php
                                $pasien = $rawat_inap->pasien;
                                $tanggal_lahir = $pasien->tanggal_lahir;
                                $lahir = new DateTime($tanggal_lahir);
                                $today = new DateTime('today');
                                $usia = $today->diff($lahir)->y . ' Tahun';
                            @endphp
                            <div hidden>
                                {{ $rawat_inap->pasien->perusahaan->nama_perusahaan_pasien . $rawat_inap->pasien->divisi->nama_divisi_pasien . $rawat_inap->pasien->jabatan->nama_jabatan . $rawat_inap->pasien->keluarga }}
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <td id="nama">: <a href="#"
                                                onclick="tampilModalPasien({{ json_encode($pasien) }})">{{ $pasien->nama_pasien }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ID Rekam Medis</th>
                                        <td id="rekam_medis">: {{ $pasien->id_rekam_medis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Tanggal Lahir</th>
                                        <td id="ttl">:
                                            {{ $pasien->tempat_lahir . ', ' . tanggal($pasien->tanggal_lahir, false) . ' (' . $usia . ')' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td id="alamat">: {{ $pasien->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td id="pekerjaan">: {{ $pasien->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mulai Dirawat</th>
                                        <td id="_mulai_rawat">
                                            : {{ tanggal($rawat_inap->mulai_rawat, false) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Berakhir Dirawat
                                        </th>
                                        <td id="_berakhir_rawat">
                                            : {!! $rawat_inap->berakhir_rawat
                                                ? tanggal($rawat_inap->berakhir_rawat, false)
                                                : '<span class="badge bg-primary">Masih dirawat</span>' !!}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- <h5 class="card-title">Data Pemeriksaan</h5> --}}
                    <div class="row">
                        <h6>Diaknosa Penyakit</h6>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Penyakit</th>
                                            <th>Sub-Klasifikasi</th>
                                            <th>Klasifikasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (json_decode($rawat_inap->nama_penyakit_id) as $id_penyakit)
                                            @php
                                                $penyakit = $nama_penyakit->find($id_penyakit);
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penyakit->primer }}</td>
                                                <td>{{ $penyakit->sub_klasifikasi->nama_penyakit }}</td>
                                                <td>{{ $penyakit->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-1">
        <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
            <a class="list-group-item list-group-item-action rounded-end rounded-pill active" id="list-dokter-list"
                data-bs-toggle="list" href="#list-dokter" role="tab">Pemeriksaan Instruksi Dokter</a>
            <a class="list-group-item list-group-item-action" id="list-perawat-list" data-bs-toggle="list"
                href="#list-perawat" role="tab">Pemeriksaan
                Intervensi Keperawatan</a>
            <a class="list-group-item list-group-item-action" id="list-makanan-list" data-bs-toggle="list"
                href="#list-makanan" role="tab">Permintaan
                Makanan</a>
            <a class="list-group-item list-group-item-action rounded-start rounded-pill" id="list-tandavital-list"
                data-bs-toggle="list" href="#list-tandavital" role="tab">Pemantaauan
                Tanda Vital</a>
        </div>
    </div>


    <div class="tab-content text-justify">
        <div class="tab-pane fade show active" id="list-dokter" role="tabpanel" aria-labelledby="list-dokter-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Pemeriksaan Instruksi Dokter</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="buttons" width="100px">
                                <button
                                    onclick="tampilModalRawatInap('/instruksi_dokter/form_tambah/{{ $rawat_inap->id }}','Formulir Pemeriksaan Instruksi Dokter')"
                                    class="btn m-0 btn-sm btn-success rounded-pill">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="TABLE_1">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Diagnosa</th>
                                    <th>Diagnosa Sekunder</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawat_inap->instruksidokter->sortByDesc('created_at') as $instruksi)
                                    <tr>
                                        <td class="text-center" style="white-space: nowrap">
                                            {{ tanggal($instruksi->created_at) }}</td>
                                        <td>{{ $instruksi->namapenyakit->primer }}</td>
                                        <td>{{ $instruksi->namapenyakitsekunder->primer }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/instruksi_dokter/{{ $instruksi->id }}','Pemeriksaan Instruksi Dokter')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-eye"></i></a>
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/instruksi_dokter/form_edit/{{ $instruksi->id }}','Formulir Ubah Pemeriksaan Instruksi Dokter')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-pencil-square"></i></a>
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
        <div class="tab-pane fade" id="list-perawat" role="tabpanel" aria-labelledby="list-perawat-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Pemeriksaan Intervensi Keperawatan</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="buttons" width="100px">
                                <button
                                    onclick="tampilModalRawatInap('/intervensi/form_tambah/{{ $rawat_inap->id }}','Formulir Pemeriksaan Intervensi Keperawatan')"
                                    class="btn btn-sm btn-success rounded-pill">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="TABLE_2">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawat_inap->intervensikeperawatan as $inter)
                                    <tr>
                                        <td>{{ tanggal($inter->created_at) }}</td>
                                        <td>{{ $inter->catatan }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/intervensi/{{ $inter->id }}','Intervensi Keperawatan')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-eye"></i></a>
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/intervensi/form_edit/{{ $inter->id }}','Formulir Ubah Intervensi Keperawatan')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-pencil-square"></i></a>
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
        <div class="tab-pane fade" id="list-makanan" role="tabpanel" aria-labelledby="list-makanan-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Permintaan Makanan</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="buttons" width="100px">
                                <a href="" class="btn btn-sm btn-success rounded-pill">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="TABLE_3">
                            <thead>
                                <tr>
                                    <th>Tanggal Permintaan</th>
                                    <th>ID Rawat Inap</th>
                                    <th>Nama Pasien</th>
                                    <th>Diagnosa</th>
                                    <th>Permintaan Makanan</th>
                                    <th>Catatan</th>
                                    <th>Tanggal diberikan</th>
                                    <th>Tanggal berakhirnya</th>
                                    <th>Total Pemberian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>22 Desember 2022</td>
                                    <td><a href="/view/rawat/inap">RI22120001</a></td>
                                    <td>Martuani</td>
                                    <td>Masuk angin</td>
                                    <td>Kepiting</td>
                                    <td>Supaya lekas sembuh</td>
                                    <td>22 Desember 2022</td>
                                    <td>22 Desember 2022</td>
                                    <td>30 haris</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="/lihat/rekam/medis" title="Lihat Data"
                                                class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-success rounded-pill" title="Ubah data"><i
                                                    class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="list-tandavital" role="tabpanel" aria-labelledby="list-tandavital-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Pemantauan Tanda Vital</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="buttons" width="100px">
                                <a href="" class="btn btn-sm btn-success rounded-pill">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="TABLE_4">
                            <thead>
                                <tr>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>ID Pemeriksaan</th>
                                    <th>Nama Pasien</th>
                                    <th>Skala Nyeri</th>
                                    <th>HR</th>
                                    <th>BP</th>
                                    <th>Temp</th>
                                    <th>RR</th>
                                    <th>Saturasi Oksigen</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>22 Desember 2022</td>
                                    <td>RP22120001</td>
                                    <td>Martuani</td>
                                    <td>B</td>
                                    <td>B</td>
                                    <td>B</td>
                                    <td>B</td>
                                    <td>B</td>
                                    <td>B</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="/lihat/rekam/medis" title="Lihat Data"
                                                class="btn btn-danger rounded-pill"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalRawatInap" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="modalRawatInapLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRawatInap_title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalRawatInap_body">
                    ...
                </div>
                {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> --}}
            </div>
        </div>
    </div>


@section('js')
    <script type="text/javascript" defer="defer">
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
        $(document).ready(function() {
            $("table[id^='TABLE']").dataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [{
                    'targets': [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                searching: false,
                paging: false,
                info: false,
                order: [0, 'desc'],
            });
        });

        function showDetail(val) {
            var toogle = $('.toogle-show');
            if (toogle.attr('stat') == 1) {
                $('#bio-pasien').hide('slow');
                $('#badge-toogle').html('<i class="bi bi-chevron-down"></i>')
                toogle.attr('stat', 0);
            } else {
                $('#bio-pasien').show('slow');
                $('#badge-toogle').html('<i class="bi bi-chevron-up"></i>')
                toogle.attr('stat', 1);
            }
        }

        function tampilModalRawatInap(url, title) {
            var modal = $('#modalRawatInap');

            $('#modalRawatInap_title').text(title);
            var request = $.ajax({
                method: 'GET',
                url: url,
            });
            request.done(function(html) {
                $('#modalRawatInap_body').html(html);
            })

            modal.modal('show');
        }

        function hideModal(id) {
            var modal = $('#' + id);
            modal.modal('hide');
        }
    </script>
@stop


@endsection
