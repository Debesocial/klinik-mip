<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstruksiDokter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rawatinap()
    {
        return $this->belongsTo(RawatInap::class, 'id_rawat_inap', 'id');
    }
    function namapenyakit()
    {
        return $this->belongsTo(NamaPenyakit::class, 'diagnosa', 'id');
    }
    function namapenyakitsekunder()
    {
        return $this->belongsTo(NamaPenyakit::class, 'diagnosa_sekunder', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
