<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::insert([
            [
                'hari' => 'senin',
                'shift' => '1',
                'dari' => '06:30:00',
                'sampai' => '18:30:30',
            ],
            [
                'hari' => 'senin',
                'shift' => '2',
                'dari' => '18:30:30',
                'sampai' => '06:30:00',
            ],
            [
                'hari' => 'selasa',
                'shift' => '1',
                'dari' => '06:30:00',
                'sampai' => '18:30:30',
            ],
            [
                'hari' => 'selasa',
                'shift' => '2',
                'dari' => '18:30:30',
                'sampai' => '06:30:00',
            ],
            [
                'hari' => 'rabu',
                'shift' => '1',
                'dari' => '06:30:00',
                'sampai' => '18:30:30',
            ],
            [
                'hari' => 'rabu',
                'shift' => '2',
                'dari' => '18:30:30',
                'sampai' => '06:30:00',
            ],
            [
                'hari' => 'kamis',
                'shift' => '1',
                'dari' => '06:30:00',
                'sampai' => '18:30:30',
            ],
            [
                'hari' => 'kamis',
                'shift' => '2',
                'dari' => '18:30:30',
                'sampai' => '06:30:00',
            ],
            [
                'hari' => 'jumat',
                'shift' => '1',
                'dari' => '06:30:00',
                'sampai' => '18:30:30',
            ],
            [
                'hari' => 'jumat',
                'shift' => '2',
                'dari' => '18:30:30',
                'sampai' => '06:30:00',
            ],
            [
                'hari' => 'sabtu',
                'shift' => '1',
                'dari' => '06:30:00',
                'sampai' => '18:30:30',
            ],
            [
                'hari' => 'sabtu',
                'shift' => '2',
                'dari' => '18:30:30',
                'sampai' => '06:30:00',
            ],
            [
                'hari' => 'minggu',
                'shift' => '1',
                'dari' => '06:30:00',
                'sampai' => '18:30:30',
            ],
            [
                'hari' => 'minggu',
                'shift' => '2',
                'dari' => '18:30:30',
                'sampai' => '06:30:00',
            ]
        ]);
    }
}
