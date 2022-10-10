<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::insert([
            [
                'nama_divisi_pasien' => 'IT',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'HSE',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'HRGA',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'Produksi - Operasional',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'Enginering - Survey',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'Plant',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'Warehouse - Logistic',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'Management',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'GWA',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'CPP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'Comdev',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_divisi_pasien' => 'Quality Control',
                'created_by' => 1,
                'updated_by' => 1
            ]
        ]);
    }
}
