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
                'nama_RS_rujukan' => 'Rumah Sakit Pertamedika',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Rumah Sakit Malinau',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Rumah Sakit MEDAN',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Rumah Sakit Harapan Indah',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'RSUD Tarakan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Rumah Sakit AL Tarakan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Rumah Sakit JAMBI',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Rumah Sakit JAWA',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_RS_rujukan' => 'Rumah Sakit Makasar',
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
