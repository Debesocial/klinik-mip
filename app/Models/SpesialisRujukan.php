<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialisRujukan extends Model
{
    use HasFactory;

    protected $table = 'spesialis_rujukans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_spesialis_rujukan',
        'created_by',
        'updated_by'
    ];

    public function suratrujukan() {
        return $this->hasMany(SuratRujukan::class);
    }

    public function izinistirahat() {
        return $this->hasMany(IzinIstirahat::class);
    }
}
