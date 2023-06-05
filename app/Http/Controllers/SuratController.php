<?php

namespace App\Http\Controllers;

use App\Models\IzinBerobat;
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
        $view = view('surat/keterangan_berobat', $data);
        $savename = 'keterangan-berobat' . str_replace(' ', '-', $keteranganberobat->pasien->nama_pasien) . '.pdf';
        $this->renderSurat($view, $savename);
    }
    public function modalMcuAwal($id)
    {
        $data['mcuawal'] = McuAwal::find($id);

        return view('surat/mcu_awal', $data);
    }

    public function printMcuAwal($id)
    {
        $mcuawal = McuAwal::find($id);
        $data['mcuawal'] = $mcuawal;
        $view = view('surat/mcu_awal', $data);
        $savename = 'mcu-awal' . str_replace(' ', '-', $mcuawal->pasien->nama_pasien) . '.pdf';
        $this->renderSurat($view, $savename);
        
    }

    public function printIzinBerobat($id)
    {
        $izinberobat = IzinBerobat::find($id);
        $data['izinberobat'] = $izinberobat;
        $view = view('surat/izin_berobat', $data);
        $savename = 'izin-berobat' . str_replace(' ', '-', $izinberobat->pasien->nama_pasien) . '.pdf';
        // return $view;
        
        $this->renderSurat($view, $savename);
    }

    public function renderSurat($view, $savename)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($savename, array("Attachment" => false));
    }
}
