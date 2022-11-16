<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_jabatan',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

    public function pasien() {
        return $this->hasMany(Pasien::class);
    }
}
