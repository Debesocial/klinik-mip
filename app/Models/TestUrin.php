<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUrin extends Model
{
    use HasFactory;

    protected $fillable = [
        'penggunaan_obat',
        'jenis_obat',
        'asal_obat',
        'terakhir_digunakan',
        'amp',
        'met',
        'thc',
        'bzo',
        'mop',
        'coc',
        'created_by',
        'updated_by'
    ];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
