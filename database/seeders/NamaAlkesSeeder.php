<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NamaAlkes;

class NamaAlkesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NamaAlkes::insert([
            [
                'nama_alkes' => 'Abocath 20 G',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_alkes' => 'Alat Pemindah Pasien',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
