<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
use App\Models\IzinBerobat;
use App\Models\IzinIstirahat;
use App\Models\KecelakaanKerja;
use App\Models\KeteranganBerobat;
use App\Models\KeteranganSehat;
use App\Models\McuAwal;
use App\Models\NamaPenyakit;
use App\Models\Obat;
use App\Models\PersetujuanTindakan;
use App\Models\RawatInap;
use App\Models\RawatJalan;
use App\Models\SuratRujukan;
use App\Models\TestUrin;
use App\Models\Tindakan;
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

    public function printRujukan($id)
    {
        $rujukan = SuratRujukan::find($id);
        $data['rujukan'] = $rujukan;
        $view = view('surat/rujukan', $data);
        $savename = 'rujukan' . str_replace(' ', '-', $rujukan->pasien->nama_pasien) . '.pdf';
        $this->renderSurat($view, $savename);
    }
    public function printSehat($id)
    {
        $sehat = KeteranganSehat::find($id);
        $data['sehat'] = $sehat;
        $view = view('surat/sehat', $data);
        // return $view;
        $savename = 'keterangan-sehat' . str_replace(' ', '-', $sehat->pasien->nama_pasien) . '.pdf';
        $this->renderSurat($view, $savename);
    }
    public function printTindakan($id)
    {
        $tindakan = PersetujuanTindakan::find($id);
        $data['tindakan'] = $tindakan;
        $view = view('surat/tindakan', $data);
        // return $view;
        $savename = 'persetujuan-tindakan' . str_replace(' ', '-', $tindakan->pasien->nama_pasien) . '.pdf';
        $this->renderSurat($view, $savename);
    }
    public function printIstirahat($id)
    {
        $istirahat = IzinIstirahat::find($id);
        $data['istirahat'] = $istirahat;
        $data['obat'] = Obat::with(['satuan_obat'])->get();
        $data['alkes'] = Alkes::with(['satuan_obat'])->get();
        $view = view('surat/istirahat', $data);
        // return $view;
        $savename = 'izin-istirahat' . str_replace(' ', '-', $istirahat->pasien->nama_pasien) . '.pdf';
        $this->renderSurat($view, $savename);
    }

    public function printKecelakaan($id)
    {
        $kecelakaan = KecelakaanKerja::find($id);
        if ($kecelakaan->id_rekam_medis!=null) {
            if ($kecelakaan->rekam_medis=='RI') {
                $rekam_medis = RawatInap::find($kecelakaan->id_rekam_medis);
                $rekam_medis['gen_id'] = $rekam_medis->id_rawat_inap;
            }elseif ($kecelakaan->rekam_medis=='RJ') {
                $rekam_medis = RawatJalan::find($kecelakaan->id_rekam_medis);
                $rekam_medis['gen_id'] = $rekam_medis->id_rawat_jalan;
            }
            $inputs = ['gen_id','obat_konsumsi','pemeriksaan_penunjang','nama_penyakit_id', 'anamnesis', 'tinggi_badan', 'berat_badan', 'suhu_tubuh', 'tekanan_darah', 'saturasi_oksigen', 'denyut_nadi', 'denyut_nadi_menit', 'laju_pernapasan', 'laju_pernapasan_menit', 'status_lokalis','tindakan','resep'];
            foreach ($inputs as $input) {
                $kecelakaan[$input] = $rekam_medis[$input];
            }
        }
        $data['kecelakaan'] = $kecelakaan;
        $data['obat'] = Obat::with(['satuan_obat'])->get();
        $data['alkes'] = Alkes::with(['satuan_obat'])->get();
        $data['penyakit'] = NamaPenyakit::with(['sub_klasifikasi','sub_klasifikasi.klasifikasi_penyakit'])->get();
        $view = view('surat/kecelakaan', $data);
        $savename = 'kecelakaan-kerja' . str_replace(' ', '-', $kecelakaan->pasien->nama_pasien) . '.pdf';
        $this->renderSurat($view, $savename);
    }

    public function printNarkoba($id)
    {
        $narko = TestUrin::find($id);
        $data['narko'] = $narko;
        $view = view('surat/narkoba', $data);
        // return $view;
        $savename = 'pemeriksaan-narkoba' . str_replace(' ', '-', $narko->pasien->nama_pasien) . '.pdf';
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
