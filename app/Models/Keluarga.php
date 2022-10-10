<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'hubungan',
        'alamat',
        'pekerjaan',
        'telepon',
        'email',
        'created_by',
        'updated_by'
        
    ];

    public function user() {
        return $this->hasMany(User::class);
    }

}
