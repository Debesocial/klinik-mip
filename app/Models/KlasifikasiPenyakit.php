<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiPenyakit extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function pasien() {
        return $this->hasMany(Pasien::class);
    }

    public function subklasifikasi() {
        return $this->hasMany(SubKlasifikasi::class);
    }

    public function rekammedis() {
        return $this->hasMany(RekamMedis::class);
    }
}
