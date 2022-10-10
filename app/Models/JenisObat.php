<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisObat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_obat',
        'created_by',
        'updated_by'
    ];

    public function obat_alkes() {
        return $this->hasMany(ObatAlkes::class);
    }
}
