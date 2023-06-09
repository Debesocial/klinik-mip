function pilihPasien(pasien) {
    var pasien_index = $('#select_pasien_id').val();
    if (pasien_index === '') {
        $('#detail_pasien').fadeOut('slow')
        $('#select_pasien_id').removeClass('is-valid')
        $('#select_pasien_id').addClass('is-invalid')
        $('.invalid-feedback').addClass('d-block')
    } else {
        
        $('[name=pasien_id]').val(pasien.id)
        $('td#nama').text(": " + pasien.nama_pasien);
        $('td#umur').text(": " + getAge(pasien.tanggal_lahir));
        $('td#rekam_medis').text(": " + pasien.id_rekam_medis);
        $('td#nomor_induk_karyawan').text(": " + cekNull(pasien.NIK))
        $('td#ttl').text(": " + pasien.tempat_lahir + ', ' + pasien.tanggal_lahir)
        $('td#alamat').text(": " + pasien.alamat)
        $('td#pekerjaan').text(": " + pasien.pekerjaan)
        $('td#perusahaan').text(": " + cekNull(pasien.perusahaan?.nama_perusahaan_pasien))
        $('td#divisi').text(": " + cekNull(pasien.divisi?.nama_divisi_pasien))
        $('td#jabatan').text(": " + cekNull(pasien.jabatan?.nama_jabatan))
        $('td#jenis_kelamin').text(": " + pasien.jenis_kelamin)
        $('td#telepon').text(": " + pasien.telepon)
        $('td#kategori').text(": " + pasien.kategori.nama_kategori )
        $('#alergi').html(': ' + cekAlergi(pasien.alergi));
        $('#menyusui').html(': ' + cekTrueFalse(pasien.hamil_menyusui));
        if(pasien.perusahaan_id==9){
            $('td#perusahaan').append(' - <b class="m-0">'+pasien.lain+'</b>');
        }

        var email = pasien.email ?? '-'
        $('td#email').text(": " + email);
        $('.invalid-feedback').removeClass('d-block')
        $('#detail_pasien').fadeIn('slow')

    }
}
// function getAge(dateString) {
//     var today = new Date();
//     var birthDate = new Date(dateString);
//     var age = today.getFullYear() - birthDate.getFullYear();
//     var m = today.getMonth() - birthDate.getMonth();
//     if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
//         age--;
//     }
//     return age;
// }

function getAge(tanggalLahir) {
    var hariIni = new Date();
    var tanggalLahir = new Date(tanggalLahir);
    
    var tahun = hariIni.getFullYear() - tanggalLahir.getFullYear();
    var bulan = hariIni.getMonth() - tanggalLahir.getMonth();
    var hari = hariIni.getDate() - tanggalLahir.getDate();
  
    if (bulan < 0 || (bulan === 0 && hari < 0)) {
      tahun--;
      bulan += 12;
    }
  
    if (hari < 0) {
      var bulanSebelumnya = new Date(hariIni.getFullYear(), hariIni.getMonth() - 1, tanggalLahir.getDate());
      hari = Math.floor((hariIni - bulanSebelumnya) / (1000 * 60 * 60 * 24));
    }
  
    // return {
    //   tahun: tahun,
    //   bulan: bulan,
    //   hari: hari
    // };
    return tahun + ' Tahun ' + bulan + ' Bulan ' + hari + ' Hari';
  }

function cekNull(val) {
    if (val==null||val==''||val==undefined){
        return '-';
    }
    return val;
}

// function firstCapital(word){
//     return word.charAt(0).toUpperCase()+ word.slice(1)
// }

function setPasien(pasien) {
    $('[name=pasien_id]').val(pasien.id)
    $('td#nama').text(": " + pasien.nama_pasien);
    $('td#umur').text(": " + getAge(pasien.tanggal_lahir));
    $('td#rekam_medis').text(": " + pasien.id_rekam_medis);
    $('td#nomor_induk_karyawan').text(": " + cekNull(pasien.NIK))
    $('td#ttl').text(": " + pasien.tempat_lahir + ', ' + pasien.tanggal_lahir)
    $('td#alamat').text(": " + pasien.alamat)
    $('td#pekerjaan').text(": " + pasien.pekerjaan)
    $('td#kategori').text(": " + pasien.kategori.nama_kategori )
    $('td#perusahaan').text(": " +  cekNull(pasien.perusahaan?.nama_perusahaan_pasien))
    $('td#divisi').text(": " + cekNull(pasien.divisi?.nama_divisi_pasien))
    $('td#jabatan').text(": " + cekNull(pasien.jabatan?.nama_jabatan))
    $('td#jenis_kelamin').text(": " + pasien.jenis_kelamin)
    $('td#telepon').text(": " + pasien.telepon)
    var email = pasien.email ?? '-'
    $('td#email').text(": " + email);
    $('.invalid-feedback').removeClass('d-block')
    $('#detail_pasien').fadeIn('slow');
    $('#alergi').html(': ' + cekAlergi(pasien.alergi));
    $('#menyusui').html(': ' + cekTrueFalse(pasien.hamil_menyusui));
    if(pasien.perusahaan_id==9){
        $('td#perusahaan').append(' - <b class="m-0">'+pasien.lain+'</b>');
    }
}
