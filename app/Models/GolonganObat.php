<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganObat extends Model
{
    use HasFactory;

    protected $table = 'golongan_obats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_golongan_obat',
        'created_by',
        'updated_by'
    ];

    public function obatalkes() {
        return $this->hasMany(ObatAlkes::class);
    }

    public function obat() {
        return $this->hasMany(Obat::class);
    }

    
}
