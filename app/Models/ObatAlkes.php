<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatAlkes extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_obat_id',
        'golongan_obat_id',
        'nama_obat_id',
        'satuan_obat_id',
        'bobot_obat_id',
        'komposisi_obat',
        'created_by',
        'updated_by'
    ];

    public function jenis_obat() {
        return $this->belongsTo(JenisObat::class);
    }
    public function golongan_obat() {
        return $this->belongsTo(GolonganObat::class);
    }
    public function nama_obat() {
        return $this->belongsTo(NamaObat::class);
    }
    public function satuan_obat() {
        return $this->belongsTo(SatuanObat::class);
    }
    public function bobot_obat() {
        return $this->belongsTo(BobotObat::class);
    }
}
