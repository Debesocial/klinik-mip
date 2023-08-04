<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Divisi::truncate();
        $csvFile = fopen(base_path("database/data/divisi.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Divisi::create([
                    "id" => $data['0'],
                    "nama_divisi_pasien" => $data['1'],
                    "perusahaan_id" => $data['2'],
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
