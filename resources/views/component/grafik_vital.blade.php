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
    vitalChart = null;
    data = @json($vital);
    Chart.register(ChartDataLabels);

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

            rr: {
                display:false,
                type: 'linear',
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
                    stepSize: 10,
                    display: true
                }
            },
            temp: {
                display:false,
                type: 'linear',
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
                    stepSize: 1,
                }
            },
            bp: {
                display:false,
                type: 'linear',
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
            hr: {
                display:false,
                type: 'linear',
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
            skala_nyeri: {
                type: 'linear',
                position: 'left',
                grid: {
                    drawOnChartArea: false,
                },
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
            // saturasi_oksigen: {
            //     type: 'linear',
            //     position: 'left',
            //     grid: {
            //         drawOnChartArea: false,
            //     },
            //     max: 100,
            //     min: 0,
            //     title: {
            //         display: true, // Menampilkan label skala pada sumbu y
            //         text: 'SaO2' // Isi teks label skala pada sumbu y
            //     },
            //     ticks: {
            //         stepSize: 10
            //     }
            // },
        },
        plugins: {
            legend: {
                display: true,
                labels: {
                    filter: function(legendItem, chartData) {
                        // Hide legend item for label with index 1
                        return legendItem.datasetIndex !== 3;
                    }
                },
                onClick: legendClick
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
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
            backgroundColor: 'rgba(218, 165, 32, 0.4)',
            borderColor:'goldenrod',
            datalabels: {
                color: 'goldenrod',
                anchor: 'end', // remove this line to get label in middle of the bar
                align: 'end',
                formatter: function(value, context) {
                    return value.skala_nyeri;
                }
            },
        },
        {
            label: 'HR',
            data: data,
            parsing: {
                yAxisKey: 'hr'
            },
            tension: 0.1,
            yAxisID: 'hr',
            backgroundColor: 'rgba(220, 20, 60,0.4)',
            borderColor:'crimson',
            datalabels: {
                color: 'crimson',
                anchor: 'end', // remove this line to get label in middle of the bar
                align: 'end',
                formatter: function(value, context) {
                    return value.hr;
                }
            },
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
            backgroundColor: 'rgba(169,169,169, 0.4)',
            borderColor:'darkgrey',
            datalabels: {
                color: 'darkgrey',
                anchor: 'end', // remove this line to get label in middle of the bar
                align: 'end',
                formatter: function(value, context) {
                    return value.bp;
                }
            },
            hidden: true,

        },
        {
            label: 'Batas BP',
            data: data,
            parsing: {
                yAxisKey: 'bp_menit'
            },
            tension: 0.1,
            yAxisID: 'bp',
            backgroundColor: 'rgba(169,169,169, 0.4)',
            borderColor:'darkgrey',
            datalabels: {
                color: 'darkgrey',
                anchor: 'end', // remove this line to get label in middle of the bar
                align: 'end',
                formatter: function(value, context) {
                    return value.bp_menit;
                }
            },
            hidden: true,
            fill:'-1'
        },
        {
            label: 'Temp',
            data: data,
            parsing: {
                yAxisKey: 'temp'
            },
            tension: 0.1,
            yAxisID: 'temp',
            backgroundColor: 'rgba(0,139,139,0.4)',
            borderColor:'darkcyan',
            datalabels: {
                color: 'darkcyan',
                anchor: 'end', // remove this line to get label in middle of the bar
                align: 'end',
                formatter: function(value, context) {
                    return value.temp;
                }
            },
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
            backgroundColor: 'rgba(50,205,50,0.4)',
            borderColor:'limegreen',
            datalabels: {
                color: 'limegreen',
                anchor: 'end', // remove this line to get label in middle of the bar
                align: 'end',
                formatter: function(value, context) {
                    return value.rr;
                }
            },
            hidden: true
        },
        // {
        //     label: 'SaO2',
        //     data: data,
        //     parsing: {
        //         yAxisKey: 'saturasi_oksigen'
        //     },
        //     tension: 0.1,
        //     yAxisID: 'saturasi_oksigen',
        //     backgroundColor: 'lightslategray',
        //     borderColor:'lightslategray',
        //     datalabels: {
        //         color: 'lightslategray',
        //         anchor: 'end', // remove this line to get label in middle of the bar
        //         align: 'end',
        //         formatter: function(value, context) {
        //             return value.saturasi_oksigen;
        //         }
        //     },
        //     hidden: true

        // }
    ];
    cfg = {
        type: 'line',
        options: options,
        data: {
            datasets: datasets
        },
    }



    vitalChart =  new Chart(ctx, cfg);
    function tanggalFormat(stringdate) {
        let date = new Date(Date.parse(stringdate));
        formatDate = cekSingle(date.getDate()) + '/' + cekSingle(date.getMonth()) + '/' + date.getFullYear() + ' ' +
            cekSingle(date.getHours()) + ':' + cekSingle(date.getMinutes());
        return formatDate;
    }

    
</script>
