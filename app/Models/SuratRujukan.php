<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratRujukan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
    public function rumahsakitrujukan() {
        return $this->belongsTo(RumahSakitRujukan::class, 'rumah_sakit_rujukan_id', 'id');
    }

    public function spesialisrujukan() {
        return $this->belongsTo(SpesialisRujukan::class, 'spesialis_rujukan_id', 'id');
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
