<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaObat extends Model
{
    use HasFactory;

    protected $table = 'nama_obats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_obat',
        'created_by',
        'updated_by'
    ];

    public function obatalkes() {
        return $this->hasMany(ObatAlkes::class);
    }
    public function rawatinap() {
        return $this->hasMany(RawatInap::class);
    }
    public function izinistirahat() {
        return $this->hasMany(IzinIstirahat::class);
    }
}
