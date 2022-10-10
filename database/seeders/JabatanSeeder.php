<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::insert([
            [
                'nama_jabatan' => 'Manager',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_jabatan' => 'Superitendent',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_jabatan' => 'Staff',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_jabatan' => 'Non Staff',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
