<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanObat extends Model
{
    use HasFactory;

    protected $table = 'satuan_obats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'satuan_obat',
        'created_by',
        'updated_by'
    ];

    public function obat_alkes() {
        return $this->hasMany(ObatAlkes::class);
    }
}
