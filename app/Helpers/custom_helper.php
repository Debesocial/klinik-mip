<?php

/** untuk cek jenis MCU Lanjutan */
function cekMcu($data)
{
    if ($data == 1) {
        return 'Akhir';
    } elseif ($data == 2) {
        return 'Berkala';
    } elseif ($data == 3) {
        return 'Khusus';
    }
}

/** Untuk menyamakan format tanggal
 */
function tanggal($tanggal, $jam = true, $monthText = false)
{
    if ($monthText) {
        $format = 'd F Y';
        $date = \Carbon\Carbon::parse($tanggal)->locale('id');
        $date->settings(['formatFunction' => 'translatedFormat']);
        return $date->format($format);
    }else{
        $format = 'd/m/Y H:i';
        if ($jam == false) {
            $format = 'd/m/Y';
        }
        return date($format, strtotime($tanggal));
    }
}


function umur($date)
{
    $date = new DateTime($date);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y . ' Tahun';
}

/** Untuk validation bootstrap */
function validasi($field_error = 'field', $pesan ='harus diisi')
{
    $html = '<div class="invalid-feedback">
        ' . $field_error .' '.$pesan.
    '</div> 
    <div class="valid-feedback">
        Data sudah benar.
    </div>';

    return $html;
}

/** Untuk Menghitung selisih hari dari dua tanggal */
function diffDay($awal, $akhir)
{
    $date1 = strtotime($awal);
    $date2 = strtotime($akhir);
    $diff = abs(($date1 - $date2) / (60 * 60 * 24));

    return $diff . ' hari';
}


function hasilRekomendasi()
{
    $data = [
        (object)['id' => 1, 'nama' => 'Fit to Work'],
        (object)['id' => 2, 'nama' => 'Fit with Note'],
        (object)['id' => 3, 'nama' => 'Temporary Unfit'],
        (object)['id' => 4, 'nama' => 'Unfit'],
    ];

    return (object) $data;
}

function cekRekomendasi($id)
{
    if ($id == 1) {
        return 'Fit to Work';
    } elseif ($id == 2) {
        return 'Fit with Note';
    } elseif ($id == 3) {
        return 'Temporary Unfit';
    } elseif ($id == 4) {
        return 'Infit';
    }
}

function imgUri($img)
{
    $image = $img;

    $type = pathinfo($image, PATHINFO_EXTENSION);
    $data = file_get_contents($image);
    $dataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $dataUri;
}


/**Untuk detail pasien saat membuat surat keterangan */
function detailPasienSurat($items)
{
    $html = '<div class="table-responsive">
        <table class="table table-borderless">
            <tbody>';
    foreach ($items as $key => $value) {
        $html .= ' <tr>
                <th width=20%>' . $key . '</th>
                <td id="' . $value . '">:</td>
            </tr>';
    }
    $html .= '</tbody>
            </table>
        </div>';

    return $html;
}
