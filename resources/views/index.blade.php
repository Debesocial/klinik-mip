@extends('layouts.dashboard.app')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('container')

    <div class="col-12">
        <div class="btn-group mb-1" style=" float: right;">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButtonIcon"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-error-circle me-50"></i> {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                    <a class="dropdown-item" href="/ubah/profile/{{ Auth::user()->id }}"><i class="bi bi-person me-50"></i>
                        Profil</a>
                    <a class="dropdown-item" href="/ubah/password/{{ Auth::user()->id }}"><i class="bi bi-key me-50"></i>
                        Ubah Kata Sandi</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <h4 class="card-title">Selamat Datang, {{ Auth::user()->name }}</h4>
    <div class="page-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title">Total Pasien <b>{{ $total_pasien }}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chart-body">
                                <canvas id="pasienChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')

    <script>
        let ctx = document.getElementById('pasienChart').getContext('2d');
        Chart.register(ChartDataLabels);
        let options = {
            scales: {
                y: {
                    beginAtZero: true
                },
            },
            layout: {
                padding: {
                    top: 30
                }
            },
            plugins: {
                legend: false,
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val.total}`),
                    labels: {
                        value: {
                            color: 'black'
                        }
                    }

                }
            },
        }
        let pasien = @json($pasien_per_bulan);
        let datasets = [{
            label: 'Total',
            data: pasien,
            parsing: {
                yAxisKey: 'total',
                xAxisKey: 'tanggal',
            },
            tension: 0.3
        }]
        let cfg = {
            type: 'line',
            options: options,
            data: {
                datasets: datasets
            },
        }
        new Chart(ctx, cfg);
    </script>
@stop
@endsection
