<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    public function pasien() {
        return $this->hasMany(Pasien::class);
    }
    public function user() {
        return $this->hasMany(User::class);
    }

    function perusahaan() {
        return $this->belongsTo(Perusahaan::class,'perusahaan_id','id');
    }
}
