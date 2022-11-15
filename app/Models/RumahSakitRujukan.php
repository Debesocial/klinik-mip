<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakitRujukan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_RS_rujukan',
        'created_by',
        'updated_by'
    ];

    public function suratrujukan() {
        return $this->hasMany(SuratRujukan::class);
    }

    public function izinistirahat() {
        return $this->hasMany(IzinIstirahat::class);
    }

    public function keteranganberobat() {
        return $this->hasMany(KeteranganBerobat::class);
    }
}
