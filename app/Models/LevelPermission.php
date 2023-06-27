<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPermission extends Model
{
    use HasFactory;
    protected $fillable = ['id_level', 'id_permission'];
    public $timestamps = false;
}
