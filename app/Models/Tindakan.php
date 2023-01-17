<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tindakan',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function rekammedis() {
        return $this->hasMany(RekamMedis::class);
    }

    public function rawatinap() {
        return $this->hasMany(RawatInap::class);
    }

    public function kecelakaankerja() {
        return $this->hasMany(KecelakaanKerja::class);
    }

    public function izinistirahat() {
        return $this->hasMany(IzinIstirahat::class);
    }

    public function rawatjalan() {
        return $this->hasMany(RawatJalan::class);
    }
}
