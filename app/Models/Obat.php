<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Obat extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public static function boot()
    {
        parent::boot();
        $year  =  date('Y'); 
        $month =  date('m');
        $year   = substr( $year, -2). ''. $month;
        self::creating(function ($model) {
            $model->kode = IdGenerator::generate([
                'table'  => 'obats',
                'field'  => 'kode',
                'length' => '10',
                'prefix' => 'OB' .substr( date('Y'), -2). date('m'),
            ]);
        });
    }

    public function golongan_obat() {
        return $this->belongsTo(GolonganObat::class);
    }
    // public function nama_obat() {
    //     return $this->belongsTo(NamaObat::class);
    // }
    public function satuan_obat() {
        return $this->belongsTo(SatuanObat::class);
    }
    public function bobot_obat() {
        return $this->belongsTo(BobotObat::class);
    }
}
