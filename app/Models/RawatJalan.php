<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RawatJalan extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public static function boot()
    {
        parent::boot();
        $year  =  date('Y'); 
        $month =  date('m');
        $year   = substr( $year, -2). ''. $month;
        self::creating(function ($model) {
            $model->id_rawat_jalan = IdGenerator::generate([
                'table'  => 'rawat_jalans',
                'field'  => 'id_rawat_jalan',
                'length' => '10',
                'prefix' => 'RJ' .substr( date('Y'), -2). date('m'),
            ]);
        });
    }

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class, 'nama_penyakit_id', 'id');
    }

    public function tindakan() {
        return $this->belongsTo(Tindakan::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
