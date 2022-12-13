<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaAlkes extends Model
{
    use HasFactory;

    protected $table = 'nama_alkes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_alkes',
        'created_by',
        'updated_by'
    ];

    public function alkes() {
        return $this->hasMany(Alkes::class);
    }
}
