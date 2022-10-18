<?php

namespace Database\Seeders;

use App\Models\KlasifikasiPenyakit;
use Illuminate\Database\Seeder;

class KlasifikasiPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KlasifikasiPenyakit::insert([
            [
                'klasifikasi_penyakit' => 'Penyakit Infeksi dan Parasit',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Neoplasma',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Sistem Imun',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Endokrin, Nutrisi dan Metabolik',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Gangguan Mental, Perilaku dan Fungsi Otak',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Respiratori(Sistem Pernafasan)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Gejala, Tanda Atau Temuan Klinis',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Mata atau Adneksa',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Telinga dan Prosesus Mastoideus',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Trauma, Keracunan dan Konsekuensi Penyebab Eksternal',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Gangguan Psikologi(Jiwa dan Perilaku)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Muskoskeletal(Otot dan Sendi)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Sistem Digestive(Saluran Pencernaan)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Kardiovaskuler(Jantung dan Pembuluh Datah',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Genitalia(Organ Kelamin)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Urologi(Saluran Kemih)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Kulit',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Penyakit Sistem Saraf',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'klasifikasi_penyakit' => 'Kontrol',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
