<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaVital extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'skala_nyeri',
        'hr',
        'bp',
        'temp',
        'rr',
        'saturasi_oksigen',
        'keterangan',
        'dokumen',
        'created_by',
        'updated_by'
    ];

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }

    public function hasilpemantauan() {
        return $this->hasMany(HasilPemantauan::class);
    }
}
