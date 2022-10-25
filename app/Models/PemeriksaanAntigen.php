<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanAntigen extends Model
{
    use HasFactory;

    protected $fillable = [
        'kebutuhan',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function pasien() {
        return $this->hasMany(Pasien::class);
    }

    public function pemeriksaancovid() {
        return $this->hasMany(pemeriksaancovid::class);
    }
}
