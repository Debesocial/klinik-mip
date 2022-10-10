<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perusahaan::insert([
            [
                'nama_perusahaan_pasien' => 'MIP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_perusahaan_pasien' => 'MKP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_perusahaan_pasien' => 'ABP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_perusahaan_pasien' => 'GMS',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_perusahaan_pasien' => 'MHA',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_perusahaan_pasien' => 'PSU',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_perusahaan_pasien' => 'RML',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_perusahaan_pasien' => 'SUCOFINDO',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
