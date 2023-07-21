<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Tindakan::truncate();
        $csvFile = fopen(base_path("database/data/tindakan.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Tindakan::create([
                    "nama_tindakan" => $data['0'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
