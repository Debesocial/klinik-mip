<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class McuAkhir extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'id_mcu_akhir',
        'deskripsi_hasil',
        'deskripsi_obat',
        'tanggal_pemeriksaan',
        'rekomendasi',
        'jenis_pemeriksaan',
        'status',
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
            $model->id_mcu_akhir = IdGenerator::generate([
                'table'  => 'mcu_akhirs',
                'field'  => 'id_mcu_akhir',
                'length' => '12',
                'prefix' => 'MCUa' .substr( date('Y'), -2). date('m'),
            ]);
        });
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
    

}
