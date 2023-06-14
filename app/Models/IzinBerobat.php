<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class IzinBerobat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // public function getCreatedAtAttribute() {
    //     return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    // }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
