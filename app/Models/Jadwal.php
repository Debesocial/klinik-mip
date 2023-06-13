<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jadwals';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    
    public function user() {
        return $this->hasOne(User::class);
    }
}
