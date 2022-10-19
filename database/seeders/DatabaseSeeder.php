<?php

namespace Database\Seeders;

use App\Models\JenisObat;
use App\Models\KlasifikasiPenyakit;
use App\Models\NamaPenyakit;
use App\Models\Tindakan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            JadwalSeeder::class,
            LevelSeeder::class,
            RumahSakitRujukanSeeder::class,
            DivisiSeeder::class,
            HasilPemantauanSeeder::class,
            JabatanSeeder::class,
            KategoriPasienSeeder::class,
            LokasiKejadianSeeder::class,
            PerusahaanSeeder::class,
            SpesialisRujukanSeeder::class,
            BobotObatSeeder::class,
            GolonganObatSeeder::class,
            JenisObatSeeder::class,
            NamaObatSeeder::class,
            SatuanObatSeeder::class,
            TindakanSeeder::class,
            KlasifikasiPenyakitSeeder::class,
            SubKlasifikasiSeeder::class,
            NamaPenyakitSeeder::class
        ]);
    }
}
