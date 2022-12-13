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
                'nama_obat' => 'Vitacimin',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_obat' => 'Bisolvon',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
