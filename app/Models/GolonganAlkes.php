<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganAlkes extends Model
{
    use HasFactory;

    protected $table = 'golongan_alkes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'golongan_alkes',
        'created_by',
        'updated_by'
    ];

    public function alkes() {
        return $this->hasMany(Alkes::class);
    }
}
