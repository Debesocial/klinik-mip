<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_obat',
        'created_by',
        'updated_by'
    ];

    public function obatalkes() {
        return $this->hasMany(ObatAlkes::class);
    }

    public function rawatinap() {
        return $this->hasMany(RawatInap::class);
    }

    public function rekammedis() {
        return $this->hasMany(RekamMedis::class);
    }

    public function izinistirahat() {
        return $this->hasMany(IzinIstirahat::class);
    }
}
