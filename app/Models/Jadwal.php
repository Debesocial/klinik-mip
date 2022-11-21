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
        'senin',
        'selasa',
        'rabu',
        'kamis',
        'jumat',
        'sabtu',
        'minggu'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
