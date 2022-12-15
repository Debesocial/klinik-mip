<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class IzinBerobat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tempat',
        'ttd',
        'created_by',
        'updated_by'
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
