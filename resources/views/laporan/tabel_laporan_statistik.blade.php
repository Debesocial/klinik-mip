<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<table id="table-1" class="table table-hover  w-100">

</table>


<script>
    kunjungan = @json($total[0]);
    jenis = "{{ $jenis }}";
    if (jenis == 'bulanan') {
        set_year = "{{ $set_year }}";
        date = new Date()
        year = set_year;
        awal = new Date(year, 0);
        akhir = new Date(year, 11);
        newKunjungan = [];
        for (let date = awal; date <= akhir; date.setMonth(date.getMonth() + 1)) {
            const formattedMonthKunjungan = date.getFullYear() + '-' + cekSingle(date.getMonth() + 1);
            cekTemp = kunjungan.find(e => e.bulan === formattedMonthKunjungan);
            if (cekTemp == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
                newKunjungan.push(temp);
            } else {
                newKunjungan.push(cekTemp);
            }
        }

        newKunjungan.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
    } else if (jenis == 'harian') {
        start = "{{ $start }}";
        end = "{{ $end }}";
        start = new Date(start);
        end = new Date(end);
        newKunjungan = [];
        for (let date = start; date <= end; date.setDate(date.getDate() + 1)) {
            const formattedMonthKunjungan = date.getFullYear() + '-' + cekSingle(date.getMonth() + 1) + '-' + cekSingle(
                date.getDate());
            cekTemp = kunjungan.find(e => e.bulan === formattedMonthKunjungan);
            if (cekTemp == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
            } else {
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

    listBulan = ['Januari', 'Feberuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
        'November', 'Desember'
    ];

    $('#table-1').DataTable({
        data: newKunjungan,
        columns: [{
                title: function() {
                    if (jenis == 'harian') {
                        return 'Tanggal';
                    } else {
                        return 'Bulan';
                    }
                },
                data: 'bulan',
                render: {
                    _: function(data, type, row) {
                        newDate = new Date(data);
                        if (jenis == 'harian') {
                            return cekSingle(newDate.getDate()) + '-' + cekSingle(newDate.getMonth()) +
                                '-' + newDate.getFullYear();

                        }
                        return listBulan[newDate.getMonth()];
                    },
                    sort: function(data, type, row) {
                        return type;
                    },
                },
                className: 'text-start'

            },
            {
                title: 'Total',
                data: 'total',
                className: 'text-start'
            }
        ],
        searching: false,
        paging: false,
        info: false,
        ordering: false,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            text: 'Export Excel'
        }]
    })
</script>
