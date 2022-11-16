<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTindakan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_doc',
        'rekam_medis_id',
        'tindakan_id',
        'alkes',
        'jumlah_pengguna',
        'keterangan',
        'created_by',
        'updated_by'
    ];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
    
}
