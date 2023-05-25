<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RawatInap extends Model
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
            $model->id_rawat_inap = IdGenerator::generate([
                'table'  => 'rawat_inaps',
                'field'  => 'id_rawat_inap',
                'length' => '10',
                'prefix' => 'RI' . substr(date('Y'), -2) . date('m'),
            ]);
        });
    }

    // public function namapenyakit() {
    //     return $this->belongsTo(NamaPenyakit::class, 'nama_penyakit_id', 'id');
    // }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }

    public function jenisobat()
    {
        return $this->belongsTo(JenisObat::class);
    }

    public function namaobat()
    {
        return $this->belongsTo(NamaObat::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function instruksidokter()
    {
        return $this->hasMany(InstruksiDokter::class, 'id_rawat_inap', 'id');
    }
    public function intervensikeperawatan()
    {
        return $this->hasMany(IntervensiKeperawatan::class, 'id_rawat_inap', 'id');
    }

    public function permintaanmakanan()
    {
        return $this->hasMany(PermintaanMakanan::class, 'id_rawat_inap', 'id');
    }

    public function tandavital()
    {
        return $this->hasMany(TandaVital::class, 'id_rawat_inap','id');
    }
}
