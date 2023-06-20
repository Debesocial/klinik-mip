<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganSehat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $total_last_year = $model->whereRaw('DATE_FORMAT(created_at, "%Y") = '.date('Y'))->count();
            $no_surat =  sprintf("%03d", $total_last_year+1).'/MIP-SITE/KLN/'.romawi(date('m')).'/'.date('Y');
            $model->no_surat = $no_surat;
        });
    } 

    public function generateNoSurat()
    {
        $total_last_year = $this->whereRaw('DATE_FORMAT(cretaed_at, "%Y")', '=',date('Y'))->count();
        return sprintf("%03d", $total_last_year).'/MIP-SITE/KLN/'.date('m').'/'.date('Y');
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
