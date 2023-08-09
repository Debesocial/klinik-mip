<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $guarded = ['id']; 

    public function klasifikasi_penyakit() {
        return $this->belongsTo(KlasifikasiPenyakit::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}


