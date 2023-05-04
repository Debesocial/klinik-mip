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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    {{-- Selec2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


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
            <section class="row">
                @yield('container')
            </section>
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
            }
        })
    </script>

    @yield('js')
</body>

</html>
