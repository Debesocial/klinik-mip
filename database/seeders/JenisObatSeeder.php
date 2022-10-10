<?php

namespace Database\Seeders;

use App\Models\JenisObat;
use Illuminate\Database\Seeder;

class JenisObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisObat::insert([
            [
                'nama_jenis_obat' => 'Alat Kesehatan',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_jenis_obat' => 'Obat',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
