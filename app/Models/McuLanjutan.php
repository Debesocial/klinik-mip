<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class McuLanjutan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public static function boot()
    {
        parent::boot();
        $year  =  date('Y');
        $month =  date('m');
        $year   = substr($year, -2) . '' . $month;
        self::creating(function ($model) {
            $model->id_mcu_lanjutan = IdGenerator::generate([
                'table'  => 'mcu_lanjutans',
                'field'  => 'id_mcu_lanjutan',
                'length' => '12',
                'prefix' => 'MCUL' . substr(date('Y'), -2) . date('m'),
            ]);
        });
    }
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
