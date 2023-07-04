<?php

namespace Database\Seeders;

use App\Models\SpesialisRujukan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SpesialisRujukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        SpesialisRujukan::truncate();
        $csvFile = fopen(base_path("database/data/dokter_spesialis.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                SpesialisRujukan::create([
                    "id" => $data['0'],
                    "nama_spesialis_rujukan" => $data['1'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
