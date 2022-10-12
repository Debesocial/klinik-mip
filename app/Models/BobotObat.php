<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotObat extends Model
{
    use HasFactory;

    protected $table = 'bobot_obats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bobot_obat',
        'created_by',
        'updated_by'
    ];

    public function obatalkes() {
        return $this->hasMany(ObatAlkes::class);
    }
}
