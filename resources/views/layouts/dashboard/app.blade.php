<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo-klinik.png') }}" />
    {{-- stepper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    {{-- Selec2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


    @yield('css')

    <style>
        table.dataTable td {
            padding: 15px 8px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }

        .btn {
            font-size: .85rem;
        }

        .form-control {
            font-size: .85rem;
        }

        .form-select {
            font-size: .85rem;
        }

        th {
            white-space: nowrap;
            vertical-align: top;
        }

        img#modal-img {
            /* width: auto;
            height: 50%; */
            aspect-ratio: 1;
            object-fit: cover;
            /* use the one you need */
        }

        @media print {
            .noPrint {
                display: none;
            }
        }

        td::first-letter {
            text-transform: uppercase;
        }
       
    </style>

</head>

<body style="font-size: 0.8rem ;">
    @include('layouts.dashboard.sidebar')
    <div id="main" class="mt-4">

        <header class="">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @if ($__env->yieldContent('judul'))
            <div class="page-heading">
                <h3>@yield('judul')</h3>
                @if ($__env->yieldContent('breadcrumb'))
                    <div>{!! Breadcrumbs::render($__env->yieldContent('breadcrumb')) !!}</div>
                @endif
            </div>
        @endif
        <div class="page-content">
            <div class="preloader js-preloader flex-center">
                <div class="dots">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
            <section class="row">
                @yield('container')
            </section>
        </div>

        {{-- Modal Pasien --}}
        <div class="modal fade" id="modalPasien" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalPasienLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content rounded-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPasienLabel">Data Pasien</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-3 text-center" id="pp"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Nama Pasien</th>
                                            <td id="modal_nama"></td>
                                        </tr>
                                        <tr>
                                            <th>ID Rekam Medis</th>
                                            <td id="modal_rekam_medis"></td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Induk Karyawan</th>
                                            <td id="modal_nomor_induk_karyawan"></td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Tanggal Lahir</th>
                                            <td id="modal_ttl"></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td id="modal_alamat"></td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan</th>
                                            <td id="modal_pekerjaan"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Kategori</th>
                                            <td id="modal_kategori"></td>
                                        </tr>
                                        <tr>
                                            <th>Perusahaan</th>
                                            <td id="modal_perusahaan"></td>
                                        </tr>
                                        <tr>
                                            <th>Divisi</th>
                                            <td id="modal_divisi"></td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td id="modal_jabatan"></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td id="modal_jenis_kelamin"></td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th>
                                            <td id="modal_telepon"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td id="modal_email"></td>
                                        </tr>
                                        <tr>
                                            <th>Alergi Obat</th>
                                            <td id="modal_alergi"></td>
                                        </tr>
                                        <tr>
                                            <th>Menyusui</th>
                                            <td id="modal_menyusui"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row border-top pt-2">
                            <div class="col-md-6">
                                <h6>Data Keluarga</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Nama Keluarga</th>
                                            <td id="modal_nama_keluarga"></td>
                                        </tr>
                                        <tr>
                                            <th>Hubungan Keluarga</th>
                                            <td id="modal_hubungan_keluarga"></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td id="modal_alamat_keluarga"></td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan</th>
                                            <td id="modal_pekerjaan_keluarga"></td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Telepon</th>
                                            <td id="modal_telepon_keluarga"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td id="modal_email_keluarga"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-pill btn-secondary"
                            data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Surat -->
        <div class="modal fade" id="modalSurat" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="modalSurat_Label" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSurat_title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalSurat_body">
                        ...
                    </div>
                </div>
            </div>
        </div>

        <footer>

        </footer>
    </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script> --}}
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>


    <script src="{{ asset('ref/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('ref/assets/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ref/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('ref/assets/vendors/fontawesome/all.min.js') }}"></script>
    {{-- stepper --}}
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    {{-- sELECT2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




    <script src="{{ asset('assets/js/mazer.js') }}"></script>
    <script>
        
        // Jquery Datatable
        let jquery_datatable = $("table[id*='table1']").DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                "infoEmpty": "Menampikan 0 sampai 0, dari 0 data",
                "zeroRecords": "Tidak ditemukan data yang cocok",
                "infoFiltered": "(Didapatkan dari _MAX_ total seluruh data)",
            },
            scrollY: 320,
            scrollX: true,
            ordering: false,
            'autoWidth': true,
            'colReorder': true,
        })

        function cekImg(val) {
            var url = "{{ asset('pasien/foto/file') }}" + '/';
            if (val == null || val == '' || val == ' ') {
                return url + 'default.jpg';
            } else {
                return url + val;
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            hideLoader();
        })

        function showLoader() {
            $('.preloader').show();
        }

        function hideLoader(params) {
            $('.preloader').fadeOut('slow');
        }

        function submitform(id) {
            $('#' + id).submit();
            $('.preloader').show();
        }
        function logoutConfirm() {
            Swal.fire({ 
                icon: "warning", 
                text: "Apakah anda yakin ingin keluar ?",
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar!'
            }).then((result) => {
                    if (result.isConfirmed) { window.location.href = "{{ route('logout') }}" }
                })
        }
    </script>
    <script src="{{ asset('assets/js/modalPasien.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    @yield('js')
</body>

</html>
