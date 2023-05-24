<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaPenyakit extends Model
{
    use HasFactory;

    protected $fillable = [
        'primer',
        'sekunder',
        'sub_klasifikasi_id',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function pasien() {
        return $this->hasMany(Pasien::class);
    }

    public function rekammedis() {
        return $this->hasMany(RekamMedis::class);
    }

    // public function rawatinap() {
    //     return $this->hasMany(RawatInap::class);
    // }

    public function permintaanmakanan() {
        return $this->belongsTo(PermintaanMakanan::class, 'nama_penyakit_id', 'id');
    }

    public function tandavital() {
        return $this->hasMany(TandaVital::class);
    }

    public function kecelakaankerja() {
        return $this->hasMany(KecelakaanKerja::class);
    }

    public function keteranganberobat() {
        return $this->hasMany(KeteranganBerobat::class);
    }

    public function sub_klasifikasi(){
        return $this->belongsTo(SubKlasifikasi::class);
    }

    public function izinistirahat() {
        return $this->hasMany(IzinIstirahat::class);
    }

    public function instruksidokter()
    {
        return $this->belongsTo(InstruksiDokter::class, 'diagnosa', 'id');
    }
    public function instruksidoktersekunder()
    {
        return $this->belongsTo(InstruksiDokter::class, 'diagnosa_sekunder', 'id');
    }
}
