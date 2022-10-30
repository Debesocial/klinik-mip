<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'anamnesis',
        'tinggi_badan',
        'berat_badan',
        'suhu_badan',
        'tekanan_darah',
        'denyut_nadi',
        'laju_pernapasan',
        'saturasi_oksigen',
        'pemeriksaan_penunjang',
        'nama_penyakit_id',
        'tindakan_id',
        'alat_kesehatan',
        'jumlah_pengguna',
        'keterangan',
        'nama_obat',
        'jumlah_obat',
        'aturan',
        'keterangan_obat',
        'catatan',
        'created_by',
        'updated_by'
    ];


    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class);
    }

    public function tindakan() {
        return $this->belongsTo(Tindakan::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
