<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class McuAwal extends Model
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
            $model->id_mcu_awal = IdGenerator::generate([
                'table'  => 'mcu_awals',
                'field'  => 'id_mcu_awal',
                'length' => '12',
                'prefix' => 'MCUA' .substr( date('Y'), -2). date('m'),
            ]);
        });
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
    public function hasilpemantauan() {
        return $this->belongsTo(HasilPemantauan::class,'hasil_pemantauan_id', 'id');
    }
}
