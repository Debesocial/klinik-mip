<?php

namespace Database\Seeders;

use App\Models\SatuanObat;
use Illuminate\Database\Seeder;

class SatuanObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SatuanObat::insert([
            [
                'satuan_obat' => 'Pieces',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Salep',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Sirup',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Tablet',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Capsul',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Injeksi',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Botol',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Cream',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Jelly',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Serbuk',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Suspensi',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'satuan_obat' => 'Gel',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
