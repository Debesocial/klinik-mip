function tampilModalPasien(data) {
    var modalPasien = $('#modalPasien');
    $('.modal-title').text('Data ' + data.nama_pasien);
    $('#modal_nama').text(': ' + data.nama_pasien);
    $('#modal_rekam_medis').text(': ' + data.id_rekam_medis);
    $('#modal_nomor_induk_karyawan').text(': ' + cekNull(data.NIK));
    $('#modal_ttl').text(': ' + data.tempat_lahir + ', ' + tanggal(data.tanggal_lahir, false));
    $('#modal_alamat').text(': ' + data.alamat);
    $('#modal_pekerjaan').text(': ' + firstCapital(data.pekerjaan));
    $('#modal_perusahaan').text(': ' +cekNull(data.perusahaan?.nama_perusahaan_pasien));
    $('#modal_divisi').text(': ' + cekNull(data.divisi?.nama_divisi_pasien));
    $('#modal_jabatan').text(': ' + cekNull(data.jabatan?.nama_jabatan));
    $('#modal_jenis_kelamin').text(': ' + data.jenis_kelamin);
    $('#modal_telepon').text(': ' + data.telepon);
    $('#modal_email').text(': ' + cekNull(data.email));
    $('#modal_alergi').html(': ' + cekAlergi(data.alergi));
    $('#modal_menyusui').html(': ' + cekTrueFalse(data.hamil_menyusui));
    $('#modal_nama_keluarga').html(': ' + cekAlergi(data.keluarga.nama));
    $('#modal_hubungan_keluarga').html(': ' + cekAlergi(data.keluarga.hubungan));
    $('#modal_alamat_keluarga').html(': ' + cekAlergi(data.keluarga.alamat));
    $('#modal_pekerjaan_keluarga').html(': ' + cekAlergi(data.keluarga.pekerjaan));
    $('#modal_telepon_keluarga').html(': ' + cekAlergi(data.keluarga.telepon));
    $('#modal_email_keluarga').html(': ' + cekAlergi(data.keluarga.email));
    $('#modal_kategori').html(': ' + cekAlergi(data.kategori.nama_kategori));
    if(data.perusahaan_id==9){
        $('td#modal_perusahaan').append(' - <b class="m-0">'+data.lain+'</b>');
    }
    $('#pp').html('<img id="modal-img" class="img-fluid rounded-circle" src="' + cekImg(data.upload) + '">')
    modalPasien.modal('show')
}

function cekAlergi(val) {
    if (val == null) {
        return '<b class="text-primary">-</b>';
    } else {
        return firstCapital(val);
    }
}

function tanggal(stringdate) {
    let date = new Date(Date.parse(stringdate));
    formatDate = cekSingle(date.getDate())+'/'+cekSingle(date.getMonth()+1)+'/'+cekSingle(date.getFullYear());
    return formatDate;
}

function cekTrueFalse(val) {
    if (val == 1) {
        return '<i class="fas fa-check text-primary"></i>';
    } else {
        return '<i class="fas fa-times text-danger"></i>';
    }
}

function cekNull(val) {
    if (val==null||val==''||val==undefined){
        return '-';
    }
    return val;
}

function tampilModalSurat(url, title) {
    var modal = $('#modalSurat');

    $('#modalSurat_title').text(title);
    var request = $.ajax({
        method: 'GET',
        url: url,
    });
    request.done(function(html) {
        $('#modalSurat_body').html(html);
    })

    modal.modal('show');
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function firstCapital(word){
    return word.charAt(0).toUpperCase()+ word.slice(1)
}
