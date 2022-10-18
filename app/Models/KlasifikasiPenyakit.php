<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiPenyakit extends Model
{
    use HasFactory;

    protected $fillable = [
        'klasifikasi_penyakit',
        'created_by',
        'updated_by'
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
}
