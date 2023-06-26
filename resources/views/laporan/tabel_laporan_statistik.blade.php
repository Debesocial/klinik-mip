<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">


<div class="table-responsive">
    <table id="table-1" class="table table-hover  w-100">
    
    </table>

</div>

<script>
    kunjungan = @json($total_pekerja_sakit[0]);
    absen = @json($total_pekerja_absen[0]);
    pak = @json($total_pak[0]);
    jenis = "{{ $jenis }}";
    namaperusahaan = "{{$namaperusahaan}}";
    if (jenis == 'bulanan') {
        set_year = "{{ $set_year }}";
        title = "STATISTIK LAPORAN KESEHATAN KERJA TAHUN " + set_year + " " + namaperusahaan?? "PT MANDIRI INTI PERKASA"; 													
        date = new Date()
        year = set_year;
        awal = new Date(year, 0);
        akhir = new Date(year, 11);
        newKunjungan = [];
        newAbsen = [];
        newPak = [];
        for (let date = awal; date <= akhir; date.setMonth(date.getMonth() + 1)) {
            const formattedMonthKunjungan = date.getFullYear() + '-' + cekSingle(date.getMonth() + 1);
            cekTemp = kunjungan.find(e => e.bulan === formattedMonthKunjungan);
            cekTempAbsen = absen.find(e => e.bulan === formattedMonthKunjungan);
            cekTempPak = pak.find(e => e.bulan === formattedMonthKunjungan);
            if (cekTemp == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
                newKunjungan.push(temp);
            } else {
                newKunjungan.push(cekTemp);
            }
            if (cekTempAbsen == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
                newAbsen.push(temp);
            } else {
                newAbsen.push(cekTempAbsen);
            }
            if (cekTempPak == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
                newPak.push(temp);
            } else {
                newPak.push(cekTempPak);
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
        title = "STATISTIK LAPORAN KESEHATAN KERJA TAHUN " + "{{ tanggal($start,null,true) }}" + " - "+ "{{ tanggal($end, null, true) }}"+ " " + namaperusahaan?? "PT MANDIRI INTI PERKASA"; 													

        newKunjungan = [];
        newAbsen = [];
        newPak = [];
        for (let date = start; date <= end; date.setDate(date.getDate() + 1)) {
            const formattedMonthKunjungan = date.getFullYear() + '-' + cekSingle(date.getMonth() + 1) + '-' + cekSingle(
                date.getDate());
                cekTemp = kunjungan.find(e => e.bulan === formattedMonthKunjungan);
                cekTempAbsen = absen.find(e => e.bulan === formattedMonthKunjungan);
                cekTempPak = pak.find(e => e.bulan === formattedMonthKunjungan);
            if (cekTemp == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
                newKunjungan.push(temp);
            } else {
                newKunjungan.push(cekTemp);
            }
            if (cekTempAbsen == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
                newAbsen.push(temp);
            } else {
                newAbsen.push(cekTempAbsen);
            }
            if (cekTempPak == undefined) {
                temp = {
                    total: 0,
                    bulan: formattedMonthKunjungan
                }
                newPak.push(temp);
            } else {
                newPak.push(cekTempPak);
            }
        }

        newKunjungan.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
        newAbsen.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
        newPak.sort((a, b) => {
            if (a.bulan < b.bulan) {
                return -1;
            }
        });
    }

    listBulan = ['Januari', 'Feberuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
        'November', 'Desember'
    ];
    header = [{title:'Item'}];
    transData = [];

    layak =['Jumlah Pekerja yang layak kerja berdasarkan pemeriksaan (orang)'];
    spell =['Jumlah Spell'];
    jumlahPekerjaKumulatif =['Jumlah Pekerja Kumulatif'];
    jamKerjaKumulatif =['Jumlah Jam Kerja Kumulatif'];
    kaptk =['Jumlah KAPTK'];
    pasienSakit =['Jumlah Pekerja yang sakit karena penyakit, tidak termasuk kecelakaan (orang)'];
    pasienAbsen =['Jumlah Absensi Karena Sakit, tidak termasuk kecelakaan (hari kerja hilang karena sakit)'];
    jumlahPak =['Jumlah Kasus PAK '];

    newKunjungan.forEach(data => {
        newDate = new Date(data.bulan);
        if (jenis == 'harian') {
            header.push({title:cekSingle(newDate.getDate()) + '-' + cekSingle(newDate.getMonth()+1) +
                '-' + newDate.getFullYear()});
        }else if(jenis=='bulanan'){
            header.push({title:listBulan[newDate.getMonth()]});
        }
        pasienSakit.push(data.total);
        layak.push('-');
        spell.push('-');
        jumlahPekerjaKumulatif.push('-');
        jamKerjaKumulatif.push('-');
        kaptk.push('-');
    });
    newAbsen.forEach(data => {
        pasienAbsen.push(data.total);
    });
    newPak.forEach(data => {
        jumlahPak.push(data.total);
    });
    transData.push(layak,pasienSakit, pasienAbsen,spell, jumlahPak, jumlahPekerjaKumulatif, jamKerjaKumulatif, kaptk);

     $('#table-1').DataTable({
        data: transData,
        columns: header,
        searching: false,
        paging: false,
        info: false,
        ordering: false,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            text: 'Export Excel',
            title: title,
        }]
    });
    
</script>
