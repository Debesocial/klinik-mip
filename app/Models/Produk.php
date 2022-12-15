<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nama_produk',
        'satuan_obat_id',
        'bobot_obat_id',
        'komposisi',
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
            $model->code = IdGenerator::generate([
                'table'  => 'produks',
                'field'  => 'code',
                'length' => '10',
                'prefix' => 'PD' .substr( date('Y'), -2). date('m'),
            ]);
        });
    }

    public function satuan_obat() {
        return $this->belongsTo(SatuanObat::class);
    }
    public function bobot_obat() {
        return $this->belongsTo(BobotObat::class);
    }
}
