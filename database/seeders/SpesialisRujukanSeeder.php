<?php

namespace Database\Seeders;

use App\Models\SpesialisRujukan;
use Illuminate\Database\Seeder;

class SpesialisRujukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpesialisRujukan::insert([
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam (Internal Medicine)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam - Konsultan Gastroenterologi Hepatologi (Gastroenterohepatology)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam - Konsultan Ginjal dan Hipertensi (Nephrology)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam - Konsultan Hematologi Onkologi Medik (Medical Hematology Oncology)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam - Konsultan Rheumatologi (Rheumatology)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam - Konsultan Penyakit Tropik Infeksi (Tropical Infectious Disease)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam - Konsultan Geriatri',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Penyakit Dalam - Konsultan Endokrin Metabolik Diabetes',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Bedah Umum (General Surgery)',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_spesialis_rujukan' => 'Spesialis Bedah - Konsultan Bedah Anak (Pediatric Surgery)',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
