@extends('layouts.dashboard.app')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('css')
<style>
    .tableFixHead {
        overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
        height: 300px; /* gives an initial height of 200px to the table */
      }
      .tableFixHead thead th {
        position: sticky; /* make the table heads sticky */
        top: 0px; /* table head will be placed from the top of the table and sticks to it */
      }
      table {
        border-collapse: collapse; /* make the table borders collapse to each other */
        width: 100%;
      }
      
</style>
@stop

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
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title">Total Pasien <b>{{ $total_pasien }}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chart-body">
                                <canvas id="pasienChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header pb-0">
                        <div class="card-title">Pasien Rawat Inap <b>{{$pasien_masih_rawat_inap->count()}}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive tableFixHead">
                            <table class="table table-hover">
                                <thead>
                                    <th class="bg-white">#</th>
                                    <th class="bg-white">ID Rawat Inap</th>
                                    <th class="bg-white">Mulai Rawat</th>
                                </thead>
                                <tbody>
                                    @foreach ($pasien_masih_rawat_inap as $inap)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td class="ps-3">
                                               <a href="/view/rawat/inap/{{$inap->id}}"> 
                                                    <b>{{$inap->id_rawat_inap}} <i class="bi bi-box-arrow-up-right"></i></b><br>
                                                    {{$inap->pasien->nama_pasien}} 
                                                </a>
                                            </td>
                                            <td class="text-center">{{tanggal($inap->mulai_rawat, false)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title">Pemeriksaan Tanda Vital <b>{{tanggal(date('Y-m-d H:i:s'),null,null,true)}}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive tableFixHead">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-white">#</th>
                                        <th class="bg-white">Waktu</th>
                                        <th class="bg-white">ID Rawat Inap</th>
                                        <th class="bg-white">Skala Nyeri</th>
                                        <th class="bg-white">HR</th>
                                        <th class="bg-white">BP</th>
                                        <th class="bg-white">Temp</th>
                                        <th class="bg-white">RR</th>
                                        <th class="bg-white">Saturasi Oksigen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tanda_vital_hari_ini->sortByDesc('created_at') as $vital)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('H:i',strtotime($vital->created_at))}}</td>
                                            <td>
                                                <a href="/view/rawat/inap/{{$vital->rawatinap->id}}/4">
                                                    <b>{{$vital->rawatinap->id_rawat_inap}} <i class="bi bi-box-arrow-up-right"></i></b> <br>
                                                    {{$vital->rawatinap->pasien->nama_pasien}}
                                                </a>
                                            </td>
                                            <td class="text-center">{{$vital->skala_nyeri}}</td>
                                            <td class="text-center">{{$vital->hr}}</td>
                                            <td class="text-center">{{$vital->bp}}</td>
                                            <td class="text-center">{{$vital->temp}}</td>
                                            <td class="text-center">{{$vital->rr}}</td>
                                            <td class="text-center">{{$vital->saturasi_oksigen}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header pb-0">
                        <div class="card-title">Total Rawat Jalan <b>{{$total_rawat_jalan}}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chart-body">
                                <canvas id="jalanChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
    </div>

@section('js')

    <script>
        let pasien = @json($pasien_per_bulan);
        let tanggalMax = new Date();
        let tanggalMin = new Date(pasien[0].tanggal);
        const colors = {
            purple: {
                default: "rgba(67,94,190, 1)",
                half: "rgba(67,94,190, 0.5)",
                quarter: "rgba(67,94,190, 0.25)",
                zero: "rgba(67,94,190, 0)"
            },
            indigo: {
                default: "rgba(80, 102, 120, 1)",
                quarter: "rgba(80, 102, 120, 0.25)"
            }
        };

        let ctx = document.getElementById('pasienChart').getContext('2d');
        gradient = ctx.createLinearGradient(0, 25, 0, 300);
        gradient.addColorStop(0, colors.purple.half);
        gradient.addColorStop(0.35, colors.purple.quarter);
        gradient.addColorStop(1, colors.purple.zero);
        Chart.register(ChartDataLabels); 
        let options = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Pasien'
                    },
                    ticks: {
                        stepSize: 10
                    }
                },
                x: {
                    beginAtZero: true,
                    type: 'time',
                    time: {
                        unit: 'month',
                        tooltipFormat:'MMM yyyy'
                    },
                    grid: {
                        display: false
                    },
                    min: tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()-3),
                    max: tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()+1),
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
        // let pasien = @json($pasien_per_bulan);
        
        // console.log(tanggalMin.getMonth());
        let valTemp = [null, null];
        for (let date = tanggalMin; date <= tanggalMax; date.setMonth(date.getMonth() + 1)){
            const formattedMonth = date.getFullYear()+'-'+ cekSingle(date.getMonth()+1);
            cekTemp = pasien.find(e => e.tanggal === formattedMonth);
            if (cekTemp==undefined){
                temp = {
                    total_bulan:valTemp[0],
                    total:valTemp[1],
                    tanggal: formattedMonth
                }
                pasien.push(temp);
            }else{
                valTemp = [cekTemp.total_bulan, cekTemp.total]
            }
            
        }
        pasien.sort((a, b) => {
            if (a.tanggal < b.tanggal) {
                return -1;
            }
        });
        let datasets = [{
            label: 'Total Pasien',
            data: pasien,
            parsing: {
                yAxisKey: 'total',
                xAxisKey: 'tanggal',
            },
            spanGaps: true,
            fill:true,
            tension: 0.3,
            backgroundColor: gradient,
            
        }]
        let cfg = {
            type: 'line',
            options: options,
            data: {
                datasets: datasets
            },
        }
        const chartPasien =  new Chart(ctx, cfg);

        function scroller(scroll, chart) { 
            mintemp = new Date(chart.config.options.scales.x.min);
            maxtemp = new Date(chart.config.options.scales.x.max)
            
            if (scroll.deltaY > 0){
                if(chart.config.options.scales.x.max<tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()+1)){
                    chart.config.options.scales.x.max = maxtemp.setMonth(maxtemp.getMonth()+1);
                    chart.config.options.scales.x.min = mintemp.setMonth(mintemp.getMonth()+1);
                }else{
                    chart.config.options.scales.x.max = tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()+1);
                    chart.config.options.scales.x.min = tanggalMax.getFullYear()+'-'+ cekSingle(tanggalMax.getMonth()-3);
                }
            }else if (scroll.deltaY < 0){
                chart.config.options.scales.x.min = mintemp.setMonth(mintemp.getMonth()-1);
                chart.config.options.scales.x.max = maxtemp.setMonth(maxtemp.getMonth()-1);
            }
            chart.update();
        }

        chartPasien.canvas.addEventListener('wheel', (e)=>{
            scroller(e, chartPasien);
        });
    </script>

    

    <script>
        let jalan = @json($rawat_jalan_per_bulan);
        let bulanMinJalan = new Date(jalan[0].bulan);
        let bulanMaxJalan = new Date();
        let ctx2 = document.getElementById('jalanChart').getContext('2d');
        // Chart.register(ChartDataLabels);
        let options2 = {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Rawat Jalan'
                    },
                    ticks: {
                        stepSize: 10
                    }
                },
                x: {
                    beginAtZero: true,
                    type: 'time',
                    time: {
                        unit: 'month',
                        tooltipFormat:'MMM yyyy'
                    },
                    grid: {
                        display: false
                    },
                    min: bulanMaxJalan.getFullYear()+'-'+ cekSingle(bulanMaxJalan.getMonth()-3),
                    max: bulanMaxJalan.getFullYear()+'-'+ cekSingle(bulanMaxJalan.getMonth()+1),
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
        for (let date = bulanMinJalan; date <= bulanMaxJalan; date.setMonth(date.getMonth() + 1)){
            const formattedMonthJalan = date.getFullYear()+'-'+ cekSingle(date.getMonth()+1);
            cekTemp = jalan.find(e => e.bulan === formattedMonthJalan);
            if (cekTemp==undefined){
                temp = {
                    total:0,
                    bulan: formattedMonthJalan
                }
                jalan.push(temp);
            }
        }
        jalan.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
        let datasets2 = [{
            label: 'Total Rawat Jalan',
            data: jalan,
            parsing: {
                yAxisKey: 'total',
                xAxisKey: 'bulan',
            },
            spanGaps: true,
            fill:true,
            tension: 0.3,
            backgroundColor: 'pink',
            
        }]
        let cfg2 = {
            type: 'bar',
            options: options2,
            data: {
                datasets: datasets2
            },
        }
        const chartJalan =  new Chart(ctx2, cfg2);
        chartJalan.canvas.addEventListener('wheel', (e)=>{
            scroller(e, chartJalan);
        })


    </script>

    <script>
        $(document).ready(function(){
            $('canvas').hover(function () {
                    $('body').css('overflow','hidden')
                }, function () {
                    $('body').css('overflow','')
                }
            );
        })
    </script>
@stop
@endsection
