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

    public function sub_klasifikasi(){
        return $this->belongsTo(SubKlasifikasi::class);
    }
}
