<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaVital extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class,);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }

    public function hasilpemantauan() {
        return $this->belongsTo(HasilPemantauan::class, 'gejala', 'id');
    }

    public function rawatinap()
    {
        return $this->belongsTo(RawatInap::class, 'id_rawat_inap','id');
    }
}
