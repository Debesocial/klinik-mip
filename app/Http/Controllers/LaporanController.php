<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\IzinIstirahat;
use App\Models\Perusahaan;
use App\Models\RawatInap;
use App\Models\RawatJalan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{

    public function laporan()
    {
        $data['perusahaan'] = Perusahaan::get();
        return view('laporan/laporan', $data);
    }

    public function pekerjaSakit(Request $request)
    {
        $color = $request->color;
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        $data['color'] = $color;
        if ($request->jenis == 'bulanan') {
            $format = '%Y-%m';
            $data['set_year'] = $request->year;
            $data_inap = RawatInap::select('rawat_inaps.*', 'pasiens.kategori_pasien_id')
            ->join('pasiens', 'pasiens.id','=','rawat_inaps.pasien_id')
            ->whereYear('mulai_rawat',$request->year)
            ->where('pasiens.kategori_pasien_id', 1)
            ->get();
        } elseif ($request->jenis == 'harian') {
            $format = '%Y-%m-%d';
            $data['start'] = $request->start;
            $data['end'] = $request->end;
            $data_inap = RawatInap::select('*, pasiens.kategori_pasien_id')
            ->join('pasiens', 'pasiens.id','=','rawat_inaps.pasien_id')
            ->where('pasiens.kategori_pasien_id', 1)
            ->get();
        }
        $total_pekerja_sakit = $this->getDataPekerjaSakit([
            'format' => $format,
            'perusahaan' => $request->perusahaan
        ]);
        $data['total'] = $total_pekerja_sakit;
        $data['namaperusahaan'] = $request->perusahaan ? Perusahaan::find($request->perusahaan)->nama_perusahaan_pasien : 'Semua Perusahaan';

        return view('component/laporan_pekerja_sakit', $data);
    }
    public function absenSakit(Request $request)
    {
        $color = $request->color;
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        $data['color'] = $color;
        if ($request->jenis == 'bulanan') {
            $format = '%Y-%m';
            $data['set_year'] = $request->year;
            
        } elseif ($request->jenis == 'harian') {
            $format = '%Y-%m-%d';
            $data['start'] = $request->start;
            $data['end'] = $request->end;
        }
        $data ['total'] = $this->getDataAbsen([
            'format' => $format,
            'perusahaan' => $request->perusahaan
        ]);
        $data['namaperusahaan'] = $request->perusahaan ? Perusahaan::find($request->perusahaan)->nama_perusahaan_pasien : 'Semua Perusahaan';
        

        return view('component/laporan_pekerja_absen', $data);


    }
    public function pak(Request $request)
    {
        $color = $request->color;
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        $data['color'] = $color;
        if ($request->jenis == 'bulanan') {
            $format = '%Y-%m';
            $data['set_year'] = $request->year;
        } elseif ($request->jenis == 'harian') {
            $format = '%Y-%m-%d';
            $data['start'] = $request->start;
            $data['end'] = $request->end;
        }
        $data ['total'] = $this->getDataPak([
            'format' => $format,
            'perusahaan' => $request->perusahaan
        ]);
        $data['namaperusahaan'] = $request->perusahaan ? Perusahaan::find($request->perusahaan)->nama_perusahaan_pasien : 'Semua Perusahaan';

        return view('component/laporan_pak', $data);
    }

    public function getDataPekerjaSakit($data)
    {
        $rawat_jalan = RawatJalan::selectRaw("count(rawat_jalans.id) as total, DATE_FORMAT(tanggal_berobat,'" . $data['format'] . "') as bulan")
            ->join('pasiens', 'pasiens.id', '=', 'pasien_id')
            ->groupByRaw("DATE_FORMAT(tanggal_berobat, '" . $data['format'] . "')")
            ->orderByRaw("DATE_FORMAT(tanggal_berobat, '" . $data['format'] . "')")
            ->where('is_kecelakaan', 0)
            ->where('pasiens.kategori_pasien_id', 1);
        if ($data['perusahaan']) {
            $rawat_jalan = $rawat_jalan->where('pasiens.perusahaan_id', $data['perusahaan']);
        }
        $rawat_jalan = $rawat_jalan->get();

        $rawat_inap = RawatInap::selectRaw("count(rawat_inaps.id) as total, DATE_FORMAT(mulai_rawat,'" . $data['format'] . "') as bulan")
            ->join('pasiens', 'pasiens.id', '=', 'pasien_id')
            ->groupByRaw("DATE_FORMAT(mulai_rawat,'" . $data['format'] . "')")
            ->orderByRaw("DATE_FORMAT(mulai_rawat,'" . $data['format'] . "')")
            ->where('is_kecelakaan', 0)
            ->where('pasiens.kategori_pasien_id', 1);
        if ($data['perusahaan']) {
            $rawat_inap = $rawat_inap->where('pasiens.perusahaan_id', $data['perusahaan']);
        }
        $rawat_inap = $rawat_inap->get();

        return $this->totalPerbulan([$rawat_inap, $rawat_jalan]);
    }

    public function getDataAbsen($data)
    {
        $absen = IzinIstirahat::selectRaw("sum(DATEDIFF(sampai, dari) + 1) as total, DATE_FORMAT(izin_istirahats.created_at,'" . $data['format'] . "') as bulan")
        ->join('pasiens', 'pasiens.id', '=', 'pasien_id')
        ->groupByRaw("DATE_FORMAT(izin_istirahats.created_at,'" . $data['format'] . "')")
        ->orderByRaw("DATE_FORMAT(izin_istirahats.created_at,'" . $data['format'] . "')")
        ->where('pasiens.kategori_pasien_id', 1)
        ->where('rekomendasi', 3);
        if ($data['perusahaan']) {
            $absen = $absen->where('pasiens.perusahaan_id', $data['perusahaan']);
        }
        $absen = $absen->get();
        return $this->totalPerbulan([$absen]);
    }

    public function getDataPak($data)
    {
        $rawat_jalan = RawatJalan::selectRaw("sum(JSON_LENGTH(nama_penyakit_id)-1) as total, DATE_FORMAT(tanggal_berobat,'" . $data['format'] . "') as bulan")
            ->join('pasiens', 'pasiens.id', '=', 'pasien_id')
            ->groupByRaw("DATE_FORMAT(tanggal_berobat, '" . $data['format'] . "')")
            ->orderByRaw("DATE_FORMAT(tanggal_berobat, '" . $data['format'] . "')")
            ->where('is_kecelakaan', 0)
            ->where('pasiens.kategori_pasien_id', 1);
        if ($data['perusahaan']) {
            $rawat_jalan = $rawat_jalan->where('pasiens.perusahaan_id', $data['perusahaan']);
        }
        $rawat_jalan = $rawat_jalan->get();
        $rawat_inap = RawatInap::selectRaw("sum(JSON_LENGTH(nama_penyakit_id)-1) as total, DATE_FORMAT(mulai_rawat,'" . $data['format'] . "') as bulan")
            ->join('pasiens', 'pasiens.id', '=', 'pasien_id')
            ->groupByRaw("DATE_FORMAT(mulai_rawat,'" . $data['format'] . "')")
            ->orderByRaw("DATE_FORMAT(mulai_rawat,'" . $data['format'] . "')")
            ->where('is_kecelakaan', 0)
            ->where('pasiens.kategori_pasien_id', 1);
        if ($data['perusahaan']) {
            $rawat_inap = $rawat_inap->where('pasiens.perusahaan_id', $data['perusahaan']);
        }
        $rawat_inap = $rawat_inap->get();
        return $this->totalPerbulan([$rawat_inap, $rawat_jalan]);
    }



    public function totalPerbulan($data)
    {
        $kunjungan = [];
        $total = 0;
        foreach ($data as $datas) {
            foreach ($datas as $d) {
                if (array_key_exists($d->bulan, $kunjungan)) {
                    $kunjungan[$d->bulan]->total = $kunjungan[$d->bulan]->total + $d->total;
                } else {
                    $kunjungan[$d->bulan] = $d;
                }
                $total = $total + $d->total;
            }
        }
        return ([array_values($kunjungan), $total]);
    }

    public function printLaporan(Request $request)
    {
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        if ($request->jenis == 'bulanan') {
            $format = '%Y-%m';
            $data['set_year'] = $request->year;
        } elseif ($request->jenis == 'harian') {
            $format = '%Y-%m-%d';
            $data['start'] = $request->start;
            $data['end'] = $request->end;
        }
        $total_pekerja_sakit = $this->getDataPekerjaSakit([
            'format' => $format,
            'perusahaan' => $request->perusahaan
        ]);
        $total_pekerja_absen = $this->getDataAbsen([
            'format' => $format,
            'perusahaan' => $request->perusahaan
        ]);
        $total_pak = $this->getDataPak([
            'format' => $format,
            'perusahaan' => $request->perusahaan
        ]);
        $data['total_pekerja_sakit'] = $total_pekerja_sakit;
        $data['total_pekerja_absen'] = $total_pekerja_absen;
        $data['total_pak'] = $total_pak;

        $data['namaperusahaan'] = $request->perusahaan ? Perusahaan::find($request->perusahaan)->nama_perusahaan_pasien : 'PT MANDIRI INTIPERKASA';

        return view('laporan/tabel_laporan_statistik', $data);
    }
}
