function tampilModalPasien(data) {
    var modalPasien = $('#modalPasien');
    $('.modal-title').text('Data ' + data.nama_pasien);
    $('#modal_nama').text(': ' + data.nama_pasien);
    $('#modal_rekam_medis').text(': ' + data.id_rekam_medis);
    $('#modal_nomor_induk_karyawan').text(': ' + data.NIK);
    $('#modal_ttl').text(': ' + data.tempat_lahir + ', ' + tanggal(data.tanggal_lahir));
    $('#modal_alamat').text(': ' + data.alamat);
    $('#modal_pekerjaan').text(': ' + data.pekerjaan);
    $('#modal_perusahaan').text(': ' + data.perusahaan.nama_perusahaan_pasien);
    $('#modal_divisi').text(': ' + data.divisi.nama_divisi_pasien);
    $('#modal_jabatan').text(': ' + data.jabatan.nama_jabatan);
    $('#modal_jenis_kelamin').text(': ' + data.jenis_kelamin);
    $('#modal_telepon').text(': ' + data.telepon);
    $('#modal_email').text(': ' + data.email);
    $('#modal_alergi').html(': ' + cekAlergi(data.alergi));
    $('#modal_menyusui').html(': ' + cekTrueFalse(data.hamil_menyusui));
    $('#modal_nama_keluarga').html(': ' + cekAlergi(data.keluarga.nama));
    $('#modal_hubungan_keluarga').html(': ' + cekAlergi(data.keluarga.hubungan));
    $('#modal_alamat_keluarga').html(': ' + cekAlergi(data.keluarga.alamat));
    $('#modal_pekerjaan_keluarga').html(': ' + cekAlergi(data.keluarga.pekerjaan));
    $('#modal_telepon_keluarga').html(': ' + cekAlergi(data.keluarga.telepon));
    $('#modal_email_keluarga').html(': ' + cekAlergi(data.keluarga.email));
    $('#pp').html('<img id="modal-img" class="img-fluid rounded-circle" src="' + cekImg(data.upload) + '">')
    modalPasien.modal('show')
}

function cekAlergi(val) {
    if (val == null) {
        return '<b class="text-primary">-</b>';
    } else {
        return val;
    }
}

function tanggal(stringdate) {
    let date = new Date(Date.parse(stringdate));
    formatDate = date.getDate()+'/'+date.getMonth()+'/'+date.getFullYear();
    return formatDate;
}

function cekTrueFalse(val) {
    if (val == 1) {
        return '<i class="fas fa-check text-primary"></i>';
    } else {
        return '<i class="fas fa-times text-danger"></i>';
    }
}
