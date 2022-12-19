<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanCovid extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'pemeriksaan_antigen_id',
        'hasil_pemeriksaan',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function pemeriksaan() {
        return $this->belongsTo(PemeriksaanAntigen::class, 'pemeriksaan_antigen_id', 'id');
    }
}
