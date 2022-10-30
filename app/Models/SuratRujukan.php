<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratRujukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tempat',
        'tanggal',
        'riwayat',
        'obat_diberikan',
        'hasil_pengobatan',
        'spesialis_rujukan_id',
        'rumah_sakit_rujukan_id',
        'ttd',
        'created_by',
        'updated_by'
    ];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
    public function rumahsakitrujukan() {
        return $this->belongsTo(RumahSakitRujukan::class);
    }

    public function spesialisrujukan() {
        return $this->belongsTo(SpesialisRujukan::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
