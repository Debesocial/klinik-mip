
<div>
    <canvas id="myChart"></canvas>
</div>
  
  
<script>
    data = @json($vital);
    data.forEach(v => {
        v.x = tanggalFormat(v.created_at)
    });
    
    tanggal = @json($vital->map->only('created_at'));
    tanggal = tanggal.map(({created_at})=>tanggalFormat(created_at))
    ctx = document.getElementById('myChart');
    cfg = {
        type: 'line',
        data: {
            // labels: ["26/04/2023","26/04/2023"],
            datasets: [
                {
                    label: 'Skala Nyeri',
                    data: data,
                    parsing: {
                        yAxisKey: 'skala_nyeri'
                    }
                }, 
                {
                    label: 'HR',
                    data: data,
                    parsing: {
                        yAxisKey: 'hr'
                    }
                }, 
                {
                    label: 'BP',
                    data: data,
                    parsing: {
                        yAxisKey: 'bp'
                    }
                },
                {
                    label: 'Temp',
                    data: data,
                    parsing: {
                        yAxisKey: 'temp'
                    }
                },
                {
                    label: 'RR',
                    data: data,
                    parsing: {
                        yAxisKey: 'rr'
                    }
                },
                {
                    label: 'Saturasi Oksigen',
                    data: data,
                    parsing: {
                        yAxisKey: 'saturasi_oksigen'
                    }
                }
            ]
        },
    }

    new Chart(ctx, cfg);
    
    function tanggalFormat(stringdate) {
        let date = new Date(Date.parse(stringdate));
        formatDate = cekSingle(date.getDate())+'/'+cekSingle(date.getMonth())+'/'+date.getFullYear() + ' ' + cekSingle(date.getHours()) + ':' + cekSingle(date.getMinutes());
        return formatDate;
    }
</script>