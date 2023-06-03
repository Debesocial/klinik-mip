<?php

namespace App\Http\Controllers;

use App\Models\KeteranganBerobat;
use App\Models\McuAwal;
use Illuminate\Http\Request;

use Dompdf\Dompdf;

class SuratController extends Controller
{
    public function modalKeteranganBerobat($id)
    {
        $keteranganberobat = KeteranganBerobat::with(['pasien'])->find($id);
        $data['keteranganberobat'] = $keteranganberobat;
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('surat/keterangan_berobat', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('keterangan-berobat' . str_replace(' ', '-', $keteranganberobat->pasien->nama_pasien) . '.pdf');
    }
    public function modalMcuAwal($id)
    {
        $data['mcuawal'] = McuAwal::find($id);

        return view('surat/mcu_awal', $data);
    }

    public function printMcuAwal($id)
    {
        $data['mcuawal'] = McuAwal::find($id);
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('surat/mcu_awal', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('mcu_awal.pdf');
    }
}
