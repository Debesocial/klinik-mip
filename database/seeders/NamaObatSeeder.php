<?php

namespace Database\Seeders;

use App\Models\NamaObat;
use Illuminate\Database\Seeder;

class NamaObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NamaObat::insert([
            [
                'nama_obat' => 'Abocath 20 G',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Abocath 22 G',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Abocath 24 G',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Aclyclovir 5% 5 gram',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Actifed syr 60 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Acyclovir 400 mg',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Alco plus DMP 100 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Alcohol 100 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Alcohol 1000 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Alcohol Swab',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Allopurinol 300 mg',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
