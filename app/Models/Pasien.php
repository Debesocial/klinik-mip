<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kategori_pasien_id',
        'NIK',
        'perusahaan_id',
        'lain',
        'divisi_id',
        'jabatan_id',
        'keluarga_id',
        'nama_pasien',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
        'alamat',
        'alamat_mess',
        'pekerjaan',
        'telepon',
        'email',
        'alergi_obat',
        'hamil_menyusui',
        'created_by',
        'updated_by'
    ];


}
