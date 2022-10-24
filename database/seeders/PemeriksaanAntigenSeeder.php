<?php

namespace Database\Seeders;

use App\Models\PemeriksaanAntigen;
use Illuminate\Database\Seeder;

class PemeriksaanAntigenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PemeriksaanAntigen::insert([
            [
                'kebutuhan' => 'Suspek',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kebutuhan' => 'Exit Test Suspek',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kebutuhan' => 'Kontak Erat',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kebutuhan' => 'Dugaan Kontak',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kebutuhan' => 'Exit Kontak Erat',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kebutuhan' => 'Keluar Site',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kebutuhan' => 'Pulang Pergi Rutin',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
