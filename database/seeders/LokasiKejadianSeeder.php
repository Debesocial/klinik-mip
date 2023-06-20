<?php

namespace Database\Seeders;

use App\Models\LokasiKejadian;
use Illuminate\Database\Seeder;

class LokasiKejadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LokasiKejadian::insert([
            [
                'nama_lokasi' => 'Camp',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Lainnya',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Office',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Washing Plant',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Port',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'CPP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Dermaga Lagub',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Nursery',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Laboratorium',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Workshop',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Mine',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_lokasi' => 'Eksplorasi',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
