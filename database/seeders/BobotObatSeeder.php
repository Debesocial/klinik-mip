<?php

namespace Database\Seeders;

use App\Models\BobotObat;
use Illuminate\Database\Seeder;

class BobotObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BobotObat::insert([
            [
                'bobot_obat' => '1 box @50 Pcs',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 box @25 Pcs',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 pcs @ 60 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 box @50 Tab',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 pcs @ 100 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 pcs @ 1000 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 box @100 Pcs',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 box @100 Tab',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 box @100 Caps',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 box @30 Pcs',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 pack @12 Pcs',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'bobot_obat' => '1 pcs @60 ml',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
