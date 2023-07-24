<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganBerobat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class, 'nama_penyakit_id', 'id');
    }
    public function sekunders() {
        return $this->belongsTo(NamaPenyakit::class, 'sekunder', 'id');
    }

    public function rumahsakitrujukan() {
        return $this->belongsTo(RumahSakitRujukan::class, 'rumah_sakit_rujukans_id', 'id');
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    function dokterRujuk() {
        return $this->belongsTo(User::class, 'dokter_rujuk','id');
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
