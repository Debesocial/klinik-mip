<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanTindakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'rekam_medis_id',
        'riwayat',
        'hasil',
        'ttd',
        'catatan',
        'created_by',
        'updated_by'
    ];

    public function rekammedis() {
        return $this->belongsTo(RekamMedis::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
