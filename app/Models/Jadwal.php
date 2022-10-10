<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'hari',
        'shift',
        'dari',
        'sampai'
    ];
    
    public function user() {
        return $this->hasMany(User::class);
    }
}
