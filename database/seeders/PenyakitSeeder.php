<?php

namespace Database\Seeders;

use App\Models\NamaPenyakit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KlasifikasiPenyakitSeeder::class,
            SubKlasifikasiSeeder::class
        ]);
        Schema::disableForeignKeyConstraints();
        NamaPenyakit::truncate();
        $csvFile = fopen(base_path("database/data/penyakit.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                NamaPenyakit::create([
                    "primer" => $data['0'],
                    "sub_klasifikasi_id" => $data['2'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
