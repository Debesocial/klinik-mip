<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakitRujukan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_RS_rujukan',
        'created_by',
        'updated_by'
    ];
}
