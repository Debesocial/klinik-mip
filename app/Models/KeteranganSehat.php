<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganSehat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tinggi_badan',
        'berat_badan',
        'suhu_tubuh',
        'tekanan_darah',
        'denyut_nadi',
        'laju_pernapasan',
        'saturasi',
        'hasil',
        'ttd',
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
