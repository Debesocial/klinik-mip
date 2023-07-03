<?php

namespace Database\Seeders;

use App\Models\BobotObat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BobotObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        BobotObat::truncate();
        $csvFile = fopen(base_path("database/data/bobot_obat.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                BobotObat::create([
                    "id" => $data['0'],
                    "bobot_obat" => $data['1'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
