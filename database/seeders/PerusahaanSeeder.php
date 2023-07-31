<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Perusahaan::truncate();
        $csvFile = fopen(base_path("database/data/perusahaan.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Perusahaan::create([
                    "id" => $data['0'],
                    "nama_perusahaan_pasien" => $data['1'],
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
