<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemantauanCovid extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'no_kamar',
        'suhu_pagi',
        'td',
        'hr',
        'spo',
        'gejala',
        'jenis_pemeriksaan',
        'tanggal_pemeriksaan',
        'hasil_laboratorium',
        'lampiran_laboratorium',
        'tanggal_laboratorium',
        'hasil_rapid',
        'lampiran_rapid',
        'tanggal_rapid',
        'hasil_rontgen',
        'lampiran_rontgen',
        'tanggal_rontgen',
        'keterangan',
        'perjalanan',
        'asal',
        'kota_tujuan',
        'created_by',
        'updated_by'
    ];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
    public function hasilpemantauan() {
        return $this->hasMany(HasilPemantauan::class);
    }
}
