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
            'senin'=>'-',
            'selasa'=>'-',
            'rabu'=>'-',
            'kamis'=>'-',
            'jumat'=>'-',
            'sabtu'=>'-',
            'minggu'=>'-'
        ]);
    }
}
