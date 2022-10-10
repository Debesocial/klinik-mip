<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiKejadian extends Model
{
    use HasFactory;

    protected $table = 'lokasi_kejadians';
    
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_lokasi',
        'created_by',
        'updated_by'
    ];
}
