<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GolonganAlkes;
use Illuminate\Support\Facades\Schema;

class GolonganAlkesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        GolonganAlkes::truncate();
        $csvFile = fopen(base_path("database/data/golongan_alkes.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                GolonganAlkes::create([
                    "id" => $data['0'],
                    "golongan_alkes" => $data['1'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
    
}
