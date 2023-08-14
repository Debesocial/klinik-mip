<?php

namespace Database\Seeders;

use App\Models\Sediaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SediaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Sediaan::truncate();
        $csvFile = fopen(base_path("database/data/sediaan.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Sediaan::create([
                    "id" => $data['0'],
                    "singkatan" => $data['1'],
                    "kepanjangan" => $data['2'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
