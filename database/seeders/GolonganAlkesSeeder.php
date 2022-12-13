<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GolonganAlkes;

class GolonganAlkesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GolonganAlkes::insert([
            [
                'golongan_alkes' => 'Disposable',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'golongan_alkes' => 'Reusable',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
    
}
