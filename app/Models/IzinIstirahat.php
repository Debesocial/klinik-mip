<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinIstirahat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rumahsakitrujukan() {
        return $this->belongsTo(RumahSakitRujukan::class);
    }

    public function spesialisrujukan() {
        return $this->belongsTo(SpesialisRujukan::class);
    }
    
    public function tindakan() {
        return $this->belongsTo(Tindakan::class);
    }

    public function jenisobat() {
        return $this->belongsTo(JenisObat::class);
    }

    public function namaobat() {
        return $this->belongsTo(NamaObat::class);
    }

    function namapenyakit()
    {
        return $this->belongsTo(NamaPenyakit::class, 'diagnosa', 'id');
    }
    function namapenyakitsekunder()
    {
        return $this->belongsTo(NamaPenyakit::class, 'diagnosa_sekunder', 'id');
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
