<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sediaan extends Model
{
    use HasFactory;

    protected $table = 'sediaan';
    protected $guarded = ['id'];

    
}