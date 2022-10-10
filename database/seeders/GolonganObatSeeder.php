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
                'nama_golongan_obat' => 'Disposable',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat bebas',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat bebas terbatas',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat keras',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat golongan narkotika',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat fitofarmaka',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat herbal terstandar',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_golongan_obat' => 'Obat herbal (jamu)',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
