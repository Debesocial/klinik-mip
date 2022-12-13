<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Alkes extends Model
{
    use HasFactory;

    protected $fillable = [
        'kod',
        'golongan_alkes_id',
        'nama_alkes_id',
        'satuan_obat_id',
        'bobot_obat_id',
        'komposisis',
        'created_by',
        'updated_by'
    ];

    public static function boot()
    {
        parent::boot();
        $year  =  date('Y'); 
        $month =  date('m');
        $year   = substr( $year, -2). ''. $month;
        self::creating(function ($model) {
            $model->kod = IdGenerator::generate([
                'table'  => 'alkes',
                'field'  => 'kod',
                'length' => '10',
                'prefix' => 'AK' .substr( date('Y'), -2). date('m'),
            ]);
        });
    }

    public function golongan_alkes() {
        return $this->belongsTo(GolonganAlkes::class);
    }
    public function nama_alkes() {
        return $this->belongsTo(NamaAlkes::class);
    }
    public function satuan_obat() {
        return $this->belongsTo(SatuanObat::class);
    }
    public function bobot_obat() {
        return $this->belongsTo(BobotObat::class);
    }
}
