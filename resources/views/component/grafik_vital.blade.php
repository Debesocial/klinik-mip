{{-- <style>
    .chart{

    }
</style> --}}
<div class="chart">
    <div class="chart-body">
        <canvas id="myChart"></canvas>
    </div>
</div>


<script>
    data = @json($vital);
    data.forEach(v => {
        tgl = tanggalFormat(v.created_at);
        v.x = tgl.split(" ").join("\n");
    });
    ctx = document.getElementById('myChart').getContext('2d');
    options = {
        scales: {
            x: {
                ticks: {
                    maxRotation: 60,
                    minRotation: 60,
                    font: {
                        size: 10
                    }
                },
            },
            skala_nyeri: {
                display: false,
                type: 'linear',
                display: true,
                position: 'left',
                max: 10,
                min: 0,
                title: {
                    display: true, // Menampilkan label skala pada sumbu y
                    text: 'skala nyeri' // Isi teks label skala pada sumbu y
                },
                ticks: {
                    stepSize: 1
                }
            },
            hr: {
                display: false,
                type: 'linear',
                display: true,
                position: 'left',
                grid: {
                    drawOnChartArea: false,
                },
                max: 200,
                min: 0,
                title: {
                    display: true, // Menampilkan label skala pada sumbu y
                    text: 'hr' // Isi teks label skala pada sumbu y
                },
                ticks: {
                    stepSize: 10
                }
            },
            bp: {
                display: false,
                type: 'linear',
                display: true,
                position: 'left',
                grid: {
                    drawOnChartArea: false,
                },
                max: 250,
                min: 0,
                title: {
                    display: true, // Menampilkan label skala pada sumbu y
                    text: 'bp' // Isi teks label skala pada sumbu y
                },
                ticks: {
                    stepSize: 25
                }
            },
            temp: {
                display: false,
                type: 'linear',
                display: true,
                position: 'left',
                grid: {
                    drawOnChartArea: false,
                },
                max: 41,
                min: 31,
                title: {
                    display: true, // Menampilkan label skala pada sumbu y
                    text: 'temp' // Isi teks label skala pada sumbu y
                },
                ticks: {
                    stepSize: 1
                }
            },
            rr: {
                display: false,
                type: 'linear',
                display: true,
                position: 'left',
                grid: {
                    drawOnChartArea: false,
                },
                max: 100,
                min: 0,
                title: {
                    display: true, // Menampilkan label skala pada sumbu y
                    text: 'rr' // Isi teks label skala pada sumbu y
                },
                ticks: {
                    stepSize: 10
                }
            },
            saturasi_oksigen: {
                display: false,
                type: 'linear',
                display: true,
                position: 'left',
                grid: {
                    drawOnChartArea: false,
                },
                max: 100,
                min: 0,
                title: {
                    display: true, // Menampilkan label skala pada sumbu y
                    text: 'saturasi oksigen' // Isi teks label skala pada sumbu y
                },
                ticks: {
                    stepSize: 10
                }
            }
        },
    }
    datasets = [{
            label: 'Skala Nyeri',
            data: data,
            parsing: {
                yAxisKey: 'skala_nyeri'
            },
            tension: 0.1,
            yAxisID: 'skala_nyeri',
        },
        {
            label: 'HR',
            data: data,
            parsing: {
                yAxisKey: 'hr'
            },
            tension: 0.1,
            yAxisID: 'hr',
            hidden: true

        },
        {
            label: 'BP',
            data: data,
            parsing: {
                yAxisKey: 'bp'
            },
            tension: 0.1,
            yAxisID: 'bp',
            hidden: true

        },
        {
            label: 'Temp',
            data: data,
            parsing: {
                yAxisKey: 'temp'
            },
            tension: 0.1,
            yAxisID: 'temp',
            hidden: true

        },
        {
            label: 'RR',
            data: data,
            parsing: {
                yAxisKey: 'rr'
            },
            tension: 0.1,
            yAxisID: 'rr',
            hidden: true
        },
        {
            label: 'Saturasi Oksigen',
            data: data,
            parsing: {
                yAxisKey: 'saturasi_oksigen'
            },
            tension: 0.1,
            yAxisID: 'saturasi_oksigen',
            hidden: true

        }
    ];
    cfg = {
        type: 'line',
        options: options,
        data: {
            datasets: datasets
        },
    }



    new Chart(ctx, cfg);

    function tanggalFormat(stringdate) {
        let date = new Date(Date.parse(stringdate));
        formatDate = cekSingle(date.getDate()) + '/' + cekSingle(date.getMonth()) + '/' + date.getFullYear() + ' ' +
            cekSingle(date.getHours()) + ':' + cekSingle(date.getMinutes());
        return formatDate;
    }
</script>
