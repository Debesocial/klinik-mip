<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_divisi_pasien',
        'created_by',
        'updated_by'
    ];
    public function pasien() {
        return $this->hasMany(Pasien::class);
    }
    public function user() {
        return $this->hasMany(User::class);
    }
}
