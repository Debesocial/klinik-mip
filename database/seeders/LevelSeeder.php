<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert(
            [
                [
                    'nama_level' => 'superadmin'
                ],
                [
                    'nama_level' => 'dokter',
                ],
                [
                    'nama_level' => 'perawat',
                ],
                [
                    'nama_level' => 'apoteker',
                ],
                [
                    'nama_level' => 'tenaga teknis kefarmasian',
                ],
                [
                    'nama_level' => 'mitrakerja'
                ]
            ],
        );
    }
}
