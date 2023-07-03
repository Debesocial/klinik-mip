<?php

namespace Database\Seeders;

use App\Models\SatuanObat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SatuanObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        SatuanObat::truncate();
        $csvFile = fopen(base_path("database/data/satuan_obat.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                SatuanObat::create([
                    "id" => $data['0'],
                    "satuan_obat" => $data['1'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
