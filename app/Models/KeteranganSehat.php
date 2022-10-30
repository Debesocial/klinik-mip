<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganSehat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'anamnesis',
        'tinggi_badan',
        'berat_badan',
        'suhu_badan',
        'tekanan_darah',
        'denyut_nadi',
        'laju_pernapasan',
        'saturasi',
        'status',
        'hasil',
        'ttd',
        'catatan',
        'created_by',
        'updated_by'
    ];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
