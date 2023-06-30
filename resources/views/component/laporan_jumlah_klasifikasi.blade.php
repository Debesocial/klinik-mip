<table>
    <tbody>
        <tr>
            <td>Periode</td>
            <td>: @if ($jenis == 'harian')
                    {{ tanggal($start, null, true) }} - {{ tanggal($end, null, true) }}
                @else
                    {{ $set_year }}
                @endif
            </td>
        </tr>
    </tbody>
</table>

<div class="container">
    <div class="row" style="">
        <div class="col">
            <div class="list-group list-group-horizontal-sm mb-2 text-center mx-auto" role="tablist" style="width: 50%">
                <a class="list-group-item list-group-item-action rounded-end rounded-pill active" id="grafik"
                    data-bs-toggle="list" href="#mcu-awal" role="tab"> <i class="bi bi-bar-chart-line"></i> Grafik
                </a>
                <a class="list-group-item list-group-item-action rounded-start rounded-pill" id="tabel"
                    data-bs-toggle="list" href="#mcu-lanjut" role="tab"> <i class="bi bi-list-ul"></i> List
                </a>
            </div>
            <div class="tab-content text-justify px-5">
                <div class="tab-pane fade show active" id="mcu-awal" role="tabpanel" aria-labelledby="list-mcu-awal">
                    <div class="chart">
                        <div class="chart-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="mcu-lanjut" role="tabpanel" aria-labelledby="tabel">
                    <div class="table-responsive">
                        <table id="table-1" class="table table-hover" width=100%>

                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    var data = @json($result);
    var jenis = "{{ $jenis }}";
    var title = "";
    data.sort((a, b) => {
        return a.total - b.total;
    });
    if (jenis == 'harian') {
        title = "LAPORAN JUMLAH PENYAKIT BERDASARKAN KLASIFIKASI PENYAKIT " + "{{ tanggal($start, null, true) }}" +
            " - " +
            "{{ tanggal($end, null, true) }}" + " PT MANDIRI INTI PERKASA";
    } else if (jenis == 'bulanan') {
        var set_year = "{{ $set_year }}";
        title = "LAPORAN JUMLAH PENYAKIT BERDASARKAN KLASIFIKASI PENYAKIT TAHUN " + set_year +
            " PT MANDIRI INTI PERKASA";
    }

    var color = "{{ $color }}";
    var ctx = document.getElementById('myChart').getContext('2d');
    Chart.register(ChartDataLabels);
    var options = {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Jumlah Penyakit'
                },
                ticks: {
                    stepSize: 10
                }
            },
            x: {
                beginAtZero: true,
                grid: {
                    display: false
                }
            }
        },
        layout: {
            padding: {
                top: 20
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
        interaction: {
            intersect: false,
            mode: 'index',
        },
    }
    var datasets = [{
        label: 'Jumlah Penyakit',
        data: data,
        parsing: {
            yAxisKey: 'total',
            xAxisKey: 'klasifikasi_penyakit',
        },
        spanGaps: true,
        fill: true,
        backgroundColor: color,

    }]
    var cfg = {
        type: 'bar',
        options: options,
        data: {
            datasets: datasets
        },
    }
    chart = new Chart(ctx, cfg);
</script>

<script>
    $('#table-1').DataTable({
        data: data,
        columns: [{
            title: "Klasifikasi Penyakit",
            data: 'klasifikasi_penyakit'
        }, {
            title: "Total",
            data: 'total',
            className: 'text-center'
        }],
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            text: 'Export Excel',
            title: title,
        }],
    })
</script>
