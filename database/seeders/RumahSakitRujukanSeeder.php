<?php

namespace Database\Seeders;

use App\Models\RumahSakitRujukan;
use Illuminate\Database\Seeder;

class RumahSakitRujukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RumahSakitRujukan::insert([
            [
                'nama_RS_rujukan' => 'RSUD dr. H. Jusuf SK',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'RSUD Mantri Raga Kota Tarakan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'RSU Pertamedika Tarakan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'RSAL Ilyas Tarakan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'RSU Carsa Tarakan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'RSU Carsa Tarakan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Lainnya',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
