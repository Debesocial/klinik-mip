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
        'nama_penyakit_id',
        'created_by',
        'updated_by'
    ];

    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class);
    }

    public function pemeriksaancovid() {
        return $this->belongsTo(PemeriksaanCovid::class);
    }

    public function pemeriksaanantigen() {
        return $this->belongsTo(PemeriksaanAntigen::class);
    }

    public function testurin() {
        return $this->belongsTo(TestUrin::class);
    }

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class);
    }

    public function divisi() {
        return $this->belongsTo(Divisi::class);
    }

    public function keluarga() {
        return $this->belongsTo(Keluarga::class);
    }

    public function kategori() {
        return $this->belongsTo(KategoriPasien::class);
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }

    public function bobotobat() {
        return $this->belongsTo(BobotObat::class);
    }

    public function golonganobat() {
        return $this->belongsTo(GolonganObat::class);
    }

    public function jenisobat() {
        return $this->belongsTo(JenisObat::class);
    }

    public function namaobat() {
        return $this->belongsTo(NamaObat::class);
    }

    public function satuanobat() {
        return $this->belongsTo(SatuanObat::class);
    }
}