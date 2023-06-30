@extends('layouts.dashboard.app')

@section('title', 'Laporan')
@section('laporan', 'active')
@section('css')
    <style>
        #card-laporan:hover {
            transform: scale(1.1);
            cursor: pointer;
            z-index: 11;
        }

        #card-laporan {
            transition: transform .2s;
            z-index: 10;
        }

        .yearpicker-container {
            z-index: 12 !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/yearpicker.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
@stop

@section('container')
    <div class="row">
        <div class="col">
            <div class="page-heading">
                <h3>Laporan</h3>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="border p-3 mb-3">
            <h5>Statistik</h5>
            <div class="row g-1 row-cols-md-6 mb-2 justify-content-between">
                <div class="col">
                    <label for="" class="form-label">Jenis Laporan: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan"
                            value="bulanan" checked>
                        <label class="form-check-label" for="jenis_laporan">Bulanan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan" id="jenis_laporan2"
                            value="harian">
                        <label class="form-check-label" for="jenis_laporan2">Harian</label>
                    </div>
                </div>
                <div class="col" id="tahun">
                    <label for="" class="form-label">Tahun</label>
                    <input type="text" readonly class="form-control bg-white" name="statistik_tahun" id="statistik_tahun"
                        style="cursor: pointer">
                </div>
                <div class="col" id="dari-sampai" style="display:none;">
                    <label for="" class="form-label">Dari</label>
                    <input type="date" class="form-control" name="statistik_dari" id="statistik_dari">
                </div>
                <div class="col" id="dari-sampai" style="display:none;">
                    <label for="" class="form-label">Sampai</label>
                    <input type="date" class="form-control" name="statistik_sampai" id="statistik_sampai">
                </div>
                <div class="col">
                    <label for="perusahaan" class="form-label">Perusahaan</label>
                    <select name="perusahaan" id="perusahaan" class="form-select">
                        <option value="" selected>Semua Perusahaan</option>
                        @foreach ($perusahaan as $per)
                            <option value="{{ $per->id }}">{{ $per->nama_perusahaan_pasien }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col my-auto">
                    <button onclick="printStatistik()" id="print-statistik" class="btn btn-success"><i
                            class="bi bi-file-earmark-excel-fill"></i> Export
                        Laporan
                    </button>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-evenly">
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Jumlah Pekerja Sakit',
                        'sub_title' => 'Pekerja yang sakit karena penyakit, bukan karena kecelakaan kerja.',
                        'color' => 'crimson',
                        'onclick' => 'showModal("pekerja-sakit","crimson")',
                    ]) !!}
                </div>
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Jumlah Absen Karena Sakit',
                        'sub_title' => 'Total absen karyawan karena sakit, bukan karena kecelakaan kerja.',
                        'color' => 'darkcyan',
                        'onclick' => 'showModal("absen-sakit","darkcyan")',
                    ]) !!}
                </div>
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Jumlah Kasus PAK',
                        'sub_title' => 'Total diagnosa sekunder akibat kerja.',
                        'color' => 'orange',
                        'onclick' => 'showModal("pak","orange")',
                    ]) !!}
                </div>

            </div>

        </div>
        <div class="border p-3">
            <h5>Laporan</h5>
            <div class="row g-2 row-cols-md-6 mb-2">
                <div class="col">
                    <label for="" class="form-label">Berdasarkan: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan_1" id="jenis_laporan_1"
                            value="bulanan" checked>
                        <label class="form-check-label" for="jenis_laporan_1">Tahun</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_laporan_1" id="jenis_laporan_1-2"
                            value="harian">
                        <label class="form-check-label" for="jenis_laporan_1-2">Tanggal</label>
                    </div>
                </div>
                <div class="col" id="tahun_laporan">
                    <label for="" class="form-label">Tahun</label>
                    <input type="text" readonly class="form-control bg-white" name="laporan_tahun" id="laporan_tahun"
                        style="cursor: pointer">
                </div>
                <div class="col" id="dari-sampai-1" style="display:none;">
                    <label for="" class="form-label">Dari</label>
                    <input type="date" class="form-control" name="laporan_dari" id="laporan_dari">
                </div>
                <div class="col" id="dari-sampai-1" style="display:none;">
                    <label for="" class="form-label">Sampai</label>
                    <input type="date" class="form-control" name="laporan_sampai" id="laporan_sampai">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-evenly">
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Jumlah Penyakit Berdasarkan Klasifikasi',
                        'sub_title' => 'Jumlah penyakit berdasarkan klasifikasi yang didapat dari Rawat Inap dan Rawat Jalan.',
                        'color' => 'navy',
                        'onclick' => 'showModalLaporan("jumlah-klasifikasi","navy")',
                    ]) !!}
                </div>
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Total Penggunaan Obat',
                        'sub_title' => 'Total penggunaan obat yang didapatkan dari setiap resep obat.',
                        'color' => 'OliveDrab',
                        'onclick' => 'showModalLaporan("penggunaan-obat","OliveDrab")',
                    ]) !!}
                </div>
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Total Penggunaan Alat Kesehatan',
                        'sub_title' => 'Total penggunaan alat kesehatan yang didapatkan dari setiap tindakan.',
                        'color' => 'orchid',
                        'onclick' => 'showModalLaporan("penggunaan-alkes","orchid")',
                    ]) !!}
                </div>
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Durasi Istirahat',
                        'sub_title' => 'Jumlah durasi istirahat yang diambil dari surat izin istirahat.',
                        'color' => 'peru',
                        'onclick' => 'showModalLaporan("durasi-istirahat","peru")',
                    ]) !!}
                </div>
                <div class="col mb-3">
                    {!! cardLaporan([
                        'title' => 'Total Kunjungan',
                        'sub_title' =>
                            'Total Kunjungan pasien yang diambil dari jumlah pasien pada rawat inap, rawat jalan, MCU, dan pemeriksaan narkotika.',
                        'color' => 'tomato',
                        'onclick' => 'showModalLaporan("total-kunjungan","tomato")',
                    ]) !!}
                </div>

            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="laporanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="laporanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="laporanModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div> --}}
            </div>
        </div>
    </div>

@section('js')
    <script src="{{ asset('assets/js/yearpicker.js') }}"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.4/dataRender/datetime.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


    <script>
        $('#perusahaan').select2({
            theme: 'bootstrap-5',
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });
    </script>
    <script>
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        $(document).ready(function() {
            $("#statistik_tahun").change(function() {
                selected_year = $(this).val();
            });
            $("#laporan_tahun").change(function() {
                selected_year_laporan = $(this).val();
            });
            $('input[name="jenis_laporan"]').click(function() {
                jenisLaporanStatistik = $(this).val();
                if (jenisLaporanStatistik == 'bulanan') {
                    $('#tahun').show();
                    $('[id="dari-sampai"]').hide()
                } else if (jenisLaporanStatistik == 'harian') {
                    $('#tahun').hide();
                    $('[id="dari-sampai"]').show()

                }
            })
            $('input[name="jenis_laporan_1"]').click(function() {
                jenisLaporan = $(this).val();
                if (jenisLaporan == 'bulanan') {
                    $('#tahun_laporan').show();
                    $('[id="dari-sampai-1"]').hide()
                } else if (jenisLaporan == 'harian') {
                    $('#tahun_laporan').hide();
                    $('[id="dari-sampai-1"]').show()

                }
            })
            $('#statistik_sampai').val(today.toDateInputValue())
            $('#laporan_sampai').val(today.toDateInputValue())
            seminggusebelum = new Date(today.setDate(today.getDate() - 7));
            $('#statistik_dari').val(seminggusebelum.toDateInputValue())
            $('#laporan_dari').val(seminggusebelum.toDateInputValue())
        });
    </script>
    <script>
        $(function() {
            $("#statistik_tahun").yearpicker({
                year: selected_year
            });
            $("#laporan_tahun").yearpicker({
                year: selected_year_laporan
            });
        });
        let today = new Date();
        let jenisLaporanStatistik = $('input[name = jenis_laporan]:checked').val();
        let jenisLaporan = $('input[name = jenis_laporan_1]:checked').val();
        let selected_year = today.getFullYear();
        let selected_year_laporan = today.getFullYear();

        function showModal(id, color) {
            // showLoader();
            url = "{{ url('/laporan') }}/" + id;


            if (id == 'pekerja-sakit') {
                $('.modal-title').text('Laporan Jumlah Pekerja Sakit Akibat Penyakit');
            } else if (id == 'absen-sakit') {
                $('.modal-title').text('Laporan Jumlah Pekerja Absen Akibat Penyakit');
            } else if (id == 'pak') {
                $('.modal-title').text('Laporan Jumlah Kasus PAK');
            } else if (id == 'jumlah-klasifikasi') {
                $('.modal-title').text('Laporan Jumlah Penyakit Berdasarkan Klasifikasi');
            }

            $.ajax({
                type: "get",
                url: url,
                data: {
                    color: color,
                    jenis: jenisLaporanStatistik,
                    year: selected_year,
                    start: $('#statistik_dari').val(),
                    end: $('#statistik_sampai').val(),
                    perusahaan: $('#perusahaan').val(),
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $('#laporanModal').modal('show');
                    hideLoader();
                }
            });
        }

        function showModalLaporan(id, color) {
            // showLoader();
            url = "{{ url('/laporan') }}/" + id;


            if (id == 'jumlah-klasifikasi') {
                $('.modal-title').text('Laporan Jumlah Penyakit Berdasarkan Klasifikasi');
            } else if (id == 'penggunaan-obat') {
                $('.modal-title').text('Laporan Jumlah Penggunaan Obat');
            } else if (id == 'penggunaan-alkes') {
                $('.modal-title').text('Laporan Jumlah Penggunaan Alat Kesehatan');
            } else if (id == 'durasi-istirahat') {
                $('.modal-title').text('Laporan Jumlah Durasi Istirahat');
            } else if (id == 'total-kunjungan') {
                $('.modal-title').text('Laporan Total Kunjungan');
            }

            $.ajax({
                type: "get",
                url: url,
                data: {
                    color: color,
                    jenis: jenisLaporan,
                    year: selected_year_laporan,
                    start: $('#laporan_dari').val(),
                    end: $('#laporan_sampai').val(),

                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $('#laporanModal').modal('show');
                    hideLoader();
                }
            });
        }

        function printStatistik() {
            url = "{{ url('/laporan/print') }}";

            $('.modal-title').text('Preview Laporan Statistik');

            $.ajax({
                type: "get",
                url: url,
                data: {
                    jenis: jenisLaporanStatistik,
                    year: selected_year,
                    start: $('#statistik_dari').val(),
                    end: $('#statistik_sampai').val(),
                    perusahaan: $('#perusahaan').val(),
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $('#laporanModal').modal('show');
                    hideLoader();
                }
            });
        }
    </script>

@stop

@endsection
