<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RawatInap extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'id_rawat_inap',
        'anamnesis',
        'tinggi_badan',
        'berat_badan',
        'suhu_badan',
        'tekanan_darah',
        'denyut_nadi',
        'laju_pernapasan',
        'saturasi_oksigen',
        'pemeriksaan_penunjang',
        'nama_penyakit_id',
        'tindakan_id',
        'alat_kesehatan',
        'jumlah_pengguna',
        'keterangan',
        'nama_obat',
        'jumlah_obat',
        'aturan',
        'keterangan_obat',
        'catatan',
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
            $model->id_rawat_inap = IdGenerator::generate([
                'table'  => 'rawat_inaps',
                'field'  => 'id_rawat_inap',
                'length' => '10',
                'prefix' => 'RI' .substr( date('Y'), -2). date('m'),
            ]);
        });
    }


    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class);
    }

    public function tindakan() {
        return $this->belongsTo(Tindakan::class);
    }

    public function jenisobat() {
        return $this->belongsTo(JenisObat::class);
    }

    public function namaobat() {
        return $this->belongsTo(NamaObat::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
