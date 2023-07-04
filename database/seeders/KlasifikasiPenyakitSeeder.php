<?php

namespace Database\Seeders;

use App\Models\KlasifikasiPenyakit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KlasifikasiPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        KlasifikasiPenyakit::truncate();
        $csvFile = fopen(base_path("database/data/klasifikasi.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                KlasifikasiPenyakit::create([
                    "id" => $data['1'],
                    "klasifikasi_penyakit" => $data['0']
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
    
}
