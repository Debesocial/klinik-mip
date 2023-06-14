<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecelakaanKerja extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class);
    }

    public function tindakan() {
        return $this->belongsTo(Tindakan::class);
    }

    public function rekammedis() {
        return $this->belongsTo(RekamMedis::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function lokasi_kejadian()
    {
        return $this->belongsTo(LokasiKejadian::class, 'lokasi','id');
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
