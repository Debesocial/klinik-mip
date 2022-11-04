<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'kontrol_kembali',
        'anamnesis',
        'tinggi_badan',
        'berat_badan',
        'suhu_badan',
        'tekanan_darah',
        'denyut_nadi',
        'laju_pernapasan',
        'saturasi_oksigen',
        'status_lokalis',
        'pemeriksaan_penunjang',
        'nama_penyakit_id',
        'obat_dikonsumsi',
        'dokumen',
        'created_by',
        'updated_by'
    ];

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class);
    }

    public function tindakan() {
        return $this->belongsTo(Tindakan::class);
    }

    public function kecelakaankerja() {
        return $this->belongsTo(KecelakaanKerja::class);
    }

    public function persetujuantindakan() {
        return $this->belongsTo(PersetujuanTindakan::class);
    }

    public function izinistirahat() {
        return $this->belongsTo(IzinIstirahat::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
