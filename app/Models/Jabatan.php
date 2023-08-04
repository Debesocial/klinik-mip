<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';
    protected $primaryKey = 'id';
    protected $guarded = [
        'id'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function pasien() {
        return $this->hasMany(Pasien::class);
    }

    function perusahaan() {
        return $this->belongsTo(Perusahaan::class,'perusahaan_id','id');
    }
}
