<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPemantauan extends Model
{
    use HasFactory;
    protected $table = 'hasil_pemantauans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'nama_pemantauan',
        'created_by',
        'updated_by'
    ];
}
