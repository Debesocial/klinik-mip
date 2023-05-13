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
function tanggal($tanggal, $jam = true)
{
    $format = 'd/m/Y H:i';
    if ($jam == false) {
        $format = 'd/m/Y';
    }
    return date($format, strtotime($tanggal));
}
