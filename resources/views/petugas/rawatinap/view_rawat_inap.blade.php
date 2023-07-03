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

        .dataTables_scrollHeadInner {
            width: 100% !important;
        }

        .dataTable.no-footer {
            width: 100% !important;
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
                                $tanggal_lahir = $rawat_inap->pasien->tanggal_lahir;
                                $lahir = new DateTime($tanggal_lahir);
                                $today = new DateTime('today');
                                $usia = $today->diff($lahir)->y . ' Tahun';
                            @endphp
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <td id="nama">: <a href="#"
                                                onclick="tampilModalPasien({{ json_encode($rawat_inap->pasien) }})">{{ $rawat_inap->pasien->nama_pasien }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ID Rekam Medis</th>
                                        <td id="rekam_medis">: {{ $rawat_inap->pasien->id_rekam_medis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Data Pemeriksaan Awal</th>
                                        <td id="ttl">:
                                            <a href="javascript:void(0);"
                                                onclick="tampilModalRawatInap('/detail/rawatinap/{{ $rawat_inap->id }}', 'Detail Rawat Inap {{ $rawat_inap->id_rawat_inap }}')"><span>Lihat
                                                    data <i class="bi bi-box-arrow-up-right"></i></span></a>
                                        </td>
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
                                            : 
                                            @if (Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                                            {!! $rawat_inap->berakhir_rawat
                                                ? tanggal($rawat_inap->berakhir_rawat, false)
                                                : '<a href="/selesai-inap/'.$rawat_inap->id.'" class="btn btn-primary btn-sm">Selesaikan Rawat Inap <i class="bi bi-check-square"></i></a>' !!}

                                            @else
                                            {!! $rawat_inap->berakhir_rawat
                                                ? tanggal($rawat_inap->berakhir_rawat, false)
                                                : '-' !!}

                                            @endif
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
                        <h6>Diagnosa Penyakit</h6>
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
            <a class="list-group-item list-group-item-action rounded-end rounded-pill {{$pos==1?'active':''}}" id="list-dokter-list"
                data-bs-toggle="list" href="#list-dokter" role="tab">Pemeriksaan Instruksi Dokter</a>
            <a class="list-group-item list-group-item-action {{$pos==2?'active':''}}"  id="list-perawat-list" data-bs-toggle="list"
                href="#list-perawat" role="tab">Pemeriksaan
                Intervensi Keperawatan</a>
            <a class="list-group-item list-group-item-action {{$pos==3?'active':''}}" id="list-makanan-list" data-bs-toggle="list"
                href="#list-makanan" role="tab">Permintaan
                Makanan</a>
            <a class="list-group-item list-group-item-action rounded-start rounded-pill {{$pos==4?'active':''}}" id="list-tandavital-list"
                data-bs-toggle="list" href="#list-tandavital" role="tab">Pemantauan
                Tanda Vital</a>
        </div>
    </div>


    <div class="tab-content text-justify">
        <div class="tab-pane fade {{$pos==1?'show active':''}}" id="list-dokter" role="tabpanel" aria-labelledby="list-dokter-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Pemeriksaan Instruksi Dokter</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="buttons" width="100px">
                                @if (Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "superadmin")
                                <button
                                    onclick="tampilModalRawatInap('/instruksi_dokter/form_tambah/{{ $rawat_inap->id }}','Formulir Pemeriksaan Instruksi Dokter')"
                                    class="btn m-0 btn-sm btn-success rounded-pill">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span></button>
                                @endif
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
                                                @if (Auth::user()->level->nama_level == "dokter" || Auth::user()->level->nama_level == "superadmin")
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/instruksi_dokter/form_edit/{{ $instruksi->id }}','Formulir Ubah Pemeriksaan Instruksi Dokter')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                @endif
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
        <div class="tab-pane fade {{$pos==2?'show active':''}}" id="list-perawat" role="tabpanel" aria-labelledby="list-perawat-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Pemeriksaan Intervensi Keperawatan</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            @if (Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin")
                                <div class="buttons" width="100px">
                                    <button
                                        onclick="tampilModalRawatInap('/intervensi/form_tambah/{{ $rawat_inap->id }}','Formulir Pemeriksaan Intervensi Keperawatan')"
                                        class="btn btn-sm btn-success rounded-pill">
                                        <i class="bi bi-plus-circle"></i>
                                        <span>Tambah</span>
                                    </button>
                                </div>
                                
                            @endif
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
                                        <td class="text-center">{{ tanggal($inter->created_at) }}</td>
                                        <td>{{ $inter->catatan }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/intervensi/{{ $inter->id }}','Intervensi Keperawatan')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-eye"></i></a>
                                                @if (Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin")
                                                <a href="#" onclick="tampilModalRawatInap('/intervensi/form_edit/{{ $inter->id }}','Formulir Ubah Intervensi Keperawatan')" class="btn btn-sm btn-outline-secondary" title="Ubah Data">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                @endif        
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
        <div class="tab-pane fade {{$pos==3?'show active':''}}" id="list-makanan" role="tabpanel" aria-labelledby="list-makanan-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>Permintaan Makanan</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            @if (Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin")
                            <button
                                onclick="tampilModalRawatInap('/permintaan_makanan/tambah/{{ $rawat_inap->id }}', 'Fromulir Permintaan Makanan')"
                                class="btn btn-sm btn-success rounded-pill">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah</span>
                            </button>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="TABLE_3">
                            <thead>
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Total Pemberian</th>
                                    <th>Permintaan Makanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawat_inap->permintaanmakanan->sortByDesc('tanggal_mulai') as $makanan)
                                    <tr>
                                        <td class="text-center">{{ tanggal($makanan->tanggal_mulai, false) }}</td>
                                        <td class="text-center">{{ tanggal($makanan->tanggal_selesai, false) }}</td>
                                        <td class="text-center">
                                            {{ diffDay($makanan->tanggal_mulai, $makanan->tanggal_selesai) }}</td>
                                        <td>{{ $makanan->permintaan_makanan }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/permintaan_makanan/{{ $makanan->id }}','Permintaan Makanan')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-eye"></i></a>
                                                @if (Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin")
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/permintaan_makanan/form_edit/{{ $makanan->id }}','Formulir Ubah Permintaan Makanan')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                @endif
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
        <div class="tab-pane fade {{$pos==4?'show active':''}}" id="list-tandavital" role="tabpanel" aria-labelledby="list-tandavital-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if (Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                        <div class="col-md-8">
                            <h6>Pemantauan Tanda Vital</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="buttons">
                                <button href="" class="btn btn-sm btn-info rounded-pill"
                                    onclick="tampilModalRawatInap('/tanda_vital/grafik/{{ $rawat_inap->id }}', 'Grafik Pemantauan Tanda Vital')">
                                    <i class="bi bi-graph-up"></i>
                                    <span>Grafik</span>
                                </button>
                                <button href="" class="btn btn-sm btn-success rounded-pill"
                                    onclick="tampilModalRawatInap('/tanda_vital/tambah/{{ $rawat_inap->id }}', 'Fromulir Pemantauan Tanda Vital')">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table display" id="TABLE_4" width="auto">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Skala Nyeri</th>
                                    <th>HR</th>
                                    <th>BP</th>
                                    <th>Temp</th>
                                    <th>RR</th>
                                    <th>Saturasi Oksigen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rawat_inap->tandavital->sortByDesc('created_at') as $vital)
                                    <tr class="text-center">
                                        <td>{{ tanggal($vital->created_at) }}</td>
                                        <td>{{ $vital->skala_nyeri }}</td>
                                        <td>{{ $vital->hr }}</td>
                                        <td>{{ $vital->bp }} / {{ $vital->bp_menit }}</td>
                                        <td>{{ $vital->temp }}</td>
                                        <td>{{ $vital->rr }}</td>
                                        <td>{{ $vital->saturasi_oksigen }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a href="#"
                                                    onclick="tampilModalRawatInap('/tanda_vital/{{ $vital->id }}','Pemeriksaan Tanda Vital')"
                                                    class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                        class="bi bi-eye"></i></a>
                                                @if (Auth::user()->level->nama_level == "perawat" || Auth::user()->level->nama_level == "superadmin" || Auth::user()->level->nama_level == "dokter")
                                                    <a href="#"
                                                        onclick="tampilModalRawatInap('/tanda_vital/form_edit/{{ $vital->id }}','Formulir Ubah Pemeriksaan Tanda Vital')"
                                                        class="btn btn-sm btn-outline-secondary" title="Ubah Data"><i
                                                            class="bi bi-pencil-square"></i></a>

                                                @endif
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
    <!-- Modal -->
    <div class="modal fade" id="modalRawatInap2" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="modalRawatInap2Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bg-body">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRawatInap2_title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalRawatInap2_body">
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
        let legendClick = function (e, legendItem, legend) {
            let index = legendItem.datasetIndex;
            let ci = legend.chart;
            let yId = ci.data.datasets[index].yAxisID;
            if (ci.isDatasetVisible(index)) {
                ci.hide(index);
                if (index===2) {
                    ci.hide(index+1);
                }
                vitalChart.options.scales[yId].display = false;
                legendItem.hidden = true;
            } else {
                ci.show(index);
                if (index===2) {
                    ci.show(index+1);
                }
                vitalChart.options.scales[yId].display = true;
                legendItem.hidden = false;
            }
            vitalChart.update();
        }

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
                @if (session()->exists('warning'))
                    Swal.fire({
                        icon: "warning",
                        title: "{{ session()->get('warning') }}",
                        text: "Rawat inap yang sudah selesai tidak dapat diubah."
                    })
                    {{ session()->forget('warning') }}
                @endif
            }
        } else {
            console.log("Unfortunately, your browser doesn't support this API");
        }
        $(document).ready(function() {
            $("table#TABLE_1").dataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [{
                    'targets': [1, 2, 3],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                searching: false,
                paging: false,
                info: false,
                order: [0, 'desc'],
                scrollY: 300,
                scrollX: true
            });
            $("table#TABLE_2").dataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [{
                    'targets': [1, 2],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                searching: false,
                paging: false,
                info: false,
                order: [0, 'desc'],
                scrollY: 300,
                scrollX: true
            });
            $("table#TABLE_3").dataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [{
                    'targets': [1, 2, 3, 4],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                searching: false,
                paging: false,
                info: false,
                order: [0, 'desc'],
                scrollY: 300,
                scrollX: true
            });
            $("table#TABLE_4").dataTable({
                "language": {
                    "zeroRecords": "Belumm ada pemeriksaan",
                },
                'columnDefs': [{
                    'targets': [1, 2, 3, 4, 5, 6, 7],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                searching: false,
                paging: false,
                info: false,
                order: [0, 'desc'],
                scrollX: true,
                scrollY: 300
            });
            $('#modalRawatInap2').on('show.bs.modal', function () {
                $('#modalRawatInap').css('z-index', 1039);
            });

            $('#modalRawatInap2').on('hidden.bs.modal', function () {
                $('#modalRawatInap').css('z-index', 1041);
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
        function tampilModalRawatInap2(url, title) {
            var modal = $('#modalRawatInap2');

            $('#modalRawatInap2_title').text(title);
            var request = $.ajax({
                method: 'GET',
                url: url,
            });
            request.done(function(html) {
                $('#modalRawatInap2_body').html(html);
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
