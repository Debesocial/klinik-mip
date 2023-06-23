<style>
    tbody>tr>th {
            white-space: nowrap;
            vertical-align: top;
        }
</style>


<div class="row px-3" style="">
    <div class="list-group list-group-horizontal-sm mb-3 text-center" role="tablist" style="width: 100%">
        <a class="list-group-item list-group-item-action rounded-end rounded-pill active" id="grafik"
            data-bs-toggle="list" href="#mcu-awal" role="tab"> <i class="bi bi-bar-chart-line"></i> Grafik
        </a>
        <a class="list-group-item list-group-item-action rounded-start rounded-pill" id="tabel"
            data-bs-toggle="list" href="#mcu-lanjut" role="tab"> <i class="bi bi-list-ul"></i> List
        </a>
    </div>
    <div class="tab-content text-justify">
        <div class="tab-pane fade show active" id="mcu-awal" role="tabpanel" aria-labelledby="list-mcu-awal">
            <div class="chart">
                <div class="chart-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="mcu-lanjut" role="tabpanel" aria-labelledby="tabel">
            <div class="table-responsive px-5">
                <table id="table-1" class="table table-hover  w-100">

                </table>
            </div>
        </div>
    </div>

</div>



<script>
    kunjungan = @json($total[0]);
    
    color = "{{$color}}";
    jenis = "{{$jenis}}";
    if (jenis=='bulanan') {
        set_year = "{{$set_year}}";
        date = new Date()
        year = set_year;
        awal = new Date(year,0);
        akhir = new Date(year,11);
        for (let date = awal; date <= akhir; date.setMonth(date.getMonth() + 1)){
            const formattedMonthKunjungan = date.getFullYear()+'-'+ cekSingle(date.getMonth()+1);
            cekTemp = kunjungan.find(e => e.bulan === formattedMonthKunjungan);
            if (cekTemp==undefined){
                temp = {
                    total:0,
                    bulan: formattedMonthKunjungan
                }
                kunjungan.push(temp);
            }
        }

        kunjungan.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
        newKunjungan = kunjungan.filter(function(data){
            newDate = new Date(data.bulan);
            if (newDate.getFullYear()==set_year) {
                return data;
            }
        })
    }else if(jenis=='harian'){
        start = "{{$start}}";
        end = "{{$end}}";
        start = new Date(start);
        end = new Date(end);
        newKunjungan = [];
        for (let date = start; date <= end; date.setDate(date.getDate() + 1)){
            const formattedMonthKunjungan = date.getFullYear() +'-'+cekSingle(date.getMonth()+1) +'-'+ cekSingle(date.getDate())  ;
            cekTemp = kunjungan.find(e => e.bulan === formattedMonthKunjungan);
            if (cekTemp==undefined){
                temp = {
                    total:0,
                    bulan: formattedMonthKunjungan
                }
            }else{
                temp = cekTemp;
            }
            newKunjungan.push(temp);
        }

        newKunjungan.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
    }
    
    ctx3 = document.getElementById('myChart').getContext('2d');
    Chart.register(ChartDataLabels);
    
    options3 = {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Jumlah Pekerja Sakit'
                },
                ticks: {
                    stepSize: 10
                }
            },
            x: {
                beginAtZero: true,
                type: 'time',
                grid: {
                    display: false
                }
            }
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
        interaction: {
            intersect: false,
            mode: 'index',
        },
    }
    
    datasets3 = [{
        label: 'Pekerja Sakit',
        data: newKunjungan,
        parsing: {
            yAxisKey: 'total',
            xAxisKey: 'bulan',
        },
        spanGaps: true,
        fill:true,
        backgroundColor: color,
        
    }]
    cfg3 = {
        type: 'bar',
        options: options3,
        data: {
            datasets: datasets3
        },
    }
    chartKunjungan =  new Chart(ctx3, cfg3);
    if (jenis=='harian') {
        // kunjunganForHarian = newKunjungan.map(data => data.bulan = new Date(data.bulan) )
        chartKunjungan.options.scales.x.time.tooltipFormat = 'dd MMM yyyy';
        chartKunjungan.options.scales.x.time.unit = 'day';
        chartKunjungan.options.scales.x.time.displayFormats.day = 'dd MMM yyyy';
        chartKunjungan.options.scales.x.min = cekSingle(start.getDate()) +'-'+cekSingle(start.getMonth()) + '-'+start.getFullYear();
        chartKunjungan.options.scales.x.max = cekSingle(end.getDate()) +'-'+cekSingle(end.getMonth()) + '-'+end.getFullYear();
        if (newKunjungan.length > 20) {
            chartKunjungan.options.plugins.datalabels = null;
        }
        chartKunjungan.update()
    }else{
        chartKunjungan.options.scales.x.time.tooltipFormat = 'MMM yyyy';
        chartKunjungan.options.scales.x.time.unit = 'month';
        chartKunjungan.options.scales.x.min = year+'-'+ cekSingle(awal.getMonth());
        chartKunjungan.options.scales.x.max = year+'-'+ cekSingle(akhir.getMonth()+1);
        chartKunjungan.update()
    }
</script>

<script>
    listBulan = ['Januari', 'Feberuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    $('#table-1').DataTable({
        data:newKunjungan,
        columns:[
            {   title: function(){
                if(jenis=='harian'){
                    return 'Tanggal';
                }else{
                    return 'Bulan';
                }
                },
                data:'bulan',
                render: {
                    _:function(data, type, row){
                        newDate = new Date(data);
                        if (jenis=='harian') {
                            return cekSingle(newDate.getDate()) +'-'+cekSingle(newDate.getMonth()) + '-'+newDate.getFullYear();
                            
                        }
                        return listBulan[newDate.getMonth()];
                    },
                    sort:function(data, type, row){
                        return type;
                    },
                },
                className:'text-start'
                
            },
            {
                title:'Total',
                data:'total',
                className:'text-start'
            }
        ],
        searching: false,
        paging: false,
        info: false,
        ordering: false,
    })
</script>