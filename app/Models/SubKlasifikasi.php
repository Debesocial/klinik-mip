<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKlasifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penyakit',
        'klasifikasi_penyakit_id',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function pasien() {
        return $this->hasMany(Pasien::class);
    }

    public function klasifikasi_penyakit() {
        return $this->belongsTo(KlasifikasiPenyakit::class);
    }

    public function namapenyakit(){
        return $this->hasMany(NamaPenyakit::class);
    }

    public function rekammedis() {
        return $this->hasMany(RekamMedis::class);
    }

}
