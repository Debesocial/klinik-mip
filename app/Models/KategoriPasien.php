<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPasien extends Model
{
    use HasFactory;
    protected $table = 'kategori_pasiens';
    
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }
}
