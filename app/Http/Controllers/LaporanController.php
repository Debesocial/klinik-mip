<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Alkes;
use App\Models\InstruksiDokter;
use App\Models\IntervensiKeperawatan;
use App\Models\IzinIstirahat;
use App\Models\KlasifikasiPenyakit;
use App\Models\McuAwal;
use App\Models\McuLanjutan;
use App\Models\NamaObat;
use App\Models\NamaPenyakit;
use App\Models\Obat;
use App\Models\Perusahaan;
use App\Models\RawatInap;
use App\Models\RawatJalan;
use App\Models\TandaVital;
use App\Models\TestUrin;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{

    public function laporan()
    {
        $data['perusahaan'] = Perusahaan::get();
        $data['klasifikasi'] = KlasifikasiPenyakit::get();
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
            // $data_inap = RawatInap::select('rawat_inaps.*', 'pasiens.kategori_pasien_id')
            // ->join('pasiens', 'pasiens.id','=','rawat_inaps.pasien_id')
            // ->whereYear('mulai_rawat',$request->year)
            // ->where('pasiens.kategori_pasien_id', 1)
            // ->get();
        } elseif ($request->jenis == 'harian') {
            $format = '%Y-%m-%d';
            $data['start'] = $request->start;
            $data['end'] = $request->end;
            // $data_inap = RawatInap::select('*, pasiens.kategori_pasien_id')
            // ->join('pasiens', 'pasiens.id','=','rawat_inaps.pasien_id')
            // ->where('pasiens.kategori_pasien_id', 1)
            // ->get();
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
        $data['total'] = $this->getDataAbsen([
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
        $data['total'] = $this->getDataPak([
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

    public function jumlahKlasifikasi(Request $request)
    {
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        $data['color'] = $request->color;
        $inap = RawatInap::select('nama_penyakit_id', 'mulai_rawat as date', 'id_rawat_inap');
        if ($request->jenis == 'bulanan') {
            $inap = $inap->whereYear('mulai_rawat', $request->year);
            $data['set_year'] = $request->year;
        } elseif ($request->jenis == 'harian') {
            $inap = $inap->whereBetween('mulai_rawat', [date($request->start), date($request->end)]);
            $data['start'] = $request->start;
            $data['end'] = $request->end;
        }
        $inap = $inap->get();
        $jalan = RawatJalan::select('nama_penyakit_id', 'tanggal_berobat as date', 'id_rawat_jalan');
        if ($request->jenis == 'bulanan') {
            $jalan = $jalan->whereYear('tanggal_berobat', $request->year);
        } elseif ($request->jenis == 'harian') {
            $jalan = $jalan->whereBetween('tanggal_berobat', [date($request->start), date($request->end)]);
        }
        $jalan = $jalan->get();
        $gabungan = array_merge($inap->toArray(), $jalan->toArray());
        $result = $this->countIdPenyakit($gabungan);
        $data['result'] = $result;
        return view('component/laporan_jumlah_klasifikasi', $data);
    }

    public function countIdPenyakit($data)
    {

        $temp_result = [];
        foreach ($data as $array) {
            $temp_result = array_merge($temp_result, json_decode($array['nama_penyakit_id']));
        }

        $penyakit = NamaPenyakit::with(['sub_klasifikasi', 'sub_klasifikasi.klasifikasi_penyakit'])
            ->get();
        $result = [];
        foreach ($temp_result as $key => $val) {
            $peny = $penyakit->find($val);
            array_push($result, $peny->sub_klasifikasi->klasifikasi_penyakit->klasifikasi_penyakit);
        }
        $fix_result = [];
        foreach (array_count_values($result) as $key => $value) {
            $temp = ['klasifikasi_penyakit' => $key, 'total' => $value];
            array_push($fix_result, $temp);
        };
        return ($fix_result);
    }

    public function penggunaanObat(Request $request)
    {
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        $data['color'] = $request->color;
        $inap = RawatInap::select('resep', 'mulai_rawat as date', 'id_rawat_inap');
        $jalan = RawatJalan::select('resep', 'tanggal_berobat as date', 'id_rawat_jalan');
        $instruksi = InstruksiDokter::selectRaw('resep_obat as resep, created_at as date, id as id_instruksi_dokter');
        $vital = TandaVital::selectRaw('terapi as resep, created_at as date, id as id_tanda_vital');
        if ($request->jenis == 'bulanan') {
            $inap = $inap->whereYear('mulai_rawat', $request->year);
            $jalan = $jalan->whereYear('tanggal_berobat', $request->year);
            $instruksi = $instruksi->whereYear('created_at', $request->year);
            $vital = $vital->whereYear('created_at', $request->year);
            $data['set_year'] = $request->year;
        } elseif ($request->jenis == 'harian') {
            $inap = $inap->whereBetween('mulai_rawat', [date($request->start), date($request->end)]);
            $jalan = $jalan->whereBetween('tanggal_berobat', [date($request->start), date($request->end)]);
            $instruksi = $instruksi->whereBetween('created_at', [date($request->start), date($request->end)]);
            $vital = $vital->whereBetween('created_at', [date($request->start), date($request->end)]);
            $data['start'] = $request->start;
            $data['end'] = $request->end;
        }
        $inap = $inap->get()->toArray();
        $jalan = $jalan->get()->toArray();
        $instruksi = $instruksi->get()->toArray();
        $vital = $vital->get()->toArray();
        $gabung = array_merge($inap, $jalan, $instruksi, $vital);
        $data['result'] = $this->countObat($gabung);
        return view('component/laporan_penggunaan_obat', $data);
    }

    public function countObat($data)
    {
        $resep = [];
        $nama_obat = Obat::with(['satuan_obat'])->get();
        foreach ($data as $val) {
            $temp_resep = (array)json_decode($val['resep'], true);
            foreach ($temp_resep as $res) {
                if (isset($resep[$res['nama_obat']])) {
                    $resep[$res['nama_obat']]['total'] = $resep[$res['nama_obat']]['total'] + $res['jumlah_obat'];
                } else {
                    $resep[$res['nama_obat']] = [
                        'id' => $res['nama_obat'],
                        'total' => (int)$res['jumlah_obat'],
                        'nama_obat' => $nama_obat->find($res['nama_obat'])->nama_obat,
                        'satuan' => $nama_obat->find($res['nama_obat'])->satuan_obat->satuan_obat
                    ];
                }
            }
        }

        $resep = array_values($resep);
        return ($resep);
    }

    public function penggunaanAlkes(Request $request)
    {
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        $data['color'] = $request->color;
        $inap = RawatInap::select('tindakan', 'mulai_rawat as date', 'id_rawat_inap');
        $jalan = RawatJalan::select('tindakan', 'tanggal_berobat as date', 'id_rawat_jalan');
        $instruksi = InstruksiDokter::selectRaw('tindakan, created_at as date, id as id_instruksi_dokter');
        $intervensi = IntervensiKeperawatan::selectRaw('tindakan, created_at as date, id as id_tanda_vital');
        if ($request->jenis == 'bulanan') {
            $inap = $inap->whereYear('mulai_rawat', $request->year);
            $jalan = $jalan->whereYear('tanggal_berobat', $request->year);
            $instruksi = $instruksi->whereYear('created_at', $request->year);
            $intervensi = $intervensi->whereYear('created_at', $request->year);
            $data['set_year'] = $request->year;
        } elseif ($request->jenis == 'harian') {
            $inap = $inap->whereBetween('mulai_rawat', [date($request->start), date($request->end)]);
            $jalan = $jalan->whereBetween('tanggal_berobat', [date($request->start), date($request->end)]);
            $instruksi = $instruksi->whereBetween('created_at', [date($request->start), date($request->end)]);
            $intervensi = $intervensi->whereBetween('created_at', [date($request->start), date($request->end)]);
            $data['start'] = $request->start;
            $data['end'] = $request->end;
        }
        $inap = $inap->get()->toArray();
        $jalan = $jalan->get()->toArray();
        $instruksi = $instruksi->get()->toArray();
        $intervensi = $intervensi->get()->toArray();
        $gabung = array_merge($inap, $jalan, $instruksi, $intervensi);
        $data['result'] = $this->countAlkes($gabung);
        return view('component/laporan_penggunaan_alkes', $data);
    }

    public function countAlkes($data)
    {
        $alkes = [];
        $nama_alkes = Alkes::with(['satuan_obat'])->get();
        foreach ($data as $val) {
            $temp_tindakan = (array)json_decode($val['tindakan'], true);
            foreach ($temp_tindakan as $res) {
                if (isset($alkes[$res['alat_kesehatan']])) {
                    $alkes[$res['alat_kesehatan']]['total'] = $alkes[$res['alat_kesehatan']]['total'] + $res['jumlah_pengguna'];
                } else {
                    $alkes[$res['alat_kesehatan']] = [
                        'id' => $res['alat_kesehatan'],
                        'total' => (int)$res['jumlah_pengguna'],
                        'nama_alkes' => $nama_alkes->find($res['alat_kesehatan'])->nama_alkes,
                        'satuan' => $nama_alkes->find($res['alat_kesehatan'])->satuan_obat->satuan_obat
                    ];
                }
            }
        }

        $alkes = array_values($alkes);
        return ($alkes);
    }

    public function durasiIstirahat(Request $request)
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
        $data['total'] = $this->getDataAbsen([
            'format' => $format,
            'perusahaan' => $request->perusahaan
        ]);
        return view('component/laporan_durasi_istirahat', $data);
    }

    public function totalKunjungan(Request $request)
    {
        $data['set_year'] = '';
        $data['start'] = '';
        $data['end'] = '';
        $data['jenis'] = $request->jenis;
        $data['color'] = $request->color;
        if ($request->jenis == 'bulanan') {
            $format = '%Y-%m';
            $data['set_year'] = $request->year;
        } elseif ($request->jenis == 'harian') {
            $format = '%Y-%m-%d';
            $data['start'] = $request->start;
            $data['end'] = $request->end;
        }
        $rawat_jalan = RawatJalan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_berobat, "' . $format . '") as bulan')->groupByRaw("DATE_FORMAT(tanggal_berobat, '" . $format . "')")->orderByRaw("DATE_FORMAT(tanggal_berobat, '" . $format . "')")->get();
        $rawat_inap = RawatInap::selectRaw('count(id) as total, DATE_FORMAT(mulai_rawat, "' . $format . '") as bulan')->groupByRaw("DATE_FORMAT(mulai_rawat, '" . $format . "')")->orderByRaw("DATE_FORMAT(mulai_rawat, '" . $format . "')")->get();
        $mcu_awal = McuAwal::selectRaw('count(id) as total, DATE_FORMAT(created_at, "' . $format . '") as bulan')->groupByRaw("DATE_FORMAT(created_at, '" . $format . "')")->orderByRaw("DATE_FORMAT(created_at, '" . $format . "')")->get();
        $mcu_lanjut = McuLanjutan::selectRaw('count(id) as total, DATE_FORMAT(tanggal_pemeriksaan, "' . $format . '") as bulan')->groupByRaw("DATE_FORMAT(tanggal_pemeriksaan, '" . $format . "')")->orderByRaw("DATE_FORMAT(tanggal_pemeriksaan, '" . $format . "')")->get();
        $narkoba = TestUrin::selectRaw('count(id) as total, DATE_FORMAT(created_at, "' . $format . '") as bulan')->groupByRaw("DATE_FORMAT(created_at, '" . $format . "')")->orderByRaw("DATE_FORMAT(created_at, '" . $format . "')")->get();
        $kunjungan = $this->countKunjungan([$rawat_inap, $rawat_jalan, $mcu_awal, $mcu_lanjut, $narkoba]);
        $data['total'] = $kunjungan;
        return view('component/laporan_kunjungan', $data);
    }

    public function countKunjungan($data)
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
}
