<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganBerobat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'rumah_sakit_rujukans_id',
        'nama_penyakit_id',
        'sekunder',
        'resep',
        'saran',
        'kontrol',
        'tanggal_kembali',
        'created_by',
        'updated_by'
    ];

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class, 'nama_penyakit_id', 'id');
    }

    public function rumahsakitrujukan() {
        return $this->belongsTo(RumahSakitRujukan::class, 'rumah_sakit_rujukans_id', 'id');
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
