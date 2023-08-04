<?php

namespace Database\Seeders;

use App\Models\Dosis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Dosis::truncate();
        $csvFile = fopen(base_path("database/data/dosis.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Dosis::create([
                    "singkatan" => $data['0'],
                    "kepanjangan" => $data['1'],
                    "arti" => $data['2'],
                    "created_by" => 1,
                    "updated_by" => 1,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
