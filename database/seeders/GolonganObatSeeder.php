<?php

namespace Database\Seeders;

use App\Models\GolonganObat;
use Illuminate\Database\Seeder;

class GolonganObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GolonganObat::insert([
            [
                'nama_golongan_obat' => 'Obat Bebas',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat Bebas Terbatas',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat Keras',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Fitofarmaka',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Herbal Terstandar',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Jamu',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
