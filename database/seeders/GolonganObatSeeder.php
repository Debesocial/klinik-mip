<?php

namespace Database\Seeders;

use App\Models\GolonganObat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GolonganObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        GolonganObat::truncate();
        $csvFile = fopen(base_path("database/data/golongan_obat.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                GolonganObat::create([
                    "id" => $data['0'],
                    "nama_golongan_obat" => $data['1'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
